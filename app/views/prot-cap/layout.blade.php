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

    <!-- start: CSS -->
    <link href="packages/assets/gotya/css/bootstrap.css" rel="stylesheet">
    <link href="packages/assets/gotya/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="packages/assets/gotya/css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">


	{{-- Start core--}}
	<!-- BEGIN PLUGIN CSS -->
<link href="packages/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="packages/assets/plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
<link href="packages/assets/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css"/>
<link href="packages/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="packages/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<link href="packages/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
<link href="packages/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="packages/assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="packages/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="packages/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>

<!-- END PLUGIN CSS -->

<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="packages/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->

<!-- BEGIN CSS TEMPLATE -->
<link href="packages/assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="packages/assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->

	<!-- end: CSS -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script src="packages/assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>

     <?php $menu = MenuSuperior::find(1); ?>
    <style type="text/css">
	    header {
			background: transparent url({{$menu->menu_color}}) repeat 0% 0%;
			border-bottom: 5px solid #f6f6f6;
		}

		.navbar .nav > li > a:focus,
		.navbar .nav > li > a:hover {
			border-top:0px solid {{$menu->menu_selected_color}};
		  	background: {{$menu->menu_selected_color}} !important;		
		  	color: #fff;
		}

        .navbar .nav > li > a {
            color: {{$menu->menu_font_color}};
        }
		/**/
    </style>

    @yield('head')

</head>
<body>	

	@yield('content')



	<!-- start: Copyright -->
	<div id="copyright">	
		<!-- start: Container -->
		<div class="container">		
			<p>
				&copy; 2015 PROT-CAP. Todos os direitos reservados
			</p>	
		</div>
		<!-- end: Container  -->
	</div>	
	<!-- end: Copyright -->
<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="packages/assets/gotya/js/jquery-1.8.2.js"></script>
<script src="packages/assets/gotya/js/bootstrap.js"></script>
<script src="packages/assets/gotya/js/flexslider.js"></script>
<script src="packages/assets/gotya/js/carousel.js"></script>
<script src="packages/assets/gotya/js/jquery.cslider.js"></script>
<script src="packages/assets/gotya/js/slider.js"></script>
<script def src="packages/assets/gotya/js/custom.js"></script>


<!-- BEGIN CORE JS FRAMEWORK-->

<script src="packages/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="packages/assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="packages/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>

<!-- END CORE JS FRAMEWORK -->
<script src="packages/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="packages/assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
<script src="packages/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="packages/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="packages/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="packages/assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
<script src="packages/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="packages/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="packages/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
<script src="packages/assets/plugins/jquery-inputmask/jquery.inputmask.min.js" type="text/javascript"></script>
<script src="packages/assets/plugins/jquery-autonumeric/autoNumeric.js" type="text/javascript"></script>
<script src="packages/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="packages/assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js" type="text/javascript"></script>
<script src="packages/assets/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
<script src="packages/assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript" ></script>
<script src="packages/assets/plugins/jquery-datatable/extra/js/TableTools.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="packages/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="packages/assets/plugins/datatables-responsive/js/lodash.min.js"></script>
<script src="packages/assets/js/datatables.js" type="text/javascript"></script>

<!-- END PAGE LEVEL PLUGINS -->



<!-- END PAGE LEVEL PLUGINS -->
<!-- end: Java Script -->

</body>
</html>