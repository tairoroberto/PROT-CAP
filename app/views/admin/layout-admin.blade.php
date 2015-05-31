<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Prot-cap | Equipamentos de segurança</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />

<!-- BEGIN PLUGIN CSS -->
<link href="packages/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="packages/assets/plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
<link href="packages/assets/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css"/>
<link href="packages/assets/plugins/dropzone/css/basic.css" rel="stylesheet" type="text/css"/>
<link href="packages/assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>
<link href="packages/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="packages/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<link href="packages/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="packages/assets/plugins/ios-switch/ios7-switch.css" type="text/css" media="screen">
<link href="packages/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="packages/assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="packages/assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>

<link href="packages/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="packages/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>

<!-- END PLUGIN CSS -->

<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="packages/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="packages/assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="packages/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="packages/assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->

<!-- BEGIN CSS TEMPLATE -->
<link href="packages/assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="packages/assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="packages/assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->

<link href="packages/assets/plugins/boostrap-slider/css/slider.css" rel="stylesheet" type="text/css"/>

<script src="packages/assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script type="text/javascript" src="packages/assets/js/bootstrap.file-input.js"></script>

 <script type="text/javascript" src="packages/assets/plugins/bootstrap-wysihtml5/scripts/jHtmlArea-0.8.js"></script>
  <link rel="Stylesheet" type="text/css" href="packages/assets/plugins/bootstrap-wysihtml5/style/jHtmlArea.css" />  
  <script type="text/javascript" src="packages/assets/plugins/bootstrap-wysihtml5/scripts/jHtmlArea.ColorPickerMenu-0.8.js"></script>
  <link rel="Stylesheet" type="text/css" href="packages/assets/plugins/bootstrap-wysihtml5/style/jHtmlArea.ColorPickerMenu.css" />
  <script type="text/javascript" src="packages/assets/plugins/bootstrap-wysihtml5/scripts/jquery-ui-1.7.2.custom.min.js"></script>
  <link rel="Stylesheet" type="text/css" href="packages/assets/plugins/bootstrap-wysihtml5/style/jqueryui/ui-lightness/jquery-ui-1.7.2.custom.css" />

@yield('head')

</head>

<!-- BEGIN BODY -->
<body class="">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse "> 
  <!-- BEGIN TOP NAVIGATION BAR -->
  <div class="navbar-inner">  
   <div class="header-seperation"> 
    <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">  
     <li class="dropdown"> <a id="main-menu-toggle" href="#main-menu"  class="" > <div class="iconset top-menu-toggle-white"></div> </a> </li>     
    </ul>
      <!-- BEGIN LOGO --> 
        <div align="center">
            <!-- BEGIN LOGO --> 
            <a href="#" ><img src="packages/assets/image/Logo_Protcap_Padrao.png" width="150" height="60"  /></a>
            <!-- END LOGO --> 
        </div>
      <!-- END LOGO --> 
      <ul class="nav pull-right notifcation-center">  
      
       
         
      </ul>
      </div>
      <!-- END RESPONSIVE MENU TOGGLER --> 
   <!-- BEGIN CHAT TOGGLER -->
      <div class="pull-right"> 
 
     <ul class="nav quick-section ">
      <li class="quicklinks"> 
        <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">            
          <div class="iconset top-settings-dark "></div>  
        </a>
        <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
                 <li class="divider"></li>                
                  <li><a href="{{action('AdminController@logout')}}"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Sair</a></li>
               </ul>
      </li> 
      
      </ul>
      </div>
     <!-- END CHAT TOGGLER -->
      </div> 
      <!-- END TOP NAVIGATION MENU --> 
   
  </div>
  <!-- END TOP NAVIGATION BAR --> 
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar" id="main-menu"> 
  <!-- BEGIN MINI-PROFILE -->
   <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 
   <div class="user-info-wrapper">  
  <div class="profile-wrapper">
    <img src="packages/assets/image/cliente.png"  alt="" data-src="packages/assets/image/cliente.png" data-src-retina="packages/assets/image/cliente.png" width="69" height="69" />
  </div>
    <div class="user-info">
        <div class="semi-bold">&nbsp</div>
      <div class="greeting">{{Auth::user()->username}}</div>
      <div class="semi-bold"></div>
      <div class="status">administrador</div>
      <br>
    </div>
   </div>
  <!-- END MINI-PROFILE -->
   
