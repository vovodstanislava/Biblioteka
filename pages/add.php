<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/db.php';
    $idBook = isset($_GET['id_book']) ? intval($_GET['id_book']) : 0;

    $book = getOneById($mysqliConnect, $idBook);

?>

<?php
    require_once 'header.php';
?>

<?php if($idBook) :?>
    <h2>EDIT</h2>
<?php else :?>
    <h2>ADD</h2>
<?php endif;?>

<div class="row">

        <?php if($idBook) :?>
            <form class="col s12" action="/action/update.php?id_book=<?=$idBook?>" method="POST">
        <?php else :?>
            <form class="col s12" action="/action/store.php"  method="POST">
        <?php endif;?>
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Placeholder" id="first_name" type="text" class="validate" name="denumirea"
            value="<?= $idBook ? $book['denumirea'] : ''?> ">
          <label for="first_name">Denumirea</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="date" class="validate" name="anul_editiei"  value="<?= $idBook ? $book['anul_editiei'] : ''?> ">
          <label for="last_name">Anul Editiei</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="email" type="number" class="validate" name="numarul_pagini"  value="<?= $idBook ? intval($book['numarul_pagini']) : ''?> ">
          <label for="email">Numarul pagini</label>
        </div>
        <div class="input-field col s6">
          <input id="email" type="text" class="validate" name="autorul"  value="<?= $idBook ? $book['autorul'] : ''?> ">
          <label for="email">Autor</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <button  type="submit" class="waves-effect waves-light btn-large">Add</button>
        </div>
      </div>
    </form>
  </div>
