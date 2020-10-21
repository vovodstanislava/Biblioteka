<?php

$config = require_once $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

$mysqliConnect = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);

if ($mysqliConnect->connect_errno) {
    die('Ошибка соединения ' . $mysqliConnect->connect_errno);
}


function getAllBooks($connect) {
    $sqlQuery = "SELECT * FROM carti";

    $result = $connect->query($sqlQuery);

    return $result->fetch_all(MYSQLI_ASSOC);
};

function getOneById($connect, $id) {
    $sqlQuery = "SELECT * FROM carti WHERE id={$id}";

    $result = $connect->query($sqlQuery);

    return $result->fetch_assoc();
}

function storeBook($connect, $dataStore) {
    $sqlQuery = "INSERT INTO carti (denumirea, anul_editiei, numarul_pagini, autorul) 
        VALUES ('{$dataStore['denumirea']}', '{$dataStore['anul_editiei']}', {$dataStore['numarul_pagini']}, '{$dataStore['autorul']}')";

    if (!$connect->query($sqlQuery)) {
        return false;
    }

    return $connect->insert_id;
}

function updateBook($connect, $dataStore, $id) {
    $sqlQuery = "UPDATE carti
        SET denumirea = '{$dataStore['denumirea']}', anul_editiei = '{$dataStore['anul_editiei']}', 
        numarul_pagini = {$dataStore['numarul_pagini']}, autorul = '{$dataStore['autorul']}' 
        WHERE id = {$id}";

    if (!$connect->query($sqlQuery)) {
        return false;
    }

    return true;
}

function deleteBook($connect, $id) {
    $sqlQuery = "DELETE FROM carti
        WHERE id = {$id}";

    if (!$connect->query($sqlQuery)) {
        return false;
    }

    return true;
}
