<?php

class NoticiaController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('admin.cadastro-noticia');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.lista-noticia');
	}

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function editNoticia()
    {   $noticia = Noticia::find(Input::get("id_noticia"));
        return View::make('admin.editar-noticia',compact("noticia"));
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

	
		$validation = Validator::make($input, Noticia::$rules);

		if ($validation->passes()){	
			// ID_VIDEO?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1&amp;loop=1&amp;playlist=ID_VIDEO   for loop video youtube
			$noticia = new Noticia;
			$noticia->title = Input::get("titulo");
			$noticia->subtitle = Input::get("subtitulo");
			$noticia->save();

			$midia = new MidiaNoticia;

			try{
                if (Input::get('radiomidia') == "imagem" && !is_null(Input::file('imagem')) &&
                    !is_null(Input::file('imagemLateral'))){

                    $image_name = md5(uniqid(time())) . "." . Input::file('imagem')->guessExtension();
                    //move photo
                    $imagem_salva = Input::file('imagem')->move('packages/assets/image/noticia/',$image_name);

                    $image_lateral_name = $image_name;
                    //move photo
                    $imagem_lateral_salva = Input::file('imagemLateral')->move('packages/assets/image/cardapio/',$image_lateral_name);

                    //move image
                    if($imagem_salva && $imagem_lateral_salva){
                        $midiaNoticia = new MidiaNoticia;
                        $midiaNoticia->link = "packages/assets/image/noticia/".$image_name;
                        $midiaNoticia->text = "packages/assets/image/cardapio/".$image_lateral_name;
                        $midiaNoticia->id_noticia = $noticia->id;
                        $midiaNoticia->type = "imagem";
                        $midiaNoticia->type_video = "";
                        $midiaNoticia->video_old_name = "";
                        $midiaNoticia->image_old_name = Input::file('imagem')->getClientOriginalName();
                        $midiaNoticia->save();
                    }

                }elseif (Input::get('radiomidia') == "video") {

                    if(Input::get('radioCheckVideo') == "YouTube"  && Input::get('videoLink')!= ""){
                        $midiaNoticia = new MidiaNoticia;
                        $midiaNoticia->link = Input::get("videoLink");
                        $midiaNoticia->text = "";
                        $midiaNoticia->id_noticia = $noticia->id;
                        $midiaNoticia->type = "video";
                        $midiaNoticia->type_video = "YouTube";
                        $midiaNoticia->video_old_name = "";
                        $midiaNoticia->image_old_name = "";
                        $midiaNoticia->save();

                        return Redirect::route('cadastrar-noticia')
                            ->withErrors(["Notícia salva com sucesso"]);

                    }

                    if(Input::get('radioCheckVideo') != "YouTube"  && !is_null(Input::file('videoArquivo'))){

                        if(Input::file('videoArquivo')->guessExtension() == "mp4" ||
                            Input::file('videoArquivo')->guessExtension() == "ogg" ||
                            Input::file('videoArquivo')->guessExtension() == "ogx" ||
                            Input::file('videoArquivo')->guessExtension() == "webm" ){


                            $video_name = md5(uniqid(time())) . "." . Input::file('videoArquivo')->guessExtension();
                            //move image
                            Input::file('videoArquivo')->move('packages/assets/image/noticia/', $video_name);
                            $midiaNoticia = new MidiaNoticia;
                            $midiaNoticia->link = "packages/assets/image/noticia/".$video_name;
                            $midiaNoticia->text = "";
                            $midiaNoticia->id_noticia = $noticia->id;
                            $midiaNoticia->type = "video";
                            $midiaNoticia->type_video = "Arquivo";
                            $midiaNoticia->video_old_name = utf8_decode(Input::file('videoArquivo')->getClientOriginalName());
                            $midiaNoticia->image_old_name = "";
                            $midiaNoticia->save();

                            return Redirect::route('cadastrar-noticia')
                                ->withErrors(["Notícia salva com sucesso"]);
                        }else{
                            $noticia->delete();
                            return Redirect::route('cadastrar-noticia')
                                ->withInput()
                                ->withErrors(["Notícia pode ser salva, o formato do video dever ser .mp4, .ogg ou .webm!"]);
                        }

                    }

                    $noticia->delete();
                    return Redirect::route('cadastrar-noticia')
                        ->withInput()
                        ->withErrors(["Notícia não pode ser salva, Selecione um arquivo de video ou link o YouTube!"]);


                }elseif (Input::get('radiomidia') == "texto") {
                    if(Input::get("text-editor") != ""){
                        $midiaNoticia = new MidiaNoticia;
                        $midiaNoticia->link = "";
                        $midiaNoticia->text = Input::get("text-editor");
                        $midiaNoticia->id_noticia = $noticia->id;
                        $midiaNoticia->type = "texto";
                        $midiaNoticia->type_video = "";
                        $midiaNoticia->video_old_name = "";
                        $midiaNoticia->image_old_name = "";
                        $midiaNoticia->save();
                    }else{
                        $noticia->delete();
                        return Redirect::route('cadastrar-noticia')
                            ->withInput()
                            ->withErrors(["Notícia não pode ser salva, insira um texto para a notícia!"]);
                    }

                }else{
                    $noticia->delete();
                    return Redirect::route('cadastrar-noticia')
                        ->withInput()
                        ->withErrors(["Notícia não pode ser salva, selecione uma imagem!"]);
                }

            }catch (Exception $e){
                $noticia->delete();
                return Redirect::route('cadastrar-noticia')
                    ->withInput()
                    ->withErrors(["Notícia não pode ser salva!"]);
            }

			return Redirect::route('cadastrar-noticia')
                           ->withErrors(["Notícia salva com sucesso"]);

		}

		return Redirect::route('cadastrar-noticia')
						->withInput()
						->withErrors($validation);
	}



    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function atualizarNoticia()
    {
        $input = Input::all();


        $validation = Validator::make($input, Noticia::$rules);

        if ($validation->passes()){
            // ID_VIDEO?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1&amp;loop=1&amp;playlist=ID_VIDEO   for loop video youtube
            $noticia = Noticia::find(Input::get("id_noticia"));
            $noticia->title = Input::get("titulo");
            $noticia->subtitle = Input::get("subtitulo");
            $noticia->save();

            $midiaNoticia = MidiaNoticia::where("id_noticia","=",$noticia->id)->first();

            try{
                //imagem
                if (Input::get('radiomidia') == "imagem"){

                    if(!is_null(Input::file('imagem')) && !is_null(Input::file('imagemLateral'))){

                        if(File::exists($midiaNoticia->link)){
                            File::delete($midiaNoticia->link);
                        }

                        if(File::exists($midiaNoticia->text)){
                            File::delete($midiaNoticia->text);
                        }

                        $image_name = md5(uniqid(time())) . "." . Input::file('imagem')->guessExtension();
                        //move photo
                        $imagem_salva = Input::file('imagem')->move('packages/assets/image/noticia/',$image_name);

                        $image_lateral_name = $image_name;
                        //move photo
                        $imagem_lateral_salva = Input::file('imagemLateral')->move('packages/assets/image/cardapio/',$image_lateral_name);

                        //move image
                        if($imagem_salva && $imagem_lateral_salva){
                            $midiaNoticia->link = "packages/assets/image/noticia/".$image_name;
                            $midiaNoticia->text = "packages/assets/image/cardapio/".$image_lateral_name;
                            $midiaNoticia->id_noticia = $noticia->id;
                            $midiaNoticia->type = "imagem";
                            $midiaNoticia->type_video = "";
                            $midiaNoticia->video_old_name = "";
                            $midiaNoticia->image_old_name = Input::file('imagem')->getClientOriginalName();
                            $midiaNoticia->save();

                            return Redirect::route('lista-noticia')
                                ->withErrors(["Notícia salva com sucesso, Imagens foram alteradas"]);
                        }

                    }

                    return Redirect::route('lista-noticia')
                        ->withErrors(["Notícia salva com sucesso, Mas imagens não foram alteradas"]);


                 //video
                }elseif (Input::get('radiomidia') == "video") {

                    if(Input::get('radioCheckVideo') == "YouTube"){

                        if(Input::get('videoLink')!= ""){
                            $midiaNoticia->link = Input::get("videoLink");
                            $midiaNoticia->text = "";
                            $midiaNoticia->id_noticia = $noticia->id;
                            $midiaNoticia->type = "video";
                            $midiaNoticia->type_video = "YouTube";
                            $midiaNoticia->video_old_name = "";
                            $midiaNoticia->image_old_name = "";
                            $midiaNoticia->save();

                            return Redirect::route('lista-noticia')
                                ->withErrors(["Notícia salva com sucesso"]);
                        }

                        return Redirect::route('lista-noticia')
                            ->withErrors(["Notícia salva com sucesso, mas video não foi alterado"]);

                    }

                    if(Input::get('radioCheckVideo') != "YouTube"){
                        if(!is_null(Input::file('videoArquivo'))){

                            if(Input::file('videoArquivo')->guessExtension() == "mp4" ||
                                Input::file('videoArquivo')->guessExtension() == "ogg" ||
                                Input::file('videoArquivo')->guessExtension() == "ogv" ||
                                Input::file('videoArquivo')->guessExtension() == "webm" ){

                                if(File::exists($midiaNoticia->link)){
                                    File::delete($midiaNoticia->link);
                                }

                                $video_name = md5(uniqid(time())) . "." . Input::file('videoArquivo')->guessExtension();
                                //move image
                                Input::file('videoArquivo')->move('packages/assets/image/noticia/', $video_name);

                                $midiaNoticia->link = "packages/assets/image/noticia/".$video_name;
                                $midiaNoticia->text = "";
                                $midiaNoticia->id_noticia = $noticia->id;
                                $midiaNoticia->type = "video";
                                $midiaNoticia->type_video = "Arquivo";
                                $midiaNoticia->video_old_name = utf8_decode(Input::file('videoArquivo')->getClientOriginalName());
                                $midiaNoticia->image_old_name = "";
                                $midiaNoticia->save();

                                return Redirect::route('lista-noticia')
                                    ->withErrors(["Notícia salva com sucesso"]);
                            }else{
                                return Redirect::route('lista-noticia')
                                    ->withInput()
                                    ->withErrors(["Notícia salva com sucesso, mas video não foi alterado, formato dever ser .mp4, .ogg ou .webm!"]);
                            }
                        }

                        return Redirect::route('lista-noticia')
                            ->withInput()
                            ->withErrors(["Notícia salva com sucesso, mas video não foi alterado"]);
                    }


                    return Redirect::route('lista-noticia')
                        ->withErrors(["Notícia salva com sucesso, mas video não foi alterado"]);

                 //texto
                }elseif (Input::get('radiomidia') == "texto") {
                    if(Input::get("text-editor") != ""){

                        $midiaNoticia->link = "";
                        $midiaNoticia->text = Input::get("text-editor");
                        $midiaNoticia->id_noticia = $noticia->id;
                        $midiaNoticia->type = "texto";
                        $midiaNoticia->type_video = "";
                        $midiaNoticia->video_old_name = "";
                        $midiaNoticia->image_old_name = "";
                        $midiaNoticia->save();

                        return Redirect::route('lista-noticia')
                            ->withInput()
                            ->withErrors(["Notícia salva com sucesso, texto alterado!"]);
                    }

                    return Redirect::route('lista-noticia')
                        ->withInput()
                        ->withErrors(["Notícia salva com sucesso, mas o texto não foi alterado!"]);

                }else{

                    return Redirect::route('lista-noticia')
                        ->withInput()
                        ->withErrors(["Notícia não pode ser salva"]);
                }

            }catch (Exception $e){
                return Redirect::route('lista-noticia')
                    ->withInput()
                    ->withErrors(["Notícia não pode ser salva!"]);
            }

            return Redirect::route('lista-noticia')
                ->withErrors(["Notícia salva com sucesso"]);

        }

        return Redirect::route('lista-noticia')
            ->withInput()
            ->withErrors($validation);
    }



	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function verNoticia()
	{
        $noticia = Noticia::find(Input::get("id_noticia"));
        return View::make('prot-cap.ver-noticia',compact("noticia"));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return Response
	 */
	public function editLayout()
	{
        return View::make('admin.editar-layout-noticia');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return Response
	 */
	public function editLayoutTV()
	{
        return View::make('admin.editar-layout-noticia-tv');
	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return Response
	 */
	public function storeLayout(){
		$layoutNoticia = LayoutNoticia::find(1);
		$layoutNoticia->width_main = Input::get("larguraNoticiaPrincipal").'%';
		$layoutNoticia->height_main = Input::get("alturaNoticiaPrincipal").'px';

		if (Input::get("checkMostrarNoticiaPrincipal")) {
			$layoutNoticia->show_main = Input::get("checkMostrarNoticiaPrincipal");
		}else{ $layoutNoticia->show_main = "none"; }

		if (Input::get("checkTituloNoticiaPrincipal")) {
			$layoutNoticia->show_title_main = Input::get("checkTituloNoticiaPrincipal");
		}else{ $layoutNoticia->show_title_main = "none"; }

        if (Input::get("checkSubTituloNoticiaPrincipal")) {
            $layoutNoticia->show_subtitle_main = Input::get("checkSubTituloNoticiaPrincipal");
        }else{ $layoutNoticia->show_subtitle_main = "none"; }

		if (Input::get("checkMostrarNoticiaLateral")) {
			$layoutNoticia->show_side = Input::get("checkMostrarNoticiaLateral");
		}else{ $layoutNoticia->show_side = "none"; }
		
		$layoutNoticia->width_side = Input::get("larguraNoticiaLateral").'%';
		$layoutNoticia->height_side = Input::get("alturaNoticiaLateral").'px';	
		
		$layoutNoticia->background_color = Input::get("color_background");
		$layoutNoticia->color_background_path = Input::get("color_background_path");
		$layoutNoticia->color_title = Input::get("color_title");
		$layoutNoticia->color_title_path = Input::get("color_title_path");
		$layoutNoticia->color_subtitle = Input::get("color_subtitle");
		$layoutNoticia->color_subtitle_path = Input::get("color_subtitle_path");
		$layoutNoticia->save();	

		return Redirect::to("editar-layot-noticia")
					->withErrors(['Layout alterado com sucesso...!']);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @return Response
	 */
	public function storeLayoutTV(){
		$layoutNoticia = LayoutNoticiaTV::find(1);
		$layoutNoticia->width_main = Input::get("larguraNoticiaPrincipal").'%';
		$layoutNoticia->height_main = Input::get("alturaNoticiaPrincipal").'px';

		if (Input::get("checkMostrarNoticiaPrincipal")) {
			$layoutNoticia->show_main = Input::get("checkMostrarNoticiaPrincipal");
		}else{ $layoutNoticia->show_main = "none"; }

		if (Input::get("checkTituloNoticiaPrincipal")) {
			$layoutNoticia->show_title_main = Input::get("checkTituloNoticiaPrincipal");
		}else{ $layoutNoticia->show_title_main = "none"; }

        if (Input::get("checkSubTituloNoticiaPrincipal")) {
            $layoutNoticia->show_subtitle_main = Input::get("checkSubTituloNoticiaPrincipal");
        }else{ $layoutNoticia->show_subtitle_main = "none"; }

		if (Input::get("checkMostrarNoticiaLateral")) {
			$layoutNoticia->show_side = Input::get("checkMostrarNoticiaLateral");
		}else{ $layoutNoticia->show_side = "none"; }
		
		$layoutNoticia->width_side = Input::get("larguraNoticiaLateral").'%';
		$layoutNoticia->height_side = Input::get("alturaNoticiaLateral").'px';	
		
		$layoutNoticia->background_color = Input::get("color_background");
		$layoutNoticia->color_background_path = Input::get("color_background_path");
		$layoutNoticia->color_title = Input::get("color_title");
		$layoutNoticia->color_title_path = Input::get("color_title_path");
		$layoutNoticia->color_subtitle = Input::get("color_subtitle");
		$layoutNoticia->color_subtitle_path = Input::get("color_subtitle_path");
		$layoutNoticia->save();	

		return Redirect::to("editar-layot-noticia-tv")
					->withErrors(['Layout alterado com sucesso...!']);
	}



	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function selecionarPosicao()
	{

        //busca a noticia com a mesma posicao e muda a posicao para 0
        $noticias = Noticia::where('position','=',Input::get("posicao"))->get();
        foreach($noticias as $not){
            $not->position = 0;
            $not->save();
        }

        //pega a noticia com o mesmo id e muda a posição para a $posicao
        $noticia = Noticia::find(Input::get("id_noticia"));
        $noticia->position = Input::get("posicao");
        $noticia->save();

        return Redirect::to("lista-noticia")
                       ->withErrors(["Posição alterada com sucesso"]);

	}


    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function restaurarPadraoLayouNoticia()
    {
        $layoutNoticia = LayoutNoticia::find(1);

        $layoutNoticia->width_main = '75%';
        $layoutNoticia->height_main = '590px';
        $layoutNoticia->show_title_main = 'block';
        $layoutNoticia->width_side = '25%';
        $layoutNoticia->height_side = '105px';
        $layoutNoticia->show_main = 'block';
        $layoutNoticia->show_side = 'block';
        $layoutNoticia->background_color = '#FFFFFF';
        $layoutNoticia->color_background_path = 'packages/assets/image/menu/gradiente46.png';
        $layoutNoticia->color_title = '#D40000';
        $layoutNoticia->color_title_path = 'packages/assets/image/menu/gradiente11.png';
        $layoutNoticia->color_subtitle =  '#333333';
        $layoutNoticia->color_subtitle_path = 'packages/assets/image/menu/gradiente37.png';

        if($layoutNoticia->save()){
            return Redirect::to("editar-layot-noticia")
                ->withErrors(["Layout restaurado com sucesso."]);
        }

        return Redirect::to("editar-layot-noticia")
            ->withErrors(["Layout não pode ser restaurado."]);

    }


    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function restaurarPadraoLayouNoticiaTV()
    {
        $layoutNoticia = LayoutNoticiaTV::find(1);

        $layoutNoticia->width_main = '75%';
        $layoutNoticia->height_main = '530px';
        $layoutNoticia->show_title_main = 'block';
        $layoutNoticia->width_side = '25%';
        $layoutNoticia->height_side = '105px';
        $layoutNoticia->show_main = 'block';
        $layoutNoticia->show_side = 'block';
        $layoutNoticia->background_color = '#FFFFFF';
        $layoutNoticia->color_background_path = 'packages/assets/image/menu/gradiente46.png';
        $layoutNoticia->color_title = '#D40000';
        $layoutNoticia->color_title_path = 'packages/assets/image/menu/gradiente11.png';
        $layoutNoticia->color_subtitle =  '#333333';
        $layoutNoticia->color_subtitle_path = 'packages/assets/image/menu/gradiente37.png';

        if($layoutNoticia->save()){
            return Redirect::to("editar-layot-noticia-tv")
                ->withErrors(["Layout restaurado com sucesso."]);
        }

        return Redirect::to("editar-layot-noticia-tv")
            ->withErrors(["Layout não pode ser restaurado."]);

    }



	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy()
	{
		$noticia = Noticia::find(Input::get("id_noticia"));
		$midiaNoticias = MidiaNoticia::where('id_noticia','=',$noticia->id)->get();
		foreach ($midiaNoticias as $midiaNoticia) {
			if(File::exists(''.$midiaNoticia->link)){
				File::delete(''.$midiaNoticia->link);
                if(File::exists(''.$midiaNoticia->text)){
                    File::delete(''.$midiaNoticia->text);
                }
			}
			$midiaNoticia->delete(); 
		}
		
		if ($noticia->delete()) {
			return Redirect::to("lista-noticia")
                           ->withErrors(["Noticia deletada com sucesso"]);
		}else{
			return Redirect::to("lista-noticia")
                ->withErrors(["Noticia não pode ser deletada"]);
		}
	}

}
