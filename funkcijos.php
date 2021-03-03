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
    if (!file_exists(DIR.'data/indexes.json')) {
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

?>