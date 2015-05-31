<?php

class Document extends Eloquent {
	protected $guarded = array();
    protected $table = 'documents';
	public static $rules = array(
        'titulo' => 'required',
        'arquivo'  => 'required'
    );
}