<!-- BEGIN SIDEBAR MENU --> 
  
    <ul>  
      
         
      <li class=""> <a href="javascript:;"> <i class="fa fa-sitemap"></i> <span class="title">Usuários</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">
      <li > <a href="{{action('UsuarioController@create')}}"> Cadastrar usuários</a> </li>
      <li > <a href="{{action('UsuarioController@index')}}"> Visualizar usuários</a> </li>
        </ul>
      </li>

      <li class=""> <a href="javascript:;"> <i class="fa fa-building-o"></i> <span class="title">Menu</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">
          <li > <a href="{{action('MenuController@create')}}"> Editar menu</a> </li>
        </ul>
      </li>

       <li class=""> <a href="javascript:;"> <i class="fa fa-building-o"></i> <span class="title">Banner</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">
          <li > <a href="{{action('BannerController@index')}}"> Editar banner</a> </li>
          <li > <a href="{{action('BannerController@indexTV')}}"> Editar banner TV</a> </li>
        </ul>
      </li>

      <li class=""> <a href="javascript:;"> <i class="fa fa-building-o"></i> <span class="title">Notícia</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">
          <li >
            <a href="{{action('NoticiaController@index')}}"> Cadastrar nova Notícia</a> 
          </li>
          <li > 
            <a href="{{action('NoticiaController@editLayout')}}"> Editar Layout de Notícias</a>
          </li>
          <li > 
            <a href="{{action('NoticiaController@editLayoutTV')}}"> Editar Layout de Notícias TV</a>
          </li>
          <li > 
            <a href="{{action('NoticiaController@create')}}"> Lista de Notícias</a> 
          </li>

        </ul>
      </li>

      <li class=""> <a href="javascript:;"> <i class="fa fa-building-o"></i> <span class="title">Cardápio</span> <span class="arrow "></span> </a>
        <ul class="sub-menu">
          <li >
            <a href="{{action('CardapioController@create')}}"> Editar Cardápio</a> 
          </li>
        </ul>
      </li>

        <li class=""> <a href="javascript:;"> <i class="fa fa-building-o"></i> <span class="title">Documentos</span> <span class="arrow "></span> </a>
            <ul class="sub-menu">
                <li >
                    <a href="{{action('DocumentoController@index')}}"> Novo documento</a>
                    <a href="{{action('DocumentoController@create')}}"> Lista de documentos</a>
                    <a href="{{action('DocumentoController@logDocumento')}}"> Log de documentos</a>
                </li>
            </ul>
        </li>


        <li class=""> <a href="javascript:;"> <i class="fa fa-building-o"></i> <span class="title">Links</span> <span class="arrow "></span> </a>
            <ul class="sub-menu">
                <li >
                    <a href="{{action('LinksController@index')}}"> Lista de links</a>
                    <a href="{{action('LinksController@create')}}"> Novo Link</a>
                </li>
            </ul>
        </li>


    </ul>
  
  
      </div>
    </div>
  </div>  
  <div class="clearfix"></div>
    <!-- END SIDEBAR MENU --> 
      </div>
  </div>
  <a href="#" class="scrollup">Subir</a>
   
  <!-- END SIDEBAR --> 
    <div class="page-content">
        {{--Token--}}
        <form action="" method="post" role="form">
        	{{ Form::token() }}
        </form>
      
          
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div class="clearfix"></div>


            {{--Start container--}}
            @yield('content')









  </div>
  <a href="#" class="scrollup">Subir</a>
   
  <!-- END SIDEBAR --> 
  <!-- BEGIN PAGE CONTAINER-->
  </div>
 </div>
<!-- END CONTAINER --> 

<!-- END CONTAINER -->

<!-- BEGIN CORE JS FRAMEWORK-->
<script src="packages/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="packages/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="packages/assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="packages/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="packages/assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
<script src="packages/assets/plugins/boostrap-slider/js/bootstrap-slider.js" type="text/javascript"></script>
<script src="packages/assets/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
<script src="packages/assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
<script src="packages/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="packages/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="packages/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="packages/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="packages/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="packages/assets/plugins/boostrap-form-wizard/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
<script src="packages/assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>

<script src="packages/assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript" ></script>
<script src="packages/assets/plugins/jquery-datatable/extra/js/TableTools.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="packages/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="packages/assets/plugins/datatables-responsive/js/lodash.min.js"></script>
<script src="packages/assets/js/datatables.js" type="text/javascript"></script>


<!-- END PAGE LEVEL PLUGINS -->
<script src="packages/assets/js/form_validations.js" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<script src="packages/assets/js/core.js" type="text/javascript"></script>
<script src="packages/assets/js/demo.js" type="text/javascript"></script>
<script src="packages/assets/plugins/dropzone/dropzone-amd-module.js"></script>
<script src="packages/assets/plugins/dropzone/dropzone-amd-module.min.js"></script>
<script src="packages/assets/plugins/dropzone/dropzone.js"></script>
<script src="packages/assets/plugins/dropzone/dropzone.min.js"></script>

<!-- END CORE TEMPLATE JS -->
<!-- END JAVASCRIPTS -->


</body>
</html>