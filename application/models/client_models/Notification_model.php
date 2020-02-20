<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notification_model extends CI_Model
{

	public function getSellerResponseNotification(){
		$user_data=$this->session->userdata();
		$user_id=$user_data['user_id'];
		$this->db->select('COUNT(a.seller_order_master_id) as total');
		$this->db->where('b.order_id=a.`order_master_id`');
		$this->db->where('b.buyer_id',$user_id);
		$this->db->where('a.status=0');
		$this->db->from('seller_order_master as a,order_master as b');
		$query=$this->db->get();
		if($query){
			return $query->row();
		}
		else{
			return false;
		}
	}
	public function getSellerResponseTopNotification(){
		$user_data=$this->session->userdata();
		$user_id=$user_data['user_id'];
		$this->db->select('a.*');
		$this->db->where('b.order_id=a.`order_master_id`');
		$this->db->where('b.buyer_id',$user_id);
		$this->db->where('a.status=0');
		$this->db->from('seller_order_master as a,order_master as b');
		$query=$this->db->get();
		if($query){
			return $query->result_array();
		}
		else{
			return false;
		}
	}
	public function getOnTheWayNotification(){
		$user_data=$this->session->userdata();
		$user_id=$user_data['user_id'];
		$this->db->select('COUNT(order_id) as total');
		$this->db->from('order_master as a,seller_order_master b');
		$this->db->where('a.buyer_id',$user_id);
		$this->db->where('a.order_id=b.order_master_id');
		$this->db->where('a.status = 1');
		$this->db->where("b.delivery_status = 'On the way'");
		$query=$this->db->get();
		if($query){
			return $query->row();
		}
		else{
			return false;
		}
	}
	public function getOnTheWayTopNotification(){
		$user_data=$this->session->userdata();
		$user_id=$user_data['user_id'];
		$this->db->select('b.*');
		$this->db->from('order_master as a,seller_order_master b');
		$this->db->where('a.buyer_id',$user_id);
		$this->db->where('a.order_id=b.order_master_id');
		$this->db->where('a.status = 1');
		$this->db->where("b.delivery_status = 'On the way'");
		$query=$this->db->get();
		if($query){
			return $query->result_array();
		}
		else{
			return false;
		}
	}
	public function getSellerHomeNotification(){
		$user_data=$this->session->userdata();
		$area_id=$user_data['area_id'];
		$seller_id=$user_data['user_id'];

		$this->db->select('order_master_id')->from('seller_order_master')->where('seller_id',$seller_id);
		$subQuery =  $this->db->get_compiled_select();

// Main Query

		$this->db->select('COUNT(a.order_id) as total');
		$this->db->from('order_master as a,user_information as b');
		$this->db->where('a.buyer_id = b.user_id');
		$this->db->where('b.area_id',$area_id);
		$this->db->where('a.status = 0');
		$this->db->where("a.order_id NOT IN ($subQuery)");
		$this->db->order_by('a.order_id', 'ASC');
		$query=$this->db->get();
		if($query){
			return $query->row();
		}
		else{
			return false;
		}
	}
	public function getBuyerFeedbackNotification(){
		$user_data=$this->session->userdata();
		$seller_id=$user_data['user_id'];
		$this->db->select('COUNT(a.order_master_id) as total');
		$this->db->from('seller_order_master as a,order_master as b');
		$this->db->where('a.seller_id',$seller_id);
		$this->db->where('a.order_master_id = b.order_id');
		$this->db->where('a.status=1');
		$this->db->where('b.status =1');
		$this->db->order_by('a.seller_order_master_id', 'ASC');
		$query=$this->db->get();
		if($query){
			return $query->row();
		}
		else{
			return false;
		}
	}

	public function getBuyerFeedbackTopNotification(){
		$user_data=$this->session->userdata();
		$seller_id=$user_data['user_id'];
		$this->db->select('DATE_FORMAT(a.date, "%d-%M-%Y") as date,b.buyer_id,TIME_FORMAT(a.date, "%h:%i %p") as time,a.order_master_id,a.total,a.seller_order_master_id,a.delivery_status,a.delivery_man_id,a.delivery_status');
		$this->db->from('seller_order_master as a,order_master as b');
		$this->db->where('a.seller_id',$seller_id);
		$this->db->where('a.order_master_id = b.order_id');
		$this->db->where('a.status=1');
		$this->db->where('b.status =1');
		$this->db->order_by('a.seller_order_master_id', 'ASC');
		$query=$this->db->get();
		if($query){
			return $query->result_array();
		}
		else{
			return false;
		}
	}
	public function getDeliveryRequestNotification(){
		$user_data=$this->session->userdata();
		$user_id=$user_data['user_id'];

		$this->db->select('seller_order_master_id')->from('delivery_report')->where('delivery_man_id',$user_id);
		$subQuery =  $this->db->get_compiled_select();

		$this->db->select('COUNT(a.order_master_id) as total');
		$this->db->from('seller_order_master as a,order_master as b');
		$this->db->where('a.delivery_man_id',$user_id);
		$this->db->where('a.order_master_id = b.order_id');
		$this->db->where("a.seller_order_master_id NOT IN ($subQuery)");
		$this->db->order_by('a.seller_order_master_id', 'ASC');
		$query=$this->db->get();
		if($query){
			return $query->row();
		}
		else{
			return false;
		}
	}
	public function getDeliveryRequestTopNotification(){
		$user_data=$this->session->userdata();
		$user_id=$user_data['user_id'];

		$this->db->select('seller_order_master_id')->from('delivery_report')->where('delivery_man_id',$user_id);
		$subQuery =  $this->db->get_compiled_select();

		$this->db->select('DATE_FORMAT(a.date, "%d-%M-%Y") as date,b.buyer_id,b.shipping_address,TIME_FORMAT(a.date, "%h:%i %p") as time,a.order_master_id,a.total,a.seller_order_master_id,a.seller_id,a.delivery_status,a.delivery_man_id,a.delivery_status');
		$this->db->from('seller_order_master as a,order_master as b');
		$this->db->where('a.delivery_man_id',$user_id);
		$this->db->where('a.order_master_id = b.order_id');
		$this->db->where("a.seller_order_master_id NOT IN ($subQuery)");
		$this->db->order_by('a.seller_order_master_id', 'ASC');
		$query=$this->db->get();
		if($query){
			return $query->result_array();
		}
		else{
			return false;
		}
	}
}
