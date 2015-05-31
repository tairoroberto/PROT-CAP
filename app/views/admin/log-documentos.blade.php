@extends('admin.layout-admin')

@section('head')
    <script type="text/javascript">
        function chamaModal(){
            $('#myModal').modal('show');
        }

        function enviarDocumento(id_document){
            //get data and send to logdetalhe
            document.getElementById('id_document').value = id_document;
            sendAdmin();
        }

        function sendAdmin(){
            formLogDocument.submit();
        }
    </script>
@stop

@section('content')
    <!-- start: Wrapper -->
    {{Form::open(array('id'=>'formLogDocument','action'=>'DocumentoController@logDocumentoDetalhe'))}}
    <div class="">
        <div class="clearfix"></div>
        <div class="content">
            <div class="row-fluid">

                <div class="page-title">
                    <h3>Logs de - <span class="semi-bold">Documentos</span></h3>
                </div>
                <div class="span12">

                    @if ($errors->any())
                        <div class="alert alert-sucess">
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
                                    <th style="width:49%">Título do documento</th>
                                    <th style="width:15%">Tamanho</th>
                                    <th style="width:10%">Tipo</th>
                                    <th style="width:8%">Qtd. modificações</th>
                                    <th style="width:15%">Atualizado</th>
                                </tr>

                                </thead>
                                <tbody>
                                @foreach($documentos as $documento)
                                    <tr >
                                        <td onclick="enviarDocumento('{{$documento->id}}');">
                                            <a href="#">
                                                <i class="fa fa-paste">
                                                </i>
                                            </a>
                                        </td>

                                        {{--Document name--}}
                                        <td class="v-align-middle">
                                            {{$documento->title}}
                                        </td>

                                        {{--Document size--}}
                                        <td class="v-align-middle">
                                            {{$documento->size}}
                                        </td>

                                        {{--Document mime type--}}
                                        <td class="v-align-middle">
                                            {{$documento->mime}}
                                        </td>

                                        {{--Times that was modified--}}
                                        <td class="v-align-middle">
                                            {{$documento->count_modify}}
                                        </td>

                                        {{--Last update--}}
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

    {{--Input hidden to store value selected--}}
    {{--Username--}}
    <input type="hidden" id="id_document" name="id_document">

    {{Form::close()}}
    <!-- end: Container -->

@stop
