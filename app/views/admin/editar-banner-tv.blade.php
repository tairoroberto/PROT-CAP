@extends('admin.layout-admin')

@section('head')
  @parent
  <script type="text/javascript">

      $(document).ready(function(){
          $('input[type=file]').bootstrapFileInput();
      });

      function chamaModal(){
          $('#myModal').modal('show');
          document.getElementById("divImagem").style.display = "none";
      }

      function showFileImage(){
          document.getElementById("divImagem").style.display = "block";
      }


      $(document).ready(function() {
          $('#alturaBanner').slider();
          $("#larguraBanner").slider();
          $("#time").slider();
      });


      function deleteImage(id){
          formBanner.action = "{{action('BannerController@destroyTV')}}";
          document.getElementById("id_image").value = id;
          formBanner.submit();
      }

      function selecionaCorMenuSelecionado(color,rgb){
          document.getElementById('imageMenuSelected').src = "packages/assets/image/menu/gradiente"+ color + ".png";
          document.getElementById('color_background').value = rgb;
          document.getElementById('color_background_path').value = "packages/assets/image/menu/gradiente"+ color + ".png";
      }

      function selecionaPosicao(id_imagem, count){
          var posicao = document.getElementById('selectPosicao'+count).value;
          document.getElementById('id_imagem').value = id_imagem;
          document.getElementById('posicao').value = posicao;

          formBanner.action = "{{action('BannerController@selecionarPosicaoBannerTv')}}";
          formBanner.submit();
      }
</script>

@stop

@section('content')
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div class="clearfix"></div>
            <div class="content">
              <div class="page-title"> 
                <h3>Editar - <span class="semi-bold">Banner TV</span></h3>
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
                     {{Form::open(array('id'=>'formBanner','action' => 'BannerController@storeTV', 'files' => 'true'))}}
                   
                      <div class="row column-seperation">
                        <div class="col-md-12">
                         <div class="row form-row">

                          <div class="grid-body">
                            <table class="table table-hover table-condensed" id="example">
                              <thead>
                                <tr>
                                  <th style="width:1%"></th>
                                  <th style="width:31%">Nome da imagem</th>
                                    <th style="width:10%">Posição</th>
                                  
                                </tr>

                              </thead>
                              <tbody> 
                                  <?php $bannerTV = BannerTV::find(1); ?>
                                  <?php $imagesTV = ImageBannerTV::where('id_banner_tv','=',1)->get(); ?>
                                  <?php $countImagens = ImageBannerTV::all()->count();?>
                                  <?php $count = 0;?>

                                   @foreach ($imagesTV as $imageTV)
                                      <tr >
                                       <td onclick="deleteImage({{$imageTV->id}})">
                                         <a href="#">
                                          <i class="fa fa-times"> 
                                          </i>                                      
                                          </a>  
                                        </td>
                                        <td class="v-align-middle">{{$imageTV->old_name}}</td>

                                          <td>
                                              <select name="selectPosicao{{$count}} "id="selectPosicao{{$count}}" class="form-control" onchange="selecionaPosicao('{{$imageTV->id}}', '{{$count}}')">

                                                  @if($imageTV->position != 0)
                                                      <option value="{{$imageTV->position}}">{{$imageTV->position}}</option>

                                                      @for($i = 0; $i < $countImagens; $i++)
                                                          @if($i == 0)
                                                              <option value="0">Desativar</option>
                                                          @else
                                                              <option value="{{$i}}">{{$i}}</option>
                                                          @endif
                                                      @endfor

                                                  @else

                                                      @for($i = 0; $i < $countImagens + 1; $i++)
                                                          @if($i == 0)
                                                              <option value="0">Desativar</option>
                                                          @else
                                                              <option value="{{$i}}">{{$i}}</option>
                                                          @endif
                                                      @endfor
                                                  @endif
                                              </select>
                                          </td>

                                     </tr>
                                  <?php $count++;?>
                                @endforeach
                            </tbody>
                          </table>
                        </div>

                          <div class="col-md-12">
                            <label>Altura do banner (pixels)</label>
                              <div class="slider primary">
                                <input type="text" name="alturaBanner" id="alturaBanner" data-slider-value="[150]" data-slider-step="5" data-slider-max="1000" data-slider-min="5" value="150" class="slider-element form-control" data-slider-selection="after">
                              </div>
                              <label>Largura do banner (%)</label>
                              <div class="slider primary">
                                <input type="text" name="larguraBanner" id="larguraBanner"  data-slider-value="[100]" data-slider-step="1" data-slider-max="100" data-slider-min="1" value="100" class="slider-element form-control" data-slider-selection="after">
                              </div>
                              <label>Tempo de transição do banner</label>
                              <div class="slider primary">
                                <input type="text" name="time" id="time"  data-slider-value="[3000]" data-slider-step="1000" data-slider-max="10000" data-slider-min="1000" value="3000" class="slider-element form-control" data-slider-selection="after">
                              </div>
                          </div>

                          <div id="divImagem" class="col-md-12">
                              <input name="imagem" id="imagem" type="file" accept="image/*" class="filestyle btn btn-primary btn-cons" title="Selecione uma imagem para o BANNER" />
                          </div>                     

                  </div>

                  <br><br>


                {{--Ido to change position in data base--}}
                <input type="hidden" id="id_imagem" name="id_imagem" value="">
                <input type="hidden" id="posicao" name="posicao" value="">


                   <div class="row">
                        <div class="col-md-12">
                          <div class="alert alert-info">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <strong>Selecione a cor de fundo do Banner</strong>
                            </div>  
                      </div>

                          <div class="col-md-12" style="width: 102%">

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
                        <img id="imageMenuSelected" name="imageMenuSelected" src="{{$bannerTV->color_background_path}}" width="150px" height="70px">
                      </div>
                    </div>
               </div>

                <input type="hidden" name="id_image" id="id_image">
                <input type="hidden" name="color_background" id="color_background" class="form-control" value="">
                <input type="hidden" name="color_background_path" id="color_background_path" class="form-control" value="">


                    </div>
                  </div>
                </div>
              </div>
              </div>
              <div class="form-actions">
                <div class="pull-left"></div>
                <div class="pull-right">
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
