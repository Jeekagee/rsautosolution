
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3>Sales Report</h3>
        <div id="delete_msg"><?php
          if ($this->session->flashdata('success')) {
            echo $this->session->flashdata('success');
          }
        ?>
        </div>
        <div class="row mb" style="padding:10px;">
          <!-- page start-->
          <div class="content-panel" >
            <div class="adv-table">
              <table class="table table-bordered table-striped table-hover">
                <thead class="text-center" style="font-size:16px; font-weight:900;">
                    <tr>
                      <td class="text-center" rowspan="2">Date</td>
                      <td class="text-center" colspan="4">Department</td>
                      <td class="text-center" rowspan="2">Total</td>
                    </tr>
                    <tr>
                      <td>Service</td>
                      <td>Mechanic</td>
                      <td>Painting</td>
                      <td>Admin</td>
                    </tr>
                  
                </thead>
                <tbody>
                <?php
                  $CI =& get_instance();
                  // for each day in the month
                  $sub_total = 0;
                  for($i = 1; $i <=  date('t'); $i++)
                  {
                    // add the date to the dates array
                    $date = date('Y') . "-" . date('m') . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
                    ?>
                    <tr>
                      <td><?php echo $date; ?></td>
                      <td class="text-right">
                        <?php  echo $ser_t = $CI->Report_model->service_dep_total($date,1); //Service ?>.00
                      </td>
                      <td class="text-right">
                        <?php  echo $mecha_t = $CI->Report_model->service_dep_total($date,3); //Mechanical ?>.00
                      </td>
                      <td class="text-right">
                        <?php  echo $pain_t = $CI->Report_model->service_dep_total($date,6)+$CI->Report_model->service_dep_total($date,5); //Painting ?>.00
                      </td>
                      <td class="text-right">
                        <?php  echo $admin_t = $CI->Report_model->service_dep_total($date,7); //Admin ?>.00
                      </td>
                      <td class="text-right">
                        <?php echo $total = $ser_t+$pain_t+$mecha_t+$admin_t; ?>.00
                      </td>
                    </tr>

                    <?php
                    $sub_total = $sub_total+$total;
                  }
                ?>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="text-right"><?php echo $sub_total; ?>.00</td>
                </tr>
                
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
  