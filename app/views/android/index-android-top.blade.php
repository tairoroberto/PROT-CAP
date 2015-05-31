<!DOCTYPE html>
<html lang="en">
<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>PROT-CAP | Intranet</title>
    <meta name="description" content="GotYa Free Bootstrap Theme"/>
    <meta name="keywords" content="Template, Theme, web, html5, css3, Bootstrap" />
    <meta name="author" content="Łukasz Holeczek from creativeLabs"/>
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=">
    <!-- end: Mobile Specific -->

    <!-- start: Facebook Open Graph -->
    <meta property="og:title" content=""/>
    <meta property="og:description" content=""/>
    <meta property="og:type" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:image" content=""/>
    <!-- end: Facebook Open Graph -->

    {{--Tine of reload--}}
    <meta http-equiv="refresh" content="1800">

    <!-- start: CSS -->
    <link href="packages/assets/gotya/css/bootstrap.css" rel="stylesheet">
    <link href="packages/assets/gotya/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="packages/assets/gotya/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">

    <link href="packages/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="packages/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
    {{--Slider--}}

    <link href="packages/assets/slider/css/full-slider-tv.css" rel="stylesheet">

    <!-- end: CSS -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php $bannerTV = BannerTV::find(1); ?>

    <style type="text/css">
        /*caroussel*/
        .carousel,
        .item,
        .active {
           /* height: 90%;*/
        }

        .carousel-inner {
            /*height: 100%;*/
            width: {{$bannerTV->width}};
        }

        .da-slider-1{
            width: 100%;
            height: 100%;
            margin: 0 auto;
            overflow: hidden;
            /*	background: transparent url(../../image/verde_gradiente.png) repeat 0% 0%; ../../image/495956f-wng.jpg ../img/slider.jpg*/
            /*border-bottom: 5px solid #f6f6f6 !important;*/
            /*-webkit-box-shadow: inset 0px 0px 5px rgba(0,0,0,.25);
            -moz-box-shadow: inset 0px 0px 5px rgba(0,0,0,.25);*/
            /*box-shadow: inset 0px 0px 5px rgba(0,0,0,.25);*/
            -webkit-transition: background-position 1.4s ease-in-out 0.3s;
            -moz-transition: background-position 1.4s ease-in-out 0.3s;
            -o-transition: background-position 1.4s ease-in-out 0.3s;
            -ms-transition: background-position 1.4s ease-in-out 0.3s;
            transition: background-position 1.4s ease-in-out 0.3s;
        }

    </style>

</head>
<body  style="background-color:{{$bannerTV->color_background}};">



<div class="da-slider-1" style="background-color:{{$bannerTV->color_background}};">
    <!--start: Wrapper-->
            <div id="myCarousel" class="carousel slide">
                <!-- Indicators -->
                <!-- Wrapper for Slides -->
                <div class="carousel-inner" >
                    <?php $imagesTV = ImageBannerTV::where('id_banner_tv','=',$bannerTV->id)
                                                   ->where('position', '!=', 0)
                                                   ->orderBy('position')->get();
                    $cont = 0;?>
                    @foreach ($imagesTV as $imageTV)
                        <img class="item <?php if($cont == 0 ){echo "active";} ?>" src="{{$imageTV->image_path}}" width="100%" >
                        <?php $cont++; ?>
                    @endforeach
                </div>
            </div>
</div>


<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="packages/assets/gotya/js/jquery-1.8.2.js"></script>
<script src="packages/assets/gotya/js/bootstrap.js"></script>
<script src="packages/assets/gotya/js/carousel.js"></script>
<script src="packages/assets/gotya/js/jquery.cslider.js"></script>
<script src="packages/assets/gotya/js/slider.js"></script>
<!-- end: Java Script -->
<script src="packages/assets/slider/js/jquery.js"></script>
<script src="packages/assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript" ></script>
<script src="packages/assets/plugins/jquery-datatable/extra/js/TableTools.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="packages/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="packages/assets/plugins/datatables-responsive/js/lodash.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="packages/assets/slider/js/bootstrap.min.js"></script>
<script>
    $('.carousel').carousel({
        interval: {{$bannerTV->time}} //changes the speed
    })
</script>
</body>
</html>