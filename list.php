<?php
session_start();

function generateEmptyList() {
    return "<div class='add-new-wrap'><h2>Sąskaitų sąrašas tuščias</h2><a class='btn' href='./new.php'>Pridėti sąskaitą</a></div>";
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
    <title>Mano Bankas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "header.html"; 
    if (empty($_SESSION)) {
    echo generateEmptyList();
        } else {
            echo generateList($_SESSION);
        }
        ?>
    <main>
       <?php 

     
?>
    </main>
</body>
</html>