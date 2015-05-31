@extends('admin.layout-admin')
@section('head')
    <script type="text/javascript">
        function chamaModal(){
            $('#myModal').modal('show');
        }

        function deleteAdmin(user_id) {
            //get data from active directory and set in user auth to laravel
            document.getElementById('user_id').value = user_id;
        }

        function sendAdmin(){
            formUserList.submit();
        }
    </script>
@stop

@section('content')
    <!-- start: Wrapper -->
    <div class="">
        {{Form::open(array('id'=>'formUserList','url'=>'deleta-usuario'))}}
        <div class="clearfix"></div>
        <div class="content">


            <div class="row-fluid">

                <div class="page-title">
                    <h3>Lista de   <span class="semi-bold">Administradores</span></h3>
                </div>

                @if ($errors->any())
                    <div class="alert alert-sucess">
                        <ul>
                            {{ implode('', $errors->all('<li class="sucess">:message</li>')) }}
                        </ul>
                    </div>
                @endif

                <div class="span12">
                    <div class="grid simple">

                        <div class="grid-body">
                            <table class="table table-hover table-condensed" id="example">
                                <thead>
                                <tr>
                                    <th style="width:1%"></th>
                                    <th style="width:30%">Nome</th>
                                    <th style="width:15%">Departamento</th>
                                    <th style="width:15%">Filial</th>
                                    <th style="width:20%">E-mail</th>
                                    <th style="width:19%">Telefone</th>

                                </tr>

                                </thead>
                                <tbody>
                                 @foreach($users as $user)
                                     {{--Get user in active directory and show user name--}}

                                     <tr >
                                         <td onclick="chamaModal();
                                             deleteAdmin('{{$user->id}}')">
                                             <a href="#">
                                                 <i class="fa fa-paste">
                                                 </i>
                                             </a>
                                         </td>
                                          {{--Nome--}}
                                         <td class="v-align-middle">
                                             @if(isset($user->full_name))
                                                 {{$user->full_name}}
                                             @else
                                                 {{"Não cadastrado"}}
                                             @endif
                                         </td>


                                        {{-- Departamento--}}
                                         <td class="v-align-middle">
                                             @if(isset($user->department))
                                                 {{$user->department}}
                                             @else
                                                 {{"Não cadastrado"}}
                                             @endif
                                         </td>

                                        {{-- Filial--}}
                                         <td class="v-align-middle">
                                             @if(isset($user->company))
                                                 {{$user->company}}
                                             @else
                                                 {{"Não cadastrado"}}
                                             @endif
                                         </td>

                                         {{--E-mail--}}
                                         <td class="v-align-middle">
                                             @if(isset($user->email))
                                                 {{$user->email}}
                                             @else
                                                 {{"Não cadastrado"}}
                                             @endif
                                         </td>

                                         {{--Telefone--}}
                                         <td class="v-align-middle">
                                             @if(isset($user->phone))
                                                 {{$user->phone}}
                                             @else
                                                 {{"Não cadastrado"}}
                                             @endif
                                         </td>
                                     </tr>

                                 @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{--Input hidden to store value selected--}}
                {{--Username--}}
                <input type="hidden" id="user_id" name="user_id">
                <div id="divMidiaVideo">
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title"><b>Mudar propriedades de usuário</b></h4>
                                </div>
                                <div class="modal-body" align="center">

                                    <div class='radio check-default col-md-12'>
                                        <input id='radioAdmin' name="radioAdmin" type='radio' value='remover' >
                                        <label for='radioAdmin'>Remover da lista de Administradores</label>

                                        <input id='radioUser' name="radioAdmin" type='radio' value='manter' checked='checked'>
                                        <label for='radioUser'>Manter na lista de Administradores</label>
                                    </div>

                                    <br><br><br>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                    <button type="button" id="btnBuscarDados" class="btn btn-primary"  data-dismiss="modal" onclick="sendAdmin();">Enviar</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>


            </div>
        </div>
        {{Form::close()}}
    </div>

    <!-- end: Container -->

@stop
