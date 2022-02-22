
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3>Purchase Summary</h3>
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
                    <th class="text-center">Item</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Purchase Price</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $CI =& get_instance();
                
                  $i =1;
                  foreach ($purchase_summary as $pur){
                    $item_id=$pur->item_id;
                    $item_name =  $CI->Report_model->item_name($item_id);
                    ?>
                      <tr id="pur<?php echo $pur->id; ?>">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $pur->item_id; ?></td>
                        <td class="text-center"><?php echo $qty = $pur->quantity; ?></td>
                        <td class="text-right"><?php echo $price = $pur->purchase_price; ?>.00</td>
                        <td class="text-right"><?php echo $qty*$price; ?>.00</td>
                        <td class="text-center">
                        <a href="<?php echo base_url(); ?>Report/edit/<?php echo $pur->id; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        
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
  