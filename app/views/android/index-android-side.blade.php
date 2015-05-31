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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
            height: 90%;
        }

        .carousel-inner {
            height: {{$bannerTV->height}};
            width: {{$bannerTV->width}};
        }

        /* Background images are set within the HTML using inline CSS, not here */

        .fill {
            width: 100%;
            height: 200px;
            background-position: center;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }
    </style>

</head>
<?php $layoutNoticia = LayoutNoticiaTV::find(1); ?>
{{--<body style="background-color: {{$layoutNoticia->background_color}};">--}}




<div style="background-color: {{$layoutNoticia->background_color}}; display:<?php if ($layoutNoticia->show_main == 'none' && $layoutNoticia->show_side == 'none') {
    echo 'none';
}else{echo 'block';} ?>; width:105%;" align="right">
    {{--<div class="col-md-3" style="display:{{$layoutNoticia->show_side}}">--}}
    <table class="" style="width:105%">
        <tbody>

        <?php $noticias = Noticia::take(3)->skip(1)->where('position','!=',0)->orderBy('position','asc')->get(); ?>

        @foreach ($noticias as $noticia)
            <?php $midias = MidiaNoticia::where('id_noticia','=',$noticia->id)->get();?>
            @foreach ($midias as $midia)


                <?php
                if ($midia->type == "imagem") {?>
                <tr>

                    <td>
                        <div style="width:100%; height:60px ;background-color: #DCDCDC;/*overflow: hidden;*/
                            display: <?php if($layoutNoticia->show_title_main == 'none' && $layoutNoticia->show_subtitle_main == 'none'){ echo 'none';}else{echo 'block';}?>">
                            <b style="color:{{$layoutNoticia->color_title}};font-size:16px;font-family: 'Droid Sans';padding-top:2px;padding-left: 2px;font-weight: bold;
                                display:{{$layoutNoticia->show_title_main}};">
                                {{$noticia->title}}
                            </b>
                            <b style="color:{{$layoutNoticia->color_subtitle}};font-size:14px;font-family: 'Droid Sans';padding-top:0px;padding-left: 2px;
                                display:{{$layoutNoticia->show_subtitle_main}};">
                                {{$noticia->subtitle}}
                            </b>
                        </div>
                        @if($midia->text != "")
                            <img src="{{$midia->text}}" {{--width="100%"--}} style="height:134px">
                        @else
                            <img src="{{$midia->link}}" {{--width="100%" --}} style="height:134px">
                        @endif
                    </td>
                </tr>
                <?php }if ($midia->type == "video") {?>

                <?php $video = explode("=", $midia->link) ?>
                <tr>
                    <td>
                        <div style="width:100%; height:50px ;background-color: #DCDCDC; padding-top: 5px; /*overflow: hidden;*/
                            display: <?php if($layoutNoticia->show_title_main == 'none' && $layoutNoticia->show_subtitle_main == 'none'){ echo 'none';}else{echo 'block';}?>">
                            <p style="color:{{$layoutNoticia->color_title}}; font-size:18px;font-family: 'Droid Sans';padding-top:2px;padding-left: 2px;font-weight: bold;
                                display:{{$layoutNoticia->show_title_main}};">
                                {{$noticia->title}}
                            </p>
                            <p style="color:{{$layoutNoticia->color_subtitle}}; font-size:15px;font-family: 'Droid Sans';padding-top:0px;padding-left: 2px;
                                display:{{$layoutNoticia->show_subtitle_main}};">
                                {{$noticia->subtitle}}
                            </p>
                        </div>

                        @if ($midia->type_video == "YouTube")
                            <?php $video = explode("=", $midia->link) ?>
                            <iframe width="100%" height="117px" src="https://www.youtube.com/embed/{{$video[1]}}?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=0&amp;loop=0&amp;end=1&amp;" frameborder="0" allowfullscreen>
                            </iframe>
                        @else
                            <video width="100%" height="117px" controls="true">
                                <source src="{{$midia->link}}" type="video/mp4">
                                <source src="{{$midia->link}}" type="video/webm">
                                <source src="{{$midia->link}}" type="video/ogg"
                            </video>
                        @endif

                    </td>
                </tr>
                <?php }if ($midia->type == "texto") {?>
                <?php $texto = str_replace("\"", "\'", $midia->text) ?>
                <tr>

                    <td>
                        <div style="width:100%; height:50px ;background-color: #DCDCDC; padding-top: 5px; /*overflow: hidden;*/
                            display: <?php if($layoutNoticia->show_title_main == 'none' && $layoutNoticia->show_subtitle_main == 'none'){ echo 'none';}else{echo 'block';}?>">
                            <p style="color:{{$layoutNoticia->color_title}};font-size:18px;font-family: 'Droid Sans';padding-top:2px;padding-left: 2px;font-weight: bold;
                                display:{{$layoutNoticia->show_title_main}};">
                                {{$noticia->title}}
                            </p>
                            <p style="color:{{$layoutNoticia->color_subtitle}};font-size:15px;font-family: 'Droid Sans';padding-top:0px;padding-left: 2px;
                                display:{{$layoutNoticia->show_subtitle_main}};">
                                {{$noticia->subtitle}}
                            </p>
                        </div>

                        <div style="width: 100%; height:117px; overflow: hidden;background-color: #F0F8FF;">
                            <p>{{$midia->text}}</p>
                        </div>

                    </td>
                </tr>
                <?php } ?>

            @endforeach
        @endforeach
        </tbody>
    </table>
    {{--</div>--}}
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
{{--</body>--}}
</html>
