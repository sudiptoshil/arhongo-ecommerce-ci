<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_ctrl extends CI_Controller
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

    public function get($root_id = null)
    {
        // echo $root_id;die();
        if($root_id == 0){
            $categories = Category::where('root_id',0)->with('type')->with('subcategory')->get()->sortByDesc('id');
        }else{
           $categories = Category::where('root_id',$root_id)->with('type')->with('subcategory')->get()->sortByDesc('id'); 
        }

        //echo $this->db->last_query()." 9ddddddddd";
        // $location = $this->agent->referrer();
        // redirect($location);
        // echo 'Category > get()';
        
        // echo "<pre>";
        // print_r($categories);
        // echo "<pre>";die();
        // dd($type);
        $this->load->view('admin/category/category_all', compact('categories','root_id'));
    }

    public function show($id)
    {
        $category = Category::with('type', 'subcategory')->find($id);
        // dd($category);
        $this->load->view('admin/category/category_detail', compact('category'));
    }

    public function add($root_id)
    {
        // echo 'Category > add()';
        $types = Type::all();
        $categories = Category::all();
        // echo "<pre>";
        // print_r($categories);
        // echo "<pre>";die();
        $this->load->view('admin/category/add', compact('types','categories','root_id'));
    }

    public function store()
    {   
        //     echo "<pre>";
        // print_r($this->input->post());
        // echo "</pre>";die();
        if(isset($_FILES['file']['name'])){
        
            $config['upload_path']="./assets/img/category/";
            $config['allowed_types']='jpeg|jpg|png';
            // $config['encrypt_name'] = TRUE;
            
            // $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if(!$this->upload->do_upload("file")){
                // echo 'not image upload';die();
                $this->session->set_flashdata('err', $this->upload->display_errors());
                $location = $this->agent->referrer();
                redirect($location);  
                // redirect(base_url('ticket_ctrl/add_new_ticket'));
            }else{
                // echo 'image upload';die();
                $image = array('upload_data' => $this->upload->data());
                $category_image = $image['upload_data']['file_name']; 
                $category_name = $this->input->post('category_name');
                $type_id = $this->input->post('type_id');
                $home_page = $this->input->post('home_page') == 1 ? 1 : 0;
                // echo $category_image;die();
                $new_category = new Category();
                $new_category->root_id = $this->input->post('root_id');
                $new_category->category_name = $category_name;
                // $new_category->type_id = $type_id;
                $new_category->category_image = $category_image;
                $new_category->home_page = $home_page;

                $saved = $new_category->save();
                // echo json_encode($data['photo']);die();
            }
        }

        if ($saved) {
            $this->session->set_flashdata('success', 'Category Added');
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

        $category = Category::find($id);
        $types = Type::all();
        $categories = Category::all();
        // echo "<pre>";
        // foreach($categories as $cat){
        //     print_r($cat->category_name);die();
        // }
        // // print_r($categories);
        // echo "<pre>";die();
        
        //dd($type->type_name);

        $this->load->view('admin/category/category_edit', compact('category', 'types','categories'));

    }

    public function update($id)
    {
        // echo "<pre>";
        // print_r($this->input->post());
        // echo "<pre>";die();
        if($_FILES['file']['name'] !== ""){
            
            $category = $this->db->where('id',$id)->get('product_category')->row_array();
            if($category['category_image']){
                unlink("./assets/img/category/".$category['category_image']);
            }
            
            $config['upload_path']="./assets/img/category/";
            $config['allowed_types']='jpeg|jpg|png';
            // $config['encrypt_name'] = TRUE;
            
            // $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if(!$this->upload->do_upload("file")){
                // echo 'not image upload';die();
                $this->session->set_flashdata('err', $this->upload->display_errors());
                $location = $this->agent->referrer();
                redirect($location);  
                // redirect(base_url('ticket_ctrl/add_new_ticket'));
            }else{
                // echo 'image upload';die();
                $image = array('upload_data' => $this->upload->data());
                $category_image = $image['upload_data']['file_name']; 
            }
        }
        
        // $type_id = $this->input->post('type_id');
        $root_id = $this->input->post('root_id');
        $category_name = $this->input->post('category_name');
        $home_page = $this->input->post('home_page') == 1 ? 1 : 0;
        //dd($subcategory_name, $category_id);

        $category = Category::find($id);
       
        $category->root_id = $root_id ? $root_id : 0;
        $category->category_name = $category_name;
        if($_FILES['file']['name'] !== ""){
         $category->category_image = $category_image;
        }
        
        $category->home_page = $home_page;

        $saved = $category->save();

        if ($saved) {
            $this->session->set_flashdata('success', 'Category Updated');
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
