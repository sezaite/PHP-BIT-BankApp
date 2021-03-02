<?php
session_start();
if(!empty($_POST)){
    if(($_POST['name'] === '') || ($_POST['surname'] === '') || ($_POST['acc'] === '') || ($_POST['personalID'] === '')){
        $_SESSION['message'] = 'Įveskite visus duomenis!';
         header ('Location: http://localhost/bit/nd8/new.php');
        die;
    } else {
        $_SESSION['message'] = 'Sąskaita pridėta!';
        header ('Location: http://localhost/bit/nd8/new.php');
        die;
    }   
} 
unset($_SESSION['message']);
session_destroy(); 
?>

<h6 class='error'> <?= $_SESSION['message'] ?? '' ?> </h6>

