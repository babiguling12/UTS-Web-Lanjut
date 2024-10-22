<?php

class Home extends Controller {
    public function index() {
        $data['judul'] = 'Home';
        $data['blog'] = $this->model('Blog_model')->getAllBlog();

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id) {
        $data['judul'] = 'Detail';
        $data['blog'] = $this->model('Blog_model')->getBlogById($id);

        $this->view('templates/header', $data);
        $this->view('home/detail', $data);
        $this->view('templates/footer');
    }

    public function cari() {
        $data['judul'] = 'Home';
        $data['blog'] = $this->model('Blog_model')->cariBlog();

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}