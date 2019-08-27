<!DOCTYPE html>
<html lang="en">
<head>
    <title>W3industry | E commerce Maintenance Services</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/aset/images/w3logo.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/aset/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/aset/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/aset/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/aset/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/aset/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/aset/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/aset/css/styles.css">
    <link href="<?php echo base_url(); ?>assets/css/mdb.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/css/mdb.lite.css" rel="stylesheet" type="text/css"/>
    <!--===============================================================================================-->
</head>
<body>

<div class="size1 bg0 where1-parent">
    <!-- Coutdown -->
    <div class="flex-c-m bg-img1 size2 where1 overlay1 where2 respon2"
         style="background-image: url('<?php echo base_url(); ?>assets/aset/images/bg01.jpg');">
        <div class="">


        </div>
    </div>
    <style>
        .img {
            margin-top: -40px;
            margin-left: -22px;
            width: 50%;
            border: 10px solid #ffffff;
            border-radius: 50%;
            padding: 11px;

        }

        @media (min-width: 320px) and (max-width: 480px) {
            .img {
                
                width: 65%;
                border-radius: 50%;
                padding: 11px;
            }

        }

    </style>
    <!-- Form -->
    <div class="size3 flex-col-sb flex-w p-l-75 p-r-75 p-t-45 p-b-45 respon1">
        <div class="wrap-pic1">
            <a href="<?php echo base_url() ?>"> <img
                        src="<?php echo base_url(); ?>assets/images/w3logo.png" alt="w3industry"
                        class="img"></a>
        </div>

        <div class="p-t-50 p-b-60">
            <p class="m1-txt1 p-b-36">
                Web applications <span class="m1-txt2">Maintenance Service Providers</span>, Follow us for update!
            </p>
            <?php $this->load->helper('form');
            $error = $this->session->flashdata('error');
            if ($error) {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $error; ?>
                </div>
            <?php }
            $success = $this->session->flashdata('success');
            if ($success) {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $success; ?>
                </div>
            <?php } ?>
            <form class="contact100-form validate-form" method="post"
                  action="<?php echo base_url(); ?>home/subscriptions">
                <div class="wrap-input100 m-b-10 validate-input" data-validate="Name is required">
                    <input class="s2-txt1 placeholder0 input100" type="text" name="name" placeholder="Your Name">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 m-b-20 validate-input" data-validate="Email is required: ex@abc.xyz">
                    <input class="s2-txt1 placeholder0 input100" type="text" name="email" placeholder="Email Address">
                    <span class="focus-input100"></span>
                </div>

                <div class="w-full">
                    <button type="submit" class="flex-c-m s2-txt2 size4 bg1 bor1 hov1 trans-04">
                        Subscribe
                    </button>
                </div>
            </form>

            <p class="s2-txt3 p-t-18">
                And don’t worry, we hate spam too! You can unsubcribe at anytime.
            </p>
        </div>

        <div class="flex-w">
            <a href="https://www.facebook.com/w3industry/" class="flex-c-m size5 bg3 how1 trans-04 m-r-5">
                <i class="fa fa-facebook"></i>
            </a>
            <a href="https://github.com/w3industry" class="flex-c-m size5 bg5 how1 trans-04 m-r-5">
                <i class="fa fa-github"></i>
            </a>
            <a href="https://www.instagram.com/w3industry/" class="flex-c-m size5 bg4 how1 trans-04 m-r-5">
                <i class="fa fa-instagram"></i>
            </a>
            <a href="https://twitter.com/w3_industry" class="flex-c-m size5 bg4 how1 trans-04 m-r-5">
                <i class="fa fa-twitter"></i>
            </a>
            <a href="https://www.youtube.com/channel/UCwOuqA2YfiUVLnBA07PtX5Q?view_as=subscriber"
               class="flex-c-m size5 bg5 how1 trans-04 m-r-5">
                <i class="fa fa-youtube-play"></i>
            </a>
            <a href="mailto:info@w3industry.com"
               class="flex-c-m size5 bg5 how1 trans-04 m-r-5">
                <i class="fa fa-envelope"></i>
            </a>
            <a href="<?php echo base_url() ?>login"
               class="flex-c-m size5 bg5 how1 trans-04 m-r-5">
                <i class="fa fa-sign-in"></i>
            </a>
        </div>

    </div>
</div>


<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>assets/aset/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>assets/aset/vendor/bootstrap/js/popper.js"></script>
<script src="<?php echo base_url(); ?>assets/aset/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>assets/aset/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>assets/aset/vendor/countdowntime/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/aset/vendor/countdowntime/moment-timezone.min.js"></script>
<script src="<?php echo base_url(); ?>assets/aset/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
<script src="<?php echo base_url(); ?>assets/aset/vendor/countdowntime/countdowntime.js"></script>
<script src="<?php echo base_url(); ?>assets/js/mdb.js" type="text/javascript"></script>
<script>
    $('.cd100').countdown100({
        /*Set Endtime here*/
        /*Endtime must be > current time*/
        endtimeYear: 0,
        endtimeMonth: 0,
        endtimeDate: 7,
        endtimeHours: 18,
        endtimeMinutes: 0,
        endtimeSeconds: 0,
        timeZone: ""
        // ex:  timeZone: "America/New_York"
        //go to " http://momentjs.com/timezone/ " to get timezone
    });
</script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>assets/aset/vendor/tilt/tilt.jquery.min.js"></script>
<script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="<?php echo base_url(); ?>assets/aset/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/aset/js/plugin.js"></script>

</body>
</html>