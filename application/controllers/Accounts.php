<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accounts extends CI_Controller
{
    
  public function __construct()
  {
      parent::__construct();
      //Load Model
      $this->load->model('Dashboard_model');
      $data['username'] = $this->Dashboard_model->username();
      //Load Model
      $this->load->model('Accounts_model');
    //   $this->load->model('Orders_model');
      //Already logged In
      if (!$this->session->has_userdata('user_id')) {
          redirect('/LoginController/logout');
      }
  }
  
  public function AddAccounts()
    {
        $data['page_title'] = 'Add Accounts';
        //Logged User
        $data['username'] = $this->Dashboard_model->username();

        $data['pending_count'] = $this->Dashboard_model->pending_count();
        $data['confirm_count'] = $this->Dashboard_model->confirm_count();
        // $data['location'] = $this->Purchase_model->locations(); 

        $data['nav'] = "Accounts";
        $data['subnav'] = "Add Accounts";
        
        $this->load->view('dashboard/layout/header',$data);
        $this->load->view('dashboard/layout/aside',$data);
        $this->load->view('accounts/add_accounts',$data);
        //$this->load->view('footer');
        $this->load->view('accounts/footer');
    }

    public function insertSupplier(){
      $this->form_validation->set_rules('id', 'Supplier ID', 'required|is_unique[supplier.id]');
      $this->form_validation->set_rules('supplier', 'Supplier Name', 'required');
      //$this->form_validation->set_rules('location_id', 'Supplier Location', 'required');
      
      if ($this->form_validation->run() == FALSE){
          $this->AddSupplier();
      }
      else{
          $id = $this->input->post('id');
          $name = $this->input->post('supplier');
          //$loc = $this->input->post('location_id');

          $this->Purchase_model->insert_supplier($id,$name);

          //Flash Msg
          $this->session->set_flashdata('delete',"<div class='alert alert-success'> New Employee has been assigned!</div>");
          
          // Redirect to Add Purchase
          redirect('/Purchase/AddNew');
      }
  }


}


/* End of file Accounts.php */
/* Location: ./application/controllers/Accounts.php */