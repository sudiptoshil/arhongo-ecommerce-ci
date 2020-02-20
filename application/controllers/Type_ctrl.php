<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_ctrl extends CI_Controller {

    var $admin_id;

    public function __construct()
    {
        parent::__construct();
        $logged_in = $this->session->userdata('logged_id');
        $admin = $this->session->userdata('admin');

        if(!$logged_in && !$admin){
            return redirect('/Welcome');
        }
        else{
            $this->admin_id = $this->session->userdata('id');    
        }
    }

    public function get() 
    {
        // echo 'type > get()';
        $types = Type::with('category')->get()->sortByDesc('id');
        // dd($type);
        $this->load->view('admin/types/type_all', compact('types'));
    }

    public function show($id)
    {
        $type = Type::with('category')->find($id);
        //dd($type->category[1]->category_name);
        $this->load->view('admin/types/type_detail', compact('type'));
    }

    public function add() 
    {
        $this->load->view('admin/types/add');
    }

    public function store() 
    {
        $type_name = $this->input->post('type_name');
        //dd($type_name);

        $new_type = new Type();
        $new_type->type_name = $type_name;
        $saved = $new_type->save();

        if ($saved) {
            $this->session->set_flashdata('success', 'Type Added');
            $location = $this->agent->referrer();
            redirect($location);  
            //redirect('Category_ctrl/get');
        } else {
            $this->session->set_flashdata('err', 'Something Went Wrong');
            $location = $this->agent->referrer();
            redirect($location);  
        }

    }    

    public function edit($id) 
    {
        $type = Type::find($id);
        //dd($type->type_name);

        $this->load->view('admin/types/type_edit', compact('type'));
    }

    public function update($id)
    {
        $new_type_name = $this->input->post('type_name');

        $type = Type::find($id);

        $type->type_name = $new_type_name;
        $saved = $type->save();

        if ($saved) {
            $this->session->set_flashdata('success', 'Type Updated');
            $location = $this->agent->referrer();
            redirect($location);  
            //redirect('Category_ctrl/get');
        } else {
            $this->session->set_flashdata('err', 'Something Went Wrong');
            $location = $this->agent->referrer();
            redirect($location);  
        }
    }






}