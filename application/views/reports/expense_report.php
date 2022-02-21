
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3>Expense Report</h3>
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
                    <th>#</th>
                    <th>Location</th>
                    <th>Payee</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $i =1;
                  foreach ($expense_report as $expense){
                    ?>
                      <tr id="exp<?php echo $expense->id; ?>">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $expense->location; ?></td>
                        <td><?php echo $expense->payee_name; ?></td>
                        <td><?php echo $expense->description; ?></td>
                        <td><?php echo $expense->amount; ?></td>
                        <td class="text-center">
                          <a href="<?php echo base_url(); ?>Report/edit/<?php echo $expense->id; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                          
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
  