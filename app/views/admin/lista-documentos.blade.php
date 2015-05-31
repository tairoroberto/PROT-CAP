@extends('admin.layout-admin')

@section('head')
    <script type="text/javascript">

        $(document).ready(function(){
            $('input[type=file]').bootstrapFileInput();
            showFile();
        });

        function chamaModal(){
            $('#myModal').modal('show');
        }

        function selectDocument(id_document){
            //get data from send to update document
            document.getElementById('id_document').value = id_document;
        }

        function sendAdmin(){
            formDocumentList.submit();
        }

        function showFile(){
            if(document.getElementById('radioDocumentReplace').checked == true){
                document.getElementById('divArquivo').style.display = "block";
                formDocumentList.action = "{{action('DocumentoController@update')}}";
            }else{
                document.getElementById('divArquivo').style.display = "none";
                formDocumentList.action = "{{action('DocumentoController@destroy')}}";
            }
        }


    </script>
@stop

@section('content')
    <!-- start: Wrapper -->
    {{Form::open(array('id'=>'formDocumentList','url'=>'atualizar-documento','files'=>'true'))}}
    <div class="">
        <div class="clearfix"></div>
        <div class="content">
            <div class="row-fluid">

                <div class="page-title">
                    <h3>Lista de - <span class="semi-bold">Documentos</span></h3>
                </div>
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
                                        <td onclick="chamaModal();selectDocument('{{$documento->id}}');">

                                            <a href="#">
                                                <i class="fa fa-paste">
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

            </div>
        </div>
    </div>



    <div id="divMidiaVideo">
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><b>Selecionar opção de documento</b></h4>
                    </div>
                    <div class="modal-body" align="center">

                        <div class='radio check-default col-md-12'>
                            <input id='radioDocumentDelete' name="radioDocument" type='radio'
                                   value='delete' onchange="showFile();">
                            <label for='radioDocumentDelete'>Deletar documento</label>

                            <input id='radioDocumentReplace' name="radioDocument" type='radio'
                                   value='replace' checked='checked' onchange="showFile();">
                            <label for='radioDocumentReplace'>Subistituir documento</label>
                        </div>

                        <br><br><br>

                    </div>
                    <div class="modal-footer">
                        <div id="divArquivo" align="left" class="col-md-12">

                            <input name="titulo" id="titulo" type="text"  class="form-control"
                                   placeholder="Título do documento" value="{{Input::old('titulo')}}">
                            <input name="arquivo" id="arquivo" type="file"
                                   class="filestyle btn btn-primary"
                                   title="Selecione um documento"/>

                            {{--Input hidden to store value selected--}}
                            {{--Id document--}}
                            <input type="hidden" id="id_document" name="id_document">
                        </div>

                        <br>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="button" id="btnBuscarDados" class="btn btn-primary"  data-dismiss="modal"
                                onclick="sendAdmin();">Enviar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
    {{Form::close()}}
    <!-- end: Container -->

@stop
