<?php

require_once "config.php";
$pdo = new PDO(DSN, USER, PASS);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>All stories</h1>
    <?php
    $query = "SELECT * FROM story";
    $statement = $pdo->query($query);
    $stories = $statement->fetchAll();
    ?>
    <section>
        <?php foreach ($stories as $story) : ?>
            <article>
                <h1><?=$story["title"]?></h1>
                <p><?=$story["author"]?></p>
                <p><?=$story["content"]?></p>
                <a href="edit.php?id=<?=$story["id"]?>">modifier</a>
            </article>
        <?php endforeach; ?>

    </section>
</body>

</html>