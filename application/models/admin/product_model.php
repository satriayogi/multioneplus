<?php 
 
 class Product_model extends CI_Model{
     public function readcategory(){
         return $this->db->get('category')->result_array();
     }
     public function save_product(){
        
     }
 }

?>