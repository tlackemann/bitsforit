<?php

class Listing extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'listing_id' => 'required',
		'created_at' => 'required',
		'updated_at' => 'required',
		'title' => 'required',
		'body' => 'required',
		'price' => 'required',
		'featured' => 'required',
		'condition' => 'required',
		'location' => 'required',
		'shipping_details' => 'required',
		'bitcoin_address' => 'required'
	);
}