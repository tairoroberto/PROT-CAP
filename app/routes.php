<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Routes tv
Route::get('/tv', array(
	'as' => 'index',
	'uses' => 'HomeController@indexTv'
));

//Routes user
Route::get('/', array(
	'as' => 'index',
	'uses' => 'HomeController@index'
));

Route::get("contatos", array(
	'as' => 'contatos',
	'uses' => 'ContatoController@index'
));

Route::get("aniversarios", array(
	'as' => 'aniversarios',
	'uses' => 'AniversarioController@index'
));

Route::get("formularios", array(
	'as' => 'formularios',
	'uses' => 'FormularioController@index'
));

Route::get("cardapio", array(
	'as' => 'cardapio',
	'uses' => 'CardapioController@index'
));

//Downoad document
Route::post("download-documento","FormularioController@downloadDocument");

Route::group(array('before'=>'auth'), function(){
    //Routes Administrator area


            Route::get("home", array(
                'as' => 'home',
                'uses' => 'AdminController@index'
            ));

            Route::get("usuarios-cadastro", array(
                'as' => 'usuarios-cadastro',
                'uses' => 'UsuarioController@create'
            ));

            Route::get("usuarios-lista", array(
                'as' => 'usuarios-lista',
                'uses' => 'UsuarioController@index'
            ));

            Route::get("cadastrar-noticia", array(
                'as' => 'cadastrar-noticia',
                'uses' => 'NoticiaController@index'
            ));

            Route::get("editar-layot-noticia", array(
                'as' => 'editar-layot-noticia',
                'uses' => 'NoticiaController@editLayout'
            ));

            Route::get("editar-layot-noticia-tv", array(
                'as' => 'editar-layot-noticia-tv',
                'uses' => 'NoticiaController@editLayoutTV'
            ));

            Route::get("lista-noticia", array(
                'as' => 'lista-noticia',
                'uses' => 'NoticiaController@create'
            ));

            Route::get("editar-menu", array(
                'as' => 'editar-menu',
                'uses' => 'MenuController@create'
            ));

            Route::get("editar-banner", array(
                'as' => 'editar-banner',
                'uses' => 'BannerController@index'
            ));

            Route::get("editar-banner-tv", array(
                'as' => 'editar-banner-tv',
                'uses' => 'BannerController@indexTV'
            ));

            Route::get("editar-cardapio", array(
                'as' => 'editar-cardapio',
                'uses' => 'CardapioController@create'
            ));

            Route::get("cadastrar-documento", array(
                'as' => 'cadastrar-documento',
                'uses' => 'DocumentoController@index'
            ));

            Route::get("lista-documentos", array(
                'as' => 'lista-documentos',
                'uses' => 'DocumentoController@create'
            ));

            Route::get("log-documentos", array(
                'as' => 'log-documentos',
                'uses' => 'DocumentoController@logDocumento'
            ));

            Route::get("log-documentos-detalhe", array(
                'as' => 'log-documentos-detalhe',
                'uses' => 'DocumentoController@logDocumentoDetalhe'
            ));

            Route::get("links-cadastro", array(
                'as' => 'links-cadastro',
                'uses' => 'LinksController@create'
            ));

            Route::get("links-lista", array(
                'as' => 'links-lista',
                'uses' => 'LinksController@index'
            ));

    Route::group(array('before'=>'csrf'),function(){
            //Store memu color
            Route::post("editar-menu", "MenuController@store");

            //Restaurar memu
            Route::post("restaurar-menu", "MenuController@restaurarPadraoMenu");

            //Store Banner
            Route::post("editar-banner", "BannerController@store");

            //Store Banner TV
            Route::post("editar-banner-tv", "BannerController@storeTV");

            //change position Banner
            Route::post("mudar-posicao-banner", "BannerController@selecionarPosicaoBanner");

            //Store Banner TV
            Route::post("mudar-posicao-banner-tv", "BannerController@selecionarPosicaoBannerTv");

            //Destroy Image banner
            Route::post("deleta-image-banner", "BannerController@destroy");

            //Destroy Image banner TV
            Route::post("deleta-image-banner-tv", "BannerController@destroyTV");

            //Store Notice
            Route::post("cadastrar-noticia", "NoticiaController@store");

            //Change Notice position
            Route::post("mudar-posicao-noticia", "NoticiaController@selecionarPosicao");

            //Store Notice Layout
            Route::post("editar-layot-noticia", "NoticiaController@storeLayout");

            //Recover Notice Layout
            Route::post("restaurar-layot-noticia", "NoticiaController@restaurarPadraoLayouNoticia");

            //Store Notice Layout Tv
            Route::post("editar-layot-noticia-tv", "NoticiaController@storeLayoutTV");

            //Recover Notice Layout Tv
            Route::post("restaurar-layot-noticia-tv", "NoticiaController@restaurarPadraoLayouNoticiaTV");

            //Store Cardapio
            Route::post("editar-cardapio", "CardapioController@store");

            //Destroy Image Cardapio
            Route::post("deleta-image-cardapio", "CardapioController@destroy");


            //Edit Notice
            Route::post("edit-noticia", "NoticiaController@editNoticia");

            //Edit Notice
            Route::post("editar-noticia", "NoticiaController@atualizarNoticia");

            //Destroy Notice
            Route::post("deleta-noticia", "NoticiaController@destroy");

            //show notice
            Route::post("ver-noticia","NoticiaController@verNoticia");

            //store user
            Route::post("salvar-usuario", "UsuarioController@store");

            //delete user
            Route::post("deleta-usuario", "UsuarioController@destroy");

            //store document
            Route::post("cadastrar-documento", "DocumentoController@store");

            //update document
            Route::post("atualizar-documento", "DocumentoController@update");

            //delete document
            Route::post("deletar-documento", "DocumentoController@destroy");

            //recover document
            Route::post("recuperar-documento", "DocumentoController@recoverDocument");

            //show log detail
            Route::post("log-documentos-detalhe","DocumentoController@logDocumentoDetalhe");

            //store links
            Route::post('links-cadastro','LinksController@store');
            Route::post('links-deletar','LinksController@destroy');

        });
    }
);

