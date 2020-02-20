<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_controller{
    
    public function __construct(){
        
        parent::__construct();
            $this->load->model('common');
    }
    
	public function index(){
	    $data = array();
        $data['list'] = $this->common->getAll('orders','','');
        
        $this->load->view('admin/order/all_order', $data);
    }
    public function order_change_status($id, $status) {

        if ($id != null) {
            if ($status == 2) {
                $data['status'] = 2;
                $this->db->where('id', $id);
                $this->db->update('orders', $data);
            }else if ($status == 3) {
                $data['status'] = 3;
                $this->db->where('id', $id);
                $this->db->update('orders', $data);
            }
        }
        return redirect('order');
    }
    public function order_details() {
        $order_id = $_POST['order_id'];
        //$data['all_orders'] = "ok";
       $all_orders = $this->common->getAll('invoice','order_id',$order_id);
       
       $orders_result['invoice'] = array();
       
        foreach ($all_orders as $val) {
            $product_id = $val['product_id'];
            $product_name = 'Xyz';//$this->common->getSpecificField('product','id',$val['product_id'],'product_name');
            $product_quantity = $val['product_quantity'];
            $product_unite_price = $val['product_unite_price'];
            $unit_x_quantity_price = $val['unit_x_quantity_price'];
            
            $post = array();
            $post['id'] = $val['id'];
            $post['order_id'] = $val['order_id']; 
            $post['product_id'] = $val['product_id'];
            $post['product_name'] = $product_name;
            $post['product_quantity'] = $val['product_quantity'];
            $post['product_unit_price'] = $product_unite_price;
            /*$post['phone'] = $val['phone'];
            $post['address'] = $val['address'];
            $post['commision'] = $val['commision'];
            $post['cmp_name'] = $val['cmp_name'];
            $post['remarks'] = $val['remarks'];*/
    
            array_push($orders_result['invoice'], $post);
        }
        echo json_encode($orders_result);
    }
}