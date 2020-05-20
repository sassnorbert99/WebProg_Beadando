<?php
	class User_model extends CI_Model{
		public function register($enc_password){
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $enc_password,
				'zipcode' => $this->input->post('zipcode')
			);

			return $this->db->insert('users', $data);

		}


		public function login($username, $password){
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$result = $this->db->get('users');

			if ($result->num_rows() == 1) {
				# code...
				return $result->row(0)->id;
			}else{
				return false;
			}
		}

		public function check_username_exists($username){
			$query = $this->db->get_where('users', array('username' => $username));

			if (empty($query->row_array())) {
				# code...
				return true;
			}else{
				return false;
			}
		}



		public function check_email_exists($email){
			$query = $this->db->get_where('users', array('email' => $email));

			if (empty($query->row_array())) {
				# code...
				return true;
			}else{
				return false;
			}
		}




		public function get_posts($slug = FALSE, $limit = FALSE, $offset = FALSE){

			if ($limit) {
				# code...
				$this->db->limit($limit, $offset);
			}

			if ($slug === FALSE) {
				$this->db->order_by('users.id', 'DESC');
				$query = $this->db->get('users');
				return $query->result_array();
			}

			$query = $this->db->get_where('users', array('slug' => $slug));
			return $query->row_array();
		}



    		
    		public function get_list()
    		{
        		$this->db->select('*'); 
       		 	$this->db->from('users');         
        		$this->db->order_by('id','ASC'); 
        		$query = $this->db->get(); 
        		$result = $query->result();  
        		return $result;
    		}


//--------------------------------------------------------------
/**
		public function check_admin(){
			$query = $this->db->get_where('users', array('admin' => '1'));
			if (empty($query->row_array())) {
				# code...
				return true;
			}else{
				return false;
			}
		}
		*/

	}