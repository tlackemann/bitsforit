<?php

class Job extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required',
		'body' => 'required',
		'location' => 'required',
		'user_id' => 'required'
	);
}