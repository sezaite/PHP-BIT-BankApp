<?php
function getJsonArray() : array
{
    if (!file_exists(DIR.'useriai.json')) {
        $data = json_encode([]);
        file_put_contents(DIR.'useriai.json', $data);
    }
    $data = file_get_contents(DIR.'useriai.json');
    return json_decode($data, 1);
}

//
function writeDataToJson(array $data) : void
{
    $data = json_encode($data);
    file_put_contents(DIR.'useriai.json', $data);
}

function getLastIndex() : int
{
    if (!file_exists(DIR.'indexes.json')) {
        $index = json_encode(['id'=>1]);
        file_put_contents(DIR.'indexes.json', $index);
    }
    $index = file_get_contents(DIR.'indexes.json');
    $index = json_decode($index, 1);
    $id = (int) $index['id'];
    $index['id'] = $id + 1;
    $index = json_encode($index);
    file_put_contents(DIR.'indexes.json', $index);
    return $id;
}

function deleteUser(int $id) : void {
    $data = getJsonArray();
    foreach($data as $key => $user){
        if ($user['id'] == $id){
            if ($data[$key]['balance'] == 0){
            unset($data[$key]);
            writeDataToJson($data);
            $_SESSION['delete-message'] = 'Sąskaita ištrinta';
            return;
            } else {
                $_SESSION['delete-message'] = 'Negaliu ištrinti sąskaitos, kurioje yra lėšų';
                return;
            }
        }  
    }
}

function isValidDeposit($deposit) {
    return $deposit > 0 && is_numeric($deposit);
}

function isValidDeduction($deduction, $balance) {
    return $deduction <= $balance && $deduction > 0 && is_numeric($deduction);
}

