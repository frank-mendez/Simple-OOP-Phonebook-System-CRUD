<?php 
    
    include_once 'classes/class.database.php';
    include_once 'classes/class.query.php';

    $id = $_GET['id'];

    $query_result = Query::delete_user($id);

    if($query_result){

    	header('Location: index.php');

    	$closeConnection = $db->__destruct();

    }else{
    	echo 'not deleted';
    }

 ?>