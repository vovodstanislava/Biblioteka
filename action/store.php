<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/db.php';

if (empty($_POST) || !isset($_POST['denumirea'])|| !isset($_POST['anul_editiei'])|| !isset($_POST['autorul'])) {
    die('Data not valid');
}

$data = [
    'denumirea' => $_POST['denumirea'],
    'anul_editiei' => $_POST['anul_editiei'],
    'numarul_pagini' => $_POST['numarul_pagini'],
    'autorul' => $_POST['autorul']
];

if ($idBook = storeBook($mysqliConnect, $data)) {
    header("Location: /pages/one.php?id_book={$idBook}");
}

die('Error with creating');