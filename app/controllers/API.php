<?php

class API extends Controller
{
    public function index()
    {
        echo "Page not found!";
    }

    // LOGIN //

    public function login()
    {
        header('Content-Type: application/json');
        if (isset($_POST['nama']) && isset($_POST['nisn'])) {
            $data['nama'] = $_POST['nama'];
            $data['nisn'] = $_POST['nisn'];
            $user = $this->model("Kesiswaan", "Kehadiran_model")->login($data);
            if (!$user) {
                $response = false;
                $message = "Gagal Login";
                echo json_encode(["success" => $response, "message" => $message, "data" => $user]);
            } else {
                $response = true;
                $message = "Berhasil Login";
                echo json_encode(["success" => $response, "message" => $message, "data" => $user]);
            }
        }
    }

    // KEHADIRAN //

    public function kehadiran($id = null)
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        ($id == null) ?
            $data = $this->model("Kesiswaan", 'Kehadiran_model')->getAllExistData() :
            $data = $this->model("Kesiswaan", 'Kehadiran_model')->getDataById($id);
        ($data) ?
            $response = true :
            $response = false;
        echo json_encode(["status" => $response, "data" => $data]);
    }

    public function tambahDataKehadiran()
    {
        if ($this->model("Kesiswaan", "Kehadiran_model")->tambahData($_POST) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Kehadiran berhasil ditambahkan"]);
        } else {
            echo json_encode(["status" => "success", "message" => "Data Kehadiran gagal dihapus"]);
        }
    }

    public function hapusDataKehadiran($id)
    {
        if ($this->model("Kesiswaan", "Kehadiran_model")->hapusData($id) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Kehadiran berhasil dihapus"]);
        } else {
            echo json_encode(["status" => "success", "message" => "Data Kehadiran gagal dihapus"]);
        }
    }

    public function ubahDataKehadiran($id)
    {
        if ($this->model("Kesiswaan", "Kehadiran_model")->ubahDataAPI($id, $_POST) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Kehadiran berhasil diubah"]);
        } else {
            echo json_encode(["status" => "success", "message" => "Data Kehadiran gagal ditambahkan"]);
        }
    }

    // PELANGGARAN //


    public function pelanggaran($id = null)
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        ($id == null) ?
            $data = $this->model("Kesiswaan", 'Pelanggaran_model')->getAllExistData() :
            $data = $this->model("Kesiswaan", 'Pelanggaran_model')->getDataById($id);

        ($data) ?
            $response = true :
            $response = false;
        echo json_encode(["status" => $response, "data" => $data]);
    }

    public function tambahDataPelanggaran()
    {
        if ($this->model("Kesiswaan", "Pelanggaran_model")->tambahData($_POST) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Pelanggaran berhasil ditambahkan"]);
        } else {
            echo json_encode(["status" => "success", "message" => "Data Pelanggaran gagal dihapus"]);
        }
    }

    public function hapusDataPelanggaran($id)
    {
        if ($this->model("Kesiswaan", "Pelanggaran_model")->hapusData($id) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Pelanggaran berhasil dihapus"]);
        } else {
            echo json_encode(["status" => "success", "message" => "Data Pelanggaran gagal dihapus"]);
        }
    }

    public function ubahDataPelanggaran($id)
    {
        if ($this->model("Kesiswaan", "Pelanggaran_model")->ubahDataAPI($id, $_POST) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Pelanggaran berhasil diubah"]);
        } else {
            echo json_encode(["status" => "success", "message" => "Data Pelanggaran gagal ditambahkan"]);
        }
    }



    // POIN PELANGGARAN //



    public function Poinpelanggaran($id = null)
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        ($id == null) ?
            $data = $this->model("Kesiswaan", 'Poinpelanggaran_model')->getAllExistData() :
            $data = $this->model("Kesiswaan", 'Poinpelanggaran_model')->getDataById($id);

        ($data) ?
            $response = true :
            $response = false;
        echo json_encode(["status" => $response, "data" => $data]);
    }

    public function tambahDataPoinpelanggaran()
    {
        if ($this->model("Kesiswaan", "Poinpelanggaran_model")->tambahData($_POST) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Poin Pelanggaran berhasil ditambahkan"]);
        } else {
            echo json_encode(["status" => "success", "message" => "Data Poin Pelanggaran gagal dihapus"]);
        }
    }

    public function hapusDataPoinpelanggaran($id)
    {
        if ($this->model("Kesiswaan", "Poinpelanggaran_model")->hapusData($id) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Poin Pelanggaran berhasil dihapus"]);
        } else {
            echo json_encode(["status" => "success", "message" => "Data Poin Pelanggaran gagal dihapus"]);
        }
    }

    public function ubahDataPoinpelanggaran($id)
    {
        if ($this->model("Kesiswaan", "Poinpelanggaran_model")->ubahDataAPI($id, $_POST) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Poin Pelanggaran berhasil diubah"]);
        } else {
            echo json_encode(["status" => "success", "message" => "Data Poin Pelanggaran gagal ditambahkan"]);
        }
    }


    //  SISWA  //

    public function Siswa($id = null)
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        ($id == null) ?
            $data = $this->model("Master", 'Siswa_model')->getAllExistData() :
            $data = $this->model("Master", 'Siswa_model')->getDataById($id);

        ($data) ?
            $response = true :
            $response = false;
        echo json_encode(["status" => $response, "data" => $data]);
    }

    public function tambahDataSiswa()
    {
        if ($this->model("Master", "Siswa_model")->tambahData($_POST) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Siswa berhasil ditambahkan"]);
        } else {
            echo json_encode(["status" => "success", "message" => "Data Siswa gagal dihapus"]);
        }
    }

    public function hapusDataSiswa($id)
    {
        if ($this->model("Master", "Siswa_model")->hapusData($id) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Siswa berhasil dihapus"]);
        } else {
            echo json_encode(["status" => "success", "message" => "Data Siswa gagal dihapus"]);
        }
    }

    public function ubahDataSiswa($id)
    {
        if ($this->model("Master", "Siswa_model")->ubahDataAPI($id, $_POST) > 0) {
            echo json_encode(["status" => "success", "message" => "Data Siswa berhasil diubah"]);
        } else {
            echo json_encode(["status" => "success", "message" => "Data Siswa gagal ditambahkan"]);
        }
    }
}
