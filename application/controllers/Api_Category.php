<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    class Api_Category extends CI_Controller {

    public function __construct()
        {
            parent::__construct();
            $this->load->library('encryption');
            $this->load->model("ApiModel");
            $this->load->model("common");
        }
        public function isEnc(){

             $cur_date = date('sdmy');
             $rand_id = rand(00000 , 99999); 
             $ticket = $cur_date.'-'.$rand_id;
             echo $ticket;

            echo $this->ApiModel->isValidRefCode(333);

            // $plain_text = 'This is a plain-text message!';
            // $ciphertext = $this->encryption->encrypt($plain_text);
            // // Outputs: This is a plain-text message!
            // echo $this->encryption->decrypt($ciphertext);
            //echo $key;
        }
        public function isValidSignup(){

            $_POST = json_decode(file_get_contents('php://input'), true);
            $um=$_POST["user_mobile"];
            $un=$_POST["user_name"];
            $up=$_POST["user_password"];
            $ucp=$_POST["user_con_password"];
            $ref_code=$_POST["user_ref_code"];
            
            $status=0;$msg="Something wents wrong..";
            if(empty($um)){
                $msg="Mobile no is required...";
            }
            else if(empty($un)){
                $msg="User name is required...";
            }
            else if(empty($up)){
                $msg="Password is required...";
            }
            else if(empty($ucp)){
                $msg="Confirmation password is required...";
            }
            else if($up != $ucp){
                $msg="Passowrd and Conpassword is not match";
            }
            else{
                $status=1;
            }

            $ref_id=0;
            if(!empty($ref_code)){
                $status=0;
                $msg="Invalid Reference code";
                $isValid=$this->ApiModel->isValidRefCode($ref_code);
                if(!empty($isValid)){
                    $ref_id=$isValid;
                    $status=1;
                }
            }

            if(!empty($um))
            {
                $isValidBdCode=$this->common->mobileNumberCheck($um);
                if($isValidBdCode){
                    $isValid=$this->common->anyName("user_registration","mobile_no",$um,"reg_id");
                    if(!empty($isValid)){
                        $status=0;
                        $msg="Mobile number is already exist...";
                    }
                }
                else{
                    $status=0;
                    $msg="Mobile number is invalid by its first three digit";
                }
                
            }

            if(!empty($status)){
                
                $enc_pass = $this->encryption->encrypt($up);
                $date_time=$this->common->getDateTime();
                $data=array(
                    "mobile_no" => $um,
                    "password" => $enc_pass,
                    "f_name" => $un,
                    "status" => 1,
                    "ref_id" => $ref_id,
                    "date_time" => $date_time,
                );
                if(!empty($ref_id)){
                    $data["utype"]=2;
                }
                $status=1;
                $msg="Inserted...";
                $this->db->insert("user_registration",$data);
            }

            $ara=array(
                "status" => $status,
                "msg" => $msg,
            );

            echo json_encode($ara);
        }
        public  function getCustomerReviews(){

            $res["data"]=array();
            if(isset($_GET["hasReview"])){
                $rid=$_GET["hasReview"];
                $sql="select * from tbl_review where pid='".$rid."'";
                $info=$this->db->query($sql)->result_array();
                $res["data"]=$info;

            }
            echo json_encode($res);
        }

        public function get(){

            $res["product_list"]=array();
            $res["clist"]=array();
            $res["rel_product_list"]=array();
            $res["rowInfo"]=array();
            if(isset($_GET["name"])){
                
                $name=$_GET["name"];
                //$this->db->where("category_link",$_GET["name"]);
                $this->db->where("(category_link='" . $name . "' OR id='".$name."')");
                $info=$this->db->get("product_category")->row();
                if(!empty($info->id)){

                    $res["rowInfo"]=$info;
                    $sql="SELECT * from product WHERE category_id in (SELECT id 
                                FROM `product_category` 
	                            WHERE (root_id='".$info->id."' or id='".$name."') and status=1) and status =1";
                    $data=$this->db->query($sql)->result_array();
                    //echo $this->db->last_query();
                    $res["product_list"]=$data;

                    $sql="SELECT pc.* FROM `product_category` as pc 
                        WHERE root_id='".$info->id."' and status=1";
                   
                   $info=$this->db->query($sql)->result_array();
                   $res["clist"]=$info;
                }
                
                echo json_encode($res);
                          
            }
            if(isset($_GET["rel_name"])){
                
                $sql="SELECT * FROM `product` WHERE id='".trim($_GET["rel_name"])."' and status=1";
                $info=$this->db->query($sql)->row();
                $res["product_list"]=array();

                $this->db->where("product_id",$_GET["rel_name"]);
                $this->db->where("status",1);
                
                $res["sliders"]=$this->db->get("product_image")->result_array();
                
                if(!empty($info->id)){

                    $res["product_list"]=$info;                   
                    $sql="SELECT * FROM `product` WHERE status=1 
                        and id not in (".$info->id.") and category_id='".$info->category_id."' and status=1";                    
                    $info=$this->db->query($sql)->result_array();
                    $res["rel_product_list"]=$info;

                }
                echo json_encode($res);
                          
            }

        }
    }
?>