
<section id="main-content">
    <section class="wrapper">
        <h3> Add Accounts</h3>
        <div class="row mt">
            <div class="col-lg-6" >
                <?php echo form_open('Purchase/insertSupplier'); ?>
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
                            <input type="date" class="form-control" value="" name="supplier" id="supplier">
                            <span class="text-danger"><?php echo form_error('supplier'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Payment Method</label>
                            <div class="col-sm-8">
                            <select class="form-control" name="p_method" id="p_method">
                                <option value="Cash">Cash</option>
                                <option value="Card Swipe">Card</option>
                                <option value="Bank">Bank</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Amount</label>
                            <div class="col-sm-8">
                            <input type="text" value="<?php echo set_value('description'); ?>" class="form-control" name="description" id="description">
                            <span class="text-danger"><?php echo form_error('description'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Comment</label>
                            <div class="col-sm-8">
                            <input type="text" value="<?php echo set_value('description'); ?>" class="form-control" name="description" id="description">
                            <span class="text-danger"><?php echo form_error('description'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 ">
                            <input type="submit" class="btn btn-primary pull-right mr-5" value="Save" name="submit">
                            <a style="margin-right: 15px;" href="<?php echo base_url(); ?>Purchase/AddNew" class="pull-right btn btn-danger">Cancel</a>
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
                    <th>Payment Method</th>
                    <th>Amount</th>
                    <th>Comment</th>
                  </tr>
                </thead>
                <tbody>
               
                </tbody>
              </table>
            </div>
        </div>
    </section>
</section>