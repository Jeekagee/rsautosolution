
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3>Inventory Report</h3>
                <div align ="right">  
                     <button name="create_excel" id="create_excel" class="btn btn-success">Excel</button>  
                </div>
        <div id="delete_msg"><?php
          if ($this->session->flashdata('delete')) {
            echo $this->session->flashdata('delete');
          }
        ?>
        </div>
            
        <div class="row mb" style="padding:10px;">
          <!-- page start-->
          <div class="content-panel" >
            <div class="adv-table">
              <table class="table table-hover table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>#</th>
                    <th class="text-center">Item Id</th>
                    <th class="text-center">Item Name</th>
                    <th class="text-center">Total Quantity</th>
                    <th class="text-center">Purchase Price</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                 $CI =& get_instance();
                  $i =1;
                  foreach ($inventory as $inv){
                    $item_id=$inv->item_id;
                    $item_name =  $CI->Report_model->item_name($item_id);
                    ?>
                      <tr id="inv<?php echo $inv->id; ?>">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $inv->item_id; ?></td>
                        <td><?php echo $item_name->item_name; ?></td>
                        <td class="text-center"><?php echo $qty = $inv->quantity; ?></td>
                        <td class="text-right"><?php echo $price = $inv->purchase_price; ?>.00</td>
                        <td class="text-center">
                        <a href="<?php echo base_url(); ?>Report/edit/<?php echo $inv->id; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        
                        </td>
                      </tr>
                     
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
  