<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_ctrl extends CI_controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('client_models/Main');
    }


    public function add_order(){
        
        // $a = $this->input->post();
        // print_r($a);die();

        $cart_data=$this->cart->contents();
        // echo "<pre>";
        // print_r($cart_data);
        // echo "</pre>";die();
        $total_cost = 0;
        foreach ($cart_data as $item) {
            $total_cost += $item['price'];
        }
        // $total_discount = 0;
        // foreach ($cart_data as $item) {
        //     $total_discount += $item['discount'];
        // }
        // $total_cost = $total_cost - $total_discount;
        // echo "<pre>";
        //     echo $this->input->post('coupon');
        //     print_r($cart_data);
        
        // echo "</pre>";die();
        if($this->input->post('same_address') == false){
            $this->form_validation->set_rules('shipping_address','Delivery or Shipping Address','required');
        }
        
        $this->form_validation->set_rules('customer_id','Customer ID','required');
        $this->form_validation->set_rules('payment_method','Customer ID','required');
        if($this->form_validation->run() == false){
            $data['title'] = 'Place Order';
            $this->load->view('client/place_order',$data);
        }else{
            
            $data['customer_id'] = $this->input->post('customer_id');
            if($this->input->post('same_address')){
                $old_data['present_address'] = $this->db->select('present_address')->from('customers')->where('customer_id',$this->input->post("customer_id"))->get()->row();
                $data['delivery_location'] = $old_data['present_address']->present_address;
            }else{
                $data['delivery_location'] = $this->input->post('shipping_address');
                
            }
            
            $data['total_cost'] = $total_cost;
            $data['coupon'] = $this->input->post('coupon');
            $data['payment_method'] = $this->input->post('payment_method');
            $data['transaction_id'] = $this->input->post('transaction_id');
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['delivered'] = 0;
            // echo "<pre>";
            // echo $this->input->post('coupon');
            // print_r($data);
        
            // echo "</pre>";die();
            $order_id = $this->Main->insert($data,'orders');
            if($order_id !== null){
                foreach($cart_data as $cart){
                    $order_data['order_id'] = $order_id;
                    $order_data['product_id'] = $cart['id'];
                    $order_data['product_quantity'] = $cart['qty'];
                    $order_data['product_unite_price'] = $cart['price']/$cart['qty'];
                    $order_data['unit_x_quantity_price'] = $cart['price'];
                    
                    $get = $this->Main->insert($order_data,'invoice');
                    // $cart['qty'] = 0 ;
                }
                $this->cart->destroy();
                $this->session->set_flashdata('success', 'Order placed successfully');
                // $this->session->set_flashdata("success", lang("success_13"));
                redirect('client_controllers/order_ctrl/customer_orders');
                
            }
        }
    }

    public function customer_orders(){
        // print_r(date('Y-m-d H:i:s')); die();
        // $cart_data=$this->cart->contents();
        // // return print_r($cart_data);die();
        // $total_cost = 0;
        // foreach ($cart_data as $item) {
        //     $total_cost += $item['price'];
        // }
        // $total_discount = 0;
        // foreach ($cart_data as $item) {
        //     $total_discount += $item['discount'];
        // }
        $customer_id = $this->session->userdata('customer_id');
        $data['orders'] = $this->Main->get_all('orders',['id is not null','customer_id'=>$customer_id]);
        $data['title'] = "All Orders";
        // print_r($data);die();
        $this->load->view('client/customer_orders',$data);
    }

    //fetch order details from invoice table
    public function order_details($order_id){
        
        $data = $this->db->select('i.*,p.product_name as pname,p.discount as pdiscount')->from('invoice i')->join('product p','p.id=i.product_id')->where('i.order_id',$order_id)->get()->result_array();
        echo json_encode($data);
    }
}
?>