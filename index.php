<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
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
			AuthorImage
		FROM
			Post,Author
		WHERE
			Post.Author_Id = Author.Id
		ORDER BY
			CreationTimestamp DESC
	';
	$resultSet = $pdo->query($query);
	$posts = $resultSet->fetchAll();



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



	include 'index.phtml';
	

