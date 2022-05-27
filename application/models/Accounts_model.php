<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Accounts_model extends CI_Model 
{
    public function suppiler()
    {
        $sql = "SELECT * FROM supplier";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }  

    // public function insert_supplier($id,$name){
    //     $data = array(
    //         'id' => $id,
    //         'supplier' => $name,
    //        // 'location_id' => $loc,
    //     );
    
    //     $this->db->insert('supplier', $data);
    // }


                        
}


/* End of file Purchase_model.php and path /application/models/Purchase_model.php */

