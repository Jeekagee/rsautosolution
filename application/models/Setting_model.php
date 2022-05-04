<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Setting_model extends CI_Model 
{
    public function services(){
        
       // $sql = "SELECT * FROM service ORDER BY service ASC";
        $sql ="SELECT s.service_id,s.service,d.department,s.amount FROM service s LEFT JOIN departments d ON s.department=d.department_id ORDER BY s.service ASC";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }

    public function departments(){
        
        $sql = "SELECT * FROM departments ORDER BY department ASC";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }

    public function items(){
        
        $sql = "SELECT * FROM int_items ORDER BY item_id ASC";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }

    

    public function delete($table,$id){
        $this->db->where('service_id', $id);
        $this->db->delete($table);
    }

    public function insert_service($service){
        $data = array(
            'service' => $service
        );
        $this->db->insert('booking_service', $data);
    }

    public function pwdiscorrect($uname,$pwd){
        $epassword = md5($pwd);
        $sql = "SELECT * FROM admin WHERE id = '$uname' AND password = '$epassword'";
        $query = $this->db->query($sql);

        if ($query->num_rows()  == 1) {
            return true;
        }
        else{
            return false;
        }
    }

    public function update_pwd($uname,$npwd){
        $epwd = md5($npwd);
        $data = array(
            'password' => $epwd
        );
        
        $this->db->where('id', $uname);
        $this->db->update('admin', $data);
    }

    public function items_available($service_id){
        
        $sql = "SELECT * FROM int_setting WHERE service_id = $service_id";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function insert_items($service_id,$item_id,$quantity){
        $data = array(
            'service_id' => $service_id,
            'item_id' => $item_id,
            'quantity' => $quantity
        );
        $this->db->insert('int_setting', $data);
    }

    public function service_items($service_id){
        $sql = "SELECT * FROM int_setting WHERE service_id = $service_id";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }

    public function insert_services($service,$amount,$department){
        $data = array(
            'service' => $service,
            'amount' => $amount,
            'department' => $department
        );
        $this->db->insert('service', $data);
    }

    public function deleteService($id){
        $sql = "DELETE FROM service WHERE service_id=$id";
        $query = $this->db->query($sql);
    }

    public function del_inv_setting($id){
        $this->db->where('id', $id);
        $this->db->delete('int_setting');
    }
}
?>