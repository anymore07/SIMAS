<?php

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Ramsey\Uuid\Uuid;

class stokBarangAset_models
{
    private $table = 'stok_aset';
    private $db;
    private $fields = [
        'namabarang',
        'nomor',
        'sumberdana',
        'jumlah',
        'tempat',
        'waktu',
        'penerima'

    ];
    private $user;

    public function __construct()
    {
        $this->db = new Database(DB_SARPRAS);
        $this->user = Cookie::get_jwt()->name;
    }

    public function getALLDataStokBarangAset()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->fetchAll();
    }

    function getAllExistData()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE `status` = 1');
        return $this->db->fetchAll();
    }

    public function getDataStokBarangAsetById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }
    public function importData()
    {
        // Cek file diupload apa belum
        if (!isset($_FILES['file']['name'])) {
            Flasher::setFlash('Error', 'Harap pilih file Excel terlebih dahulu', 'danger');
            header('location: ' . BASEURL . '/barangAset');
            exit;
        }

        // Baca file Excel menggunakan PhpSpreadsheet
        $inputFileName = $_FILES['file']['tmp_name'];
        $spreadsheet = IOFactory::load($inputFileName);

        // Ambil data dari sheet pertama
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        $maxColumnIndex = Coordinate::columnIndexFromString($highestColumn);

        // Daftar kolom yang akan diambil dari file Excel dan disimpan ke database
        $columns = $this->fields;

        // Looping untuk membaca setiap baris data
        for ($row = 2; $row <= $highestRow; $row++) {
            $data = [];

            // Looping untuk membaca setiap kolom data
            for ($col = 2; $col <= count($columns) + 1; $col++) {
                $columnLetter = Coordinate::stringFromColumnIndex($col);
                $cellValue = $worksheet->getCell($columnLetter . $row)->getValue();
                $data[$columns[$col - 2]] = $cellValue;
            }

            // Simpan data ke database
            $response = $this->tambahDataStokBarangAset($data);
        }
        return $response;
    }


    public function tambahDataStokBarangAset($data)
    {
        $query = "INSERT INTO stok_aset
                    VALUES
                  (null, :uuid, :namabarang, :nomor, :sumberdana, :jumlah, :tempat, :waktu, :penerima, '', CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '', 0, 0, DEFAULT)";


        $this->db->query($query);
        $this->db->bind('uuid', Uuid::uuid4()->toString());
        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('created_by', $this->user);


        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataStokBarangAset($id)
    {
        $this->db->query(
            "UPDATE {$this->table}
                SET
                deleted_at = CURRENT_TIMESTAMP,
                deleted_by = :deleted_by,
                is_deleted = 1,
                is_restored = 0
              WHERE id = :id"
        );

        $this->db->bind('deleted_by', $this->user);
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }



    public function ubahDataStokBarangAset($data)
    {
        $query = "UPDATE stok_aset SET
                    namabarang = :namabarang,
                    nomor = :nomor,
                    sumberdana = :sumberdana,
                    jumlah = :jumlah,
                    tempat = :tempat,
                    waktu = :waktu,
                    penerima = :penerima,
                    modified_at = CURRENT_TIMESTAMP,
                    modified_by = :modified_by
                WHERE id = :id";

        $this->db->query($query);

        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('modified_by', $this->user);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataStokBarangAset()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM stok_aset WHERE namabarang_aset LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->fetchAll();
    }
}
