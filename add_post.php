<?php

    include 'bdd_connections.php';


    if(!isset($_SESSION['login'])){
    header('location: login.php');
}


       if(isset($_POST['Title']))
        {  
        $query =
        '
            INSERT INTO
                Post
                (Title, Contents, CreationTimestamp, Author_Id, Category_ID, Image)
            VALUES
                (?, ?, NOW(), ?, ?, ?)
        ';
        $resultSet = $pdo->prepare($query);
        $resultSet->execute([$_POST['Title'], $_POST['Contents'], $_POST['Author_Id'], $_POST['Category_Id'], $_POST['Image']]);

    header('Location: index.php');
        exit();

}


$query = 
    '
        SELECT
            Id,
            FirstName,
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





include 'add_post.phtml';