<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_ctrl extends CI_Controller {

    var $vendor_id;

    public function __construct()
    {
        parent::__construct();
        $logged_in = $this->session->userdata('logged_id');
        $vendor = $this->session->userdata('vendor');

        if(!$logged_in && !$vendor){
            return redirect('/Welcome');
        }
        else{
            $this->vendor_id = $this->session->userdata('id');    
        }
    }

    public function get() 
    {
        //echo 'brand > get()';
        $brands = Brand::where('vendor_id', $this->vendor_id)->get()->sortByDesc('id');
        // dd($type);
        $this->load->view('vendor/brand/show_all', compact('brands'));
    }

    public function add() 
    {
        //echo 'brand > add()';
    }

    public function store() 
    {
        $brand_name = $this->input->post('brand_name');
        
        $brand = new Brand();
        $brand->brand_name = $brand_name;
        $brand->vendor_id = $this->vendor_id;
        $saved = $brand->save();

        if($saved){
            $location = $this->agent->referrer();
            $this->session->set_flashdata('success', 'Brand added');
            redirect($location);
        }
        else{
            $location = $this->agent->referrer();
            $this->session->set_flashdata('err', 'Something Went Wrong');
            redirect($location);
        }    
        //dd($brand_name);
    }    

    public function edit() 
    {
        
    }

    public function update()
    {
        $brand_name = $this->input->post('brand_name');
        $brand_id = $this->input->post('brand_id');

        $brand = Brand::find($brand_id);

        $brand->brand_name = $brand_name;
        $saved = $brand->save();

        if($saved){
            $location = $this->agent->referrer();
            $this->session->set_flashdata('success', 'Brand name updated');
            redirect($location);
        }
        else{
            $this->session->set_flashdata('err', 'Something Went Wrong');
            $location = $this->agent->referrer();
            redirect($location);            
        }
            

        //dd($brand_name);
    }


    






}