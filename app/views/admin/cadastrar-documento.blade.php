@extends('admin.layout-admin')

@section('head')
    @parent
<script type="text/javascript">

    $(document).ready(function(){
        $('input[type=file]').bootstrapFileInput();
    });

    /*$(document).ready(function(){
     showMidia();
     });*/

    function chamaModal(){
        $('#myModal').modal('show');
    }

</script>



@stop

@section('content')
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div class="clearfix"></div>
    <div class="content">
        <div class="page-title">
            <h3>Cadastro de novos - <span class="semi-bold">Documentos</span></h3>
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
                        {{Form::open(array('action' => 'DocumentoController@store', 'files' => 'true'))}}

                        <div class="row column-seperation">
                            <div class="col-md-24">
                                <div class="row form-row">

                                    <div class="col-md-12">
                                        <input name="titulo" id="titulo" type="text"  class="form-control" placeholder="Título do documento" value="{{Input::old('titulo')}}">
                                        <input name="arquivo" id="arquivo" type="file"
                                               class="filestyle btn btn-primary btn-cons"
                                               title="Selecione um documento"/>
                                    </div>
                                </div>
                                <br>
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
