<?php 

class Main extends CI_model{

    public function __construct(){
        parent::__construct();
    }

    public function get_all($table,$where){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get()->result_array();
        
    }

    public function insert($data,$table){

		$query=$this->db->insert($table,$data);

		if($query){

			return $this->db->insert_id();
		}
		else{
			return false;
		}

    }
    
    public function get_user_information(){
		$id=$this->input->get('user_id');
		$this->db->select('a.full_name,a.user_name,a.email,a.contact_no,a.national_id,a.present_address,a.permanent_address,a.holding_no');
		$this->db->from('customers as a');
		$this->db->where('customer_id', $id);
		// $this->db->where('a.area_id = b.area_id');
		$query=$this->db->get();
		if($query){
			$result=$query->row();
			return $result;
		}
		else{
			return false;
		}
	}

}

?>