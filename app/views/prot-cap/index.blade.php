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
	{{--<meta http-equiv="refresh" content="300">--}}

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

    <link href="packages/assets/slider/css/full-slider.css" rel="stylesheet">

	<!-- end: CSS -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php $menu = MenuSuperior::find(1); ?>
    <?php $banner = Banner::find(1); ?>
    <style type="text/css">
    header {
		background: transparent url("{{$menu->menu_color}}") repeat 0% 0%;
	}

    .navbar .nav > li > a {
        color: {{$menu->menu_font_color}};
    }


	.navbar .nav > li > a:focus,
	.navbar .nav > li > a:hover {
		border-top:0px solid {{$menu->menu_selected_color}};
	  	background: {{$menu->menu_selected_color}} !important;		
	  	color: #fff;
	  	height: 26px;/*here*/
	}


	/*caroussel*/
	.carousel,
	.item,
	.active {
	    /*height: 100%;*/
	}

	.carousel-inner {
	    /*height: {{$banner->height}};
	    width: {{$banner->width}};*/
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

<script type="text/javascript">
	function changeMedia(type,type_video,title,subtitle,media,width,height){
		if (type == "imagem"){
			document.getElementById("divMedia").innerHTML = 
			"<div style='width:"+width+"; height:"+height+";'>"
				+"<img src='"+media+"' style='height:"+height+"'"
				+"width='"+width+"'>"
			+"</div>	";
		}else if(type == "video"){
            if(type_video == "YouTube"){
                document.getElementById("divMedia").innerHTML =
                    "<iframe width='"+width+"' height='"+height+"' src='https://www.youtube.com/embed/"+media+"?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1&amp;loop=1&amp;playlist="+media+"' frameborder='0' allowfullscreen></iframe>";
            }else{
                document.getElementById("divMedia").innerHTML =
                    "<video width='"+width+"' height='"+height+"' controls='true' autoplay='true' loop='true'>"
                    +" <source src='"+media+"' type='video/mp4'>"
                    +" <source src='"+media+"' type='video/webm'>"
                    +" <source src='"+media+"' type='video/ogg'>"
                    +"</video>";
            }

		}else if (type == "texto") {
			document.getElementById("divMedia").innerHTML = 
			"<div style='width:"+width+";height:"+height+";overflow: hidden;'>"
				+"<p>"+media+"</p>"
			+"</div>";
		}  

		document.getElementById("divTitle").innerHTML = title;
		document.getElementById("divSubTitle").innerHTML = subtitle; 	
	}

    function getResolucao(){
        var width = window.screen.availWidth;
        var height = window.screen.availHeight;

        if(width < 1400 && height < 768){
            $('.imagemSide').height(130);
            $('.videoSide').height(100);
            $('.textSide').height(100);
        }
    }
</script>

</head>
<body onload="getResolucao();">
	
	<!--start: Header -->
	<header class="header-nav">		
		<!--start: Container -->
		<div class="container" style="width:92%">
			<!--start: Row -->
			<div class="row" >					
				<!--start: Logo -->
				<div class="logo span2">						
					<a class="brand" href="#"><img src="packages/assets/image/Logo_Protcap_Padrao.png" alt="Logo_Protcap_Padrao" ></a>	
				</div>			

				<!--end: Logo -->					
				<!--start: Navigation -->
				<div class="" > <!-- span10 -->
					<div class="navbar navbar-inverse" >
			    		<div class="navbar-inner" >
			          		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse" >
			            		<span class="icon-bar"></span>
			            		<span class="icon-bar"></span>
			            		<span class="icon-bar"></span>
			          		</a>
			          		<div class="nav-collapse collapse" >
			            		<ul class="nav" >
			              				<li class="active"><a href="{{action('HomeController@index')}}">Home</a></li>
			              				<li><a href="{{action('ContatoController@index')}}">Contatos</a></li>
										<li><a href="{{action('AniversarioController@index')}}">Aniversários</a></li>
										<li><a href="{{action('FormularioController@index')}}">Formulários</a></li>
			              				<li><a href="{{action('CardapioController@index')}}">Cardápio</a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Acesso rápido<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <?php $links = Link::all()?>
                                                @foreach($links as $link)
                                                        <li><a href="{{$link->link}}" target="_blank">{{$link->title}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
			            			</ul>
			          		</div>
			        	</div>
			      	</div>					
				</div>	
				<!--end: Navigation -->					
			</div>
			<!--end: Row -->			
		</div>
		<!--end: Container-->	
	</header>
	<!--end: Header-->
	


 <div id="divBanners" class="da-slider" style="background-color:{{$banner->color_background}};">

 		     <!--start: Wrapper-->        	
        	 <div class="container" style="width:92%;">
				<div align="center" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">    	
						<div id="myCarousel" class="carousel slide">
					        <!-- Indicators -->
					        <!-- Wrapper for Slides -->
					        <div class="carousel-inner">

					        <?php $images = ImageBanner::where('id_banner', '=', $banner->id)
                                                       ->where('position', '!=', 0)
                                                       ->orderBy('position')->get();
					        	$cont = 0;?>

					       		 @foreach ($images as $image)
					            	<img class="item <?php if($cont == 0 ){echo "active";} ?>" src="{{$image->image_path}}" width="100%" height="100%">
					            	<?php $cont++; ?>
					            @endforeach
					           
					        </div>
					        <!-- Controls -->
					        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
					            <span class="icon-prev"></span>
					        </a>
					        <a class="right carousel-control" href="#myCarousel" data-slide="next">
					            <span class="icon-next"></span>
					        </a>
					    </div>		
					</div>
				</div>
		<!--end: Wrapper-->
 </div>

<?php $layoutNoticia = LayoutNoticia::find(1); ?>
 	<div id="divMain" style="padding-left:4%;padding-right:3%;background-color: {{$layoutNoticia->background_color}};
        display:<?php if ($layoutNoticia->show_main == 'none' && $layoutNoticia->show_side == 'none') {
 		                echo 'none';
 	                  }else{
                            echo 'block';
                      } ?>">
 		<table id="tableMain">
	 		<thead>

	 			@if (($layoutNoticia->show_main == 'block') && ($layoutNoticia->show_side == 'block'))
	 				{{"<th id='thmMain' style='width:".$layoutNoticia->width_main."'></th>"}}
	 				{{"<th id='thSide' style='width:".$layoutNoticia->width_side."'></th>"}}
	 			@endif

	 			@if (($layoutNoticia->show_main == 'none') && ($layoutNoticia->show_side == 'block'))
	 				{{"<th id='thmMain' style='width:0%'></th>"}}
	 				{{"<th id='thSide' style='width:100%'></th>"}}
	 			@else
	 				{{"<th id='thmMain' style='width:100%'></th>"}}
	 				{{"<th id='thSide' style='width:0%'></th>"}}
	 			@endif

	 		</thead>
 		   	<tbody>
 		   		<tr>
 		   			<td id="tdMain">
 		   				<div id="divTdMain" style="display:{{$layoutNoticia->show_main}}">
 		   					<?php $noticias = Noticia::take(1)->where('position','!=',0)->orderBy('position','asc')->get(); ?>

 		   					@foreach ($noticias as $noticia)
	   						<?php $midias = MidiaNoticia::where('id_noticia','=',$noticia->id)->get();?>
								@foreach ($midias as $midia)
									<div id="divMedia">
										@if ($midia->type == "video")
                                            @if ($midia->type_video == "YouTube")
                                                <?php $video = explode("=", $midia->link) ?>
                                                <iframe width="100%" height="{{$layoutNoticia->height_main}}" src="https://www.youtube.com/embed/{{$video[1]}}?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1&amp;playlist={{$video[1]}}" frameborder="0" allowfullscreen></iframe>
                                            @else
                                                <video width="100%" height="{{$layoutNoticia->height_main}}" controls="true" autoplay="true">
                                                    <source src="{{$midia->link}}" type="video/mp4">
                                                    <source src="{{$midia->link}}" type="video/webm">
                                                    <source src="{{$midia->link}}" type="video/ogg"
                                                </video>
                                            @endif

										@else
											@if ($midia->type == "imagem")
                                                {{-- width:{{$layoutNoticia->width_main}}; --}}
												<div style="height:{{$layoutNoticia->height_main}};">
													<img src="{{$midia->link}}" style="height:{{$layoutNoticia->height_main}}"
													width="100%">
												</div>											
											@else
												@if ($midia->type == "texto")
                                                    {{--width:{{$layoutNoticia->width_main}};--}}
													<div style="height:{{$layoutNoticia->height_main}};overflow: hidden;">
														<p>{{$midia->text}}</p>
													</div>
												@endif
											@endif
										@endif	
									</div>								
								@endforeach
								<div class="tiles primary p-t-20 p-b-20 text-black gray"
		        				style="width:{{$layoutNoticia->width_main}}; height:90px;
                                    display: <?php if($layoutNoticia->show_title_main == 'none' && $layoutNoticia->show_title_main == 'none'){ echo 'none';}else{echo 'block';}?>">

		        						<p style="color:{{$layoutNoticia->color_title}}; display:{{$layoutNoticia->show_title_main}};">
									 	<label id="divTitle" style="font-size: 18px;font-weight: bold;font-family: 'Droid Sans';">
									 		{{$noticia->title}}
									 	</label>
										</p>
										 <p style="color:{{$layoutNoticia->color_subtitle}}; display:{{$layoutNoticia->show_subtitle_main}};">
										 	<label id="divSubTitle" style="font-size: 16px;font-family: 'Droid Sans';">
										 		{{$noticia->subtitle}}
										 	</label>
										 </p>		        				
			        			</div> 
 		   					@endforeach
             			 
		        		</div>
 		   			</td>
 		   			<td id="tdSide" style="display:block">
 		   				<div id="divTdSide" style="display:{{$layoutNoticia->show_side}}">
		        			<table class="table table-hover table-condensed">
		            			<tbody>

		            			<?php $noticias = Noticia::take(3)->skip(1)->where('position','!=',0)->orderBy('position','asc')->get(); ?>

			 		   					@foreach ($noticias as $noticia)
				   						<?php $midias = MidiaNoticia::where('id_noticia','=',$noticia->id)->get();?>
											@foreach ($midias as $midia)


											<?php
												if ($midia->type == "imagem") {?>
													<tr onclick="changeMedia('{{$midia->type}}','','{{$noticia->title}}','{{$noticia->subtitle}}','{{$midia->link}}','100%','{{$layoutNoticia->height_main}}');">

						        						<td style="height: 100px;">
						        							<div style="width:100%; height:60px ;background-color: #DCDCDC;padding-top:5px;overflow: hidden;
						        							display: <?php if($layoutNoticia->show_title_main == 'none' && $layoutNoticia->show_subtitle_main == 'none'){ echo 'none';}else{echo 'block';}?>">
							        							 	<p style="color:{{$layoutNoticia->color_title}};font-size:18px;font-family: 'Droid Sans';padding:2px;font-weight: bold;
                                                                        display:{{$layoutNoticia->show_title_main}};">
							        							 		{{$noticia->title}}
							        							 	</p>
							        							 	<p style="color:{{$layoutNoticia->color_subtitle}};font-size:15px;font-family: 'Droid Sans';padding:2px;
                                                                        display:{{$layoutNoticia->show_subsubtitle_main}};">
							        							 		{{$noticia->subtitle}}
							        							 	</p>        							
							        						</div>
                                                            @if($midia->text != "")
						        							    <img class="imagemSide" src="{{$midia->text}}" width="100%" style="height:150px">
                                                            @else
                                                                <img class="imagemSide" src="{{$midia->link}}" width="100%" style="height:150px">
                                                            @endif
						        						</td>
						        					</tr>
											<?php }if ($midia->type == "video") {?>


                                            @if ($midia->type_video == "YouTube")
                                                <?php $video = explode("=", $midia->link) ?>
                                                <tr onclick="changeMedia('{{$midia->type}}','{{$midia->type_video}}','{{$noticia->title}}','{{$noticia->subtitle}}','{{$video[1]}}','100%','{{$layoutNoticia->height_main}}');">
                                            @else
                                                <tr onclick="changeMedia('{{$midia->type}}','{{$midia->type_video}}','{{$noticia->title}}','{{$noticia->subtitle}}','{{$midia->link}}','100%','{{$layoutNoticia->height_main}}');">
                                            @endif

						        						<td>
						        							<div style="width:100%; height:60px ;background-color: #DCDCDC; padding-top: 5px; overflow: hidden;
						        							display: <?php if($layoutNoticia->show_title_main == 'none' && $layoutNoticia->show_subtitle_main == 'none'){ echo 'none';}else{echo 'block';}?>">
							        							 <p style="color:{{$layoutNoticia->color_title}};font-size:18px;font-family: 'Droid Sans';padding:2px;font-weight: bold;
                                                                     display:{{$layoutNoticia->show_title_main}};">
							        							 	{{$noticia->title}}
							        							 </p>
							        							 <p style="color:{{$layoutNoticia->color_subtitle}};font-size:15px;font-family: 'Droid Sans';padding:2px;
                                                                     display:{{$layoutNoticia->show_subtitle_main}};">
							        							 	{{$noticia->subtitle}}
							        							 </p>
							        						</div>

                                                            @if ($midia->type_video == "YouTube")
                                                                <?php $video = explode("=", $midia->link) ?>
                                                                <iframe class="videoSide" width="100%" height="150px" src="https://www.youtube.com/embed/{{$video[1]}}?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=0&amp;loop=0&amp;end=1&amp;" frameborder="0" allowfullscreen>
                                                                </iframe>
                                                            @else
                                                                <video class="videoSide" width="100%" height="150px" controls="true">
                                                                    <source src="{{$midia->link}}" type="video/mp4">
                                                                    <source src="{{$midia->link}}" type="video/webm">
                                                                    <source src="{{$midia->link}}" type="video/ogg">
                                                                    Navegador não suporta o formato do video!
                                                                </video>
                                                            @endif

						        						</td>
						        					</tr>
											<?php }if ($midia->type == "texto") {?>
												<?php $texto = str_replace("\"", "\'", $midia->text) ?>
													<tr onclick="changeMedia('{{$midia->type}}','','{{$noticia->title}}','{{$noticia->subtitle}}','{{$texto}}','100%','{{$layoutNoticia->height_main}}');">

						        						<td>
						        						<div style="width:100%; height:60px ;background-color: #DCDCDC; padding-top: 5px; overflow: hidden;
						        						display: <?php if($layoutNoticia->show_title_main == 'none' && $layoutNoticia->show_subtitle_main == 'none'){ echo 'none';}else{echo 'block';}?>">
							        							 <p style="color:{{$layoutNoticia->color_title}};font-size:18px;font-family: 'Droid Sans';padding:2px;font-weight: bold;
                                                                     display:{{$layoutNoticia->show_title_main}};">
							        							 	{{$noticia->title}}
							        							 </p>
							        							 <p style="color:{{$layoutNoticia->color_subtitle}};font-size:15px;font-family: 'Droid Sans';padding:2px;
                                                                     display:{{$layoutNoticia->show_subtitle_main}};">
							        							 	{{$noticia->subtitle}}
							        							 </p>
							        						</div>

						        						<div class="textSide" style="width: 100%; height:150px; overflow: hidden;background-color: #F0F8FF;">
						        								<p>{{$midia->text}}</p>
						        							</div>					        							
						        							
						        						</td>
						        					</tr>
											<?php } ?>

										@endforeach
		 		   					@endforeach
		        				</tbody>
		        			</table>
		            	</div> 
 		   			</td>
 		  
 		   		</tr>
 		   	</tbody>
 		   </table>	   	
 	</div>
		
					

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
        interval: {{$banner->time}} //changes the speed
    })
    </script>
</body>
</html>

