<?php

class Item extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required',
		'body' => 'required',
		'price' => 'required',
		'condition' => 'required',
		'location' => 'required',
		'shipping_details' => 'required',
		'bitcoin_address' => 'required',
		'category_id' => 'required',
	);
}