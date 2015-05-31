<?php

class Noticia extends Eloquent {
	protected $guarded = array();
	protected $table = 'noticia';
	public static $rules = array(
		'titulo'  =>  'required|min:3|',
		'subtitulo'  =>  'required|min:3|');
}
