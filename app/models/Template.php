<?php

class Template extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'code' => 'required',
		'value' => 'required'
	);
}