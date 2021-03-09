<?php
session_start();
require __DIR__.'/konstantos.php';

_d($_SESSION);

function generateEmptyList() {
    return "<div class='add-new-wrap'><h2>Sąskaitų sąrašas tuščias</h2><a class='btn' href='./new.php'>Pridėti sąskaitą</a></div>";
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
    if (count(getJsonArray()) < 1) {
        echo generateEmptyList();
        } else { ?>
        <table>
        <h6 class='error' style='margin-top: 20px; text-align: center;'><?= $_SESSION['delete-message'] ?? '' ?></h6>
        <?php unset($_SESSION['delete-message']); ?>
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
            foreach(getJsonArray() as $user){ ?>
                <tr>
                    <td><?= $user['acc'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['surname'] ?></td>
                    <td><?= $user['personalID'] ?></td>
                    <td><a class="add" href="add.php?id=<?= $user['id'] ?>">Pridėti</a></td>
                    <td><a class="cashout" href="cashout.php?id=<?= $user['id'] ?>">Nuskaičiuoti</a></td>
                    <td><form action="<?= URL ?>delete.php?id=<?= $user['id'] ?>"method="post">
        <button type="submit" class="btn delete">Ištrinti</button>
        </form></td>
                </tr>
            <?php }
            echo '</table>';
        }
        ?>
    </main>
</body>
</html>

