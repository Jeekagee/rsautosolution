<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Report_model extends CI_Model 
{
    public function inventory(){
        $sql = "SELECT id, item_id, purchase_id, SUM(qty) as totalqty FROM int_qty WHERE item_id  IN (SELECT item_id FROM int_items) GROUP BY item_id";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }

    function fetch_data()
    {
    $this->db->order_by("item_id", "DESC");
    $query = $this->db->get("int_qty");
    return $query->result();
    }

    public function purchase_summary(){
        $sql = "SELECT id, purchase_id, item_id, purchase_price, quantity, selling_price, created_at FROM purchase_items WHERE created_at >= CURRENT_DATE() ORDER BY item_id DESC";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }
    
      public function purchase_data($pur_id){
        $sql = "SELECT id, rec_date, ref_no, supplier FROM purchase WHERE id = $pur_id";
        $query = $this->db->query($sql);
        $row = $query->first_row();

        return $row;
    
    }
    
    public function customer()
    {
        $sql = "SELECT * FROM customer";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }  
    
    public function suppiler()
    {
        $sql = "SELECT * FROM supplier";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }  

    // public function total_expense(){
    //     $sql = "SELECT amount FROM expense  WHERE created >= CURRENT_DATE()";
    //     $query = $this->db->query($sql);
    //     $result = $query->result();
    //     $count = $query->num_rows();

    //     $total = 0;

    //     if ($count > 0) {
    //         foreach ($result as $amt) {
    //             $total = $total+$amt->amount;
    //         }
    //     }

    //     return $total;
    // }

    public function total_expense($from_date,$to_date){
        
        //$from_date = '2022-04-06';
        // $date = new DateTime($from_date);
        // $from_date=$date->format('Y-m-d'); // 31-07-2012
        // die();
        // $from_date = '2022-04-06';
        $newDate = date("d-m-Y", strtotime($from_date));
        if ($from_date==null && $to_date==null) {
            $sql = "SELECT amount, ex_date FROM expense  WHERE created >= CURRENT_DATE()";
        }
        elseif($from_date!=null && $to_date==null) {
          $sql = "SELECT amount, created FROM expense  WHERE created = '$newDate'";
        //   die();
        }
        elseif($from_date!=null && $to_date!=null){
            $sql = "SELECT amount, created FROM expense  WHERE created BETWEEN  '$from_date' AND '$to_date'";
        }

       
        $query = $this->db->query($sql);
        //die($this->db->last_query($query));
        //exit();
        $result = $query->result();
        $count = $query->num_rows();

        $total = 0;

        if ($count > 0) {
            foreach ($result as $amt) {
                $total = $total+$amt->amount;
            }
        }
        return $total;
    }
    // WHERE OrderDate BETWEEN '1996-07-01' AND '1996-07-31';
    // public function total_sales($from_date,$to_date){
        
    //     // $sql = "SELECT total, created FROM bill_item  WHERE created >= CURRENT_DATE()";
    //     // $query = $this->db->query($sql);
    //     // $result = $query->result();
    //     // $count = $query->num_rows();

    //     $newDate = date("d-m-Y", strtotime($from_date));
    //     if ($from_date==null && $to_date==null) {
    //         $sql = "SELECT total, created FROM orders  WHERE created >= CURRENT_DATE()";
    //     }
    //     elseif($from_date!=null && $to_date==null) {
    //       $sql = "SELECT total, created FROM orders  WHERE created = '$newDate'";
    //     //   die();
    //     }
    //     elseif($from_date!=null && $to_date!=null){
    //         $sql = "SELECT total, created FROM orders  WHERE created BETWEEN  '$from_date' AND '$to_date'";
    //     }

    //     $query = $this->db->query($sql);
    //     $result = $query->result();
    //     $count = $query->num_rows();
    //     $total = 0;

    //     if ($count > 0) {
    //         foreach ($result as $amt) {
    //             $total = $total+$amt->total;
    //         }
    //     }

    //     return $total;
    // }
    
    public function total_service_income($from_date,$to_date){
        // $sql = "SELECT amount FROM order_service WHERE created >= CURRENT_DATE()";
        // $query = $this->db->query($sql);
        // $result = $query->result();
        // $count = $query->num_rows();
        
        $newDate = date("d-m-Y", strtotime($from_date));
        if ($from_date==null && $to_date==null) {
            $sql = "SELECT amount, created FROM order_service WHERE created >= CURRENT_DATE()";
        }
        elseif($from_date!=null && $to_date==null) {
          $sql = "SELECT amount, created FROM order_service  WHERE created = '$newDate'";
        //   die();
        }
        elseif($from_date!=null && $to_date!=null){
            $sql = "SELECT amount, created FROM order_service  WHERE created BETWEEN  '$from_date' AND '$to_date'";
        }
        
        $query = $this->db->query($sql);
        //die($this->db->last_query($query));
        //exit();
        $result = $query->result();
        $count = $query->num_rows();
    
        $total = 0;

        if ($count > 0) {
            foreach ($result as $amt) {
                $total = $total+$amt->amount;
            }
        }

        return $total;
    }

    public function total_item_income($from_date,$to_date){
        // $sql = "SELECT amount FROM order_item WHERE created >= CURRENT_DATE()";
        // $query = $this->db->query($sql);
        // $result = $query->result();
        // $count = $query->num_rows();
        
        $newDate = date("d-m-Y", strtotime($from_date));
        if ($from_date==null && $to_date==null) {
            $sql = "SELECT amount, created FROM order_item WHERE created >= CURRENT_DATE()";
        }
        elseif($from_date!=null && $to_date==null) {
          $sql = "SELECT amount, created FROM order_item  WHERE created = '$newDate'";
        //   die();
        }
        elseif($from_date!=null && $to_date!=null){
            $sql = "SELECT amount, created FROM order_item  WHERE created BETWEEN  '$from_date' AND '$to_date'";
        }
        
        $query = $this->db->query($sql);
        //die($this->db->last_query($query));
        //exit();
        $result = $query->result();
        $count = $query->num_rows();
        
        $total = 0;

        if ($count > 0) {
            foreach ($result as $amt) {
                $total = $total+$amt->amount;
            }
        }

        return $total;
    }

    public function total_cog($from_date,$to_date){
        // $sql = "SELECT purchase_price, created_at FROM purchase_items WHERE created_at >= CURRENT_DATE()";
        // $query = $this->db->query($sql);
        // $result = $query->result();
        // $count = $query->num_rows();

        $newDate = date("d-m-Y", strtotime($from_date));
        if ($from_date==null && $to_date==null) {
            $sql = "SELECT purchase_price, created_at FROM purchase_items  WHERE created_at >= CURRENT_DATE()";
        }
        elseif($from_date!=null && $to_date==null) {
          $sql = "SELECT purchase_price, created_at FROM purchase_items  WHERE created_at = '$newDate'";
        //   die();
        }
        elseif($from_date!=null && $to_date!=null){
            $sql = "SELECT purchase_price, created_at FROM purchase_items  WHERE created_at BETWEEN  '$from_date' AND '$to_date'";
        }

        $query = $this->db->query($sql);
        $result = $query->result();
        $count = $query->num_rows();

        $total = 0;

        if ($count > 0) {
            foreach ($result as $amt) {
                $total = $total+$amt->purchase_price;
            }
        }

        return $total;
    }

    public function orders(){
        $sql = "SELECT * FROM bill_item";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    
    public function expense_report(){
        $sql = "SELECT id, ex_date, location, payee_name, description, method, amount FROM expense ORDER BY payee_name DESC";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }
    
    public function customer_report(){
        $sql = "SELECT customer_id, fname, email, mobile FROM customer";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }

    public function data_transfer(){
        $sql = "SELECT id, item_id, quantity FROM purchase_items";
        $query = $this->db->query($sql);
        //$result = $query->num_rows();
        $result = $query->result();
        foreach ($result as $i) {
            $data = array(
                'purchase_id' => $i->id,
                'item_id' => $i->item_id,
                'qty' => $i->quantity,
            );
    
            $this->db->insert('int_qty', $data);
            # code...
        }
    }

    public function item_name($item_id){
        $sql = "SELECT item_name FROM int_items WHERE item_id='$item_id'";
        $query = $this->db->query($sql);
        return $row = $query->first_row();
    }
    
    public function delete_inventory($id)
    {
        $sql = "DELETE FROM purchase_items WHERE id=$id";
        $query = $this->db->query($sql);
    }

    public function edit_inventory($id)
    {
        $sql = "SELECT * FROM purchase_items WHERE id=$id";
        $query = $this->db->query($sql);
        $row = $query->first_row();
        return $row;
    }

    public function total_qty(){
        $sql = "SELECT COUNT(item_id), item_name * FROM int_aty GROUP BY qty ORDER BY(item_id) DESC";
        $query = $this->db->query($sql);
        $result = $query->result();
        
        return $result;
    } 

    // public function date_filter($from_date,$to_date){
    //     $this->db->select("amount");
    //     $this->db->from('bill_items');
    //     $this->db->where("DATE_FORMAT(date,'%Y-%m-%d') >='$from_date'");
    //     $this->db->where("DATE_FORMAT(date,'%Y-%m-%d') <='$to_date'");
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    
    public function date_filter($from_date, $to_date){
        $sql = "SELECT total, created FROM bill_item  WHERE created >= '$from_date' to created <= '$to_date'";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }


    function filterData(&$str){ 
        $str = preg_replace("/\t/", "\\t", $str); 
        $str = preg_replace("/\r?\n/", "\\n", $str); 
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
    }                  
}

/* End of file Report_model.php and path /application/models/Report_model.php */

