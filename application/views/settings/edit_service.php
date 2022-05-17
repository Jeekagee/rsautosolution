<?php $CI =& get_instance(); ?>
    <section id="main-content">
      <section class="wrapper">
        <h3>Edit Service</h3>
        
        <div class="row mb">
            <div class="col-lg-5">
                <?php echo form_open('Settings/updateService'); ?>
                <div class="form-panel">
                        <h4 class="mb">Edit Service</h4>
                        <div id="delete_msg">
                        <?php
                            if ($this->session->flashdata('msg')) {
                            echo $this->session->flashdata('msg');
                            }
                        ?>
                        </div>
                        <div class="form-horizontal style-form">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Service<span style="color: red;"> *</span></label>
                                <div class="col-sm-8">
                                <input value="<?php echo $services->service; ?>" id="service" type="text" name ="service" class="form-control" placeholder="">
                                <span class="text-danger"><?php echo form_error('service'); ?></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Department<span style="color: red;"> *</span></label>
                                    <div class="col-sm-8">
                                <!-- <div class="col-md-3" style="padding: 0px 8px;"> -->
                                    <select class="form-control" name="department" id="department">
                                        <option value="">Select Department</option>
                                        <?php
                                            foreach($departments as $dep){
                                            $department = $dep->department;
                                            $id = $dep->department_id;
                                            echo "<option value='$id'>$department</option>";
                                            }
                                        ?>
                                    </select>
                                    <span class="text-danger" id="service_error"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Amount<span style="color: red;"> *</span></label>
                                <div class="col-sm-8">
                                <input value="<?php echo $services->amount; ?>" id="amount" type="text" name ="amount" class="form-control" placeholder="Amount"/>
                                <span class="text-danger"><?php echo form_error('amount'); ?></span>
                                </div>
                            </div>
                            <input type="text" value="<?php echo $services->service_id; ?>" name="serviceid" hidden>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <input type="submit" class="btn btn-block btn-success" value="Update">
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>