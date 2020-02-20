<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        // $this->load->library('image_lib');
    }

	public function index()
	{
		$this->load->model('programming_language');

		$list = Programming_language::all();

		$this->load->view('home/index', ['list' => $list]);
	}
	
// slider for frontend view
    public function slider(){
        
        $data['sliders'] = $this->db->get('sliders')->result_array();
        $this->load->view('admin/slider/all_slider',$data);
    }
    
    // show create form for slider
    public function add_slider(){
        $this->load->view('admin/slider/add');
    }
    
    // store slider
    public function store_slider(){
        
        $config['upload_path'] = './assets/img/slider/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '300000';
        $config['max_width'] = '1111524';
        $config['max_height'] = '1111000';
        $this->load->library('upload', $config);
        $this->load->library('image_lib');
        $upload = $this->upload->do_upload('slider_image');
        // $data1 = array('upload_data' => $this->upload->data());
        // $image = $data1['upload_data']['file_name'];
        // echo $image;
        // unlink('./assets/img/slider/'.$image);
        if ($upload == true) {
            // echo 'image upload';die();
            $data1 = array('upload_data' => $this->upload->data());
            $image = $data1['upload_data']['file_name'];
            $configBig = array();
            $configBig['image_library'] = 'gd2';
            $configBig['source_image'] = './assets/img/slider/' . $image;
            $configBig['create_thumb'] = TRUE;
            $configBig['maintain_ratio'] = FALSE;
            $configBig['width'] = 1460;
            $configBig['height'] = 460;
            $configBig['thumb_marker'] = "_big";
            $this->image_lib->initialize($configBig);
            $this->image_lib->resize();
            $this->image_lib->clear();
            unset($configBig);
            $filename1 = $data1['upload_data']['raw_name'] . '_big' . $data1['upload_data']['file_ext'];
            $rename = rand() . "_big.jpg";
            rename('./assets/img/slider/' . $filename1, './assets/img/slider/' . $rename);
            
            $data['slider_title'] = $this->input->post('slider_title');
            $data['slider_image'] = $rename;
            $data['content'] = $this->input->post('content');
            $this->db->insert('sliders',$data);
            unlink('./assets/img/slider/'.$image);
            $this->session->set_flashdata('success', 'Slider Saved Successfully');
            redirect('home/slider');
            
        }else{
            echo 'image not upload';die();
            $this->session->set_flashdata('error', $this->upload->display_errors());
            $location = $this->agent->referrer();
            redirect($location); 
        }
    }
    
    // show slider details
    public function show_slider($id){
        $data['slider'] = $this->db->where('id',$id)->get('sliders')->row_array();
        $this->load->view('admin/slider/slider_detail',$data);
    }
    
    // Edit Slider 
    public function edit_slider($id){
        $data['slider'] = $this->db->where('id',$id)->get('sliders')->row_array();
        $this->load->view('admin/slider/edit_slider',$data);
    }
    
    // update Slider
    public function update_slider($id){
        // $a = $this->input->post() ;
        // print_r($a);die();
        
        if($_FILES['slider_image']['name'] !== ""){
            $slider = $this->db->where('id',$id)->get('sliders')->row_array();
            if($slider['slider_image'] !== null){
                unlink('./assets/img/slider/'.$slider['slider_image']);
            }
            $config['upload_path'] = './assets/img/slider/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '300000';
        $config['max_width'] = '1111524';
        $config['max_height'] = '1111000';
        $this->load->library('upload', $config);
        $this->load->library('image_lib');
        $upload = $this->upload->do_upload('slider_image');
        if ($upload == true) {
            // echo 'image upload';die();
            $data1 = array('upload_data' => $this->upload->data());
            $image = $data1['upload_data']['file_name'];
            $configBig = array();
            $configBig['image_library'] = 'gd2';
            $configBig['source_image'] = './assets/img/slider/' . $image;
            $configBig['create_thumb'] = TRUE;
            $configBig['maintain_ratio'] = FALSE;
            $configBig['width'] = 1460;
            $configBig['height'] = 460;
            $configBig['thumb_marker'] = "_big";
            $this->image_lib->initialize($configBig);
            $this->image_lib->resize();
            $this->image_lib->clear();
            unset($configBig);
            $filename1 = $data1['upload_data']['raw_name'] . '_big' . $data1['upload_data']['file_ext'];
            $rename = rand() . "_big.jpg";
            rename('./assets/img/slider/' . $filename1, './assets/img/slider/' . $rename);
            unlink('./assets/img/slider/'.$image);
            $data['slider_image'] = $rename;
            
            }else{
                echo 'image not upload';die();
                $this->session->set_flashdata('error', $this->upload->display_errors());
                $location = $this->agent->referrer();
                redirect($location); 
            }
        }
            $data['slider_title'] = $this->input->post('slider_title');
            $data['content'] = $this->input->post('content');
            $data['status'] = $this->input->post('status');
            
        
            $saved = $this->db->where('id',$id)->update('sliders',$data);
            $this->session->set_flashdata('success', 'Slider Saved Successfully');
            redirect('home/slider');
        
        
        
       
    }
    
    public function delete_slider($id){
        
            $data['trash'] = $this->input->post('delete_slider') == 0 ? 1 : 0;
            $slider = $this->db->where('id',$id)->update('sliders',$data);
            $this->session->set_flashdata('success', 'Slider Deleted Successfully');
            redirect('home/slider');
      
    }
    
    
    
    
    
}
