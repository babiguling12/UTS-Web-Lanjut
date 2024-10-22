<?php

class Blog_model {

    private $table = 'blog';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllBlog() {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }

    public function getBlogById($id) {
        $this->db->query("SELECT * FROM $this->table WHERE id=:id");
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahBlog($data) {
        $this->db->query("INSERT INTO $this->table VALUES( null, :judul, :sub_judul, :deskripsi, :gambar)");

        $data['gambar'] = $this->db->uploadGambar();
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('sub_judul', $data['sub_judul']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('gambar', $data['gambar']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editBlog($data) {
        
        $this->db->query("SELECT gambar FROM $this->table WHERE id=:id");
        $this->db->bind('id', $data['id']);
        $gambarLama = $this->db->single();

        $gambarUpdate = $gambarLama['gambar'];

        if($data['gambar']['error'] !== 4) { // klo ada gambar yang diupload
            if($gambarLama) { // klo ada yang gambar lama
                $urlGambarLama = 'img/'. $gambarLama['gambar'];
                if(file_exists($urlGambarLama)) { // apakah ada file yang namanya kek $gambarLama
                    unlink($urlGambarLama);
                }
            }
            $gambarUpdate = $this->db->uploadGambar();
        } 
        
        $this->db->query("UPDATE $this->table SET judul=:judul, sub_judul=:sub_judul, deskripsi=:deskripsi, gambar=:gambar WHERE id=:id");
        $this->db->bind('id', $data['id']);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('sub_judul', $data['sub_judul']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('gambar', $gambarUpdate);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusBlog($id) {
        $this->db->query("DELETE FROM $this->table WHERE id=:id");
        $this->db->bind('id',$id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariBlog() {
        if(isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];

            $this->db->query("SELECT * FROM $this->table WHERE judul LIKE :keyword");
            $this->db->bind('keyword', "%$keyword%");

            return $this->db->resultset();
         } else {
            return $this->getAllBlog();
         }  
    }
}