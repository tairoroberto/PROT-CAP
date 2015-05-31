@extends('admin.layout-admin')

@section('head')
  @parent
  <script type="text/javascript">

  $(document).ready(function(){
    $('input[type=file]').bootstrapFileInput();
  });


   $(document).ready(function() {    
    $('#alturaCardapio').slider();
    $("#larguraCardapio").slider();
  });


function deleteImage(id){
    formBanner.action = "{{action('CardapioController@destroy')}}";
    document.getElementById("id_cardapio").value = id;
    formBanner.submit();
  }


  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#imagePreview').attr('src', e.target.result) .width(600).height(450);
          };

          reader.readAsDataURL(input.files[0]);

      }
  }
</script>

@stop

@section('content')
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div class="clearfix"></div>
            <div class="content">
              <div class="page-title"> 
                <h3>Editar - <span class="semi-bold">Cardápio</span></h3>
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
                     {{Form::open(array('id'=>'formBanner','action' => 'CardapioController@store', 'files' => 'true'))}}
                   
                      <div class="row column-seperation">
                        <div class="col-md-12">
                         <div class="row form-row">

                          <div class="grid-body">
                            <table class="table table-hover table-condensed" id="example">
                              <thead>
                                <tr>
                                  <th style="width:1%"></th>
                                  <th style="width:31%">Nome da imagem</th>
                                  
                                </tr>

                              </thead>
                              <tbody> 
                                  <?php $cardapio = Cardapio::find(1); ?>
                                      <tr >
                                       <td onclick="deleteImage({{$cardapio->id}})">
                                         <a href="#">
                                          <i class="fa fa-times"> 
                                          </i>                                      
                                          </a>  
                                        </td>
                                        <td class="v-align-middle">{{$cardapio->old_name}}</td>
                                     </tr>
                                </tbody>
                              </table>
                            </div>
                            <br>

                          <div class="col-md-12">
                            <label>Altura do da Imagem (pixels)</label>
                              <div class="slider primary">
                                <input type="text" name="alturaCardapio" id="alturaCardapio" data-slider-value="[630]" data-slider-step="5" data-slider-max="1000" data-slider-min="5" value="630" class="slider-element form-control" data-slider-selection="after">
                              </div>
                              <label>Largura do da Imagem (%)</label>
                              <div class="slider primary">
                                <input type="text" name="larguraCardapio" id="larguraCardapio"  data-slider-value="[100]" data-slider-step="5" data-slider-max="100" data-slider-min="5" value="100" class="slider-element form-control" data-slider-selection="after">
                              </div>
                          </div>

                          <div id="divImagem" class="col-md-12">
                              <input name="imagem" id="imagem" type="file" accept="image/*"
                                     class="filestyle btn btn-primary btn-cons"
                                     title="Selecione uma imagem para o BANNER" onchange="readURL(this);"/>
                          </div>

                         <img id="imagePreview" name="imagePreview"/>

                  </div>

                  <br><br>
                  <input type="hidden" id="id_cardapio" name="id_cardapio" value="">


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
