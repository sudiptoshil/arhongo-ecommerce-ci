<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
	}
	public function addToCart(){
		$insert_new = TRUE;
		$allData = $this->cart->contents();
		$product_id = $this->input->post('product_id');
        $product = $this->db->where('id',$product_id)->get('product')->row_array();
        // echo json_encode($product);die();

		foreach ($allData as $item) {

			// check product id in session, if exist update the quantity
			if ( $item['id'] == $this->input->post('product_id') ) { // Set value to your variable

				$data = array(
					'rowid'=>$item['rowid'],
					'qty'=>++$item['qty'],
					'price'=>$item['qty']*$this->input->post('price'),
				);
				$this->cart->update($data);

				// set $insert_new value to False
				$insert_new = FALSE;

			}

		}
		// if $insert_new value is true, insert the item as new item in the cart
		if ($insert_new) {
			$data = array(
				'id'      => $this->input->post('product_id'),
				'qty'     => 1,
				'price'   => $this->input->post('price'),
				'name'    => $this->input->post('product_name'),
				'type'    => $this->input->post('type'),
				'discount' => $product['discount']?$product['discount']:'',
				'date' => date('d-m-Y h:i:s a')
				
			);
			$this->cart->insert($data);
		}
	}
	public function subtract_cart_qty(){
		$qty= $this->input->post('qty');
		$price= $this->input->post('price');
		$unit_price=$price/$qty;
		$data = array(
			'rowid'      => $this->input->post('rowid'),
			'qty'     => $qty-1,
			'price'=>($qty-1)*$unit_price,
		);
		$this->cart->update($data);
	}
	public function add_cart_qty(){
		$qty= $this->input->post('qty');
		$price= $this->input->post('price');
		$unit_price=$price/$qty;
		$data = array(
			'rowid'      => $this->input->post('rowid'),
			'qty'     => $qty+1,
			'price'=>($qty+1)*$unit_price,
		);
		$this->cart->update($data);
	}
	public function delete_single_cart_item(){
		$data = array(
			'rowid'      => $this->input->post('rowid'),
			'qty'     => 0,
		);
		$this->cart->update($data);
	}
	public function getCartData(){
		$data=$this->cart->contents();
		echo json_encode($data);
	}
	public function getTotalItem(){
		$data=count($this->cart->contents());
		echo json_encode($data);
	}
	public function getTotalAmount(){
		$data=$this->cart->contents();
		$total=0;
		foreach ($data as $a){
			
			$price=$a['price'];
			$total=$total+$price;
			// $total = $total+$price - $total_discount;
		}
		echo json_encode($total);
	}

	public function getDiscountedAmount(){
		$data=$this->cart->contents();
		$total=0;
		$d=0;
		foreach ($data as $a){
			if($a['discount'] != null){
				$discount = ($a['discount']/100)*$a['price'];
				$d=$d+$discount;
			}
			
			$price=$a['price'];
			$total=$total+$price;
			// $total = $total+$price - $total_discount;
		}
		echo json_encode($total-$d);
	}



	public function deleteSingleItem(){
		$data = array(
			'rowid'   => $this->input->post('rowid'),
			'qty'     => 0
		);
		$this->cart->update($data);
	}
	public function placeOrder(){
        $this->load->model('client_models/Main');
		$data['title']="Place Order";
		// $data['content']="buyer/place_order";
		$this->load->view('client/place_order',$data);
	}


}
