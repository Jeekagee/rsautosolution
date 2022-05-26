
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
              <table class="table table-hover table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <!-- <th>#</th> -->
                    <!-- <th>Date</th> -->
                    <th>Service</th>
                    <th>Mechanic</th>
                    <th>Thinkering</th>
                    <!-- <th>Admin</th> -->
                    <th>Total</th>
                    <th>Comment</th>
                  </tr>
                </thead>
                <tbody>
                        <!-- <td><?php echo $i; ?></td> -->
                        <td><?php echo $total_orderservice_dep+$total_otherservice_dep; ?></td>
                        <td></td>
                        <td><?php echo $total_orderservice_dep+$total_otherservice_dep; ?></td>
                        <td><?php echo $total_orderservice_dep+$total_otherservice_dep; ?></td>
                        <td><?php echo $total_orderservice_dep+$total_otherservice_dep; ?></td>
                        <td></td>
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
  