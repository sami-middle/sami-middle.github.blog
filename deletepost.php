<?php

    include 'bdd_connections.php';


    if(!isset($_SESSION['login'])){
    header('location: login.php');
}else{


    if(isset($_GET['id'])){


 $query=
    'DELETE 
    	
    FROM
    	Comment
    WHERE
    	Post_Id= ?

    ';

    $resultSet = $pdo->prepare($query);
    $resultSet->execute([$_GET['id']]);



    $query=
    'DELETE 
    	
    FROM
    	Post
    WHERE
    	Id= ?

    ';

    $resultSet = $pdo->prepare($query);
    $resultSet->execute([$_GET['id']]);
}



header('Location: recap.php');

}

