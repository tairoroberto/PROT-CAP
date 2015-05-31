@extends('admin.layout-admin')

@section('head')
<script>

    function chamaModal(){
        $('#myModal').modal('show');
    }

    function sendAdmin(){
        formLogdetail.submit();
    }

    function changeDocument(id_document){
        document.getElementById('id_document').value = id_document;
    }

    function changeAction(){
        if(document.getElementById('radioDocumentRecover').checked == true){
            formLogdetail.action = "{{action('DocumentoController@recoverDocument')}}";
        }
    }
</script>
@stop
@section('content')
    <!-- start: Wrapper -->
    {{Form::open(array('id'=>'formLogdetail'))}}
    <div class="">
        <div class="clearfix"></div>
        <div class="content">
            <div class="row-fluid">

                <div class="page-title">
                    <h3><span class="semi-bold">Detalhes de Documento</span></h3>
                </div>
                <div class="span12">

                    @if ($errors->any())
                        <div class="alert alert-sucess">
                            <ul>
                                {{ implode('', $errors->all('<li class="sucess">:message</li>')) }}
                            </ul>
                        </div>
                    @endif

                    {{--call class ActiveDirectiry to get username--}}
                    <div class="grid simple">
                        <div class="grid-body">
                            <table class="table table-hover table-condensed" id="example">
                                <thead>
                                <tr>
                                    <th style="width:1%"></th>
                                    <th style="width:33%">Título</th>
                                    <th style="width:30%">Usuário</th>
                                    <th style="width:12%">Situação</th>
                                    <th style="width:16%">Data/Hora</th>
                                </tr>

                                </thead>
                                <tbody>
                                    @foreach($logs as $log)
                                        <?php $document = Document::find($log->id_document);?>
                                        <?php $user = User::find($log->id_user);?>

                                        <tr >
                                            <td onclick="chamaModal();changeDocument('{{$document->id}}')">
                                                <a href="#">
                                                    <i class="fa fa-paste">
                                                    </i>
                                                </a>
                                            </td>
                                            {{--Name document--}}
                                            <td class="v-align-middle">
                                                {{$log->new_title}}
                                            </td>

                                            {{--username--}}
                                            <td class="v-align-middle">
                                                {{$user->username}}
                                            </td>

                                            {{--Document situation--}}
                                            <td class="v-align-middle">
                                                {{$log->situation}}
                                            </td>                                            

                                            {{--last update--}}
                                            <td class="v-align-middle">
                                                <?php $date = explode(' ',$log->updated_at)?>
                                                <?php $dateUpdated = explode('-',$date[0])?>
                                                {{--{{$log->updated_at}}--}}
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
                            <input id='radioDocumentRecover' name="radioDocument" type='radio'
                                   value='recover' onchange="changeAction();">
                            <label for='radioDocumentRecover'>Restaurar documento</label>
                        </div>
                        {{--Id to send to recover document--}}
                        <input type="hidden" name="id_document" id="id_document">
                        <br><br><br>

                    </div>
                    <div class="modal-footer">
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
