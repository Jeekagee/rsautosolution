<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
/**
 *
 * Controller Report
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Report extends CI_Controller
{
    
  public function __construct()
  {
      parent::__construct();
        //Load Model
        $this->load->model('Dashboard_model');
        $data['username'] = $this->Dashboard_model->username();
        //Load Model
        $this->load->model('Report_model');
        //Already logged In
        if (!$this->session->has_userdata('user_id')) {
            redirect('/LoginController/logout');
        }
   }

  public function InvReport(){
    $data['page_title'] = 'Inventory Report';
    $data['username'] = $this->Dashboard_model->username();
    $data['pending_count'] = $this->Dashboard_model->pending_count();
    $data['confirm_count'] = $this->Dashboard_model->confirm_count();

    $data['inventory'] = $this->Report_model->inventory();

        $data['nav'] = "Report";
        $data['subnav'] = "AddReport";

    $this->load->view('dashboard/layout/header_items',$data);
    $this->load->view('dashboard/layout/aside_items',$data);
    $this->load->view('reports/inventory_report',$data);
    $this->load->view('reports/footer_view');
  }

  public function delete(){
    $id =  $this->input->post('id');
    $this->Report_model->delete_item($id); //29
  }

  public function edit(){
    $expense_id =  $this->uri->segment('3');
    $data['page_title'] = 'Edit Inventory';
    $data['username'] = $this->Dashboard_model->username();
    $data['pending_count'] = $this->Dashboard_model->pending_count();
    $data['confirm_count'] = $this->Dashboard_model->confirm_count();

    //item_id
    $data['item_id'] = $this->Report_model->item_id(); //16

    $data['item_name'] = $this->Report_model->item_name(); //35
    $data['purchase_id'] = $this->Report_model->purchase_id();

    //Total quantity
    $data['qty'] = $this->Report_model->qty();

    $data['nav'] = "Report";
  $data['subnav'] = "AddReport";

    $this->load->view('dashboard/layout/header',$data);
    $this->load->view('dashboard/layout/aside',$data);
    $this->load->view('reports/inventory_report',$data);
    $this->load->view('reports/footer');
  }
  public function index()
  {
        $data['page_title'] = 'Reports';
        $data['username'] = $this->Dashboard_model->username();
        //$data['orders'] = $this->Orders_model->orders();
        //$data['bill_years'] = $this->Orders_model->get_bill_years();
        

        $data['pending_count'] = $this->Dashboard_model->pending_count();
        $data['confirm_count'] = $this->Dashboard_model->confirm_count();

        $data['nav'] = "Reports";
        $data['subnav'] = "Reports";

        $this->load->view('dashboard/layout/header',$data);
        $this->load->view('dashboard/layout/aside',$data);
        //$this->load->view('aside',$data);
        $this->load->view('reports/index',$data);
        $this->load->view('orders/footer');
  }

  public function Order()
  {
        $data['page_title'] = 'Order - Report';
        $data['username'] = $this->Dashboard_model->username();
        //$data['orders'] = $this->Orders_model->orders();
        //$data['bill_years'] = $this->Orders_model->get_bill_years();
        

        $data['pending_count'] = $this->Dashboard_model->pending_count();
        $data['confirm_count'] = $this->Dashboard_model->confirm_count();

        $data['nav'] = "Reports";
        $data['subnav'] = "Reports";

        $this->load->view('dashboard/layout/header',$data);
        $this->load->view('dashboard/layout/aside',$data);
        //$this->load->view('aside',$data);
        $this->load->view('reports/order_report',$data);
        $this->load->view('orders/footer');
  }

  public function PurchaseSummary(){
    $data['page_title'] = 'Purchase Summary';
    $data['username'] = $this->Dashboard_model->username();
    $data['pending_count'] = $this->Dashboard_model->pending_count();
    $data['confirm_count'] = $this->Dashboard_model->confirm_count();

    $data['purchase_summary'] = $this->Report_model->purchase_summary();

        $data['nav'] = "Report";
        $data['subnav'] = "AddReport";

    $this->load->view('dashboard/layout/header',$data);
    $this->load->view('dashboard/layout/aside',$data);
    $this->load->view('reports/purchase_summary',$data);
    $this->load->view('reports/footer');
  }

  public function ExpenseReport(){
    $data['page_title'] = 'Expense Report';
    $data['username'] = $this->Dashboard_model->username();
    $data['pending_count'] = $this->Dashboard_model->pending_count();
    $data['confirm_count'] = $this->Dashboard_model->confirm_count();

    $data['expense_report'] = $this->Report_model->expense_report();

        $data['nav'] = "Report";
        $data['subnav'] = "AddReport";

    $this->load->view('dashboard/layout/header',$data);
    $this->load->view('dashboard/layout/aside',$data);
    $this->load->view('reports/expense_report',$data);
    $this->load->view('reports/footer');
  }

  public function Finance()
  {
        $data['page_title'] = 'Finance - Report';
        $data['username'] = $this->Dashboard_model->username();
        //$data['orders'] = $this->Orders_model->orders();
        //$data['bill_years'] = $this->Orders_model->get_bill_years();
        

        $data['pending_count'] = $this->Dashboard_model->pending_count();
        $data['confirm_count'] = $this->Dashboard_model->confirm_count();

        $data['nav'] = "Reports";
        $data['subnav'] = "Reports";

        $this->load->view('dashboard/layout/header',$data);
        $this->load->view('dashboard/layout/aside',$data);
        //$this->load->view('aside',$data);
        $this->load->view('reports/finance_report',$data);
        $this->load->view('orders/footer');
  }

}


/* End of file Report.php */
/* Location: ./application/controllers/Report.php */