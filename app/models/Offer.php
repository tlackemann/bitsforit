<?php

class Offer extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'price' => 'required',
		'message' => 'required'
	);
}