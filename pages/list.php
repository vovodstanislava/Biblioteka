<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/db.php';

    $books = getAllBooks($mysqliConnect);

?>
<?php
    require_once 'header.php';
?>

    <br>
    <div class="row">
        <a  class="waves-effect waves-light btn" href="/pages/add.php">Add</a>
    <div>
    <h2>LIST</h2>
    <?php if(! empty($books)) :?>
        <table>
            <thead>
            <tr>
                <th>Denumirea</th>
                <th>Anul editiei</th>
                <th>Numarul pagini</th>
                <th>Autorul</th>
                <th>Link to</th>
            </tr>
            </thead>

            <tbody>
                <?php foreach($books as $book) :?>
                    <tr>
                        <td><?=$book['denumirea']?></td>
                        <td><?=$book['anul_editiei']?></td>
                        <td><?=$book['numarul_pagini']?></td>
                        <td><?=$book['autorul']?></td>
                        <td><a href="/pages/one.php?id_book=<?=$book['id']?>">link to book</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else :?>
        <div>No books</div>
    <?php endif;?>



