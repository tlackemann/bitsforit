<?php

class CategoriesController extends BaseController {

	/**
	 * Category Repository
	 *
	 * @var Category
	 */
	protected $category;

	public function __construct(Category $category)
	{
		$this->beforeFilter('admin_auth');

		$this->category = $category;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = $this->category->all();

		return View::make('categories.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	    // Find the current user
	    if ( ! Sentry::check())
		{
		    // User is not logged in, or is not activated
		    Session::flash('error', 'You must be logged in to perform that action.');
			return Redirect::to('categories/');
		}
		else
		{
			return View::make('categories.create');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Category::$rules);

		if ($validation->passes())
		{
			$this->category->create($input);

			return Redirect::route('categories.index');
		}

		return Redirect::route('categories.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$category = $this->category->findOrFail($id);

		return View::make('categories.show', compact('category'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	    // Find the current user
	    if ( ! Sentry::check())
		{
		    // User is not logged in, or is not activated
		    Session::flash('error', 'You must be logged in to perform that action.');
			return Redirect::to('categories/');
		}
		else
		{
			$category = $this->category->find($id);

			if (is_null($category))
			{
				return Redirect::route('categories.index');
			}

			return View::make('categories.edit', compact('category'));
		}
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Category::$rules);

		if ($validation->passes())
		{
			$category = $this->category->find($id);
			$category->update($input);

			return Redirect::route('categories.show', $id);
		}

		return Redirect::route('categories.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->category->find($id)->delete();

		return Redirect::route('categories.index');
	}

}