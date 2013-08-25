<?php

class Setting extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'code' => 'required',
		'value' => 'required'
	);
}