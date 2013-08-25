<?php

class Category extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'slug' => 'required',
		'parent_id' => 'required',
		'active' => 'required'
	);
}