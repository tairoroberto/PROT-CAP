@extends("prot-cap.layout")

@section('head')
<script>
    function changeDocument(id_document){
        document.getElementById('id_document').value = id_document;
        formDocumentList.submit();
    }
</script>
@stop
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
										<li class="active"><a href="{{action('FormularioController@index')}}">Formulários</a></li>
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

				<h2><i class="ico-check ico-white"></i>Formulários</h2>

			</div>
			<!-- end: Container  -->

		</div>

	</div>
	<!-- end: Page Title -->

	<!--start: Wrapper-->
	<div id="wrapper">

		<!-- start: Container -->
		<div class="container" style="width:90%">

         {{Form::open(array('id'=>'formDocumentList','url'=>'download-documento'))}}
            <div class="">
                <div class="clearfix"></div>
                <div class="content">
                    <div class="row-fluid">

                       {{-- <div class="page-title">
                            <h3>Lista de - <span class="semi-bold">Documentos</span></h3>
                        </div>--}}
                        <div class="span12">

                            @if ($errors->any())
                                <div class="alert alert-error">
                                    <ul>
                                        {{ implode('', $errors->all('<li class="sucess">:message</li>')) }}
                                    </ul>
                                </div>
                            @endif

                            <div class="grid simple">
                                <div class="grid-body">
                                    <table class="table table-hover table-condensed" id="example">
                                        <thead>
                                        <tr>
                                            <th style="width:1%"></th>
                                            <th style="width:59%">Título do documento</th>
                                            <th style="width:15%">Tamanho</th>
                                            <th style="width:10%">tipo</th>
                                            <th style="width:15%">Atualizado</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @foreach($documentos as $documento)
                                            <tr >
                                                <td onclick="changeDocument('{{$documento->id}}')">
                                                    <a href="#">
                                                        <i class="fa fa-download">
                                                        </i>
                                                    </a>
                                                </td>
                                                {{--Nome--}}
                                                <td class="v-align-middle">
                                                    {{$documento->title}}
                                                </td>

                                                {{--Departamento--}}
                                                <td class="v-align-middle">
                                                    {{$documento->size}}
                                                </td>

                                                {{--Filial--}}
                                                <td class="v-align-middle">
                                                    {{$documento->mime}}
                                                </td>

                                                {{--E-mail--}}
                                                <td class="v-align-middle">
                                                    <?php $date = explode(' ',$documento->updated_at)?>
                                                    <?php $dateUpdated = explode('-',$date[0])?>
                                                    {{$dateUpdated[2]."/".$dateUpdated[1]."/".$dateUpdated[0]." ".$date[1]}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        {{--id docunet download--}}
                        <input type="hidden" name="id_document" id="id_document">

                    </div>
                </div>
            </div>
        {{Form::close()}}

		</div>
		<!-- end: Container -->

	</div>
	<!-- end: Wrapper  -->



