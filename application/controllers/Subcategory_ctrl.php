<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subcategory_ctrl extends CI_Controller
{

    public $admin_id;

    public function __construct()
    {
        parent::__construct();
        $logged_in = $this->session->userdata('logged_id');
        $admin = $this->session->userdata('admin');
        $this->load->library('upload');

        if (!$logged_in && !$admin) {
            return redirect('/Welcome');
        } else {
            $this->admin_id = $this->session->userdata('id');
        }
    }

    public function get()
    {
        //echo 'subcat > get()';
        $subcategories = Subcategory::with('category')->get()->sortByDesc('id');
        //dd($Subcategory);
        $this->load->view('admin/subcategory/subcategory_all', compact('subcategories'));
    }

    public function show($id)
    {
        $subcategory = Subcategory::with('category')->find($id);
        // dd($subcategory);
        $this->load->view('admin/subcategory/subcategory_detail', compact('subcategory'));
    }

    public function add()
    {
        // echo 'subcat > add()';
        $categories = Category::all();
        $this->load->view('admin/subcategory/add', compact('categories'));
    }

    public function store()
    {
        // $a = $this->input->post();
        // print_r($a);die();
        if(isset($_FILES['sub_cat_image']['name'])){
       
            $config['upload_path']="./assets/img/subcategory/";
            $config['allowed_types']='jpeg|jpg|png';
            $this->upload->initialize($config);
            if(!$this->upload->do_upload("sub_cat_image")){
                // echo 'not image upload';die();
                $this->session->set_flashdata('err', $this->upload->display_errors());
                $location = $this->agent->referrer();
                redirect($location);  
                // redirect(base_url('ticket_ctrl/add_new_ticket'));
            }else{
                // echo 'image upload';die();
                $image = array('upload_data' => $this->upload->data());
                $data['sub_cat_image'] = $image['upload_data']['file_name']; 
                 
            }
        }
        
        
            // $subcategory_name = $this->input->post('subcategory_name');
            // $category_id = $this->input->post('category_id');
            $data['subcategory_name'] = $this->input->post('subcategory_name');
            $data['category_id'] = $this->input->post('category_id');
            
            //dd($type_id);
    
            // $new_subcategory = new Subcategory();
            // $new_subcategory->subcategory_name = $subcategory_name;
            // $new_subcategory->category_id = $category_id;
            
            // $new_subcategory->sub_cat_image = $subcategory_image;
            
            // $saved = $new_subcategory->save();
            // echo json_encode($data['photo']);die();
            $saved = $this->db->insert('product_subcategory',$data);

       

        if ($saved) {
            $this->session->set_flashdata('success', 'Subcategory Added');
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
        $subcategory = Subcategory::find($id);
        $categories = Category::all();
        //dd($type->type_name);

        $this->load->view('admin/subcategory/subcategory_edit', compact('subcategory', 'categories'));
    }

    public function update($id)
    {
        // $a = $this->input->post();
        // print_r($a);die();
        if($_FILES['sub_cat_image']['name'] !== ""){
            
            $subcategory = $this->db->where('id',$id)->get('product_subcategory')->row_array();
            if($subcategory['sub_cat_image'] !== null){
                unlink('./assets/img/subcategory/'.$subcategory['sub_cat_image']);
            }
            $config['upload_path']="./assets/img/subcategory/";
            $config['allowed_types']='jpeg|jpg|png';
            $this->upload->initialize($config);
            if(!$this->upload->do_upload("sub_cat_image")){
                // echo 'not image upload';die();
                $this->session->set_flashdata('err', $this->upload->display_errors());
                $location = $this->agent->referrer();
                redirect($location);  
                // redirect(base_url('ticket_ctrl/add_new_ticket'));
            }else{
                // echo 'image upload';die();
                $image = array('upload_data' => $this->upload->data());
                $data['sub_cat_image'] = $image['upload_data']['file_name']; 
                 
            }
        }
         
            $data['subcategory_name'] = $this->input->post('subcategory_name');
            $data['category_id'] = $this->input->post('category_id');
            
            $saved = $this->db->where('id',$id)->update('product_subcategory',$data);

        if ($saved) {
            $this->session->set_flashdata('success', 'Subcategory Updated');
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
