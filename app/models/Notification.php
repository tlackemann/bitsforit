<?php

class Notification extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'user_id' => 'required',
		'notification' => 'required',
		'dismissable' => 'required',
		'dismissed' => 'required',
		'severity' => 'required',
		'expire_at' => 'required'
	);
}