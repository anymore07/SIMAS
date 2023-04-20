<?php

class Login_model
{
    private $table = 'login';
    private $fields = [
        'username',
        'email',
        'password',
        'role',
        'hak_akses',
        'ip_address',
        'status_login'
    ];
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_USERS);
    }

    public function getAllData()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->fetchAll();
    }

    public function auth($data)
    {

        $this->db->query("SELECT * FROM {$this->table} WHERE username = :username AND email = :email AND password = :password_field");
        $this->db->bind("username", $data['username']);
        $this->db->bind("email", $data['email']);
        $this->db->bind("password_field", $data['password']);
        return $this->db->fetch();
    }

    public function login($data)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE username = :username AND `password` = `:password`");
        $this->db->execute();
        return $this->db->fetch();
    }

    public function checkUser($username, $email)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE username = :username AND email = :email");
        $this->db->bind("username", $username);
        $this->db->bind("email", $email);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function changePassword($username, $email, $password)
    {
        $this->db->query("UPDATE {$this->table} SET `password` = :password WHERE username = :username AND email = :email");
        $this->db->bind("username", $username);
        $this->db->bind("email", $email);
        $this->db->bind("password", $password);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $this->db->query(
            "UPDATE {$this->table}  
                SET 
                deleted_at = CURRENT_TIMESTAMP,
                deleted_by = :deleted_by,
                is_deleted = 1
            WHERE id = :id"
        );

        // $this->db->bind('deleted_by', $this->user);
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataPermanen($id)
    {
        $this->db->query(
            "DELETE FROM {$this->table} WHERE id = :id"
        );

        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data)
    {
        $this->db->query(
            "UPDATE {$this->table}
                SET 
                kode_mapel = :kode_mapel,
                nama_mapel = :nama_mapel,
                kurikulum = :kurikulum,
                modified_at = CURRENT_TIMESTAMP,
                modified_by = :modified_by
            WHERE id = :id"
        );

        foreach ($this->fields as $field) {
            $this->db->bind($field, $data[$field]);
        }
        // $this->db->bind('modified_by', $this->user);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
