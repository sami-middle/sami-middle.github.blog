<?php

    include 'bdd_connections.php';
    
    $query = 
    '
        SELECT
            Id,
            LastName 

        FROM
            Author
    ';
    $resultSet = $pdo->query($query);
    $Author = $resultSet->fetchAll();

    $query = 
    '
        SELECT
            Id,
            Name
        FROM
            Category
        
    ';
    $resultSet = $pdo->query($query);
    $Category = $resultSet->fetchAll();




include 'post.phtml';
