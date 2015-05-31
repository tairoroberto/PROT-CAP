<?php

class BannerController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('admin.editar-banner');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function indexTV()
	{
        return View::make('admin.editar-banner-tv');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('banners.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$banner = Banner::find(1);
		$banner->width = Input::get("larguraBanner")."%";
		$banner->height = Input::get("alturaBanner")."px";
		$banner->time = Input::get("time");
		if (Input::get("color_background")) {
			$banner->color_background = Input::get("color_background");
		}
		if (Input::get("color_background_path")) {
			$banner->color_background_path = Input::get("color_background_path");
		}		
		
		$banner->save();

		//change the name of photo for save in database			
		if (!is_null(Input::file('imagem'))){
            $baner_name = md5(uniqid(time())) . "." . Input::file('imagem')->guessExtension();
			//move photo
			$imagem_salva = Input::file('imagem')->move('packages/assets/image/banner/',$baner_name);

            if($imagem_salva){
                $image = new ImageBanner;
                $image->image_path = 'packages/assets/image/banner/'.$baner_name;
                $image->old_name = Input::file('imagem')->getClientOriginalName();
                $image->position = 0;
                $image->id_banner = $banner->id;
                $image->save();

            }else{
                return Redirect::to("editar-banner")
                    ->withErrors(['Banner não pode ser editado!']);
            }

		}

        return Redirect::to("editar-banner")
						->withErrors(['Banner editado com sucesso.']);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storeTV()
	{
		$bannerTV = BannerTV::find(1);
		$bannerTV->width = Input::get("larguraBanner")."%";
		$bannerTV->height = Input::get("alturaBanner")."px";
		$bannerTV->time = Input::get("time");
		if (Input::get("color_background")) {
			$bannerTV->color_background = Input::get("color_background");
		}
		if (Input::get("color_background_path")) {
			$bannerTV->color_background_path = Input::get("color_background_path");
		}		
		
		$bannerTV->save();

		//change the name of photo for save in database			
		if (!is_null(Input::file('imagem'))){

            $baner_name = md5(uniqid(time())) . "." . Input::file('imagem')->guessExtension();
            //move photo
            $imagem_salva = Input::file('imagem')->move('packages/assets/image/banner/tv/',$baner_name);

            if($imagem_salva){
                $ImageBannerTV = new ImageBannerTV;
                $ImageBannerTV->image_path = 'packages/assets/image/banner/tv/'.$baner_name;
                $ImageBannerTV->old_name = Input::file('imagem')->getClientOriginalName();
                $ImageBannerTV->position = 0;
                $ImageBannerTV->id_banner_tv = $bannerTV->id;
                $ImageBannerTV->save();

            }else{
                return Redirect::to("editar-banner")
                    ->withErrors(['Banner não pode ser editado!']);
            }
        }

		return Redirect::to("editar-banner-tv")
						->withErrors(['Banner editado com sucesso.']);
	}



    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function selecionarPosicaoBanner()
    {

        //busca a noticia com a mesma posicao e muda a posicao para 0
        $imagens = ImageBanner::where('position','=',Input::get("posicao"))->get();
        foreach($imagens as $img){
            $img->position = 0;
            $img->save();
        }

        //pega a noticia com o mesmo id e muda a posição para a $posicao
        $imagem = ImageBanner::find(Input::get("id_imagem"));
        $imagem->position = Input::get("posicao");
        $imagem->save();

        return Redirect::to("editar-banner")
            ->withErrors(["Posição alterada com sucesso"]);

    }


    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function selecionarPosicaoBannerTv()
    {

        //busca a noticia com a mesma posicao e muda a posicao para 0
        $imagens = ImageBannerTV::where('position','=',Input::get("posicao"))->get();
        foreach($imagens as $img){
            $img->position = 0;
            $img->save();
        }

        //pega a noticia com o mesmo id e muda a posição para a $posicao
        $imagem = ImageBannerTV::find(Input::get("id_imagem"));
        $imagem->position = Input::get("posicao");
        $imagem->save();

        return Redirect::to("editar-banner-tv")
            ->withErrors(["Posição alterada com sucesso"]);

    }



	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('banners.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('banners.edit');
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
		$image = ImageBanner::find(Input::get("id_image"));
		if(File::exists($image->image_path)){
			File::delete($image->image_path);

			
			if ($image->delete()) {
				return Redirect::to("editar-banner")
						->withErrors(['Banner deletado com sucesso.']);
			}else{
				return Redirect::to("editar-banner")
						->withErrors(['Banner não deletado.']);
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroyTV()
	{
		$imageTV = ImageBannerTV::find(Input::get("id_image"));
		if(File::exists($imageTV->image_path)){
			File::delete($imageTV->image_path);

			
			if ($imageTV->delete()) {
				return Redirect::to("editar-banner-tv")
						->withErrors(['Banner deletado com sucesso.']);
			}else{
				return Redirect::to("editar-banner-tv")
						->withErrors(['Banner não deletado.']);
			}
		}
	}

}
