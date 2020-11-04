<?php
class Main_model extends CI_Model {
    
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	
 
 	public function addSupplier($data){
		return $this->db->insert('supplier',$data); 
	}
	
	
	public function showOffSuppliers(){
		$this->db->select('*'); 
		$this->db->from('supplier');
		$result = $this->db->get(); 
		
		
		if($result->num_rows() > 0){
			return $result->result(); 
		}
		else {
			return 0; 
		}
	}
	
	
	public function deleteSuppliers($id){
		return $this->db->where('supplier_id',$id)->delete('supplier'); 
	}
	
	public function updateSuppliers($data,$id){
		return $this->db->where('supplier_id',$id)->update('supplier',$data); 
	}
	
	
	public function warehouseMobile($data){
		return $this->db->insert('tbl_warehouse',$data); 
	}
	
	public function viewWarehouseDetails(){
		 $this->db->select('*'); 
		 $this->db->from('tbl_warehouse'); 
		$result = $this->db->get(); 
		if($result->num_rows() > 0){
			return $result->result(); 
		}
		else {
			return 0; 
		}
	}
	
	
	public function deleteWarehouseDetails($warehouse_id){
		return $this->db->where('warehouse_id',$warehouse_id)->delete('tbl_warehouse'); 
	}
	
	public function updatewarehouse($data,$id){
		return $this->db->where('warehouse_id',$id)->update('tbl_warehouse',$data); 
	}
	
	
	public function savebrandsName($brandsName){
		return $this->db->insert('brands',array('brandds_name' => $brandsName)); 
	}
	
	public function saveBrand($brandsName){
		return $this->db->insert('brands',array('brands_name' => $brandsName)); 
	}
	
	public function savecategoriesName($categoriesName){
		return $this->db->insert('main_categories',array('categoris_name' => $categoriesName)); 
	}
	
	public function showOffBrands(){
		$this->db->select('*'); 
		$this->db->from('brands'); 
		$result = $this->db->get(); 
		if($result->num_rows() > 0){
			return $result->result(); 
		}
		else {
			return 0; 
		}
	}
	
	public function deleteBrands($brands_id){
		return $this->db->where('brands_id',$brands_id)->delete('brands'); 
		
	}
	public function deltecategories($catId){
		return $this->db->where('main_categoriesid',$catId)->delete('main_categories'); 
		
	}
	
	 
	public function updatebrandssection($brandsName,$hidden_id){
		return $this->db->where('brands_id',$hidden_id)->update('brands',array('brands_name' => $brandsName)); 
	}
	
	public function updatecategories($id,$categoriesName){
		return $this->db->where('main_categoriesid',$id)->update('main_categories',array('categoris_name' => $categoriesName)); 
		
	}
	
	
	public function savesubcategory($main_category,$sub_category){
		return $this->db->insert('sub_category',array('main_cat_id' => $main_category,'sub_cat_id' => $sub_category)); 
	}
	
	
	
	
	public function showOffCategories(){
			$this->db->select('*'); 
		$this->db->from('main_categories'); 
		$result = $this->db->get(); 
		if($result->num_rows() > 0){
			return $result->result(); 
		}
		else {
			return 0; 
		}
	}
	
	
	public function showoffsubCategory(){
		$this->db->select('main_categories.categoris_name,sub_category.sub_cat_id,sub_category.main_cat_id,sub_category.sub_categoryid,main_categories.main_categoriesid'); 
		$this->db->from('sub_category');
		$this->db->join('main_categories','main_categories.main_categoriesid=sub_category.main_cat_id'); 
		$result = $this->db->get();
		
		if($result->num_rows() > 0){
			return $result->result(); 
		}
		else {
			return 0; 
		}
	}
	
	public function deletesubcategories($id){
		return $this->db->where('sub_categoryid',$id)->delete('sub_category'); 
	}
	
	
	public function updatesubcategory($data,$id){
		return $this->db->where('sub_categoryid',$id)->update('sub_category',$data); 
	}
	
	 
	 
	public function savecustomers($customerMobileNumber,$customerName){
		return $this->db->insert('customer',array('customer_name' =>$customerName,'customer_mobile' => $customerMobileNumber)); 
		
	}
	
	
	
	
	public function showOffCustomers(){
		$this->db->select('*'); 
		$this->db->from('customer'); 
		$result = $this->db->get(); 
		if($result->num_rows() > 0){
			return $result->result(); 
		}
		else {
			return 0; 
		}
	}
	
	
	public function showOffStaff(){
		$this->db->select('*'); 
		$this->db->from('staff'); 
		$result = $this->db->get(); 
		if($result->num_rows() > 0){
			return $result->result(); 
		}
		else {
			return 0; 
		}
	}
	
	
	
	public function deletecustomer($customer_id){
		return $this->db->where('customer_id',$customer_id)->delete('customer'); 
	}
	
	public function savestaffs($data){
		return $this->db->insert('staff',$data); 
	}
	
	public function delestaff($staff_id){
		return $this->db->where('staff_id',$staff_id)->delete('staff'); 
	}
	
	
	public function updatestaffs($data,$id){
		return $this->db->where('staff_id',$id)->update('staff',$data); 
	}
	
	
	public function loginintowarehouse($mobNumber,$mobPassword){
		$this->db->select('staff_id,staff_name,staff_mobile,joint_date,responsibility'); 
		$this->db->from('staff');
		$this->db->where('staff_mobile',$mobNumber);
		$this->db->where('password',$mobPassword);
		$result = $this->db->get(); 
	
		if($result->num_rows() > 0){
		 	return $result->result();  
		}
		else {
			return 0; 
		}
	}
	
	
	
	public function choosesubcategories($value){
		$this->db->select('*');
		$this->db->from('sub_category');
		$this->db->where('main_cat_id',$value);
		$result = $this->db->get();
		if($result->num_rows() > 0){
			return $result->result(); 
		}
		else {
			return 0; 
		}
	}
	
	public function saveProducts($data){
		 
	}
	
}

?>