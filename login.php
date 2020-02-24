<?php

    include 'bdd_connections.php';

    if(isset($_POST['User'])) {

     $query =
   '
       SELECT
           UserName
       FROM
           User
       WHERE
           Email = ? AND Password = ?
   ';
   $resultSet = $pdo->prepare($query);
   $resultSet->execute([$_POST['User'], $_POST['Password']]);
   $user = $resultSet->fetch();


    if($user['UserName'] != null) {

        $_SESSION['login']=$user['UserName'];
        header('Location: index.php');

    }}

    include 'login.phtml';