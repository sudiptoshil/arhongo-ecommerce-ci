<?php
class Common extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

	public function loggedin()
	{
		if(!empty($this->session->userdata('id')) && !empty($this->session->userdata('user_type')))
			return true;
		else
			return false;
	}

    public function getDateTime()
    {
        $date_time = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        $hours = $date_time->format('G');
        $date_time = $date_time->format('Y-m-d G:i:s');
        return $date_time;
    }
    public function getDate()
    {
        $date_time = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        $hours = $date_time->format('G');
        $date = $date_time->format('Y-m-d');
        return $date;
    }

	public function get_user_type($user)
	{

		if($user == "admin"){
			return 1;
		}else if($user == "teacher"){
			return 2;
		}else if($user == "staff"){
			return 3;
		}else if($user == "student"){
			return 4;
		}else if($user == "alumni"){
			return 5;
		}else if($user == "director"){
			return 6;
		}
	}

	public function user_session_data($val)
	{
		$id=0;
		$type=0;
		$user_id=0;

		$id = $this->session->userdata('id');
		$type = $this->session->userdata('user_type');
		$user_id = $this->session->userdata('user_id');

		$arr = array('1' => $id,'2' => $type,'3' => $user_id);

		if (!empty($arr[$val])) {
			return $arr[$val];
		}else{
			return 0;
		}
	}

	public function alumniMembershipList()
	{
		$this->db->where('type_id', 2);
		$this->db->where('status', 1);
		$this->db->where('trash', 0);
		$data = $this->db->get('type_list')->result_array();
		return $data;
	}

	public function mobileNumberCheck($value)
	{
		if(strlen($value) != 11){
			return false;
		}else{
			//return substr($value, 0,3);
			if (substr($value, 0,3) == '013') {
				return true;
			}else if (substr($value, 0,3) == '014') {
				return true;
			}else if (substr($value, 0,3) == '015') {
				return true;
			}else if (substr($value, 0,3) == '016') {
				return true;
			}else if (substr($value, 0,3) == '017') {
				return true;
			}else if (substr($value, 0,3) == '018') {
				return true;
			}else if (substr($value, 0,3) == '019') {
				return true;
			}else {
				return false;
			}
		}
	}

	public function getAll($table,$col = null, $val = null, $col2=null, $val2=null, $asc_field = null, $asc_type = null)
	{
		
		if(!empty($col))
            $this->db->where($col,$val);
        
        if(!empty($col2))
            $this->db->where($col2,$val2);
            
		if(!empty($asc_field)){
	    	$this->db->order_by($asc_field,$asc_type);
		}

        $this->db->where('trash',0);
	    $info = $this->db->get($table);
	    return $info->result_array();
	}

	public function getSpecificRows($table,$col,$val, $col2=null, $val2=null,$asc_field = null,$asc_type = null)
	{

        if(!empty($col2))
            $this->db->where($col2,$val2);
            
		if(!empty($asc_field))
	    	$this->db->order_by($asc_field,$asc_type);

		$this->db->where('trash',0);
		$this->db->where($col,$val);

	    $info = $this->db->get($table);
	    return $info;
	}

	public function getSpecificField($table,$col,$val, $data, $asc_field = null,$asc_type = null)
	{

		if(!empty($asc_field))
	    	$this->db->order_by($asc_field,$asc_type);

		$this->db->where('trash',0);
		$this->db->where($col,$val);

	    $info = $this->db->get($table)->result_array();

	    foreach($info as $i){
	    	return $i[$data];
	    }
	}

    public function getAnyInfoRow($table, $col,$val, $col2=null,$val2=null, $col3=null,$val3=null)
    {
        if (!empty($col)) {
            $this->db->where($col, $val);
        }
        if (!empty($col2)) {
            $this->db->where($col2, $val2);
        }
        if (!empty($col3)) {
            $this->db->where($col3, $val3);
        }
        $info = $this->db->get($table);
        return $info->row();
    }

    public function anyName($table, $col, $id, $name, $col2 = null, $id2 = null, $col3 = null, $id3 = null)
    {

        if (!empty($col2)) {
            $this->db->where($col2, $id2);
        }
        if (!empty($col3)) {
            $this->db->where($col3, $id3);
        }
        $this->db->where('trash',0);
        $this->db->where($col, $id);
        $info = $this->db->get($table);
        foreach ($info->result_array() as $val) {
            return $val[$name];
        }
    }
}
?>