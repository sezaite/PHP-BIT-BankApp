<?php
require __DIR__.'/konstantos.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        _d('post metodas');
        $id = $_GET['id'] ?? 0;
        $id = (int) $id;
        deleteUser($id);
        header('Location: '.URL);
        die;
    }
    _d('ne psot metodas');
    header('Location: '.URL);
    die;
