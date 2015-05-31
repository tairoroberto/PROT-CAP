<?php

class Link extends Eloquent {
	protected $guarded = array();
    protected $table = "links";
	public static $rules = array(
        'titulo'  =>  'required|min:3|',
        'link'  =>  'required|url|min:3|'
    );
}
