@extends('admin.layout-admin')

@section('head')
<script type="text/javascript">
    function chamaModal(){
        $('#myModal').modal('show');
    }

    function salvaAdmin(username,password,email,full_name,department,company,phone){

       //get data from active directory and set in user auth to laravel
        document.getElementById('username').value = username;
        document.getElementById('password').value = password;
        document.getElementById('email').value = email;
        document.getElementById('full_name').value = full_name;
        document.getElementById('department').value = department;
        document.getElementById('company').value = company;
        document.getElementById('phone').value = phone;
    }

    function sendAdmin(){
        formUserCreate.submit();
    }
</script>
@stop

@section('content')
    <!-- start: Wrapper -->
    {{Form::open(array('id'=>'formUserCreate','url'=>'salvar-usuario'))}}
    <div class="">
        <div class="clearfix"></div>
        <div class="content">
            <div class="row-fluid">

                <div class="page-title">
                    <h3>Selecionar - <span class="semi-bold">Administrador</span></h3>
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
                                    <th style="width:30%">Nome</th>
                                    <th style="width:15%">Departamento</th>
                                    <th style="width:15%">Filial</th>
                                    <th style="width:20%">E-mail</th>
                                    <th style="width:19%">Telefone</th>

                                </tr>

                                </thead>
                                <tbody>
                                 @foreach($users as $user)
                                     <tr >
                                         <td onclick="chamaModal();
                                             salvaAdmin('<?php if(isset($user['samaccountname'][0])){ echo $user['samaccountname'][0];}else{ echo 'Não cadastrado';} ?>',
                                             '<?php if(isset($user['mail'][0])){echo $user['mail'][0];} else {echo 'Não cadastrado';}?>',
                                             '<?php if(isset($user['mail'][0])){echo $user['mail'][0];} else {echo'Não cadastrado';}?>',
                                             '<?php if(isset($user['cn'][0])){echo $user['cn'][0];} else {echo'Não cadastrado';}?>',
                                             '<?php if(isset($user['department'][0])){ echo $user['department'][0];} else {echo 'Não cadastrado';} ?>',
                                             '<?php if(isset($user['company'][0])){ echo $user['company'][0];} else {echo 'Não cadastrado';} ?>',
                                             '<?php if(isset($user['telephonenumber'][0])){ echo $user['telephonenumber'][0];}else {echo 'Não cadastrado';} ?>')">

                                             <a href="#">
                                                 <i class="fa fa-paste">
                                                 </i>
                                             </a>
                                         </td>
                                          {{--Nome--}}
                                         <td class="v-align-middle">
                                             @if(isset($user['cn'][0]))
                                                 {{$user['cn'][0]}}
                                             @else
                                                 {{"Não cadastrado"}}
                                             @endif
                                         </td>

                                         {{--Departamento--}}
                                         <td class="v-align-middle">
                                             @if(isset($user['department'][0]))
                                                 {{$user['department'][0]}}
                                             @else
                                                 {{"Não cadastrado"}}
                                             @endif
                                         </td>

                                         {{--Filial--}}
                                         <td class="v-align-middle">
                                             @if(isset($user['company'][0]))
                                                 {{$user['company'][0]}}
                                             @else
                                                 {{"Não cadastrado"}}
                                             @endif
                                         </td>

                                         {{--E-mail--}}
                                         <td class="v-align-middle">
                                             @if(isset($user['mail'][0]))
                                                 {{$user['mail'][0]}}
                                             @else
                                                 {{"Não cadastrado"}}
                                             @endif
                                         </td>

                                         {{--Celular--}}
                                         <td class="v-align-middle">
                                             @if(isset($user['telephonenumber'][0]))
                                                 {{$user['telephonenumber'][0]}}
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

            </div>
        </div>
    </div>

    {{--Input hidden to store value selected--}}
    {{--Username--}}
    <input type="hidden" id="username" name="username">

    {{--Password -- in this fild we use email and a hash to use email fild as password--}}
    <input type="hidden" id="password" name="password">

    {{--E-mail--}}
    <input type="hidden" id="email" name="email">

    {{--full_name--}}
    <input type="hidden" id="full_name" name="full_name">

    {{--departament--}}
    <input type="hidden" id="department" name="department">

    {{--Company branch--}}
    <input type="hidden" id="company" name="company">

    {{--Phone--}}
    <input type="hidden" id="phone" name="phone">


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
                            <input id='radioAdmin' name="radioAdmin" type='radio' value='Admin' >
                            <label for='radioAdmin'>Selecionar usuário como Administrador</label>

                            <input id='radioUser' name="radioAdmin" type='radio' value='User' checked='checked'>
                            <label for='radioUser'>Selecionar usuário como Padrão</label>
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
    {{Form::close()}}
    <!-- end: Container -->

@stop
