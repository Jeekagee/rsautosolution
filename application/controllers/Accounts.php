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

        $data['accounts'] = $this->Accounts_model->accounts(); 
        $data['p_method'] = $this->Accounts_model->payment_method();
        $data['account'] = $this->Accounts_model->show_accounts(); 

        $data['nav'] = "Accounts";
        $data['subnav'] = "Add Accounts";
        
        $this->load->view('dashboard/layout/header',$data);
        $this->load->view('dashboard/layout/aside',$data);
        $this->load->view('accounts/add_accounts',$data);
        //$this->load->view('footer');
        $this->load->view('accounts/footer');
    }

  public function insert_accounts(){

    $this->form_validation->set_rules('p_date', 'Date', 'required');
    $this->form_validation->set_rules('transfer', 'Transfer', 'required');
    $this->form_validation->set_rules('p_method', 'Payment Method', 'required');
    $this->form_validation->set_rules('amount', 'Amount', 'required');
    // $this->form_validation->set_rules('amount', 'Amount', 'required');

    if ($this->form_validation->run() == FALSE){
        $this->AddAccounts();
    }
    else{
        $p_date = $this->input->post('p_date');
        $transfer = $this->input->post('transfer');
        $p_method = $this->input->post('p_method');
        $amount = $this->input->post('amount');
        $comment = $this->input->post('comment');
        $this->Accounts_model->insert_accounts($p_date,$transfer,$p_method,$amount,$comment);
        $this->session->set_flashdata('msg', '<div style="font-size:13px;" class="alert alert-success">Added Successfully</div>');
        redirect('Accounts/AddAccounts');
    }
  }

}




/* End of file Accounts.php */
/* Location: ./application/controllers/Accounts.php */