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
                            <li class="active"><a href="{{action('ContatoController@index')}}">Contatos</a></li>
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
	<div id="page-title">
		<div id="page-title-inner" class="page-title-background">
			<!-- start: Container -->
			<div class="container">
				<h2><i class="ico-user ico-white"></i>Colaboradores</h2>
			</div>
			<!-- end: Container  -->
		</div>	
	</div>
	<!-- end: Page Title -->

		<!-- start: Wrapper -->	
	<div class="container" style="width:95%">


        <div class="clearfix"></div>
        <div class="content">
          <div class="row-fluid">
          
          <div class="page-title"> 
      </div>
            <div class="span12">
              <div class="grid simple">
              {{Form::open(array('id'=>'formNutricionistaLista','url'=>'editar-usuario'))}}
                
              <?php //$users = UserActiveDirectory::paginate(15); ?>

                <div class="grid-body">
                  <table class="table table-hover table-condensed"  id="example">
                    <thead>
                      <tr>
                        <th style="width:1%"></th>
                        <th style="width:20%">Nome</th>
                        <th style="width:18%">Departamento</th>
                        <th style="width:23%">Filial</th>
                        <th style="width:18%">E-mail</th>
                        <th style="width:24%">Telefones</th>
                        
                      </tr>

                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr >
                                <td>
                                    <a href="#">
                                        <i class="fa fa-paste">
                                        </i>
                                    </a>
                                </td>
                                 {{--Nome--}}
                                <td class="v-align-middle">
                                    @if($user->name)
                                        {{$user->name}}
                                    @else
                                        {{"Não cadastrado"}}
                                    @endif
                                </td>

                                {{--Departamento--}}
                                <td class="v-align-middle">
                                    @if($user->department)
                                        {{$user->department}}
                                    @else
                                        {{"Não cadastrado"}}
                                    @endif
                                </td>

                                {{--Filial--}}
                                <td class="v-align-middle">
                                    @if($user->company)
                                        {{$user->company}}
                                    @else
                                        {{"Não cadastrado"}}
                                    @endif
                                </td>

                                {{--E-mail--}}
                                <td class="v-align-middle">
                                    @if($user->mail)
                                        {{$user->mail}}
                                    @else
                                        {{"Não cadastrado"}}
                                    @endif
                                </td>

                                {{--Telefone fixo--}}
                                <td class="v-align-middle">
                                    @if($user->telephonenumber)
                                        {{$user->telephonenumber}}
                                    @else
                                        {{"Não cadastrado"}}
                                    @endif
                                </td>
                            </tr>
                        @endforeach

	                    </tbody>
	                  </table>
	                </div>
	              </div>
	            </div>
              {{Form::close()}}
          </div>
        </div>
	</div>
		<!-- end: Container -->



