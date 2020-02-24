<?php

	include 'bdd_connections.php';


	  $query =
    '
        SELECT
            Post.Id,
            Title,
            Contents,
            CreationTimestamp,
            FirstName,
            LastName,
            Image,
            AuthorImage,
            Category_Id
        FROM
            Post,Author
        WHERE
            Post.Author_Id = Author.Id
        AND
            Post.Id = ?
    ';
    $resultSet = $pdo->prepare($query);
    $resultSet->execute([$_GET['id']]);
    $post = $resultSet->fetch();


    	 // Récupération de tous les commentaires de l'article du blog.
    
    $query =
    '
        SELECT
        	Id,
            NickName,
            Avatar,
            Contents,
            CreationTimestamp,
            Post_Id
            
        FROM
            Comment
        WHERE
         	Post_Id=?
    ';
    $resultSet = $pdo->prepare($query);
    $resultSet->execute([$_GET['id']]);
    $comment = $resultSet->fetch();



    $query =
    '
       SELECT
            Post.Id,
            Title,
            Contents,
            CreationTimestamp,
            FirstName,
            LastName,
            Image,
            AuthorImage,
            Category_Id
        FROM
            Post,Author
        WHERE
            Post.Author_Id = Author.Id
        AND
            Post.Category_Id = ?
        AND 
        Post.Id != ?
    ';
    $resultSet = $pdo->prepare($query);
    $resultSet->execute([$post['Category_Id'],$post['Id']]);
    $categorypost = $resultSet->fetchAll();

    $query = 
    '
        SELECT
            Id,
            Name
        FROM
            Category
        
    ';
    $resultSet = $pdo->query($query);
    $category = $resultSet->fetchAll();



	include 'single-post-2.phtml';



