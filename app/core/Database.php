<?php

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;

    public function __construct() {
        $dsn = "mysql:host=$this->host;dbname=$this->db_name";

        $option = [
            PDO::ATTR_PERSISTENT => true, // untuk membuat koneksi ke database nya terjaga terus
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // untuk menampilkan error dalam bentuk exception
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query) {
        $this->stmt = $this->dbh->prepare($query);
    }

    // fungsi nya untuk binding data yang diquery (contohnya ada : where, values, set) semua itu adalah parameter. 
    // Values nya adalah nama field tabel nya (misal where name=..., insert into values (nama, umur), update ... set name=) name, umur merupakan values
    // type nya adalah tipe dari values nya itu (misal name="budi") berarti tipe nya string
    public function bind($param, $value, $type = null) {
        if( is_null($type) ) {
            switch(true) {
                case is_int($type) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute() {
        $this->stmt->execute();
    }

    // klo hasil nya ingin banyak
    public function resultset() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // klo hasil nya satu aja
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // untuk menghitung ada berapa baris yang baru berubah di dalam tabel
    public function rowCount() {
        return $this->stmt->rowCount();
    }

    public function uploadGambar() {
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        // cek apakah ada gambar yang diupload
        if($error === 4) {
            "<script>alert('upload gambar terlebih dahulu');</script>";
            return false;
        }

        // cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            "<script>alert('yang anda upload bukan gambar');</script>";
            return false;
        }

        // cek jika ukurannya terlalu besar
        if($ukuranFile > 2000000) {
            "<script>alert('ukuran gambar terlalu besar');</script>";
            return false;
        }

        // acak nama file
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        // upload gambar
        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

        return $namaFileBaru;
    }
}