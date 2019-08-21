

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>W3Industry</b> Admin System | Version 1.5
        </div>
        <strong>Copyright &copy; 2018-2020 <a href="<?php echo base_url(); ?>">W3Industry</a>.</strong> All rights reserved.
    </footer>

    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js" type="text/javascript"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js" type="text/javascript"></script> -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/mdb.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/w3commonapp.js" type="text/javascript"></script>

<!--    <script src="--><?php //echo base_url(); ?><!--assets/js/addTask.js" type="text/javascript"></script>-->
    <script type="text/javascript">
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');

        //$(document).ready(function() {
        //    var tagApi = $("#taid").val();
        //
        //    $( "#taid" ).keypress(function() {
        //        console.log( "Handler for .keypress() called." );
        //        var tagApi = $("#taid").val();
        //        // console.log(tagApi);
        //
        //        $.get('<?php //echo base_url(); ?>//user/usertag', { option: tagApi }, function(data) {
        //
        //
        //            console.log('hiii');
        //        });
        //
        //
        //    });
        //
        //});


    </script>
  </body>
</html>