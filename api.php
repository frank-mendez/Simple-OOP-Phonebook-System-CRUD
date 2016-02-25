<?php 

	include_once 'classes/class.database.php';
	include_once 'classes/class.query.php';

	$action = $_GET['action'];
	//$value = null;


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

		$query_result = Query::get_user_by_id($id);

        $result = mysqli_fetch_assoc($query_result);

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

	function method()
	{
		$method = $_SERVER['REQUEST_METHOD'];

		return $method;
	}

	function updateUser()
	{
		$method = method();

		if($method == 'PUT'){

			parse_str(file_get_contents("php://input"), $put_data);

			$id = $put_data['id'];
			$first_name = $put_data['first_name'];
		    $last_name = $put_data['last_name'];
		    $mobile = $put_data['mobile'];
		    $address = $put_data['address'];

		    $query_result = Query::update_user($first_name, $last_name, $mobile, $address, $id);

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

			 case 'test':

			  	$value = method();

			  	break;

			  case 'update_user':

			  	$value = updateUser();

			  	break;
			
			default:

				$value = null;

				break;
		}

	}

	

	exit(json_encode($value));



 ?>