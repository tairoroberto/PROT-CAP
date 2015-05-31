<?php

class MenuController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('menus.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.editar-menu');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$menu = MenuSuperior::find(1);
		if (Input::get("menu_color")) {
			$menu->menu_color = Input::get("menu_color");
		}
		if (Input::get("menu_selected_color")) {
			$menu->menu_selected_color = Input::get("menu_selected_color");
		}
		if (Input::get("menu_selected_color_path")) {
			$menu->menu_selected_color_path = Input::get("menu_selected_color_path");
		}

        if (Input::get("menu_titulo_color")) {
            $menu->menu_titulo_color = Input::get("menu_titulo_color");
        }
        if (Input::get("menu_titulo_color_path")) {
            $menu->menu_titulo_color_path = Input::get("menu_titulo_color_path");
        }

        if (Input::get("menu_font_color")) {
            $menu->menu_font_color = Input::get("menu_font_color");
        }
        if (Input::get("menu_font_color_path")) {
            $menu->menu_font_color_path = Input::get("menu_font_color_path");
        }
		
		$menu->save();

		return Redirect::route("editar-menu")
						->withErrors(['Menu editado com sucesso.']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function restaurarPadraoMenu()
	{
        $menu = MenuSuperior::find(1);

        $menu->menu_color = 'packages/assets/image/menu/gradiente48.png';
        $menu->menu_selected_color = '#9ACD32';
        $menu->menu_selected_color_path = 'packages/assets/image/menu/gradiente45.png';
        $menu->menu_titulo_color = 'rgba(153,204,102,0.9)';
        $menu->menu_titulo_color_path = 'packages/assets/image/menu/gradiente47.png';
        $menu->menu_font_color = '#666666';
        $menu->menu_font_color_path = 'packages/assets/image/menu/gradiente37.png';


        if($menu->save()){
            return Redirect::route("editar-menu")
                ->withErrors(['Menu restaurado com sucesso.']);
        }
        return Redirect::route("editar-menu")
            ->withErrors(['Menu não pode ser restaurado.']);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('menus.edit');
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
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
