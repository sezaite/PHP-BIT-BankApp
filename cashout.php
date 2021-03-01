<?php
session_start();

function redirectToMainForm() {
    return "<div class='add-new-wrap'><h2>Pasirinkite, kurią sąskaitą apvogsite</h2><a class='btn' href='./list.php'>Grįžti į sąskaitų sąrašą</a></div>";
}  
function generateList(){
    return 'hello';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lėšų nuėmimas</title>
    <link href="style.css?<?=filemtime("style.css")?>" rel="stylesheet" type="text/css" />
</head>
<body>
<main>
    <?php include "header.html"; 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo addCashForm();
        } else {
            echo redirectToMainForm();
        }
        ?>
    </main>
</body>
</html>