<?php 

	class Query extends Database{


		private function __construct()
		{
			parent::__construct();
		}

		public static function run($sql) 
		{
			return parent::getInstance()->getConnection()->query($sql);
		}

		public static function table()
		{
			$sql = "SELECT * FROM user";

			return parent::getInstance()->getConnection()->query($sql);

		}

		public static function search($data)
		{
			$sql = "SELECT * FROM user WHERE first_name LIKE '%$data%' OR last_name LIKE '%$data%' OR mobile LIKE '%$data%' OR address LIKE '%$data%' OR user_id = '%data%'";

			return parent::getInstance()->getConnection()->query($sql);

		}

		public static function insert_user($first_name, $last_name, $mobile, $address)
		{
			$sql = "INSERT INTO `user` (
                              first_name,
                              last_name,
                              mobile,
                              address
                            ) 
                            VALUES
                              ('$first_name', '$last_name', '$mobile', '$address')";

            return parent::getInstance()->getConnection()->query($sql);
		}

		public static function get_user_by_id($id)
		{
			$sql = "SELECT * FROM user WHERE user_id = '$id'";

			return parent::getInstance()->getConnection()->query($sql);
		}

		public static function update_user($first_name, $last_name, $mobile, $address, $id)
		{
			$sql = "UPDATE 
                    `user` 
                  SET
                    `first_name` = '$first_name',
                    `last_name` = '$last_name',
                    `mobile` = '$mobile',
                    `address` = '$address' 
                  WHERE `user_id` = '$id'";

            return parent::getInstance()->getConnection()->query($sql);
		}


		public static function delete_user($id)
		{
			 $sql = "DELETE FROM user WHERE user_id = '$id'";

			 return parent::getInstance()->getConnection()->query($sql);
		}

	}


 ?>