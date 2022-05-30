
<section id="main-content">
    <section class="wrapper">
        <h3> Add Accounts</h3>
        <div class="row mt">
            <div class="col-lg-6" >
                <?php echo form_open('Accounts/insert_accounts'); ?>
                    <div class="form-panel">
                        <h4 class="mb">Accounts</h4>
                        <div class="form-horizontal style-form">
                        <?php
                            $month = date('m');
                            $day = date('d');
                            $year = date('Y');
                            
                            $today = $year . '-' . $month . '-' . $day;
                            ?>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Date</label>
                            <div class="col-sm-8">
                            <input type="date" class="form-control" value="<?php echo $today; ?>" name="p_date">
                            <span class="text-danger"><?php echo form_error('p_date'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Transfer Name</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="transfer" placeholder="Transfer"/>
                            <span class="text-danger"><?php echo form_error('transfer'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Payment Method</label>
                            <div class="col-sm-8">
                            <select name="p_method" id="p_method" class="form-control">
                            <option value="">Select Payment Method</option>
                            <?php
                              foreach ($p_method as $method) {
                                echo "<option value='$method->id'>$method->method</option>";
                              }
                            ?>
                    </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Amount</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="amount">
                                <span class="text-danger"><?php echo form_error('amount'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Comment</label>
                            <div class="col-sm-8">
                            <input type="text"  class="form-control" value="<?php echo set_value('comment'); ?>" name="comment" id="comment">
                                <span class="text-danger"><?php echo form_error('comment'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 ">
                            <input type="submit" class="btn btn-primary pull-right mr-5" value="Save" name="submit">
                            <a style="margin-right: 15px;" href="<?php echo base_url(); ?>Accounts/AddAccounts" class="pull-right btn btn-danger">Cancel</a>
                            </div>

                        </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="content-panel" style="padding:20px 20px 2px 20px;">
            <div class="adv-table">
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Transfer Name</th>
                    <th>Payment Method</th>
                    <th>Amount</th>
                    <th>Comment</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    $i= 1;
                    foreach ($account as $account) {
                        ?>
                            <tr class="text-center" id="account<?php echo $account->id; ?>">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $account->p_date; ?></td>
                                <td><?php echo $account->transfer; ?></td>
                                <td><?php echo $account->method; ?></td>
                                <td><?php echo $account->amount; ?>.00</td>
                                <td><?php echo $account->comment; ?></td>
                                <td>
                                    <!-- <a href="<?php echo base_url(); ?>Accounts/deleteService/<?php echo $account->id; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                    <a href="<?php echo base_url(); ?>Accounts/editService/<?php echo $account->id; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a> -->
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
    </section>
</section>