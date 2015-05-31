@extends('admin.layout-admin')

@section('head')
  @parent
  <script type="text/javascript">

  $(document).ready(function(){
    $('input[type=file]').bootstrapFileInput(); 
    showText();
  });

  $(document).ready(function(){
    showMidia();
    verifyVideo();
  });

  function chamaModal(){
    $('#myModal').modal('show');   
  }

  function showText(){
    var text = document.getElementById("text-editor").value; 
    document.getElementById("labelTexto").innerHTML = text;

  }





 function showMidia(){  
    if (document.getElementById("radioImagem").checked == true) {
        document.getElementById("divMidiaImagem").style.display = "block"; 
        document.getElementById("divMidiaVideo").style.display = "none";  
        document.getElementById("divLabelLink").style.display = "none";  
        document.getElementById("divLabelTexto").style.display = "none";        
    }else if(document.getElementById("radioVideo").checked == true){
        document.getElementById("divLabelLink").style.display = "block"; 
        document.getElementById("divMidiaVideo").style.display = "block"; 
        document.getElementById("divMidiaImagem").style.display = "none"; 
        document.getElementById("divLabelTexto").style.display = "none"; 
        $('#dialog').dialog('close'); 
    }else if(document.getElementById("radioTexto").checked == true){
        document.getElementById("divLabelLink").style.display = "none"; 
        document.getElementById("divMidiaImagem").style.display = "none"; 
        document.getElementById("divMidiaVideo").style.display = "none"; 
        document.getElementById("divLabelTexto").style.display = "block"; 
    }    
  }


  function verifyVideo(){
      if(document.getElementById("radioArquivoVideo").checked == true){
          document.getElementById("divVideoArquivo").style.display = "block";
          document.getElementById("divVideoLink").style.display = "none";
      }else{
          document.getElementById("divVideoArquivo").style.display = "none";
          document.getElementById("divVideoLink").style.display = "block";
      }
  }

   function showMidiaLink(){  
    var videoLInk = document.getElementById("videoLink").value;
    var videoArquivo = document.getElementById("videoArquivo").value;

    if(videoLInk != "" && document.getElementById("radioYoutube").checked == true){
        document.getElementById("lavelVideo").innerHTML = videoLInk;
    }else if(videoArquivo != ""  && document.getElementById("radioYoutube").checked == false){
        document.getElementById("lavelVideo").innerHTML = videoArquivo;
    }else{
        document.getElementById("lavelVideo").innerHTML = "";
    }

  }

</script>


