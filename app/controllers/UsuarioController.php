<?php

class UsuarioController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //get all users in database
        $users = User::all();
        return View::make('admin.usuarios-lista',compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        //get all users in active directory
        $activeDirectory = new ActiveDirectory();
        $users = $activeDirectory->getUsers();
        return View::make('admin.usuarios-cadastro',compact('users'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Input::get('radioAdmin') == "Admin"){
            $verifyUser = User::where('username','=',strtolower(Input::get('username')))
                              ->where('email','=',Input::get('email'))->get();
            if(!$verifyUser->first()){
                $user = new User;
                $user->username = strtolower(Input::get('username'));
                $user->password = Hash::make(Input::get('password'));
                $user->email = Input::get('email');
                $user->full_name = Input::get('full_name');
                $user->department = Input::get('department');
                $user->company = Input::get('company');
                $user->phone = Input::get('phone');

                if($user->save()){
                    return Redirect::to("usuarios-cadastro")
                        ->withErrors(["Usuário salvo como administrador"]);
                }else{
                    return Redirect::to("usuarios-cadastro")
                        ->withErrors(["Usuário não foi cadastrado como administrador"])
                        ->withInput();
                }
            }else{
                return Redirect::to("usuarios-cadastro")
                    ->withErrors(["Usuário já cadastrado como administrador"])
                    ->withInput();
            }

        }else{
            return Redirect::to("usuarios-cadastro")
                ->withErrors(["Usuário não foi cadastrado como administrador"])
                ->withInput();
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('usuarios.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('usuarios.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param
	 * @return Response
	 */
	public function destroy()
	{
		if(Input::get('radioAdmin') == "remover"){
            $user = User::find(Input::get('user_id'));
            if($user->delete()){
                return Redirect::to('usuarios-lista')->withErrors(["Usuário removido da lista de administradores"]);
            }else{
                return Redirect::to('usuarios-lista')->withErrors(["Usuário não removido da lista de administradores"]);
            }
        }else{
            return Redirect::to('usuarios-lista')->withErrors(["Usuário não removido da lista de administradores"]);
        }
	}

}
