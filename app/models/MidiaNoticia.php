<?php

class MidiaNoticia extends Eloquent {
	protected $guarded = array();
	protected $table = 'midia_noticia';
	public static $rules = array(
        'videoArquivo' => 'mimes:mp4,ogg,webm'
    );
}
