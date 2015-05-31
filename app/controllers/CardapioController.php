<?php

class CardapioController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make("prot-cap.cardapio");
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.editar-cardapio');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$cardapio = Cardapio::find(1);
		$cardapio->width = Input::get("larguraCardapio")."%";
		$cardapio->height = Input::get("alturaCardapio")."px";

		
		

		//change the name of photo for save in database			
		if (!is_null(Input::file('imagem'))){

            if(File::exists($cardapio->image_path)){
                File::delete($cardapio->image_path);
            }

            $arquivo_name = md5(uniqid(time())) . "." . Input::file('imagem')->guessExtension();
            $arquivo_salvo = Input::file('imagem')->move('packages/assets/image/cardapio/',$arquivo_name);


			//move photo
            if($arquivo_salvo){
                $cardapio->old_name = Input::file('imagem')->getClientOriginalName();
                $cardapio->image_path = 'packages/assets/image/cardapio/'.$arquivo_name;

            }else{
                return Redirect::to("editar-cardapio")
                    ->withErrors(['Cardápio não editado.']);
            }

		}

        if($cardapio->save()){

            return Redirect::to("editar-cardapio")
                ->withErrors(['Cardápio editado com sucesso.']);
        }else{

            return Redirect::to("editar-cardapio")
                ->withErrors(['Cardápio não editado.']);
        }


        return Redirect::to("editar-cardapio")
            ->withErrors(['Cardápio não editado.']);


	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('cardapios.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('cardapios.edit');
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
	public function destroy(){
		$cardapio = Cardapio::find(Input::get("id_cardapio"));
		if(File::exists($cardapio->image_path)){
			
			if (File::delete($cardapio->image_path)) {
				$cardapio->image_path = "";
                $cardapio->old_name = "";
				$cardapio->save();
				return Redirect::to("editar-cardapio")
						->withErrors(['Imagem deletada com sucesso.']);
			}else{
				return Redirect::to("editar-cardapio")
						->withErrors(['Imagem não deletada.']);
			}
		}
		return Redirect::to("editar-cardapio")
            ->withErrors(['Imagem não deletada.']);
	}

}
