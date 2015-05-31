@extends('admin.layout-admin')

@section('head')
  @parent
  <script type="text/javascript">


      function showModal(id_link){
          $('#myModal').modal('show');
          document.getElementById('id_link').value = id_link;
      }

  function deletarLink(){
      formLinks.action = "{{action('LinksController@destroy')}}";
      formLinks.submit();
  }

</script>


@stop

@section('content')
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div class="clearfix"></div>
            <div class="content">
              <div class="page-title">
                <h3>Lista de <span class="semi-bold"> Links</span></h3>
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
                     {{Form::open(array('id'=>'formLinks','action' => 'LinksController@destroy'))}}

                      <div class="row column-seperation">
                        <div class="col-md-12">
                         <div class="row form-row">

                          <div class="grid-body">
                            <table class="table table-hover table-condensed" id="example">
                              <thead>
                                <tr>
                                  <th style="width:1%"></th>
                                  <th style="width:39%">Título</th>
                                  <th style="width:60%">Endereço</th>

                                </tr>

                              </thead>
                              <tbody>

                                   @foreach ($links as $link)
                                      <tr >
                                       <td onclick="showModal('{{$link->id}}')">
                                         <a href="#">
                                          <i class="fa fa-paste">
                                          </i>
                                          </a>
                                        </td>
                                        <td class="v-align-middle">{{$link->title}}</td>
                                        <td class="v-align-middle">{{$link->link}}</td>
                                     </tr>
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
                                <h4 class="modal-title">Deletar Link</h4>
                            </div
                            <div>
                                <br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button type="button" id="btnBuscarDados" class="btn btn-danger"  data-dismiss="modal" onclick="deletarLink();">Deletar Link</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <input type="hidden" id="id_link" name="id_link" value="">

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
