<?php

class Feedback extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'user_id' => 'required',
		'listing_id' => 'required',
		'rating' => 'required',
		'message' => 'required'
	);
}