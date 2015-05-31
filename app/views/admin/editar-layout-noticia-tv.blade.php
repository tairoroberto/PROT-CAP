@extends('admin.layout-admin')

@section('head')
  @parent
  <script type="text/javascript">

   $(document).ready(function() {    
    $('#alturaNoticiaPrincipal').slider();
    $("#larguraNoticiaPrincipal").slider();
    $("#alturaNoticiaLateral").slider();
    $("#larguraNoticiaLateral").slider();    
  });


function selecionaCorMenuSelecionado(color,rgb){
    document.getElementById('imageMenuSelected').src = "packages/assets/image/menu/gradiente"+ color + ".png";
    document.getElementById('color_background').value = rgb;
    document.getElementById('color_background_path').value = "packages/assets/image/menu/gradiente"+ color + ".png";    
}

function selecionaCorTitleSelecionado(color,rgb){
    document.getElementById('imageTitleSelected').src = "packages/assets/image/menu/gradiente"+ color + ".png";
    document.getElementById('color_title').value = rgb;
    document.getElementById('color_title_path').value = "packages/assets/image/menu/gradiente"+ color + ".png";    
}

function selecionaCorSubTitleSelecionado(color,rgb){
    document.getElementById('imageSubTitleSelected').src = "packages/assets/image/menu/gradiente"+ color + ".png";
    document.getElementById('color_subtitle').value = rgb;
    document.getElementById('color_subtitle_path').value = "packages/assets/image/menu/gradiente"+ color + ".png";    
}

function restaurarPadrao(){
    formEditarLayoutNoticiaTV.action = "{{action('NoticiaController@restaurarPadraoLayouNoticiaTV')}}";
    formEditarLayoutNoticiaTV.submit();
}
</script>

@stop

