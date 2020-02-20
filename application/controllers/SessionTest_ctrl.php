<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SessionTest_ctrl extends CI_Controller {

	public function index()
	{
        $session_data = $this->session->userdata('username');
        print_r($session_data);
	}

}
