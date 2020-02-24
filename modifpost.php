<?php

    include 'bdd_connections.php';
    
    if(!isset($_SESSION['login'])){
    header('location: login.php');
}
    

  if(isset($_POST['Title']))
        {
            // Modification d'un article du blog.
            $query =
            '
                UPDATE
                    Post                
                SET
                    Title = ?,
                    Contents = ?,
                    Author_Id = ?,
                    Category_Id = ?,
                    Image = ?
                WHERE
                Id = ?
            ';
            $resultSet = $pdo->prepare($query);
            $resultSet->execute([$_POST['Title'], $_POST['Contents'], $_POST['Author_Id'], $_POST['Category_Id'], $_POST['Image'],$_POST['Id']]);

header('Location: recap.php');
    exit();
            // Retour à la page d'accueil une fois que le nouvel article du blog a été ajouté.
         
        }




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
            Id = ?
    ';
    $resultSet = $pdo->prepare($query);
    $resultSet->execute([$_GET['id']]);
    $post = $resultSet->fetch();
            
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






include 'modifpost.phtml';
