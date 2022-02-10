<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Report_model extends CI_Model 
{
    public function show_items($cat_id){

        if ($cat_id == 0) {
            $sql = "SELECT * FROM int_items ORDER BY created_at DESC";
        }
        else{
            $sql = "SELECT * FROM int_items WHERE item_catogery = $cat_id ORDER BY created_at DESC";
        }
        
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }
    //All item Catogiries
    public function item_catogories(){
        $sql = "SELECT * FROM int_catogery ORDER BY catogery ASC";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }
    public function item_catogery($cat_id){
        $sql = "SELECT * FROM int_catogery WHERE cat_id = $cat_id";
        $query = $this->db->query($sql);
        $result = $query->first_row();

        return $result;
    }
    public function item_brand($brand_id){
        $sql = "SELECT * FROM int_brand WHERE brand_id = $brand_id";
        $query = $this->db->query($sql);
        $result = $query->first_row();

        return $result;
    }                       
                        
}


/* End of file Report_model.php and path /application/models/Report_model.php */

