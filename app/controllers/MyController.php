<?php

class MyController extends BaseController {

	public function __construct()
	{
		
	}

	public function index()
	{
		$items = Item::select('*')->where('user_id', Sentry::getUser()->id)->get();
		return View::make('my.dashboard', compact('items'));
	}

	public function offers()
	{
		$listings = Item::where('user_id', Sentry::getUser()->id)->get();
		$listingIds = array();
		foreach($listings as $l)
		{
			$listingIds[] = $l->id;
		}
		$offers = Offer::whereIn('id', $listingIds)->get();

		return View::make('offers.user', compact('offers'));
	}

	public function items()
	{
		$items = Item::select('*')->where('user_id', Sentry::getUser()->id)->get();

		return View::make('items.user', compact('items'));
	}

}