<?php 
include 'server/api.php';  
include 'pages/assets.php';

$setting = getAllSettings();
$res = mysqli_fetch_assoc($setting);

$header = $res['header_image'];
$header_src = "server/uploads/settings/".$header;

$subheader = $res['sub_image'];
$subheader_src = "server/uploads/settings/".$subheader;

$about = $res['about_image'];
$about_src = "server/uploads/settings/".$about;

$header_rotate_image = $res['header_rotate_image'];
$header_rotate_image_src = "server/uploads/settings/".$header_rotate_image;

?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="image/favicon.png" type="image/png">
    <title>Rawana Hotel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="vendors/linericon/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>