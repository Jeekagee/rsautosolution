<?php
defined('BASEPATH') or exit('No direct script access allowed');


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
  // public function datatransfer()
  // {
  //   $this->Report_model->data_transfer();
  // }

 function action()
 {
  $this->load->model("Report_model");
  $this->load->library("excel");
  $object = new PHPExcel();

  $object->setActiveSheetIndex(0);

  $table_columns = array("Item Id", "Item Name", "Total Quantity");

  $column = 0;

  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }

  $inventory = $this->Report_model->fetch_data();

  $excel_row = 2;

  foreach($inventory as $row)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->item_id);
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->item_name);
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->qty);
   $excel_row++;
  }

  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="Employee Data.xls"');
  $object_writer->save('php://output');
 } 


  public function InvReport(){
    $data['page_title'] = 'Inventory Report';
    $data['username'] = $this->Dashboard_model->username();
    $data['pending_count'] = $this->Dashboard_model->pending_count();
    $data['confirm_count'] = $this->Dashboard_model->confirm_count();

    $data['inventory'] = $this->Report_model->inventory();

        $data['nav'] = "Report";
        $data['subnav'] = "AddReport";

    $this->load->view('dashboard/layout/header',$data);
    $this->load->view('dashboard/layout/aside',$data);
    $this->load->view('reports/inventory_report',$data);
    $this->load->view('reports/footer');
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

    //Total Expenses for this month
    $data['item_id'] = $this->Report_model->item_id(); //16

    //Expense data
    $data['item_name'] = $this->Report_model->item_name(); //35

    //Item Catogiries
    $data['qty'] = $this->Report_model->item_catogories();

    $data['nav'] = "Expense";
  $data['subnav'] = "Expenses";

    $this->load->view('dashboard/layout/header',$data);
    $this->load->view('dashboard/layout/aside',$data);
    $this->load->view('expense/edit-expense',$data);
    $this->load->view('expense/footer',$data);
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