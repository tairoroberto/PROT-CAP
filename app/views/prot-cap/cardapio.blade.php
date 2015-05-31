@extends("prot-cap.layout")

@section("content")

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
                            <li><a href="{{action('HomeController@index')}}">Home</a></li>
                            <li><a href="{{action('ContatoController@index')}}">Contatos</a></li>
                            <li><a href="{{action('AniversarioController@index')}}">Aniversários</a></li>
                            <li><a href="{{action('FormularioController@index')}}">Formulários</a></li>
                            <li class="active"><a href="{{action('CardapioController@index')}}">Cardápio</a></li>
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
     <?php $menu = MenuSuperior::find(1); ?>
    <style type="text/css">
        header {
        background: transparent url({{$menu->cor}}) repeat 0% 0%;
        border-bottom: 5px solid #f6f6f6;
      }
      .page-title-background {
          background: {{$menu->menu_titulo_color}};
      }

        .navbar .nav > li > a {
            color: {{$menu->menu_font_color}};
        }
    </style>
  </header>
  <!--end: Header-->

  
	
	<!-- start: Page Title -->
	<div id="page-title" >

		<div id="page-title-inner" class="page-title-background">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-stats ico-white"></i>Cardápio</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<div class="content" align="center">
    <?php $cardapio = Cardapio::find(1);?>
        @if ($cardapio->image_path)
          <img src="{{$cardapio->image_path}}" width="{{$cardapio->width}}" style="height:{{$cardapio->height}}">
        @endif
		
	</div>



