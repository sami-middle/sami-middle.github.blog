<?php

	include 'bdd_connections.php';


	$query =
    '
        SELECT
            Id,
            Title,
            Contents,
            CreationTimestamp,
            Image,
            Category_Id,
            Author_Id
            
        FROM
            Post
        WHERE
            Category_Id = ?
    ';
    $resultSet = $pdo->prepare($query);
    $resultSet->execute([$_GET['id']]);
    $category = $resultSet->fetch();


include 'singpost-2.phtml';