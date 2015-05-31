<?php

class AndroidController extends BaseController {


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function top()
    {
        return View::make('android.index-android-top');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function side()
    {
        return View::make('android.index-android-side');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function main()
    {
        return View::make('android.index-android-main');
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getLayoutMain()
    {
        return View::make('android.index-android-main');
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getLayoutSide()
    {
        return View::make('android.index-android-main');
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function downloadAndroid()
    {
        return Response::download('packages/assets/android/app-debug.apk');
    }

     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function downloadYoutube()
    {
        return Response::download('packages/assets/android/youtube.apk');
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getLayoutNoticia() {
        $layoutNoticia = LayoutNoticiaTV::find(1);
        $bannerTV = BannerTV::find(1);

        if(isset($layoutNoticia)){
            echo  ($layoutNoticia->id."@-@".$layoutNoticia->show_main."@-@".$layoutNoticia->show_side."@-@".$layoutNoticia->background_color."@-@".$bannerTV->color_background);
        }else{
            echo "Erro";
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getNoticia()
    {
        $noticias = Noticia::take(1)->where('position','!=',0)->orderBy('position','asc')->get();
        $layoutNoticia = LayoutNoticiaTV::find(1);

        foreach($noticias as $noticia){
            if(isset($noticia)){
                $midias = MidiaNoticia::where('id_noticia','=',$noticia->id)->get();

                foreach($midias as $midia){

                    if($midia->type == "imagem"){
                        echo  ($noticia->id."@-@".$noticia->title."@-@".$noticia->subtitle."@-@".$layoutNoticia->color_title."@-@".$layoutNoticia->color_subtitle."@-@".$midia->link."@-@".$midia->type."@-@imagem");
                    }elseif($midia->type == "texto"){
                        echo  ($noticia->id."@-@".$noticia->title."@-@".$noticia->subtitle."@-@".$layoutNoticia->color_title."@-@".$layoutNoticia->color_subtitle."@-@".$midia->link."@-@".$midia->type."@-@texto");
                    }else{
                        echo  ($noticia->id."@-@".$noticia->title."@-@".$noticia->subtitle."@-@".$layoutNoticia->color_title."@-@".$layoutNoticia->color_subtitle."@-@".$midia->link."@-@".$midia->type."@-@".$midia->type_video);
                    }

                }
            }else{
                echo "Erro";
            }
        }
    }



}