<style type="text/css">
        /* body { background: #ccc;} */
        div.jHtmlArea .ToolBar ul li a.custom_disk_button 
        {
            background: url(images/disk.png) no-repeat;
            background-position: 0 0;
        }
        
        div.jHtmlArea { border: solid 1px #ccc; }
    </style>
@stop

@section('content')
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div class="clearfix"></div>
            <div class="content">
              <div class="page-title"> 
                <h3>Editar - <span class="semi-bold">Notícias</span></h3>
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
                    {{Form::open(array('id' => 'formEditarNoticia','action' => 'NoticiaController@atualizarNoticia', 'files' => 'true'))}}
                   
                      <div class="row column-seperation">
                        <div class="col-md-24">
                         <p></p> <p></p>
                         <div class="row form-row">

                      <div class="col-md-12">
                          <input name="titulo" id="titulo" type="text"  class="form-control" placeholder="Título"
                                 value = "<?php if(isset($noticia->title)){echo $noticia->title;}else{echo Input::old('titulo');}?>" >
                      </div>
                      <div class="col-md-12">

                        <input name="subtitulo" id="subtitulo" type="text"  class="form-control" placeholder="Subtítulo"
                               value= "<?php if(isset($noticia->subtitle)){echo $noticia->subtitle;}else{echo Input::old('subtitulo');}?>">
                      </div>
                    </div>

                            {{--id para atualizar no banco--}}
                            <input type="hidden" value="<?php if(isset($noticia->id)){echo $noticia->id;}else{echo Input::old('id_noticia');}?>" id="id_noticia" name="id_noticia">


                    {{-- pega a midia da noticia--}}
                    <?php
                            $midiaNoticia = MidiaNoticia::where("id_noticia","=",$noticia->id)->first(); ?>

                    <div class="row form-row"> 
                      <div class="col-md-12">
                      <label>Selecione o tipo de mídia da notícia</label>
                       <div class='radio check-default col-md-1'>
                          <input id='radioImagem' name="radiomidia" type='radio' value='imagem'
                          <?php if(isset($midiaNoticia->type)){if($midiaNoticia->type == "imagem"){echo "checked='true'";}}?> onclick="showMidia()">
                          <label for='radioImagem'>Imagem</label>

                          <input id='radioTexto' name="radiomidia" type='radio' value='texto'
                                 <?php if(isset($midiaNoticia->type)){if($midiaNoticia->type == "texto"){echo "checked='true'";}}?>
                                 onclick="showMidia();">
                          <label for='radioTexto'>Texto</label>

                           <input id='radioVideo' name="radiomidia" type='radio' value='video'
                                  <?php if(isset($midiaNoticia->type)){if($midiaNoticia->type == "video"){echo "checked='true'";}}?> onchange="showMidia();" >
                           <label for='radioVideo'>Vídeo</label>
                       </div>
                          <div id="divMidiaImagem" class="col-md-6">
                              <input name="imagem" id="imagem" type="file" accept="image/*" class="filestyle btn btn-primary btn-cons" title="Selecione uma imagem para a notícia PRINCIPAL (1920x870)" />
                              <input name="imagemLateral" id="imagemLateral" type="file" accept="image/*" class="filestyle btn btn-primary btn-cons" title="Selecione uma imagem para a notícia LATERAL (420x150)" />
                          </div>

                             <div id="divMidiaVideo">
                                  <div class='radio check-default col-md-12'>
                                      <input id='radioYoutube' name="radioCheckVideo" type='radio' value='YouTube'
                                      <?php if(isset($midiaNoticia->type_video)){if($midiaNoticia->type_video == "YouTube"){echo "checked='true'";}}?> onchange="verifyVideo();">
                                      <label for='radioYoutube'>Link do YouTube</label>

                                      <input id='radioArquivoVideo' name="radioCheckVideo" type='radio' value='Arquivo'
                                      <?php if(isset($midiaNoticia->type_video)){if($midiaNoticia->type_video != "YouTube"){echo "checked='true'";}}?> onchange="verifyVideo();">
                                      <label for='radioArquivoVideo'>Arquivo de video</label>
                                  </div>

                                  <div id="divVideoLink" class="col-md-12">
                                      <input type='text' class='form-control' name='videoLink' id='videoLink'
                                      value="<?php if(isset($midiaNoticia->type_video)){if($midiaNoticia->type_video == 'YouTube'){echo $midiaNoticia->link;}}?>" placeholder="Link do video YouTube">
                                  </div>

                                  <div id="divVideoArquivo" class="col-md-12">
                                      <input name="videoArquivo" id="videoArquivo" type="file" accept="video/mp4" class="filestyle btn btn-primary btn-cons"
                                             title="Selecione um arquivo de video para a notícia" />
                                  </div>
                              </div>


                      </div>                      
                    </div>
                    <br>
                    <div class="row form-row" id="divLabelLink">
                      <div class="col-md-12">
                        <span class="label">Link do video</span>
                        <label id="lavelVideo"></label>
                        </div>
                    </div>


                    <div class="row form-row" id="divLabelTexto">
                      <div class="col-md-12">
                          <span class="label">Texto da notícia</span>
                          <p><label id="labelTexto"><?php if(isset($midiaNoticia->type)){if($midiaNoticia->type == 'texto'){echo $midiaNoticia->text;}}?>{{Input::old('dialogEditor')}}</label></p>
                        </div>
                    </div>


               </div>
   
                       
                </div>
              </div>
            </div>
          </div>
          </div>
          <div class="form-actions">
            <div class="pull-left"></div>
            <div class="pull-right">
              <button class="btn btn-primary btn-cons" type="submit">Salvar </button>
            </div>
          </div>






              <script type="text/javascript">
                 $.ui.dialog.defaults.bgiframe = true;
                 $(function () {
                     $("#dialog").dialog({
                         width: 780, autoOpen: <?php if(isset($midiaNoticia->type)){if($midiaNoticia->type == 'texto'){echo "true";}else{echo "false";}}?>,
                         open: function (evt, ui) {
                             $('#dialogEditor').val("<?php if(isset($midiaNoticia->type)){if($midiaNoticia->type == 'texto'){echo $midiaNoticia->text;}}?>");
                             $("#dialogEditor").htmlarea();
                         },
                         close: function (evt, ui) {
                          var texto = document.getElementById("dialogEditor").value;
                          document.getElementById("labelTexto").innerHTML = texto; 
                          document.getElementById("text-editor").value = texto; 
                         }
                     });

                     $("#radioTexto").click(function () {
                         $('#dialog').dialog('open');
                     });
                 });
              </script>
    
              <div id="dialog" title="Insira o Texto da notícia" style="display: none">
                  <textarea id="dialogEditor" name="dialogEditor" rows="30" style="width: 115%"><?php if(isset($midiaNoticia->type)){if($midiaNoticia->type == 'texto'){echo Input::old('text-editor');}}?></textarea>
              </div>

              <input type="hidden" id="text-editor" name="text-editor" value="<?php if(isset($midiaNoticia->type)){if($midiaNoticia->type == 'texto'){echo Input::old('text-editor');}}?>">
                 

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
