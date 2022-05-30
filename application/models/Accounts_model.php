<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Accounts_model extends CI_Model 
{

    public function accounts()
    {
        $sql = "SELECT * FROM accounts";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }  

    public function payment_method()
    {
        $sql = "SELECT * FROM payment_method";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }  

    public function insert_accounts($p_date,$transfer,$p_method,$amount,$comment){
        $data = array(
            'p_date' => $p_date,
            'transfer' => $transfer,
            'p_method' => $p_method,
            'amount' => $amount,
            'comment' => $comment
        );
        $this->db->insert('accounts', $data);
    }

    public function show_accounts(){
        $sql = "SELECT a.id, a.p_date, a.transfer, p.method, a.amount, a.comment FROM accounts a LEFT JOIN payment_method p ON a.p_method=p.id";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
      }


                        
}


/* End of file Purchase_model.php and path /application/models/Purchase_model.php */

