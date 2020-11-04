<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controllerunit extends CI_Controller {
 
	public function index()
	{
		if($this->session->userdata('admin_id')==''){
		   $this->load->view('layouts/header');
        $this->load->view('home/home');
        $this->load->view('layouts/footer');
 		}
		else {
			  redirect(base_url() . 'Controllerunit/loginoutlet');
		}
 	}
	 
	
	public function Suppliers()
	{
		if($this->session->userdata('admin_id')==''){
		   $this->load->view('layouts/header');
        $this->load->view('Suppliers/Suppliers');
        $this->load->view('layouts/footer');
 		}
		else {
			  redirect(base_url() . 'Controllerunit/loginoutlet');
		}
 	}
	 
	
	public function warehouse()
	{
		if($this->session->userdata('admin_id')==''){
		   $this->load->view('layouts/header');
        $this->load->view('warehouse/warehouse');
        $this->load->view('layouts/footer');
 		}
		else {
			  redirect(base_url() . 'Controllerunit/loginoutlet');
		}
 	}
	
	
	
	
	
	public function warehouselogin()
	{
		if($this->session->userdata('warehouse_adminid')==''){
		  
        $this->load->view('warehousebase/login/login');
         
 		}
		else {
			  redirect(base_url() . 'Controllerunit/addproducts');
		}
 	}
	
	 
	public function addproducts()
	{
		if($this->session->userdata('warehouse_adminid')!=''){
			$data['brands'] = $this->main_model->showOffBrands(); 
		    $data['categories'] = $this->main_model->showOffCategories(); 
		        $this->load->view('warehousebase/layouts/header');
         $this->load->view('warehousebase/home/home',$data);
			$this->load->view('warehousebase/layouts/footer');
         
 		}
		else {
			  redirect(base_url() . 'Controllerunit/warehouselogin');
		}
 	}
	
	
	
	public function viewproducts()
	{
		if($this->session->userdata('warehouse_adminid')!=''){
		        
		 
			$this->load->view('warehousebase/layouts/header');
				$this->load->view('warehousebase/viewproducts/viewproducts');
				$this->load->view('warehousebase/layouts/footer');
  		
		}
		else {
			  redirect(base_url() . 'Controllerunit/warehouselogin');
		}
 	}
 	 
	public function customerbase()
	{
		if($this->session->userdata('admin_id')==''){
		  $this->load->view('layouts/header');
        $this->load->view('customerbase/customerbase');
        $this->load->view('layouts/footer');
 		
		}
		else {
			  redirect(base_url() . 'Controllerunit/loginoutlet');
		}
 	}
	
	public function staffbase()
	{
		if($this->session->userdata('admin_id')==''){
		  $this->load->view('layouts/header');
        $this->load->view('staffbase/staffbase');
        $this->load->view('layouts/footer');
 		
		}
		else {
			  redirect(base_url() . 'Controllerunit/loginoutlet');
		}
 	}
	
	
	
	
	public function subcategory()
	{
		if($this->session->userdata('admin_id')==''){
		   $this->load->view('layouts/header');
        $this->load->view('subcategories/subcategories');
        $this->load->view('layouts/footer');
 		}
		else {
			  redirect(base_url() . 'Controllerunit/loginoutlet');
		}
 	}
	 
		public function addbrands()
		{
			
		if($this->session->userdata('admin_id')==''){
		   $this->load->view('layouts/header');
        $this->load->view('addbrands/addbrands');
        $this->load->view('layouts/footer');
 		
		}
			
		else {
			  redirect(base_url() . 'Controllerunit/loginoutlet');
		}
			
 		}
	 
	public function addcategories()
		{
			
			if($this->session->userdata('admin_id')==''){
			   $this->load->view('layouts/header');
			$this->load->view('categories/categories');
			$this->load->view('layouts/footer');

			}

			else {
				  redirect(base_url() . 'Controllerunit/loginoutlet');
			}
			
 		}
	 
	 
	
	
	public function smssender(){
		$smssenderTel = $this->security->xss_clean($_POST['smssenderTel']);
		$sendMessage = $this->security->xss_clean($_POST['sendMessage']);
		
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://send.ozonedesk.com/api/v2/send.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"user_id=102221&api_key=nyx0020rtoijsr2te&sender_id=nowfarspicy&to=94". $smssenderTel ."&message=". $sendMessage);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
		echo $server_output;
	}
	
}