<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('client_models/notification_model');
	}

	public function getSellerResponseNotification(){
		$result=$this->notification_model->getSellerResponseNotification();
		echo json_encode($result);
	}
	public function getSellerResponseTopNotification(){
		$result=$this->notification_model->getSellerResponseTopNotification();
		echo json_encode($result);
	}
	public function getOnTheWayNotification(){
		$result=$this->notification_model->getOnTheWayNotification();
		echo json_encode($result);
	}
	public function getSellerHomeNotification(){
			$result=$this->notification_model->getSellerHomeNotification();
			echo json_encode($result);
	}
	public function getBuyerFeedbackNotification(){
			$result=$this->notification_model->getBuyerFeedbackNotification();
			echo json_encode($result);
	}
	public function getBuyerFeedbackTopNotification(){
			$result=$this->notification_model->getBuyerFeedbackTopNotification();
			echo json_encode($result);
	}
	public function getDeliveryRequestNotification(){
			$result=$this->notification_model->getDeliveryRequestNotification();
			echo json_encode($result);
	}
	public function getDeliveryRequestTopNotification(){
			$result=$this->notification_model->getDeliveryRequestTopNotification();
			echo json_encode($result);
	}

}
