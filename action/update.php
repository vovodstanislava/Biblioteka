<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/db.php';

$idBook = isset($_GET['id_book']) ? intval($_GET['id_book']) : 0;

if (! $idBook) {
    die('Book not found');
}

if (empty($_POST) || !isset($_POST['denumirea'])|| !isset($_POST['anul_editiei'])|| !isset($_POST['autorul'])) {
    die('Data not valid');
}

if (updateBook($mysqliConnect, $_POST, $idBook)) {
    header("Location: /pages/one.php?id_book={$idBook}");
}

die('Error with updating');