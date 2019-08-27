<?php
/**
 * Created by PhpStorm.
 * User: DEBASISH MONDAL
 * Date: 18-Aug-19
 * Time: 12:05 PM
 */

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-tasks"></i> Task Management
            <small>Add, Edit, Delete</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>Addtask"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <style>
            .mdc-text-field__input {
                display: flex;
                padding: 12px 16px 14px;
                border: none !important;
                background-color: transparent;
                z-index: 1;
            }
        </style>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Task List</h3>
                        <div class="box-tools">
                            <form action="<?php echo base_url() ?>alltask/taskListing" method="POST" id="searchList">
                                <div class="input-group">
                                    <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="mdc-text-field__input pull-right" style="width: 150px;" placeholder="Search terms"/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Task ID</th>
                                <th>Task Name</th>
                                <th>Created By</th>
                                <th>Budget($$)</th>
                                <th>Deadline</th>
                                <th>Created On</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            <?php
                            if(!empty($taskRecords))
                            {
//                                var_dump($taskRecords);
                                foreach($taskRecords as $record)

                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $record->tid ;?></td>
                                        <td><?php echo $record->tt; ?></td>
                                        <td><?php echo $record->name; ?></td>
                                        <td><?php echo $record->tprice; ?></td>
                                        <td><?php echo date("d-m-Y", strtotime($record->tdead)); ?></td>
                                        <td><?php echo date("d-m-Y", strtotime($record->tcd)); ?></td>
                                        <td class="text-center">

                                            <a class="btn btn-sm btn-primary" href="<?= base_url().'viewtask/'.$record->tid; ?>" title="Login history"><i class="fa fa-history"></i></a> |
                                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'edittask/'.$record->tid; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-sm btn-danger deleteUser" href="#" data-userid="<?php echo $record->tid; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<!-- Button trigger modal -->

<!--                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicExampleModal">-->
<!--                                                View-->
<!--                                            </button>-->
<!-- Modal -->
<!--<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"-->
<!--     aria-hidden="true">-->
<!--    <div class="modal-dialog" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                ...-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                <button type="button" class="btn btn-primary">Save changes</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();
            var link = jQuery(this).get(0).href;
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "taskListing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
