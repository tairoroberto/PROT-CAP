<?php

class DocumentoController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('admin.cadastrar-documento');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $documentos = Document::where('deleted','!=','deleted')->get();
        return View::make('admin.lista-documentos',compact('documentos'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function logDocumento()
    {
        $documentos = Document::all();
        return View::make('admin.log-documentos',compact('documentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function logDocumentoDetalhe()
    {
        $logs = LogDocument::where('id_document','=',Input::get('id_document'))->get();
        return View::make('admin.log-documento-detalhe',compact('logs'));
    }




	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(){
        $input = Input::all();
        $validation = Validator::make($input, Document::$rules);

        if ($validation->passes()){
            try{
                $document = new Document;
                $ext = Input::file('arquivo')->guessExtension();
                $arquivo_name = md5(uniqid(time())) . "." . Input::file('arquivo')->guessExtension();
                $arquivo_salvo = Input::file('arquivo')->move('packages/documents/', $arquivo_name);
                $size_file = number_format(Input::file('arquivo')->getClientSize()/1024,3,'.',',')  ." MB";

                if($ext == ""){
                    $ext = pathinfo(Input::file('arquivo')->getClientOriginalName(), PATHINFO_EXTENSION);
                }

                if($arquivo_salvo){
                    $document->name = $arquivo_name;
                    $document->title = Input::get('titulo');
                    $document->size = $size_file;
                    $document->mime = $ext;
                    $document->count_modify = 1;
                    $document->save();

                    $log_document = new LogDocument;
                    $log_document->id_document = $document->id;
                    $log_document->id_user = Auth::getUser()->id;
                    $log_document->old_title = Input::get('titulo');
                    $log_document->new_title = Input::get('titulo');
                    $log_document->situation = "Cadastrado";
                    $log_document->save();

                    return Redirect::route('cadastrar-documento')
                        ->withErrors(['Documento salvo com sucesso']);

                }else{
                    return Redirect::route('cadastrar-documento')
                        ->withErrors(['Não foi possível salvar Documento']);
                }             
                     

            }catch (Exception $e){
                return Redirect::route('cadastrar-documento')
                    ->withErrors(['Não foi possível salvar Documento'.$e->getMessage()]);
            }

        }else{
            return Redirect::route('cadastrar-documento')
                ->withInput()
                ->withErrors($validation);
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
        return View::make('documentos.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('documentos.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function update()
	{
        $input = Input::all();
        $validation = Validator::make($input, Document::$rules);

        if ($validation->passes()){
            //get document that id is equal input
           $document = Document::find(Input::get('id_document'));
           $old_document = 'packages/documents/'.$document->name;

            if(File::exists($old_document)){
                if(File::delete($old_document)){
                    $ext = Input::file('arquivo')->guessExtension();
                    $arquivo_name = md5(uniqid(time())) . "." . Input::file('arquivo')->guessExtension();
                    $arquivo_salvo = Input::file('arquivo')->move('packages/documents/', $arquivo_name);
                    $size_file = number_format(Input::file('arquivo')->getClientSize()/1024,3,'.',',')  ." MB";

                    if($ext == ""){
                       $ext = pathinfo(Input::file('arquivo')->getClientOriginalName(), PATHINFO_EXTENSION);
                    }

                    if($arquivo_salvo){

                        $log_document = new LogDocument;
                        $log_document->id_document = $document->id;
                        $log_document->id_user = Auth::getUser()->id;
                        $log_document->old_title = $document->title;
                        $log_document->new_title = Input::get('titulo');
                        $log_document->situation = "Atualizado";
                        $log_document->save();

                        $document->name = $arquivo_name;
                        $document->title = Input::get('titulo');
                        $document->size = $size_file;
                        $document->mime = $ext;
                        $document->count_modify = $document->count_modify + 1;
                        $document->save();

                        return Redirect::route('lista-documentos')
                            ->withErrors(['Documento atualizado com sucesso!']);

                }else{
                    return Redirect::route('lista-documentos')
                            ->withErrors(['Não foi possível atualizar Documento']);
                }
            }


            }else{
                return Redirect::route('lista-documentos')
                    ->withErrors(['Não foi possível atualizar Documento']);
            }

        }else{
            return Redirect::route('lista-documentos')
                ->withInput()
                ->withErrors($validation);
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy()
	{
        $document = Document::find(Input::get('id_document'));
        $old_document = 'packages/documents/'.$document->name;
        $new_document = 'packages/documents/deleted/'.$document->name;

        if(File::exists($old_document)){
            if(File::move($old_document,$new_document)){
                $document->deleted = "deleted";
                $document->count_modify = $document->count_modify + 1;
                $document->save();

                $log_document = new LogDocument;
                $log_document->id_document = $document->id;
                $log_document->id_user = Auth::getUser()->id;
                $log_document->old_title = $document->title;
                $log_document->new_title = $document->title;
                $log_document->situation = "Deletado";
                $log_document->save();


                return Redirect::route('lista-documentos')
                    ->withErrors(['Documento deletado com sucesso!']);
            }else{
                return Redirect::route('lista-documentos')
                    ->withErrors(['Não foi possível deletar Documento']);
            }
        }
	}


    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function recoverDocument()
    {
        $document = Document::find(Input::get('id_document'));
        $old_document = 'packages/documents/deleted/'.$document->name;
        $new_document = 'packages/documents/'.$document->name;

        if(File::exists($old_document)){
            if(File::move($old_document,$new_document)){
                $document->deleted = "";
                $document->count_modify = $document->count_modify + 1;
                $document->save();

                $log_document = new LogDocument;
                $log_document->id_document = $document->id;
                $log_document->id_user = Auth::getUser()->id;
                $log_document->old_title = $document->title;
                $log_document->new_title = $document->title;
                $log_document->situation = "Recuperado";
                $log_document->save();


                return Redirect::route('log-documentos')
                    ->withErrors(['Documento recuperado com sucesso!']);
            }else{
                return Redirect::route('log-documentos')
                    ->withErrors(['Não foi possível recuperar Documento']);
            }
        }else{
            return Redirect::route('log-documentos')
                ->withErrors(['Não foi possível recuperar Documento']);
        }
    }

}
				