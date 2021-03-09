<?php
session_start();
require __DIR__.'/konstantos.php';
function redirectToMainForm() {
    return "<div class='add-new-wrap'><h2>Pasirinkite, kurią sąskaitą tuštinsite</h2><a class='btn' href='./list.php'>Grįžti į sąskaitų sąrašą</a></div>";
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
    if (isset($_GET['id']) && ($_SERVER['REQUEST_METHOD'] == 'GET')) {
        $data = getJsonArray();
        foreach($data as $key => $user){
            if ($user['id'] == $_GET['id']){
                $theUser = $data[$key];
                break;
            }
        }
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
                 <td><?= $theUser['acc'] ?></td>
                 <td><?= $theUser['name'] ?></td>
                 <td><?= $theUser['surname'] ?></td>
                 <td><?= $theUser['personalID'] ?></td>
                 <td><?= $theUser['balance'] ?></td>
             </tr>
     </table>
     <div class='money-operation'>
     <h6 class='error' style='margin-top: 20px;'> <?= $_SESSION['out-message'] ?? '' ?></h6>
     <?php unset($_SESSION['out-message']); ?>
     <form action="<?= URL ?>cashout.php?id=<?= $user['id']?>" method="post"> 
         <label for="cash-out">Įveskite pinigų kiekį:</label>
         <input type="number" id="cash-out" name ='cash-out'>
         <div class='button-wrap'>
         <button type='submit' class='btn inline'>Nuskaičiuoti</button> <a href="<?= URL ?>" class="btn inline">Grižti į sąrašą</a>
         </div>
     </form>
     </div>
    <?php } else {
            echo redirectToMainForm();
        }
         if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])){
                $data = getJsonArray();
                foreach($data as $key => $user){
                    if ($user['id'] == $_GET['id'] && isValidDeduction($_POST['cash-out'], $data[$key]['balance'])){
                        $data[$key]['balance']-= $_POST['cash-out'];
                        writeDataToJson($data);
                        $_SESSION['out-message'] = 'Operacija atlikta';
                        header('Location: '. URL . "cashout.php?id=". $data[$key]['id']);
                        die;
                    } else {
                        $_SESSION['out-message'] = 'Neturite pakankamai lėšų';
                        header('Location: '. URL . "cashout.php?id=". $data[$key]['id']);
                        die;
                }
        } 
    }
        ?>
    </main>
</body>
</html>