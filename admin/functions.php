<?php


function insert_categories(){   
	global $connection;

if(isset($_POST['submit'])){

	$cat_title=$_POST['cat_title'];
	if($cat_title=="" || empty($cat_title)){

		echo "This field should not be empty";

	}else{

		$query = "INSERT INTO categories(cat_title)";
		$query.="VALUES('{$cat_title}')";
		$create_category_query = mysqli_query($connection,$query);

		if(!$create_category_query){
			die('QUERY FAILED'.mysqli_error($connection));
		}

	}
}

}

function findAllCategories(){

global $connection;

$query = "SELECT * FROM Categories" ;
$result_cat = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($result_cat)){

	$cat_id=$row['cat_id'];
	$cat_title=$row['cat_title'];
	echo "<tr>";
	echo "<td>{$cat_id}</td>";
	echo "<td>{$cat_title}</td>";
	echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
	echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
	echo "</tr>";

}

}


function deleteCategories(){
global $connection;

if(isset($_GET['delete'])){

	$cat_delete = $_GET['delete'];
	$query_delete = "DELETE FROM categories WHERE cat_id = {$cat_delete} ";
	$result = mysqli_query($connection,$query_delete);
	header("Location: categories.php");  //to get the page categories.php after executing delete query

}
}

?>