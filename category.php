<?php

	include 'bdd_connections.php';

//Affichage des arcticles par catégorie

          $query =
    '
        SELECT
            Post.Id,
            Title,
            Contents,
            CreationTimestamp,
            Image,
            Author_Id
            Category_Id,
            Name,
            Category.Id,
            Author.Id,
            FirstName,
            LastName,
            AuthorImage
        FROM
            Post, Category, Author
        WHERE
            Post.Category_Id = Category.Id
        AND
            Category.Id=?
        AND
            Post.Author_Id=Author.Id
        ';

    $resultSet = $pdo->prepare($query);
    $resultSet->execute([$_GET['id']]);
    $post = $resultSet->fetchAll();


//Récupération de category_Id et réinjection ds AuthorImage

          $query =
    '
        SELECT
            Id,
            Name
        FROM
            Category
        WHERE
            Category.Id=?
        ';

    $resultSet = $pdo->prepare($query);
    $resultSet->execute([$_GET['id']]);
    $namecat = $resultSet->fetch();




// Affichage du menu catégorie
$query = 
    '
        SELECT
            *
        FROM
            Category
        
    ';
    $resultSet = $pdo->query($query);
    $category = $resultSet->fetchAll();

include 'category.phtml';