<?php

if (!empty($_POST)) {
    require_once "config.php";
    $pdo = new PDO(DSN, USER, PASS);

    $data = array_map('trim', $_POST);
    $data = array_map('htmlentities', $data);
    $title = $data["title"];
    $author = $data["author"];
    $content = $data["content"];

    $query = "INSERT INTO story (content, author, title) VALUES (:content, :author, :title)";
    $statment = $pdo->prepare($query);
    $statment->bindValue(":content", $content);
    $statment->bindValue(":author", $author);
    $statment->bindValue(":title", $title);
    $statment->execute();
    header("Location: index.php");
}

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
    <form action="" method="post">
        <h2>Fill the form</h2>
        <section>
            <div>
                <label for="title">Titre</label>
                <input type="text" name="title" id="title">
            </div>
            
            <div>
                <label for="author">Auteur</label>
                <input type="text" name="author" id="author">
            </div>
            <div>
                <label for="content">Contenu</label>
                <textarea id="text" name="content"></textarea>
            </div>
            <button>Insérer</button>
        </section>
    </form>
</body>
</html>