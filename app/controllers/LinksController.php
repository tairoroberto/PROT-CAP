<?php

class LinksController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $links = Link::all();
        return View::make('admin.lista-links',compact('links'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.cadastrar-links');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();


        $validation = Validator::make($input, Link::$rules);

        if ($validation->passes()){

            $link = new Link;

            $link->title = Input::get('titulo');
            $link->link = Input::get('link');
            $link->save();

            return Redirect::to("links-cadastro")
                ->withErrors(['Link cadastrado com sucesso.']);
        }

        return Redirect::route('links-cadastro')
            ->withInput()
            ->withErrors($validation);
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('links.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('links.edit');
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
	 * @return Response
	 */
	public function destroy()
	{
		$link = Link::find(Input::get('id_link'));
        if($link->delete()){
            return Redirect::to("links-lista")
                ->withErrors(['Link deletado com sucesso.']);
        }else{
            return Redirect::to("links-lista")
                ->withErrors(['Não foi possível deletar o link.']);
        }
	}

}
