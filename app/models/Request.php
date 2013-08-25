<?php

class Request extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'request_id' => 'required',
		'title' => 'required',
		'body' => 'required',
		'price' => 'required',
		'location' => 'required'
	);
}