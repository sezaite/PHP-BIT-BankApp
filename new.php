<?php
session_start();
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
        <form action="" method='post'>

        <label for="name">Vardas:</label>
        <input type="text" id='name' name = 'name'>
        <label for="surname">Pavardė:</label>
        <input type="text" id='surname' name = 'surname'>
        <label for="acc">Sąskaitos numeris:</label>
        <input type="text" id='acc' name = 'acc'>
        <label for="personalID">Asmens kodas:</label>
        <input type="number" id='personalID' name = 'personalID'>
        
        <button type='submit' class='btn submit-btn'>Atidaryti sąskaitą</button>
        </form>
        </div>
    </main>
</body>
</html>