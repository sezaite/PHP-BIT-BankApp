<?php
session_start();
require __DIR__.'/konstantos.php';

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
    ?>
    <table>
            <tr>
                <th>Sąskaitos Nr</th>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Asmens kodas</th>
                <th>Sąskaitos likutis</th>
            </tr>
            <tr>
                <td><?= $useriuArr[$_GET['userNR']]['acc'] ?></td>
                <td><?= $useriuArr[$_GET['userNR']]['name'] ?></td>
                <td><?= $useriuArr[$_GET['userNR']]['surname'] ?></td>
                <td><?= $useriuArr[$_GET['userNR']]['personalID'] ?></td>
                <td><?= $useriuArr[$_GET['userNR']]['balance'] ?></td>
            </tr>
    </table>
    <div class='money-operation'>
    <form action="" method="post">
        <label for="deposit">Įveskite pinigų kiekį:</label>
        <input type="number" id="deposit" name ='deposit'>
        <button type='submit' class='btn'>Papildyti</button>
    </form>
    </div>
    <?php
        } else {
            echo redirectToMainForm();
        }
        ?>
    </main>
</body>
</html>