<?php
class ApiModel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function getDefaultRef(){
        return 112123;
    }
    public function isValidRefCode($ref){
        $uid=$ref - $this->getDefaultRef();
        if($uid <= 0)
            return 0;
        else{
            $this->db->where("reg_id",$uid);
            $info=$this->db->get("user_registration")->row();
            if(!empty($info->reg_id)){
                return $info->reg_id;
            }
            return 0;
        }
    }
}

?>