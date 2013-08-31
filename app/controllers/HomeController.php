<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		$itemCategories = Category::where('type','item')->get();
		$jobCategories = Category::where('type','job')->get();
		$categoryIds = array();

		// Get all the category ids
		foreach($itemCategories as $itemCategory)
		{
			$categoryId = $itemCategory->id;
			if (!isset($categoryIds[$categoryId])) $categoryIds[$categoryId] = $categoryId;
		}
		foreach($jobCategories as $jobCategory)
		{
			$categoryId = $jobCategory->id;
			if (!isset($categoryIds[$categoryId])) $categoryIds[$categoryId] = $categoryId;
		}

		// Count the objects for each category id
		$categoryCount = array();
		$itemCollection = Item::wherein('category_id', $categoryIds)->get();
		foreach($itemCollection as $item)
		{
			$categoryId = $item->category_id;

			if (!isset($categoryCount[$categoryId]))
			{
				$categoryCount[$categoryId] = 1;
			}
			else
			{
				++$categoryCount[$categoryId];
			}
		}

		// Return the final arrays
		foreach ($itemCategories as $itemCategory)
		{
			$count = $itemCategory->id;
			$itemCategory->name = $itemCategory->name." ({$count})";
		}
		foreach ($jobCategories as $jobCategory)
		{
			$count = $jobCategory->id;
			$jobCategory->name = $jobCategory->name." ({$count})";
		}

		return View::make('hello', compact('itemCategories','jobCategories'));
	}

}