<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/db.php';

$idBook = isset($_GET['id_book']) ? intval($_GET['id_book']) : 0;

if (! $idBook) {
    die('Book not found');
}

if (deleteBook($mysqliConnect, $idBook)) {
    header("Location: /pages/list.php");
}

die('Error with deleting');