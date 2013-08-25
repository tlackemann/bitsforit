<?php

class Motd extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'message' => 'required',
		'link' => 'required',
		'active' => 'required',
		'publish_date' => 'required'
	);
}