@section('content')
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div class="clearfix"></div>
            <div class="content">
              <div class="page-title"> 
                <h3>Editar - <span class="semi-bold">Layout da Notícia TV</span></h3>
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
                
            <?php $layoutNoticia = LayoutNoticiaTV::find(1); ?>

                  <div class="grid simple">                 
                    <div class="grid-body no-border">
                     {{Form::open(array('id'=>'formEditarLayoutNoticiaTV','action' => 'NoticiaController@storeLayoutTV', 'files' => 'true'))}}
                   
                      <div class="row column-seperation">
                        <div class="col-md-12">
                         <div class="row form-row">

                        <div class="col-md-6">
                            <label>Altura da notícia PRINCIAL (pixels)</label>
                              <div class="slider primary">
                                <input type="text" name="alturaNoticiaPrincipal" id="alturaNoticiaPrincipal"
                                       data-slider-value="[590]" data-slider-step="5" data-slider-max="1000"
                                       data-slider-min="5" value="590" class="slider-element form-control"
                                       data-slider-selection="after">
                              </div>
                              <label>Largura da notícia PRINCIAL (%)</label>
                              <div class="slider primary">
                                <input type="text" name="larguraNoticiaPrincipal" id="larguraNoticiaPrincipal"
                                       data-slider-value="[75]" data-slider-step="1" data-slider-max="100"
                                       data-slider-min="1" value="75" class="slider-element form-control"
                                       data-slider-selection="after">
                              </div>

                               <div class='checkbox check-default'>
                                  <input id='checkMostrarNoticiaPrincipal' 
                                    name="checkMostrarNoticiaPrincipal" type='checkbox' value='block' checked='checked'>
                                  <label for='checkMostrarNoticiaPrincipal'>
                                    Mostrar notícia PRINCIAL
                                  </label>  
                               </div>
                               <div class='checkbox check-default'>
                                  <input id='checkTituloNoticiaPrincipal' 
                                    name="checkTituloNoticiaPrincipal" type='checkbox' value='block' checked='checked'>
                                  <label for='checkTituloNoticiaPrincipal'>
                                    Mostrar título da notícia PRINCIAL
                                  </label>  
                               </div>
                                <div class='checkbox check-default'>
                                    <input id='checkSubTituloNoticiaPrincipal'
                                           name="checkSubTituloNoticiaPrincipal" type='checkbox' value='block' checked='checked'>
                                    <label for='checkSubTituloNoticiaPrincipal'>
                                        Mostrar Subtítulo da notícia PRINCIAL
                                    </label>
                                </div>
                          </div>

                              <div class="col-md-6">
                            <label>Altura da notícia LATERAL (pixels)</label>
                              <div class="slider primary">
                                <input type="text" name="alturaNoticiaLateral" id="alturaNoticiaLateral"
                                       data-slider-value="[125]" data-slider-step="2" data-slider-max="1000"
                                       data-slider-min="125" value="125" class="slider-element form-control"
                                       data-slider-selection="after">
                              </div>
                              <label>Largura da notícia LATERAL (%)</label>
                              <div class="slider primary">
                                <input type="text" name="larguraNoticiaLateral" id="larguraNoticiaLateral"
                                       data-slider-value="[25]" data-slider-step="5" data-slider-max="100"
                                       data-slider-min="5" value="25" class="slider-element form-control"
                                       data-slider-selection="after">
                              </div>
                               <div class='checkbox check-default'>
                                  <input id='checkMostrarNoticiaLateral' 
                                    name="checkMostrarNoticiaLateral" type='checkbox' value='block' checked='checked'>
                                  <label for='checkMostrarNoticiaLateral'>
                                    Mostrar noticia LATERAL
                                  </label>  
                               </div>
                          </div>
                  

                  </div>

                  <br><br>


                   <div class="row">
                        <div class="col-md-12">
                          <div class="alert alert-info">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <strong>Selecione a cor de fundo da Notícia</strong>
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
                        <img id="imageMenuSelected" name="imageMenuSelected" src="{{$layoutNoticia->color_background_path}}" width="150px" height="70px">
                      </div>
                    </div>
                    <br><br> 

                     <div class="row">
                        <div class="col-md-12">
                          <div class="alert alert-info">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <strong>Selecione a cor do título da Notícia</strong>
                            </div>  
                      </div>
                         <div class="col-md-12" style="width: 102%">


                          <img src="packages/assets/image/menu/gradiente1.png" onclick="selecionaCorTitleSelecionado(1,'#EEC73E');" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente2.png" onclick="selecionaCorTitleSelecionado(2,'#F0A513');" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente3.png" onclick="selecionaCorTitleSelecionado(3,'#FB8B00');" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente4.png" onclick="selecionaCorTitleSelecionado(4,'#F44800');" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente5.png" onclick="selecionaCorTitleSelecionado(5,'#FFFF99');" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente6.png" onclick="selecionaCorTitleSelecionado(6,'#FFFF00');" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente7.png" onclick="selecionaCorTitleSelecionado(7,'#FDCA01');" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente8.png" onclick="selecionaCorTitleSelecionado(8,'#986601');" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente9.png" onclick="selecionaCorTitleSelecionado(9,'#F44800');" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente10.png"  onclick="selecionaCorTitleSelecionado(10,'#FD3301')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente11.png"  onclick="selecionaCorTitleSelecionado(11,'#D40000')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente12.png"  onclick="selecionaCorTitleSelecionado(12,'#980101')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente13.png"  onclick="selecionaCorTitleSelecionado(13,'#FDD99B')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente14.png"  onclick="selecionaCorTitleSelecionado(14,'#D9BB7A')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente15.png"  onclick="selecionaCorTitleSelecionado(15,'#816647')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente16.png"  onclick="selecionaCorTitleSelecionado(16,'#565248')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente17.png"  onclick="selecionaCorTitleSelecionado(17,'#AACCEE')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente18.png"  onclick="selecionaCorTitleSelecionado(18,'#6699CC')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente19.png"  onclick="selecionaCorTitleSelecionado(19,'#336699')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente20.png"  onclick="selecionaCorTitleSelecionado(20,'#003366')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente21.png"  onclick="selecionaCorTitleSelecionado(21,'#B3DEFD')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente22.png"  onclick="selecionaCorTitleSelecionado(22,'#0197FD')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente23.png"  onclick="selecionaCorTitleSelecionado(23,'#0169C9')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente24.png"  onclick="selecionaCorTitleSelecionado(24,'#013397')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente25.png"  onclick="selecionaCorTitleSelecionado(25,'#CCFF99')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente26.png"  onclick="selecionaCorTitleSelecionado(26,'#98FC66')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente27.png"  onclick="selecionaCorTitleSelecionado(27,'#339900')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente28.png"  onclick="selecionaCorTitleSelecionado(28,'#015A01')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente29.png"  onclick="selecionaCorTitleSelecionado(29,'#002B3D')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente30.png"  onclick="selecionaCorTitleSelecionado(30,'#FF9BFF')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente31.png" onclick="selecionaCorTitleSelecionado(31,'#FF00FF')"  width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente32.png"  onclick="selecionaCorTitleSelecionado(32,'#6600CC')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente33.png"  onclick="selecionaCorTitleSelecionado(33,'#EEEEEE')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente34.png"  onclick="selecionaCorTitleSelecionado(34,'#CCCCCF')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente35.png"  onclick="selecionaCorTitleSelecionado(35,'#AAAAAA')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente36.png"  onclick="selecionaCorTitleSelecionado(36,'#888888')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente37.png"  onclick="selecionaCorTitleSelecionado(37,'#666666')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente38.png"  onclick="selecionaCorTitleSelecionado(38,'#333333')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente39.png"  onclick="selecionaCorTitleSelecionado(39,'#000000')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente40.png"  onclick="selecionaCorTitleSelecionado(40,'#00FFFF')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente41.png"  onclick="selecionaCorTitleSelecionado(41,'#98FB98')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente42.png"  onclick="selecionaCorTitleSelecionado(42,'#7CFC00')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente43.png"  onclick="selecionaCorTitleSelecionado(43,'#00FF7F')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente44.png"  onclick="selecionaCorTitleSelecionado(44,'#00FA9A')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente45.png"  onclick="selecionaCorTitleSelecionado(45,'#9ACD32')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente46.png"  onclick="selecionaCorTitleSelecionado(46,'#FFFFFF')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente47.png"  onclick="selecionaCorTitleSelecionado(47,'#99CC66')" width="18px" height="20px">

                          <img src="packages/assets/image/menu/gradiente48.png"  onclick="selecionaCorTitleSelecionado(48,'#67B450')" width="18px" height="20px">





                      </div>
                      <br><br><br><br><br>                     
                      <div align="center">
                        <img id="imageTitleSelected" name="imageTitleSelected" src="{{$layoutNoticia->color_title_path}}" width="150px" height="70px">
                      </div>
                    </div>
                    <br><br> 


                     <div class="row">
                        <div class="col-md-12">
                          <div class="alert alert-info">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <strong>Selecione a cor do subtítulo da Notícia</strong>
                            </div>  
                      </div>
                         <div class="col-md-12" style="width: 102%">


                             <img src="packages/assets/image/menu/gradiente1.png" onclick="selecionaCorSubTitleSelecionado(1,'#EEC73E');" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente2.png" onclick="selecionaCorSubTitleSelecionado(2,'#F0A513');" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente3.png" onclick="selecionaCorSubTitleSelecionado(3,'#FB8B00');" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente4.png" onclick="selecionaCorSubTitleSelecionado(4,'#F44800');" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente5.png" onclick="selecionaCorSubTitleSelecionado(5,'#FFFF99');" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente6.png" onclick="selecionaCorSubTitleSelecionado(6,'#FFFF00');" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente7.png" onclick="selecionaCorSubTitleSelecionado(7,'#FDCA01');" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente8.png" onclick="selecionaCorSubTitleSelecionado(8,'#986601');" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente9.png" onclick="selecionaCorSubTitleSelecionado(9,'#F44800');" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente10.png"  onclick="selecionaCorSubTitleSelecionado(10,'#FD3301')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente11.png"  onclick="selecionaCorSubTitleSelecionado(11,'#D40000')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente12.png"  onclick="selecionaCorSubTitleSelecionado(12,'#980101')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente13.png"  onclick="selecionaCorSubTitleSelecionado(13,'#FDD99B')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente14.png"  onclick="selecionaCorSubTitleSelecionado(14,'#D9BB7A')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente15.png"  onclick="selecionaCorSubTitleSelecionado(15,'#816647')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente16.png"  onclick="selecionaCorSubTitleSelecionado(16,'#565248')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente17.png"  onclick="selecionaCorSubTitleSelecionado(17,'#AACCEE')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente18.png"  onclick="selecionaCorSubTitleSelecionado(18,'#6699CC')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente19.png"  onclick="selecionaCorSubTitleSelecionado(19,'#336699')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente20.png"  onclick="selecionaCorSubTitleSelecionado(20,'#003366')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente21.png"  onclick="selecionaCorSubTitleSelecionado(21,'#B3DEFD')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente22.png"  onclick="selecionaCorSubTitleSelecionado(22,'#0197FD')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente23.png"  onclick="selecionaCorSubTitleSelecionado(23,'#0169C9')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente24.png"  onclick="selecionaCorSubTitleSelecionado(24,'#013397')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente25.png"  onclick="selecionaCorSubTitleSelecionado(25,'#CCFF99')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente26.png"  onclick="selecionaCorSubTitleSelecionado(26,'#98FC66')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente27.png"  onclick="selecionaCorSubTitleSelecionado(27,'#339900')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente28.png"  onclick="selecionaCorSubTitleSelecionado(28,'#015A01')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente29.png"  onclick="selecionaCorSubTitleSelecionado(29,'#002B3D')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente30.png"  onclick="selecionaCorSubTitleSelecionado(30,'#FF9BFF')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente31.png" onclick="selecionaCorSubTitleSelecionado(31,'#FF00FF')"  width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente32.png"  onclick="selecionaCorSubTitleSelecionado(32,'#6600CC')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente33.png"  onclick="selecionaCorSubTitleSelecionado(33,'#EEEEEE')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente34.png"  onclick="selecionaCorSubTitleSelecionado(34,'#CCCCCF')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente35.png"  onclick="selecionaCorSubTitleSelecionado(35,'#AAAAAA')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente36.png"  onclick="selecionaCorSubTitleSelecionado(36,'#888888')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente37.png"  onclick="selecionaCorSubTitleSelecionado(37,'#666666')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente38.png"  onclick="selecionaCorSubTitleSelecionado(38,'#333333')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente39.png"  onclick="selecionaCorSubTitleSelecionado(39,'#000000')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente40.png"  onclick="selecionaCorSubTitleSelecionado(40,'#00FFFF')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente41.png"  onclick="selecionaCorSubTitleSelecionado(41,'#98FB98')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente42.png"  onclick="selecionaCorSubTitleSelecionado(42,'#7CFC00')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente43.png"  onclick="selecionaCorSubTitleSelecionado(43,'#00FF7F')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente44.png"  onclick="selecionaCorSubTitleSelecionado(44,'#00FA9A')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente45.png"  onclick="selecionaCorSubTitleSelecionado(45,'#9ACD32')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente46.png"  onclick="selecionaCorSubTitleSelecionado(46,'#FFFFFF')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente47.png"  onclick="selecionaCorSubTitleSelecionado(47,'#99CC66')" width="18px" height="20px">

                             <img src="packages/assets/image/menu/gradiente48.png"  onclick="selecionaCorSubTitleSelecionado(48,'#67B450')" width="18px" height="20px">



                      </div>
                      <br><br><br><br><br>                     
                      <div align="center">
                        <img id="imageSubTitleSelected" name="imageSubTitleSelected" src="{{$layoutNoticia->color_subtitle_path}}" width="150px" height="70px">
                      </div>
                    </div>
                    <br><br> 
               </div>

                
                <input type="hidden" name="color_background" id="color_background" class="form-control" value="{{$layoutNoticia->background_color}}">
                <input type="hidden" name="color_background_path" id="color_background_path" class="form-control" value="{{$layoutNoticia->color_background_path}}">

                <input type="hidden" name="color_title" id="color_title" 
                  value="{{$layoutNoticia->color_title}}">
                <input type="hidden" name="color_title_path" id="color_title_path" 
                  value="{{$layoutNoticia->color_title_path}}">

                <input type="hidden" name="color_subtitle" id="color_subtitle" 
                  value="{{$layoutNoticia->color_subtitle}}">
                <input type="hidden" name="color_subtitle_path" id="color_subtitle_path" 
                  value="{{$layoutNoticia->color_subtitle_path}}">



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
                  
                  <button class="btn btn-danger btn-cons" type="reset">Cancelar</button>
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
