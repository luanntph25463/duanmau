<?php
    if(isset($_GET['action']) && $_GET['action'] == 'logout'){
        session_destroy();
        header("Refresh:0; url=index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- link css -->
    <link rel="stylesheet" href="public/layout/css/index.css">
    <link rel="stylesheet" href="public/layout/css/giohang.css">
    <link rel="stylesheet" href="public/layout/css/style.css">
    <script src="public/layout/js/style.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/89aa971fd4.js" crossorigin="anonymous"></script>
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
        $("select").click(function() {
            var open = $(this).data("isopen");
            if(open) {
              window.location.href = $(this).val()
            }
            //set isopen to opposite so next time when use clicked select box
            //it wont trigger this event
            $(this).data("isopen", !open);
          });
    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="public/layout/css/chitiet.css">
<link rel="stylesheet" href="public/layout/css/danhgia.css">
    <link rel="stylesheet" href="public/layout/css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="public/layout/css/style-responsive.css">
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="public/layout/css/font.css">
    <link href="public/layout/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="public/layout/css/morris.css" type="text/css" />
    <!-- calendar -->
    <link rel="stylesheet" href="public/layout/css/monthly.css">
    <link rel="stylesheet" href="public/layout/css/user.css">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <link href="public/layout/css/login.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="public/layout/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/layout/css/animate.min.css">
    <link rel="stylesheet" href="public/layout/css/magnific-popup.css">
    <link rel="stylesheet" href="public/layout/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="public/layout/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="public/layout/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="public/layout/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="public/layout/css/jquery-ui.min.css">
    <link rel="stylesheet" href="public/layout/css/nice-select.css">
    <link rel="stylesheet" href="public/layout/css/jarallax.css">
    <link rel="stylesheet" href="public/layout/css/flaticon.css">
    <link rel="stylesheet" href="public/layout/css/slick.css">
    <link rel="stylesheet" href="public/layout/css/default.css">
    <link rel="stylesheet" href="public/layout/css/style.css">
    <link rel="stylesheet" href="public/layout/css/responsive.css">
</head>
