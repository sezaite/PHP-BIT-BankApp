<?php
session_start();

function redirectToMainForm() {
    return "<div class='add-new-wrap'><h2>Pasirinkite, kurią sąskaitą pildysite</h2><a class='btn' href='./list.php'>Grįžti į sąskaitų sąrašą</a></div>";
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
    <title>Pridėti lėšų</title>
    <link href="style.css?<?=filemtime("style.css")?>" rel="stylesheet" type="text/css" />
</head>
<body>
<main>
    <?php include "header.html"; 
    if (isset($_GET['userNR'])) {
        $duomenys = file_get_contents('useriai.json');
        $useriuArr = json_decode($duomenys, 1);
        unset($useriuArr[$_GET['userNR']]);
        file_put_contents('useriai.json', json_encode($useriuArr));
        unset($_GET);
        header('Location: http://localhost/bit/nd8/list.php');
            die;
        } else {
            header('Location: http://localhost/bit/nd8/list.php');
            die;
        }
        ?>
    </main>
</body>
</html>


?>