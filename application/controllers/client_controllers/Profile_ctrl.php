<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_ctrl extends CI_controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('client_models/Main');
    }

    // user profile
    public function profile(){
        if($this->session->userdata('customer_id')){
            $data['customer'] = $this->db->where('customer_id',$this->session->userdata('customer_id'))->get('customers')->row_array();
            $data['title'] = 'Profile';
            $this->load->view('client/profile',$data);
        }else{
            redirect('client_controllers/main_ctrl/signin');
        }
        
    }

    public function get_customer($customer_id){
        $customer = $this->db->where('customer_id',$customer_id)->get('customers')->row_array();
        echo json_encode($customer);
    }

    public function update_customer_info($customer_id){
        // $a = $this->input->post();
        // echo "<pre>";
        // print_r($a);
        // echo "</pre>";die();
        
        $this->form_validation->set_rules('user_name', 'User Name', 'required');
        $this->form_validation->set_rules('contact_no', 'Contact No', 'required');
        if($this->input->post('password') && $this->input->post('c_password')){
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('c_password', 'Confirm Password', 'required|matches[password]');
        }
        

        if($this->form_validation->run() == false){
            $this->session->set_flashdata('error', 'Profile update fail!!!');
            redirect('client_controllers/Profile_ctrl/profile');
        }else{
            $data['full_name'] = $this->input->post('full_name');
            $data['user_name'] = $this->input->post('user_name');
            $data['email'] = $this->input->post('email');
            $data['national_id'] = $this->input->post('national_id');
            $data['contact_no'] = $this->input->post('contact_no');
            $data['present_address'] = $this->input->post('present_address');
            $data['permanent_address'] = $this->input->post('permanent_address');
            // $data['holding_no'] = $this->input->post('holding_no');
            if($this->input->post('password')){
                $data['password'] = md5($this->input->post('password'));
            }
            $this->db->where('customer_id',$customer_id)->update('customers',$data);
            $this->session->set_flashdata('success', 'Profile Info Updated Successfully');
            $this->profile();
        }

        
        
    }


    public function customer_photo($customer_id){
        // $a = $_FILES['photo']['name'];
        // if($a){
        //     print_r($a);die();
        // }else{
        //     echo 'test';die();
        // }
        if($_FILES['photo']['name'] == true){
            if(isset($_FILES['photo']['name'])){

                $customer = $this->db->where('customer_id',$customer_id)->get('customers')->row_array();
                
                $this->load->helper("file");
                if($customer['photo']){
                    unlink("./client_assets/images/profile/".$customer['photo']);
                }
                

                $config['upload_path']="./client_assets/images/profile";
                $config['allowed_types']='jpeg|jpg|png';
                // $config['encrypt_name'] = TRUE;
                
                // $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if(!$this->upload->do_upload("photo")){
                    
                    echo $this->upload->display_errors();
                    // redirect(base_url('ticket_ctrl/add_new_ticket'));
                }else{
                    
                    $image = array('upload_data' => $this->upload->data());
                    $data['photo'] = $image['upload_data']['file_name']; 
                    $this->db->where('customer_id',$customer_id)->update('customers',$data);
                    $this->session->set_flashdata('success', 'Profile Image Updated Successfully');
                    $this->profile();
                    // echo json_encode($data['photo']);die();
                }
            }
        }else{
            redirect('client_controllers/profile_ctrl/profile');
        }
        
    }

    













}


?>