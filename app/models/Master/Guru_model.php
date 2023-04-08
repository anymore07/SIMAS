<?php

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;

class Guru_model
{
    private $table = 'masterguru';
    private $fields = [
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat_lengkap',
        'pendidikan_terakhir',
        'jurusan_pendidikan_terakhir',
        'nomor_hp',
        'kategori',
        'mapel_yg_diampu',
        'kategori_mapel',
        'nip',
        'status_sertifikasi',
        'keahlian_ganda',
        'status_pernikahan'
    ];
    private $logs = [
        'created_at',
        'created_by',
        'modified_at',
        'modified_by',
        'deleted_at',
        'deleted_by',
        'restored_at',
        'restored_by'
    ];
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_MASTER);
    }

    public function getAllData()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->fetchAll();
    }

    public function getDataById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id_guru = :id"); // : = menghindari sql injection
        $this->db->bind("id", $id);
        return $this->db->fetch();
    }

    public function uploadImage()
    {
        $targetDir = 'images/datafoto/'; // direktori tempat menyimpan file upload
        $temp = $_FILES['foto']['name'];
        $imageFileType = explode('.', $temp);
        $imageFileType = strtolower(end($imageFileType));

        // validasi ekstensi file
        // $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit;
        }

        $fileName = uniqid();
        $fileName .= '.';
        $fileName .= $imageFileType;
        $targetFile = $targetDir . $fileName; // nama file upload

        // cek gambar diupload atau tidak
        if ($_FILES["foto"]["error"] === 4) {
            echo
            '
            <script>
                alert("Silahkan Upload Gambar")
            </script>
        ';
            return false;
        }

        // validasi ukuran file
        if ($_FILES["foto"]["size"] > 1000000) {
            echo
            '
                <script>
                    alert("Ukuran File Terlalu Besar")
                </script>
            ';
            return false;
        }

        try {
            // simpan file upload ke direktori
            move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile);
        } catch (IOExceptionInterface $e) {
            echo $e->getMessage();
        }

        return $fileName;
    }


    public function tambahData($data)
    {
        $data['user'] = "Tsaqif";

        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES 
            (null, :uuid, :foto, :nama_lengkap, :jenis_kelamin, :tempat_lahir, :tanggal_lahir, :alamat_lengkap, :pendidikan_terakhir, :jurusan_pendidikan_terakhir, :nomor_hp, :kategori, :mapel_yg_diampu, :kategori_mapel, :nip, :status_sertifikasi, :keahlian_ganda, :status_pernikahan, 
            CURRENT_TIMESTAMP, :created_by, null, '', null, '', null, '')"
        );
        $foto = $this->uploadImage();
        if (!$foto) {
            return false;
        }
        $this->db->bind('foto', $foto);
        $this->db->bind('uuid', '49f20563-b288-4561-8b9c-64b8a825893d');
        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('created_by', $data['user']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id_guru = :id");
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data)
    {
        $data['user'] = "Tsaqif";
        $this->db->query(
            "UPDATE {$this->table}
                SET 
                foto = :foto,
                nama_lengkap = :nama_lengkap,
                jenis_kelamin = :jenis_kelamin,
                tempat_lahir = :tempat_lahir,
                tanggal_lahir = :tanggal_lahir,
                alamat_lengkap = :alamat_lengkap,
                pendidikan_terakhir = :pendidikan_terakhir,
                jurusan_pendidikan_terakhir = :jurusan_pendidikan_terakhir,
                nomor_hp = :nomor_hp,
                kategori = :kategori,
                mapel_yg_diampu = :mapel_yg_diampu,
                kategori_mapel = :kategori_mapel,
                nip = :nip,
                status_sertifikasi = :status_sertifikasi,
                keahlian_ganda = :keahlian_ganda,
                status_pernikahan = :status_pernikahan,
                modified_at = CURRENT_TIMESTAMP,
                modified_by = :modified_by
            WHERE id_guru = :id"
        );


        if ($_FILES["foto"]["error"] === 4) {
            $foto = $data['fotoLama'];
        } else {
            $foto = $this->uploadImage();
        }

        $this->db->bind('foto', $foto);
        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        $this->db->bind('modified_by', $data['user']);
        $this->db->bind('id', $data['id_guru']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariData()
    {
        $keyword = $_POST['keyword'];

        $this->db->query("SELECT * FROM {$this->table} WHERE nama_lengkap LIKE :keyword");
        $this->db->bind("keyword", "%$keyword%");
        return $this->db->fetchAll();
    }
}
