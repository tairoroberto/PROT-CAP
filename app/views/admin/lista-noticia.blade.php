@extends('admin.layout-admin')

@section('head')
  @parent
  <script type="text/javascript">


  function showModal(id_noticia){
    $('#myModal').modal('show');   
    document.getElementById('id_noticia').value = id_noticia;
  }

  function deletarNoticia(){    
    formBanner.action = "{{action('NoticiaController@destroy')}}";
    formBanner.target = "";
    formBanner.submit();
  }

  function atualizarNoticia(){
      formBanner.action = "{{action('NoticiaController@editNoticia')}}";
      formBanner.target = "";
      formBanner.submit();
  }

  function verNoticia(){
      formBanner.action = "{{action('NoticiaController@verNoticia')}}";
      formBanner.target = "_blank";
      formBanner.submit();
  }



  function selecionaPosicao(id_noticia, count){
      var posicao = document.getElementById('selectPosicao'+count).value;
      document.getElementById('id_noticia').value = id_noticia;
      document.getElementById('posicao').value = posicao;

      formBanner.action = "{{action('NoticiaController@selecionarPosicao')}}";
      formBanner.target = "";
      formBanner.submit();
  }
</script>


@stop

@section('content')
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div class="clearfix"></div>
            <div class="content">
              <div class="page-title"> 
                <h3>Lista de <span class="semi-bold"> Notícias</span></h3>
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
                     {{Form::open(array('id'=>'formBanner'))}}
                   
                      <div class="row column-seperation">
                        <div class="col-md-12">
                         <div class="row form-row">

                          <div class="grid-body">
                            <table class="table table-hover table-condensed" id="example">
                              <thead>
                                <tr>
                                  <th style="width:1%"></th>
                                  <th style="width:20%">Título</th>
                                  <th style="width:35%">Subtítulo</th>
                                  <th style="width:30%">Mídia</th>
                                  <th style="width:14%">Posicão</th>
                                </tr>

                              </thead>
                              <tbody> 
                                  <?php $noticias = Noticia::where('id','!=',0)->orderBy('id','desc')->get(); ?>
                                  <?php $count = 0;?>
                                  
                                   @foreach ($noticias as $noticia)
                                   <?php $midias = MidiaNoticia::where('id_noticia','=',$noticia->id)->get(); ?>
                                      <tr >
                                       <td onclick="showModal('{{$noticia->id}}')">
                                         <a href="#">
                                          <i class="fa fa-paste"> 
                                          </i>                                      
                                          </a>  
                                        </td>
                                        <td class="v-align-middle">{{$noticia->title}}</td>
                                        <td class="v-align-middle">{{$noticia->subtitle}}</td>
                                        @foreach ($midias as $midia)
                                          <td class="v-align-middle">
                                           @if ($midia->link)
                                               @if($midia->type_video == "Arquivo")
                                                  {{$midia->video_old_name}}
                                               @else
                                                      @if($midia->image_old_name)
                                                          {{$midia->image_old_name}}
                                                      @else
                                                          {{$midia->link}}
                                                      @endif
                                               @endif
                                           @else
                                             <div style="width:100%;height:15px;overflow: hidden;">
                                               <p>{{$midia->text}}</p>
                                             </div>
                                           @endif
                                          </td>
                                        @endforeach
                                        <td>
                                            <select name="selectPosicao{{$count}} "id="selectPosicao{{$count}}" class="form-control" onchange="selecionaPosicao('{{$noticia->id}}', '{{$count}}')">

                                                @if($noticia->position != 0)
                                                    <option value="{{$noticia->position}}">{{$noticia->position}}</option>
                                                    <option value="0">Desativar</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                @else
                                                    <option value="0">Desativar</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                @endif
                                            </select>
                                        </td>
                                     </tr>
                                   <?php $count++;?>
                                    @endforeach
                                </tbody>
                              </table>
                            </div>                   

                  </div>
                 
               </div>


                    </div>
                  </div>
                </div>
              </div>
              </div>

              <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Deletar notícia</h4>
                    </div>
                    <div>
                      <input type="hidden" id="id_noticia" name="id_noticia" value="">
                      <input type="hidden" id="posicao" name="posicao" value="">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="atualizarNoticia();">Editar Noticia</button>
                      <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="verNoticia();">Ver Noticia</button>
                      <button type="button" id="btnBuscarDados" class="btn btn-danger"  data-dismiss="modal" onclick="deletarNoticia();">Deletar notícia</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->

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
