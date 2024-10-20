<?php

class Blog extends Controller {
    public function index(){
        $data['judul'] = 'Blog';
        $data['blog'] = $this->model('Blog_model')->getAllBlog();

        $this->view('templates/header', $data);
        $this->view('blog/index', $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        if($this->model('Blog_model')->tambahBlog($_POST) > 0) {
            Flasher::setFlash('Data berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/blog');
            exit;
        } else {
            Flasher::setFlash('Data gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/blog');
            exit;
        }
    }

    public function edit() {
        if($this->model('Blog_model')->editBlog($_POST) > 0) {
            Flasher::setFlash('Data berhasil', 'diedit', 'success');
            header('Location: ' . BASEURL . '/blog');
            exit;
        } else {
            Flasher::setFlash('Data gagal', 'diedit', 'danger');
            header('Location: ' . BASEURL . '/blog');   
            exit;
        }
    }

    public function getubah() {
        echo json_encode($this->model('Blog_model')->getBlogById($_POST['id']));
    }

    public function hapus($id) {
        $blog = $this->model('Blog_model')->getBlogById($id);

        if($this->model('Blog_model')->hapusBlog($id) > 0) {
            unlink('img/' . $blog['gambar']);
            Flasher::setFlash('Data berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/blog');
            exit;
        } else {
            Flasher::setFlash('Data gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/blog');
            exit;
        }
    }

}