<?php



    include 'bdd_connections.php';

    // Récupération d'un article du blog.
    $query =
    '
        SELECT
            Post.Id,
            Title,
            Contents,
            CreationTimestamp,
            FirstName,
            LastName,
            Image
        FROM
            Post,Author
        WHERE
            Post.Author_Id = Author.Id
        AND
            Post.Id = ?
    ';
    $resultSet = $pdo->prepare($query);
    $resultSet->execute([$_POST['id']]);
    $post = $resultSet->fetch();

    // Récupération de tous les commentaires de l'article du blog.
    $query =
    '
        SELECT
            NickName,
            Contents,
            CreationTimestamp,
            Avatar
        FROM
            Comment
        WHERE
            Post_Id = ?
    ';
    $resultSet = $pdo->prepare($query);
    $resultSet->execute([$_POST['id']]);
    $comments = $resultSet->fetchAll();

    // Sélection et affichage du template PHTML.
    include 'single-po-1.phtml';