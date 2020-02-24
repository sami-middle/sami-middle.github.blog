<?php

    include 'bdd_connections.php';

    // Ajout d'un commentaire à un article du blog.
    $query =
    '
        INSERT INTO
            Comment
            (NickName, Avatar, Contents, Post_Id, CreationTimestamp)
        VALUES
            (?, ?, ?, ?, NOW())
    ';
    $resultSet = $pdo->prepare($query);
    $resultSet->execute([$_POST['NickName'], $_POST['Avatar'], $_POST['Contents'], $_POST['Post_Id']]);

    // Retour à l'article détaillé une fois que le nouveau commentaire a été ajouté.
    header('Location: single-post-1.php?id='.$_POST['postId']);
    exit();