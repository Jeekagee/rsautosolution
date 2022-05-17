
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3>Purchase</h3>
        <div id="delete_msg"><?php
          if ($this->session->flashdata('delete')) {
            echo $this->session->flashdata('delete');
          }
        ?>
        </div>
            <!-- <div style="margin-bottom: 10px;" >
                <a href="<?php echo base_url(); ?>Purchase/Purchases" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
            </div> -->
        <div class="row mb" style="padding:10px;">
          <!-- page start-->
          <div class="content-panel" >
            <div class="adv-table">
              <table class="table table-hover table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>#</th>
                    <th class="text-center">Receive date</th>
                    <th class="text-center">Supplier</th>
                    <th class="text-center">Location</th>
                    <th class="text-center">Department</th>
                    <th class="text-center">Notes</th>
                    <th class="text-center">Ref No</th>
                    <th class="text-center">Payment method</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $CI =& get_instance();
                
                  $i =1;
                  foreach ($purchases as $purchase){
                        $puritem_id = $purchase->id;
                        //Purchase Table
                        $purchase_data = $CI->Purchase_model->purchase_data($puritem_id);
                        $supplier = $CI->Purchase_model->supplier($purchase_data->supplier);
                    ?>
                      <tr id="pur<?php echo $purchase_data->id; ?>">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $purchase_data->rec_date; ?></td>
                        <td><?php echo $supplier->supplier;  ?></td>
                        <td><?php echo $purchase_data->location; ?></td>
                        <td><?php echo $purchase_data->department; ?></td>
                        <td><?php echo $purchase_data->notes; ?></td>
                        <td><?php echo $purchase_data->ref_no; ?></td>
                        <td><?php echo $purchase_data->method; ?></td>
                        <td class="text-center">
                          <a data-toggle="modal" data-target="#update<?php echo $i; ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                          <?php
                           /* $CI =& get_instance();
                            $bill_available = $CI->Orders_model->bill_status($order_id);
                            if ($bill_available == 1) {
                              ?>
                                <a href="<?php echo base_url(); ?>Orders/confirm_bill/<?php echo $order_id; ?>" class="btn btn-info btn-xs"><i class="fa fa-print"></i></a>
                              <?php
                            }
                            if ($bill_available == 0){
                              ?>
                                <a href="<?php echo base_url(); ?>Orders/Print/<?php echo $order_id; ?>" class="btn btn-warning btn-xs"><i class="fa fa-print"></i></a>
                              <?php
                            }*/
                          ?>
                        </td>
                      </tr>

                      <!-- Modal -->
                      <div id="update<?php echo $i; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Update Department</h4>
                            </div>
                            <div class="modal-body">
                              <form action="<?php echo base_url(); ?>Purchase/update_department" method="POST">
                                <div class="form-group">
                                  <input type="hidden" name="id" class="form-control" value="<?php echo $purchase->id; ?>">
                                </div>
                                <div class="form-group"> 
                                  <label for="">Department</label>
                                    <select class="form-control" name="department_id" id="department_id">
                                      <option value="">Select Department</option>
                                      <?php
                                        $departments = $CI->Purchase_model->departments();
                                          foreach($departments as $dep){
                                          $department = $dep->department;
                                          $id = $dep->department_id;
                                          echo "<option value='$id'>$department</option>";
                                          }
                                      ?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('department_id'); ?></span>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <input type="submit" class="btn btn-success" value="Update">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                            </form>
                          </div>
                        </div>
                      </div>

                    <?php
                    $i++;
                  }
                ?>
                </tbody>
              </table>
            </div>

            
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
  </section>
  