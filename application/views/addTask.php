<style>
    #drop_area {
        width: 100%;
        height: 50%;
        border: 3px dashed #aaaaaa;
        border-radius: 10px;
        text-align: center;
        padding: 50px;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Task Management
            <small>Add / Edit Task</small>
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->


                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Task Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addTask" action="<?php echo base_url() ?>addtask/addNewTask" method="post"
                          enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tt">Job Name</label>
                                        <input type="text" class="form-control required"
                                               value="<?php echo set_value('tt'); ?>" id="tt" name="tt" maxlength="128">
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tabout">Job descriptions in detail</label>
                                        <textarea class="form-control required tabout" rows="6"
                                                  name="tabout"><?php echo set_value('tabout'); ?></textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="taid">Assign to</label><br/>
                                        <select id="taid" name="taid[]" multiple="multiple" style="width: 100%;">
                                            <?php foreach ($user_list as $list): ?>
                                                <option value="<?php echo $list->userId; ?>"><?php echo $list->name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tprice">Budget</label><br/>
                                        <input type="number" required name="tprice" id="tprice" placeholder="Task Price..."
                                               class="typeahead tm-input form-control tm-input-info"/>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label for="tdead">Deadline</label><br/>
                                        <input type="text" name="tdead" id="tdead" placeholder="Task Deadline..."
                                                                                       class="typeahead tm-input form-control tm-input-info"/>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="add-img-box">

                                        <button class="btn btn-primary" type="button">
                                            <span>Add Files</span>
                                            <!--<input type="file" name="usefile[]" class="form-control add-img" multiple>-->
                                            <input type="file" name="userfile[]" multiple="multiple">
                                        </button>
                                    </div>


                                </div>

                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit"/>
                            <input type="reset" class="btn btn-default" value="Reset"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php

                $this->load->helper('form');
                $error = $this->session->flashdata('error');
                if ($error) {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('error_msg'); ?>
                    </div>
                <?php } ?>
                <?php
                $success = $this->session->flashdata('success');
                if ($success) {
                    ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('success'); ?>
                        <?php echo $this->session->flashdata('success_img'); ?>
                    </div>
                <?php } ?>

                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<!--<script src="--><?php //echo base_url(); ?><!--assets/js/addTask.js" type="text/javascript"></script>-->

