@extends('admin.layout-admin')

@section('head')
  @parent
  <script type="text/javascript">

  $(document).ready(function(){
    $('input[type=file]').bootstrapFileInput();
  });

  function selecionaCor(color){
    document.getElementById('image').src = "packages/assets/image/menu/gradiente"+ color + ".png";
    document.getElementById('menu_color').value = "packages/assets/image/menu/gradiente"+ color + ".png";
  }

  function selecionaCorMenuSelecionado(color,rgb){
    document.getElementById('imageMenuSelected').src = "packages/assets/image/menu/gradiente"+ color + ".png";
    document.getElementById('menu_selected_color').value = rgb;
    document.getElementById('menu_selected_color_path').value = "packages/assets/image/menu/gradiente"+ color + ".png";    
  }
  function selecionaCorTitulo(color,rgb){
      document.getElementById('imageSubTitulo').src = "packages/assets/image/menu/gradiente"+ color + ".png";
      document.getElementById('menu_titulo_color').value = rgb;
      document.getElementById('menu_titulo_color_path').value = "packages/assets/image/menu/gradiente"+ color + ".png";
  }

  function selecionaCorFontSelecionado(color,rgb){
      document.getElementById('imageFontSelected').src = "packages/assets/image/menu/gradiente"+ color + ".png";
      document.getElementById('menu_font_color').value = rgb;
      document.getElementById('menu_font_color_path').value = "packages/assets/image/menu/gradiente"+ color + ".png";
  }


  function restaurarPadrao(){
      formEditarMenu.action = "{{action('MenuController@restaurarPadraoMenu')}}";
      formEditarMenu.submit();
  }
  
  </script>
@stop

