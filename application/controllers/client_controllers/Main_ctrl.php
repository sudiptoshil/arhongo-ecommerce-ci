<?php 
class Main_ctrl extends CI_controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('client_models/Main');
    }

    public function products($category_id,$sub_cat_id=null){
       
        // $this->load->model('client_models/Main');
        // $cart_data=$this->cart->contents();
        // echo "<pre>";
        //     foreach($cart_data as $cart){

        //     }
        //     print_r($cart);
        
        // echo "</pre>";die();

        $data['title'] = 'Products';
        if($category_id != null && $sub_cat_id != null){
            // $data['products'] = $this->Main->get_all('product',['category_id'=>$category_id]);
            $data['products'] = $this->db->where(['category_id'=>$category_id,'subcategory_id'=>$sub_cat_id])->get('product')->result_array();
            // echo "<pre>";
            // print_r($data['products']);
            // echo "</pre>";die();
        }elseif($category_id != null && $sub_cat_id == null){
            $data['products'] = $this->db->where(['category_id'=>$category_id])->get('product')->result_array();
            // echo "<pre>";
            // print_r($data['products']);
            // echo "</pre>";die();
        }
		
		$this->load->view('client/category',$data);
    }

    public function get_user_information(){
		$result=$this->Main->get_user_information();
		echo json_encode($result);
    }
    
    public function sub_category($category_id){
        $data['title'] = 'Sub Category';
        $data['category'] = $this->Main->get_all('product_subcategory',['category_id'=>$category_id]);
        // print_r($data['category']);die();
        // if(count($data['category']) < 1){
        //     echo 'no sub';
        // }else{
        //     echo 'has sub';
        // }
        // die();
        $this->load->view('client/sub_category',$data);
    }

    // user profile
    // public function profile(){
    //     if($this->session->userdata('customer_id')){
    //         $data['customer'] = $this->db->where('customer_id',$this->session->userdata('customer_id'))->get('customers')->row_array();
    //         $data['title'] = 'Profile';
    //         $this->load->view('client/profile',$data);
    //     }else{
    //         redirect('client_controllers/main_ctrl/signin');
    //     }
        
    // }
    
    public function sub_categories($category_id){
        $data['title'] = 'Sub Category';
        $data['sub_categories'] = $this->db->where('root_id',$category_id)->get('product_category')->result_array();
        $data['products'] = $this->db->where('category_id',$category_id)->get('product')->result_array();
        // echo "<pre>";
        // print_r($data['products']);
        // echo "<pre>";die();
        // var_dump(count($data['sub_categories']));
        $data['category_id'] = $category_id;
        
        $this->load->view('client/sub_categories',$data);
    }



















































    //show signup form
    public function customer_signup(){
        if($this->session->userdata('customer_id')){
            header("location:javascript://history.go(-1)");
        }else{
            $data['title'] = 'Sign Up';
        $this->load->view('client/registration',$data);
        }
        
    }


    //signin/login
    public function signin(){
        if($this->session->userdata('customer_id')){
            header("location:javascript://history.go(-1)");
        }else{
            if($this->input->method() == 'post'){
            $this->form_validation->set_rules('user_name','User Name','required');
            $this->form_validation->set_rules('password','Password','required');
            if($this->form_validation->run() == false){
                $this->load->view('client/login');
            }else{
                $data = array(
                    'user_name' => $this->input->post('user_name'),
                    'password' => $this->input->post('password'),
                    );
                    $this->db->select('*');
                    $this->db->from('customers');
                    $this->db->where('user_name',$data['user_name']);
                    $this->db->where('password',md5($data['password']));
                    $result = $this->db->get()->row_array();
                    if($result['password'] == md5($data['password']))
			        {
                        $this->session->set_userdata('customer_id', $result['customer_id']);	
                        $this->session->set_userdata('full_name', $result['full_name']);	
                        $this->session->set_userdata('user_name', $result['user_name']);
                        if($this->cart->contents() != null){
                            // echo 'cart not empty';die();
                            redirect('client_controllers/cart/placeOrder');
                        }else{
                            // echo 'cart is empty';die();
                            $this->session->set_flashdata('success', 'Login successfull');
                            redirect('welcome/client');
                        }
                        
                    }else{
                        redirect('client_controllers/main_ctrl/signin');
                    }
            }
        }else{
            $data['title'] = 'Sign In';
            $this->load->view('client/login',$data);
        }
        }
        
        
    }

    //logout
    function logout(){
        $user_data = $this->session->all_userdata();
            foreach ($user_data as $key => $value) {
                if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                    $this->session->unset_userdata($key);
                }
            }
        $this->session->sess_destroy();
        
        redirect('welcome/client');
    }

    //customer registration
    public function registration(){
        // $a = $this->input->post();
        // echo "<pre>";
        // print_r($a);
        // echo "<pre>";die();
		$this->form_validation->set_rules('user_name','User name','trim|required|is_unique[customers.user_name]');
		$this->form_validation->set_rules('present_address','Present Address','required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[11]');
        $this->form_validation->set_rules('c_password', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('contact_no','Contact no','trim|required');

		if($this->form_validation->run()){
            // echo 'no fail';die();
			$data=array(
				'full_name'=>$this->input->post('full_name'),
				'user_name'=>$this->input->post('user_name'),
				'email'=>$this->input->post('email'),
				'contact_no'=>$this->input->post('contact_no'),
				'national_id'=>$this->input->post('national_id'),
				'password'=>md5($this->input->post('password')),
				'present_address'=>$this->input->post('present_address'),
				'permanent_address'=>$this->input->post('permanent_address'),
				'holding_no'=>$this->input->post('holding_no'),
			);
			$table="customers";
			$get=$this->Main->insert($data,$table);
            // $this->session->set_flashdata('success', 'Registration successfully');
            
            redirect('client_controllers/main_ctrl/signin');
		}else{
            // echo 'fail';die();
            header("location:javascript://history.go(-1)");
            // echo 'not test';die();
         //   $this->session->set_flashdata('error', 'Registration Failed!!!');
        //    $data['title'] = 'Sign Up';
         //   $this->load->view('client/registration',$data);
		}
		
	}


}

?>