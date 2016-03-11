<?php
	
	class Add_user extends CI_Model {

			function already_exists($email){
				$query = "SELECT * FROM users WHERE email = '{$email}'";
				$q = $this->db->query($query);
				if($q)
					return 1;
				else
					return 0;
			}
			function add_users($name, $email){

				
					$query = "INSERT INTO users  (id, name, email) VALUES ('', '{$name}', '{$email}')";
					$q = $this->db->query($query);
					if($q)
						return true;
					else
						return false;
				
			}
	}
?>