@section('content')
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div class="clearfix"></div>
            <div class="content">
              <div class="page-title"> 
                <h3>Editar - <span class="semi-bold">Menu superior</span></h3>
              </div>
              <!-- START FORM -->
              <div class="row">
                <div class="col-md-24">

                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                        </ul>
                  </div>
                @endif
                

                  <div class="grid simple">
                
                    <div class="grid-body no-border">
                    {{Form::open(array('id'=>'formEditarMenu','action' => 'MenuController@store', 'files' => 'true'))}}

                    <?php $menu = MenuSuperior::find(1); ?>
                   
                      <div class="row column-seperation">
                        <div class="col-md-24">
                         <div class="row form-row">

                              <div class="col-md-12">
                                  <div class="alert alert-info">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      <strong>Selecione a cor do MENU superior!</strong>
                                    </div>  
                              </div>
                              <div class="col-md-12">

                                <img src="packages/assets/image/menu/gradiente1.png" onclick="selecionaCor(1);" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente2.png" onclick="selecionaCor(2);" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente3.png" onclick="selecionaCor(3);" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente4.png" onclick="selecionaCor(4);" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente5.png" onclick="selecionaCor(5);" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente6.png" onclick="selecionaCor(6);" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente7.png" onclick="selecionaCor(7);" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente8.png" onclick="selecionaCor(8);" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente9.png" onclick="selecionaCor(9);" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente10.png"  onclick="selecionaCor(10)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente11.png"  onclick="selecionaCor(11)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente12.png"  onclick="selecionaCor(12)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente13.png"  onclick="selecionaCor(13)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente14.png"  onclick="selecionaCor(14)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente15.png"  onclick="selecionaCor(15)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente16.png"  onclick="selecionaCor(16)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente17.png"  onclick="selecionaCor(17)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente18.png"  onclick="selecionaCor(18)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente19.png"  onclick="selecionaCor(19)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente20.png"  onclick="selecionaCor(20)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente21.png"  onclick="selecionaCor(21)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente22.png"  onclick="selecionaCor(22)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente23.png"  onclick="selecionaCor(23)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente24.png"  onclick="selecionaCor(24)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente25.png"  onclick="selecionaCor(25)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente26.png"  onclick="selecionaCor(26)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente27.png"  onclick="selecionaCor(27)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente28.png"  onclick="selecionaCor(28)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente29.png"  onclick="selecionaCor(29)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente30.png"  onclick="selecionaCor(30)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente31.png" onclick="selecionaCor(31)"  width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente32.png"  onclick="selecionaCor(32)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente33.png"  onclick="selecionaCor(33)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente34.png"  onclick="selecionaCor(34)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente35.png"  onclick="selecionaCor(35)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente36.png"  onclick="selecionaCor(36)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente37.png"  onclick="selecionaCor(37)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente38.png"  onclick="selecionaCor(38)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente39.png"  onclick="selecionaCor(39)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente40.png"  onclick="selecionaCor(40)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente41.png"  onclick="selecionaCor(41)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente42.png"  onclick="selecionaCor(42)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente43.png"  onclick="selecionaCor(43)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente44.png"  onclick="selecionaCor(44)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente45.png"  onclick="selecionaCor(45)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente46.png"  onclick="selecionaCor(46)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente47.png"  onclick="selecionaCor(47)" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente48.png"  onclick="selecionaCor(48)" width="18px" height="20px">

                              </div>
                              <br><br><br><br><br>                     
                              <div align="center">
                                <img id="image" name="image" src="{{$menu->menu_color}}" width="150px" height="70px">
                              </div>
                              <br><br>  
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                          <div class="alert alert-info">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <strong>Selecione a cor do MENU ao ser SELECIONADO!</strong>
                            </div>  
                      </div>
                      <div class="col-md-12">

                        <img src="packages/assets/image/menu/gradiente1.png" onclick="selecionaCorMenuSelecionado(1,'#EEC73E');" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente2.png" onclick="selecionaCorMenuSelecionado(2,'#F0A513');" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente3.png" onclick="selecionaCorMenuSelecionado(3,'#FB8B00');" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente4.png" onclick="selecionaCorMenuSelecionado(4,'#F44800');" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente5.png" onclick="selecionaCorMenuSelecionado(5,'#FFFF99');" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente6.png" onclick="selecionaCorMenuSelecionado(6,'#FFFF00');" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente7.png" onclick="selecionaCorMenuSelecionado(7,'#FDCA01');" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente8.png" onclick="selecionaCorMenuSelecionado(8,'#986601');" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente9.png" onclick="selecionaCorMenuSelecionado(9,'#F44800');" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente10.png"  onclick="selecionaCorMenuSelecionado(10,'#FD3301')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente11.png"  onclick="selecionaCorMenuSelecionado(11,'#D40000')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente12.png"  onclick="selecionaCorMenuSelecionado(12,'#980101')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente13.png"  onclick="selecionaCorMenuSelecionado(13,'#FDD99B')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente14.png"  onclick="selecionaCorMenuSelecionado(14,'#D9BB7A')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente15.png"  onclick="selecionaCorMenuSelecionado(15,'#816647')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente16.png"  onclick="selecionaCorMenuSelecionado(16,'#565248')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente17.png"  onclick="selecionaCorMenuSelecionado(17,'#AACCEE')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente18.png"  onclick="selecionaCorMenuSelecionado(18,'#6699CC')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente19.png"  onclick="selecionaCorMenuSelecionado(19,'#336699')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente20.png"  onclick="selecionaCorMenuSelecionado(20,'#003366')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente21.png"  onclick="selecionaCorMenuSelecionado(21,'#B3DEFD')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente22.png"  onclick="selecionaCorMenuSelecionado(22,'#0197FD')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente23.png"  onclick="selecionaCorMenuSelecionado(23,'#0169C9')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente24.png"  onclick="selecionaCorMenuSelecionado(24,'#013397')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente25.png"  onclick="selecionaCorMenuSelecionado(25,'#CCFF99')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente26.png"  onclick="selecionaCorMenuSelecionado(26,'#98FC66')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente27.png"  onclick="selecionaCorMenuSelecionado(27,'#339900')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente28.png"  onclick="selecionaCorMenuSelecionado(28,'#015A01')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente29.png"  onclick="selecionaCorMenuSelecionado(29,'#002B3D')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente30.png"  onclick="selecionaCorMenuSelecionado(30,'#FF9BFF')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente31.png" onclick="selecionaCorMenuSelecionado(31,'#FF00FF')"  width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente32.png"  onclick="selecionaCorMenuSelecionado(32,'#6600CC')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente33.png"  onclick="selecionaCorMenuSelecionado(33,'#EEEEEE')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente34.png"  onclick="selecionaCorMenuSelecionado(34,'#CCCCCF')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente35.png"  onclick="selecionaCorMenuSelecionado(35,'#AAAAAA')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente36.png"  onclick="selecionaCorMenuSelecionado(36,'#888888')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente37.png"  onclick="selecionaCorMenuSelecionado(37,'#666666')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente38.png"  onclick="selecionaCorMenuSelecionado(38,'#333333')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente39.png"  onclick="selecionaCorMenuSelecionado(39,'#000000')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente40.png"  onclick="selecionaCorMenuSelecionado(40,'#00FFFF')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente41.png"  onclick="selecionaCorMenuSelecionado(41,'#98FB98')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente42.png"  onclick="selecionaCorMenuSelecionado(42,'#7CFC00')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente43.png"  onclick="selecionaCorMenuSelecionado(43,'#00FF7F')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente44.png"  onclick="selecionaCorMenuSelecionado(44,'#00FA9A')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente45.png"  onclick="selecionaCorMenuSelecionado(45,'#9ACD32')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente46.png"  onclick="selecionaCorMenuSelecionado(46,'#FFFFFF')" width="18px" height="20px">

                        <img src="packages/assets/image/menu/gradiente47.png"  onclick="selecionaCorMenuSelecionado(47,'#99CC66')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente48.png"  onclick="selecionaCorMenuSelecionado(48,'#67B450')" width="18px" height="20px">


                      </div>
                      <br><br><br><br><br>                     
                      <div align="center">
                        <img id="imageMenuSelected" name="imageMenuSelected" src="{{$menu->menu_selected_color_path}}" width="150px" height="70px">
                      </div>
                    </div>
                    </div>

                    <br><br>

                  {{--Memu de subtítulo start--}}
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="alert alert-info">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      <strong>Selecione a cor de fundo do TÍTULO DA PÁGINA!</strong>
                                  </div>
                              </div>
                              <div class="col-md-12">

                                  <img src="packages/assets/image/menu/gradiente1.png" onclick="selecionaCorTitulo(1,'rgba(238,199,62,0.9)');" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente2.png" onclick="selecionaCorTitulo(2,'rgba(240,165,19,0.9)');" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente3.png" onclick="selecionaCorTitulo(3,'rgba(251,139,0,0.9)');" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente4.png" onclick="selecionaCorTitulo(4,'rgba(244,72,0,0.9)');" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente5.png" onclick="selecionaCorTitulo(5,'rgba(255,255,153,0.9)');" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente6.png" onclick="selecionaCorTitulo(6,'rgba(255,255,0,0.9)');" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente7.png" onclick="selecionaCorTitulo(7,'rgba(253,202,1,0.9)');" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente8.png" onclick="selecionaCorTitulo(8,'rgba(152,102,1,0.9)');" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente9.png" onclick="selecionaCorTitulo(9,'rgba(244,72,0,0.9)');" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente10.png"  onclick="selecionaCorTitulo(10,'rgba(253,51,1,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente11.png"  onclick="selecionaCorTitulo(11,'rgba(212,0,0,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente12.png"  onclick="selecionaCorTitulo(12,'rgba(152,1,1,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente13.png"  onclick="selecionaCorTitulo(13,'rgba(253,217,155,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente14.png"  onclick="selecionaCorTitulo(14,'rgba(217,187,122,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente15.png"  onclick="selecionaCorTitulo(15,'rgba(129,102,71,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente16.png"  onclick="selecionaCorTitulo(16,'rgba(86,82,72,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente17.png"  onclick="selecionaCorTitulo(17,'rgba(170,204,238,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente18.png"  onclick="selecionaCorTitulo(18,'rgba(102,153,204,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente19.png"  onclick="selecionaCorTitulo(19,'rgba(51,102,153,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente20.png"  onclick="selecionaCorTitulo(20,'rgba(0,51,102,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente21.png"  onclick="selecionaCorTitulo(21,'rgba(179,222,253,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente22.png"  onclick="selecionaCorTitulo(22,'rgba(1,151,253,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente23.png"  onclick="selecionaCorTitulo(23,'rgba(1,105,201,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente24.png"  onclick="selecionaCorTitulo(24,'rgba(1,51,151,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente25.png"  onclick="selecionaCorTitulo(25,'rgba(204,255,153,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente26.png"  onclick="selecionaCorTitulo(26,'rgba(152,252,102,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente27.png"  onclick="selecionaCorTitulo(27,'rgba(51,153,0,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente28.png"  onclick="selecionaCorTitulo(28,'rgba(1,90,1,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente29.png"  onclick="selecionaCorTitulo(29,'rgba(0,43,61,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente30.png"  onclick="selecionaCorTitulo(30,'rgba(255,155,255,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente31.png" onclick="selecionaCorTitulo(31,'rgba(255,0,255,0.9)')"  width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente32.png"  onclick="selecionaCorTitulo(32,'rgba(102,0,204,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente33.png"  onclick="selecionaCorTitulo(33,'rgba(238,238,238,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente34.png"  onclick="selecionaCorTitulo(34,'rgba(204,204,207,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente35.png"  onclick="selecionaCorTitulo(35,'rgba(170,170,170,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente36.png"  onclick="selecionaCorTitulo(36,'rgba(136,136,136,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente37.png"  onclick="selecionaCorTitulo(37,'rgba(102,102,102,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente38.png"  onclick="selecionaCorTitulo(38,'rgba(51,51,51,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente39.png"  onclick="selecionaCorTitulo(39,'rgba(0,0,0,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente40.png"  onclick="selecionaCorTitulo(40,'rgba(0,255,255,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente41.png"  onclick="selecionaCorTitulo(41,'rgba(152,251,152,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente42.png"  onclick="selecionaCorTitulo(42,'rgba(124,252,0,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente43.png"  onclick="selecionaCorTitulo(43,'rgba(0,255,127,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente44.png"  onclick="selecionaCorTitulo(44,'rgba(0,250,154,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente45.png"  onclick="selecionaCorTitulo(45,'rgba(154,205,50,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente46.png"  onclick="selecionaCorTitulo(46,'rgba(255,255,255,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente47.png"  onclick="selecionaCorTitulo(47,'rgba(153,204,102,0.9)')" width="18px" height="20px">

                                  <img src="packages/assets/image/menu/gradiente48.png"  onclick="selecionaCorTitulo(48,'rgba(103,180,80,0.9)')" width="18px" height="20px">


                              </div>
                              <br><br><br><br><br>
                              <div align="center">
                                  <img id="imageSubTitulo" name="imageSubTitulo" src="{{$menu->menu_titulo_color_path}}" width="150px" height="70px">
                              </div>
                          </div>
                      </div>
                  {{--Menu de subtitulo end--}}



                    {{--Memu de font start--}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Selecione a cor da FONTE do MENU!</strong>
                                </div>
                            </div>
                            <div class="col-md-12">

                                <img src="packages/assets/image/menu/gradiente1.png" onclick="selecionaCorFontSelecionado(1,'#EEC73E');" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente2.png" onclick="selecionaCorFontSelecionado(2,'#F0A513');" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente3.png" onclick="selecionaCorFontSelecionado(3,'#FB8B00');" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente4.png" onclick="selecionaCorFontSelecionado(4,'#F44800');" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente5.png" onclick="selecionaCorFontSelecionado(5,'#FFFF99');" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente6.png" onclick="selecionaCorFontSelecionado(6,'#FFFF00');" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente7.png" onclick="selecionaCorFontSelecionado(7,'#FDCA01');" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente8.png" onclick="selecionaCorFontSelecionado(8,'#986601');" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente9.png" onclick="selecionaCorFontSelecionado(9,'#F44800');" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente10.png"  onclick="selecionaCorFontSelecionado(10,'#FD3301')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente11.png"  onclick="selecionaCorFontSelecionado(11,'#D40000')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente12.png"  onclick="selecionaCorFontSelecionado(12,'#980101')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente13.png"  onclick="selecionaCorFontSelecionado(13,'#FDD99B')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente14.png"  onclick="selecionaCorFontSelecionado(14,'#D9BB7A')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente15.png"  onclick="selecionaCorFontSelecionado(15,'#816647')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente16.png"  onclick="selecionaCorFontSelecionado(16,'#565248')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente17.png"  onclick="selecionaCorFontSelecionado(17,'#AACCEE')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente18.png"  onclick="selecionaCorFontSelecionado(18,'#6699CC')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente19.png"  onclick="selecionaCorFontSelecionado(19,'#336699')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente20.png"  onclick="selecionaCorFontSelecionado(20,'#003366')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente21.png"  onclick="selecionaCorFontSelecionado(21,'#B3DEFD')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente22.png"  onclick="selecionaCorFontSelecionado(22,'#0197FD')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente23.png"  onclick="selecionaCorFontSelecionado(23,'#0169C9')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente24.png"  onclick="selecionaCorFontSelecionado(24,'#013397')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente25.png"  onclick="selecionaCorFontSelecionado(25,'#CCFF99')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente26.png"  onclick="selecionaCorFontSelecionado(26,'#98FC66')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente27.png"  onclick="selecionaCorFontSelecionado(27,'#339900')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente28.png"  onclick="selecionaCorFontSelecionado(28,'#015A01')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente29.png"  onclick="selecionaCorFontSelecionado(29,'#002B3D')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente30.png"  onclick="selecionaCorFontSelecionado(30,'#FF9BFF')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente31.png" onclick="selecionaCorFontSelecionado(31,'#FF00FF')"  width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente32.png"  onclick="selecionaCorFontSelecionado(32,'#6600CC')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente33.png"  onclick="selecionaCorFontSelecionado(33,'#EEEEEE')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente34.png"  onclick="selecionaCorFontSelecionado(34,'#CCCCCF')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente35.png"  onclick="selecionaCorFontSelecionado(35,'#AAAAAA')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente36.png"  onclick="selecionaCorFontSelecionado(36,'#888888')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente37.png"  onclick="selecionaCorFontSelecionado(37,'#666666')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente38.png"  onclick="selecionaCorFontSelecionado(38,'#333333')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente39.png"  onclick="selecionaCorFontSelecionado(39,'#000000')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente40.png"  onclick="selecionaCorFontSelecionado(40,'#00FFFF')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente41.png"  onclick="selecionaCorFontSelecionado(41,'#98FB98')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente42.png"  onclick="selecionaCorFontSelecionado(42,'#7CFC00')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente43.png"  onclick="selecionaCorFontSelecionado(43,'#00FF7F')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente44.png"  onclick="selecionaCorFontSelecionado(44,'#00FA9A')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente45.png"  onclick="selecionaCorFontSelecionado(45,'#9ACD32')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente46.png"  onclick="selecionaCorFontSelecionado(46,'#FFFFFF')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente47.png"  onclick="selecionaCorFontSelecionado(47,'#99CC66')" width="18px" height="20px">

                                <img src="packages/assets/image/menu/gradiente48.png"  onclick="selecionaCorFontSelecionado(48,'#67B450')" width="18px" height="20px">


                            </div>
                            <br><br><br><br><br>
                            <div align="center">
                                <img id="imageFontSelected" name="imageFontSelected" src="{{$menu->menu_font_color_path}}" width="150px" height="70px">
                            </div>
                        </div>
                    </div>

                      <br><br>
                  {{--Menu de font end--}}



                    {{--Hiddem to send image name to server--}}
                    <input type="hidden" name="menu_color" id="menu_color" class="form-control" value="">
                    <input type="hidden" name="menu_selected_color" id="menu_selected_color" class="form-control" value="">
                    <input type="hidden" name="menu_selected_color_path" id="menu_selected_color_path" class="form-control" value="">
                    <input type="hidden" name="menu_titulo_color" id="menu_titulo_color" class="form-control" value="">
                    <input type="hidden" name="menu_titulo_color_path" id="menu_titulo_color_path" class="form-control" value="">
                    <input type="hidden" name="menu_font_color" id="menu_font_color" class="form-control" value="">
                    <input type="hidden" name="menu_font_color_path" id="menu_font_color_path" class="form-control" value="">

               </div>


   
                       
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
                      <div class="form-actions">
                        <div class="pull-left"></div>
                        <div class="pull-right">
                          <button class="btn btn-sucess btn-cons" type="button" onclick="restaurarPadrao();">Restaurar padrão</button>
                          <button class="btn btn-primary btn-cons" type="submit">Salvar </button>
                        </div>
                      </div>





                  {{Form::close()}}
                  </div>
                </div>
              </div>
            </div>
            <!-- END FORM -->
          </div>
        </div>
      </div>
</div>
  </div>
  </div>
  <a href="#" class="scrollup">Subir</a>
   
  <!-- END SIDEBAR --> 
  <!-- BEGIN PAGE CONTAINER-->
  </div>

   @stop   
