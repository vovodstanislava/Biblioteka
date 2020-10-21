<?php
    require_once  $_SERVER['DOCUMENT_ROOT'] . '/lib/db.php';

    $idBook = isset($_GET['id_book']) ? intval($_GET['id_book']) : 0;

    $book = getOneById($mysqliConnect, $idBook);
?>

<?php
require_once 'header.php';
?>

<?php if(!empty($book)) :?>
    <div class="row">
    <div class="col s12 m6">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Denumirea: <?=$book['denumirea']?></span>
          <span class="card-title">Anul editiei: <?=$book['anul_editiei']?></span>
          <span class="card-title">num pagini: <?=$book['numarul_pagini']?></span>
          <span class="card-title">autor: <?=$book['autorul']?></span>
        </div>
        <div class="card-action">
          <a href="/pages/add.php?id_book=<?=$book['id']?>">Update</a>
          <a href="/action/delete.php?id_book=<?=$book['id']?>">Delete</a>
        </div>
      </div>
    </div>
  </div>
<?php else :?>
    <div>Not found book!</div>
<?php endif;?>

