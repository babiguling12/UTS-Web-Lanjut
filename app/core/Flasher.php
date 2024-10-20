<?php

class Flasher {
    public static function setFlash($pesan, $aksi, $tipe) {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function getFlash() {
        if(isset($_SESSION['flash'])) {
            echo "
                <script>
                    Swal.fire({
                        icon: '". $_SESSION['flash']['tipe'] ."',
                        title: '". $_SESSION['flash']['pesan'] ."',
                        text: '". $_SESSION['flash']['aksi'] ."'
                    })
                </script>
            ";
            
            unset($_SESSION['flash']);
        }
    }
}