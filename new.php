<?php
session_start();
require __DIR__.'/konstantos.php';
if(!empty($_POST)){
    if(($_POST['name'] === '') || ($_POST['surname'] === '') || ($_POST['acc'] === '') || ($_POST['personalID'] === '')){
        $_SESSION['message'] = 'Įveskite visus duomenis!';
         header ('Location: ' . URL .'new.php');
        die;
    } else {
        $useriuArr = getJsonArray();
        $index = getLastIndex();
        $_POST['id'] = $index;
        $useriuArr[]= $_POST;
        writeDataToJson($useriuArr);
        $_SESSION['message'] = 'Sąskaita pridėta!';
        header ('Location: ' . URL .'new.php');
        die;
    }   
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mano Bankas</title>
    <link href="style.css?<?=filemtime("style.css")?>" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include "header.html" ?>
    <main>
        <div class='form-wrap'>
            <h3>Įveskite duomenis: </h3>
            <h6 class='error'> <?= $_SESSION['message'] ?? '' ?> </h6>
            <?php unset($_SESSION['message']); ?>
        <form action="" method='post'>

        <label for="name">Vardas:</label>
        <input type="text" id='name' name = 'name'>
        <label for="surname">Pavardė:</label>
        <input type="text" id='surname' name = 'surname'>
        <label for="acc">Sąskaitos numeris:</label>
        <input type="text" id='acc' name = 'acc'>
        <label for="personalID">Asmens kodas:</label>
        <input type="number" id='personalID' name = 'personalID'>
        <input type="hidden" name = 'balance' value='0'>
        
        <button type='submit' class='btn submit-btn'>Atidaryti sąskaitą</button>
        </form>
        </div>
    </main>
</body>
</html>