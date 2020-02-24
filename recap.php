<?php


include 'bdd_connections.php';
if(!isset($_SESSION['login'])){
	header('location: login.php');
}


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
		            Post, Author
		        WHERE
		        	Post.Author_Id = Author.Id
		        ORDER BY
			CreationTimestamp DESC
		    ';

			$resultSet = $pdo->query($query);
		    $Recap = $resultSet->fetchAll();


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


include 'recap.phtml';


		