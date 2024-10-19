<?php

// session_id fungsinya untuk mendapatkan id session yang sedang berjalan. 
// Code artinya jika tidak sesi yang berjalan maka mulai sesi nya
if(!session_id()) session_start(); 

require_once '../app/init.php';

$app = new App();