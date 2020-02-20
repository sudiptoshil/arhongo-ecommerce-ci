<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('logged_in'))
        {    
            if($this->session->userdata('admin')){
                $this->load->view('admin/dashboard');
            } else if($this->session->userdata('vendor')){
                $this->load->view('vendor/dashboard');
            } else if($this->session->userdata('delivery_man')){
                $this->load->view('delivery_man/dashboard');
            } else if($this->session->userdata('customer')){
                $this->load->view('customer/dashboard');
            } else {
                redirect('/Welcome');
            }
        }
        else {
            redirect('/reglog/admin_in');
        }
	}
}
