<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reglog extends CI_Controller {

	public function index()
	{	
		$this->load->view('customer/login');
    }
    
	public function vendor_in()
	{	
        if($this->session->userdata('logged_in')){
            redirect('/dashboard');
        }
		$this->load->view('vendor/login');
    }

    public function admin_in()
    {   
        if($this->session->userdata('logged_in')){
            redirect('/dashboard');
        }
        $this->load->view('admin/login');
    }
    
    public function vendor_up()
	{	
		$this->load->view('vendor/registration');
    }

    public function forgot()
	{	
		$this->load->view('vendor/forgot');
    }

    public function forgot_submit()
	{	
		print_r($this->input->post());
    }    

    public function vendor_login()
	{	
        if($this->session->userdata('logged_in')){
            redirect('/dashboard');
        }
        //print_r($this->input->post());
        $this->load->model('Vendor');

        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('vendor/login');
        }
        else
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');   

            $vendor = Vendor::where('email', $email)->where('password', $password)->first();
            //$vendor = Vendor::find(2);
            //print_r($vendor);
            if($vendor){
                //print_r("we are going to set session");
                //print_r($vendor->product[0]->type->type_name); die();
                $login_data = array(
                    'id'        => $vendor->id,
                    'username'  => $vendor->username,
                    'email'     => $vendor->email,
                    'vendor'    => TRUE,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($login_data);
                redirect('/dashboard');
            }
            else {

                $this->session->set_flashdata('flash_error', "Credentials don't match");
                redirect('reglog/vendor_in');

            }

        }        

    }

    public function admin_login()
    {   
        if($this->session->userdata('logged_in')){
            redirect('/dashboard');
        }
        // print_r($this->input->post());die();
        $this->load->model('Admin');

        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/login');
        }
        else
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');   

            $admin = Admin::where('email', $email)->where('password', $password)->first();
            //$vendor = Vendor::find(2);
            //print_r($vendor);
            if($admin){
                //print_r("we are going to set session");
                //print_r($vendor->product[0]->type->type_name); die();
                $login_data = array(
                    'id'        => $admin->id,
                    'username'  => $admin->username,
                    'email'     => $admin->email,
                    'admin'    => TRUE,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($login_data);
                redirect('/dashboard');
            }
            else {

                $this->session->set_flashdata('flash_error', "Credentials don't match");
                redirect('reglog/admin_in');

            }

        }        

    }

    public function logout(){
        if($this->session->userdata('logged_in')){
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('admin');
            $this->session->unset_userdata('vendor');
            $this->session->unset_userdata('delivery');
            $this->session->unset_userdata('logged_in');
        }
        redirect('/Welcome');
        
    }

    public function vendor_registration()
	{	
		//print_r($this->input->post());
    }

    public function session_dump(){
        print_r($this->session->userdata('logged_in'));
        die();
    }

}