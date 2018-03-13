<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Man_sarprasC extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		Man_sarpras_access();
	}

	
}