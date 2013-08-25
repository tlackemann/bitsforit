<?php

class Item extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'item_id' => 'required',
		'created_at' => 'required',
		'updated_at' => 'required',
		'title' => 'required',
		'body' => 'required',
		'price' => 'required',
		'featured' => 'required',
		'condition' => 'required',
		'location' => 'required',
		'shipping_details' => 'required',
		'bitcoin_address' => 'required',
		'type_id' => 'required',
		'category_id' => 'required',
		'published' => 'required',
		'published_at' => 'required'
	);
}