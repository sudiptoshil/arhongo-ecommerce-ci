<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('index');
	}

	public function client()
	{	
		$this->load->model('client_models/Main');
		$data['title'] = 'Home';
		$data['brands'] = $this->Main->get_all('brand_name',[]);
		$data['category'] = $this->Main->get_all('product_category',[]);
		$data['root_categories'] = $this->db->where('root_id',0)->get('product_category')->result_array();
// 		echo "<pre>";
// 		print_r($data['root_categories']);
// 		echo "</pre>";die();
		$data['products'] = $this->db->limit(4,0)->select('pro.*,pi.image_url as image_url')->from('product pro')->join('product_category pc','pc.id = pro.category_id')->join('product_image pi','pi.product_id = pro.id')->where('pc.home_page',1)->where('pi.featured_image',1)->get()->result_array();
		
        $data['sliders'] = $this->db->limit(3,0)->where(['trash'=>0,'status'=>1])->get('sliders')->result_array();
        
		// echo "<pre>";
		// print_r($data['sliders']);
		// echo "</pre>";die();
		$this->load->view('client/index.php',$data);
	}

	public function about(){
		$data['title'] = 'About';
		$this->load->view('client/about',$data);
	}
	public function contact(){
		$data['title'] = 'Contact';
		$this->load->view('client/contact',$data);
	}
}