//Login route
Route::get("/admin", "AdminController@login");

Route::post("/login", function (){

    $activeDirectory = new ActiveDirectory();

    //verify if user exists in active directory
    try{
        //verify if user is the admin
        if(Input::get("username") == "Admin" && Input::get("password") == "protcap"){
            //remember password and set credentials value for login in Auth()
            $remember = Input::has("remember");
            $credentials = array(
                'username' => strtolower(Input::get('username')),
                'password' => Input::get("password")//use the email to make a hash for login in laravel auth
            );

            if (Auth::attempt($credentials, $remember)) {
                return Redirect::intended("/home");

            } else{
                throw new Exception("Login inválido");
            }
        }else{
            if($activeDirectory->authUser(Input::get('username'),Input::get('password'))){

                //get activedirectory user
                $user = $activeDirectory->getUser(Input::get('username'));

                //remember password and set credentials value for login in Auth()
                $remember = Input::has("remember");
                $credentials = array(
                    'username' => strtolower(Input::get('username')),
                    'password' => $user['userprincipalname'][0]//use the email to make a hash for login in laravel auth
                );

                if (Auth::attempt($credentials, $remember)) {
                    return Redirect::intended("/home");

                } else{
                    throw new Exception("Login inválido");
                }
            }
        }
    }catch(Exception $e){
        return Redirect::to("admin")
            ->with('flash_error', 1)
            ->withInput();
    }
    
});


Route::get("logout", array(
	'as' => 'logout',
	'uses' => 'AdminController@logout'
));

Route::get("index-android-top", array(
    'as' => 'index-android-top',
    'uses' => 'AndroidController@top'
));

Route::get("index-android-side", array(
    'as' => 'index-android-side',
    'uses' => 'AndroidController@side'
));

Route::get("index-android-main", array(
    'as' => 'index-android-main',
    'uses' => 'AndroidController@main'
));

Route::post("android-get-layout-noticia","AndroidController@getLayoutNoticia");
Route::post("android-get-noticia","AndroidController@getNoticia");

