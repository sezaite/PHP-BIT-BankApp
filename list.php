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
    <link href="style.css?<?=filemtime("style.css")?>" rel="stylesheet" type="text/css" />
</head>
<body>
<main>
    <?php include "header.html"; 
    $duomenys = file_get_contents('useriai.json');
    $useriuArr = json_decode($duomenys, 1);
    if (count($useriuArr) === 0) {
    echo generateEmptyList();
        } else { ?>
        <table id="user-table">
            <tr>
                <th>Sąskaitos Nr</th>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Asmens kodas</th>
                <th>Papildyti</th>
                <th>Nuskaičiuoti</th>
                <th>Ištrinti sąskaitą</th>
            </tr>

        <?php
            foreach($useriuArr as $key => $user){ ?>
                <tr>
                    <td><?= $user['acc'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['surname'] ?></td>
                    <td><?= $user['personalID'] ?></td>
                    <td>Nuskaičiuoti</td>
                    <td>Pridėti</td>
                    <td><a href="delete.php?userNR=<?= $key ?>">Ištrinti</a></td>
                </tr>
            <?php }
            echo '</table>';
        }
        ?>
    </main>
</body>
</html>

