<?php 

	include_once 'classes/class.database.php';
	include_once 'classes/class.query.php';

	$action = $_GET['action'];
	//$value = null;

	function method()
	{
		$method = $_SERVER['REQUEST_METHOD'];

		return $method;
	}


	function getList()
	{
		$query_result = Query::table();

		//$result = mysqli_fetch_assoc($query_result);

		$result = array();

		while($row = mysqli_fetch_assoc($query_result)){

			$result[] = array(

				'user_id' => $row["user_id"],
				'first_name' => $row["first_name"],
				'last_name' => $row["last_name"],
				'mobile' => $row["mobile"],
				'address' => $row["address"],
			);

		}

		return $result;
	}

	function getUser()
	{
		$id = $_GET['id'];

		if((int)$id > 0){

			$query_result = Query::get_user_by_id($id);

        	$result = mysqli_fetch_assoc($query_result);

		}else{

			$result = '';

		}

        return $result;
	}

	function createUser()
	{
		$method = method();

		if($method == 'POST'){

			$first_name = $_POST['first_name'];
		    $last_name = $_POST['last_name'];
		    $mobile = $_POST['mobile'];
		    $address = $_POST['address'];

		    $query_result = Query::insert_user($first_name, $last_name, $mobile, $address);

	        if($query_result){

	        	return true;

	        }else{

	        	return false;
	        }

		}else{

			$status = '400 Bad Request';

			return $status;

		}
	}


	function updateUser()
	{
		$id = $_POST['id'];
		$first_name = $_POST['first_name'];
	    $last_name = $_POST['last_name'];
	    $mobile = $_POST['mobile'];
	    $address = $_POST['address'];

	    $query_result = Query::update_user($first_name, $last_name, $mobile, $address, $id);

        if($query_result){

        	return true;

        }else{

        	return false;
        }
	}

	function deleteUser()
	{
		$method = method();

		if($method = "GET"){

			$id = $_GET['id'];

			$query_result = Query::delete_user($id);

			if($query_result){

	        	return true;

	        }else{

	        	return false;
	        }

		}else{

			$status = '400 Bad Request';

			return $status;

		}

		
	}

	function search()
	{
		$method = method();

		if($method == 'GET'){

			$data = $_GET['data'];

			$query_result = Query::search($data);

	        if($query_result){

	        	$result = array();

				while($row = mysqli_fetch_assoc($query_result)){

					$result[] = array(

						'user_id' => $row["user_id"],
						'first_name' => $row["first_name"],
						'last_name' => $row["last_name"],
						'mobile' => $row["mobile"],
						'address' => $row["address"],
					);

				}

				return $result;

	        }else{

	        	$message = 'No data found';

	        	return $message;
	        }

		}else{

			$status = '400 Bad Request';

			return $status;

		}
	}



	if(isset($action)){

		switch ($action) {

			case 'get_list':

				$value = getList();

				break;

			case 'get_user':

				$value = getUser();

				break;

			case 'insert_user':

			    $value = createUser();

			    break;

			  case 'update_user':

			  	$value = updateUser();

			  	break;

			  case 'delete_user':

			  	$value = deleteUser();

			  	break;

			  case 'search':

			  	$value = search();

			  	break;
			
			default:

				$value = null;

				break;
		}

	}

	

	exit(json_encode($value));



 ?>