//Downoad document
Route::get("download-android","AndroidController@downloadAndroid");

//Downoad document
Route::get("download-youtube","AndroidController@downloadYoutube");

//Route to seed in database
Route::get("dbseed",function(){
    Schema::dropIfExists("banner");
    Schema::dropIfExists("banner_tv");
    Schema::dropIfExists("cardapio");
    Schema::dropIfExists("documents");
    Schema::dropIfExists("imagens_banner");
    Schema::dropIfExists("imagens_banner_tv");
    Schema::dropIfExists("layout_noticia");
    Schema::dropIfExists("layout_noticia_tv");
    Schema::dropIfExists("links");
    Schema::dropIfExists("log_document");
    Schema::dropIfExists("menu");
    Schema::dropIfExists("midia_noticia");
    Schema::dropIfExists("migrations");
    Schema::dropIfExists("noticia");
    Schema::dropIfExists("password_reminders");
    Schema::dropIfExists("sessions");
    Schema::dropIfExists("users");
    Schema::dropIfExists("users_ad");

    $Migrations = Config::get('database.migrations', 'migrations');

    //If we had already installed Migrations, than just import demo data to DB
    if (Schema::hasTable($Migrations)) {
        Artisan::call('db:seed', ['--force'=> true]);

    } else {
        Artisan::call('migrate:install');
        Artisan::call('migrate', ['--force'=> true]);
        Artisan::call('db:seed', ['--force'=> true]);
        Artisan::call('get:users');
    }
    return Redirect::to("/");
});

Route::get("download-projeto",function(){
    return Response::download('packages/prot-cap.zip');
});

/*pega os usuarios do Active Directory*/
Route::get("users",function(){
    Artisan::call('get:users');
    return Redirect::to("/");
});


/*Armazena os dados das tabelas em cacha para ser restarada depois */
Route::get("save-cache", function(){
    if(!Cache::has("banners")){
        Cache::put("banners",Banner::all(),60*2);
    }
    if(!Cache::has("bannerTvs")){
        Cache::put("bannerTvs",BannerTV::all(),60*2);
    }
    if(!Cache::has("cardapios")){
        Cache::put("cardapios",Cardapio::all(),60*2);
    }
    if(!Cache::has("documents")){
        Cache::put("documents",Document::all(),60*2);
    }
    if(!Cache::has("imageBanners")){
        Cache::put("imageBanners",ImageBanner::all(),60*2);
    }
    if(!Cache::has("imageBannerTVs")){
        Cache::put("imageBannerTVs",ImageBannerTV::all(),60*2);
    }
    if(!Cache::has("layoutNoticias")){
        Cache::put("layoutNoticias",LayoutNoticia::all(),60*2);
    }
    if(!Cache::has("layoutNoticiaTVs")){
        Cache::put("layoutNoticiaTVs",LayoutNoticiaTV::all(),60*2);
    }
    if(!Cache::has("links")){
        Cache::put("links",Link::all(),60*2);
    }
    if(!Cache::has("logDocuments")){
        Cache::put("logDocuments",LogDocument::all(),60*2);
    }
    if(!Cache::has("menuSuperiors")){
        Cache::put("menuSuperiors",MenuSuperior::all(),60*2);
    }
    if(!Cache::has("midiaNoticias")){
        Cache::put("midiaNoticias",MidiaNoticia::all(),60*2);
    }
    if(!Cache::has("noticias")){
        Cache::put("noticias",Noticia::all(),60*2);
    }
    if(!Cache::has("users")){
        Cache::put("users",User::all(),60*2);
    }
    if(!Cache::has("userAds")){
        Cache::put("userAds",UserActiveDirectory::all(),60*2);
    }
    if(!Cache::has("migrations")){
        Cache::put("migrations",DB::table('migrations')->get(),60*2);
    }
    if(!Cache::has("password_reminders")){
        Cache::put("password_reminders",DB::table('password_reminders')->get(),60*2);
    }
    if(!Cache::has("sessions")){
        Cache::put("sessions",DB::table('sessions')->get(),60*2);
    }

    return Redirect::to("/");
});









