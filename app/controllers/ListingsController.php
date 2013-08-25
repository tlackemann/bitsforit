<?php

class ListingsController extends BaseController {

	/**
	 * Listing Repository
	 *
	 * @var Listing
	 */
	protected $listing;

	public function __construct(Listing $listing)
	{
		$this->listing = $listing;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$listings = $this->listing->all();

		return View::make('listings.index', compact('listings'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('listings.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Listing::$rules);

		if ($validation->passes())
		{
			$this->listing->create($input);

			return Redirect::route('listings.index');
		}

		return Redirect::route('listings.create')
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
		$listing = $this->listing->findOrFail($id);

		return View::make('listings.show', compact('listing'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$listing = $this->listing->find($id);

		if (is_null($listing))
		{
			return Redirect::route('listings.index');
		}

		return View::make('listings.edit', compact('listing'));
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
		$validation = Validator::make($input, Listing::$rules);

		if ($validation->passes())
		{
			$listing = $this->listing->find($id);
			$listing->update($input);

			return Redirect::route('listings.show', $id);
		}

		return Redirect::route('listings.edit', $id)
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
		$this->listing->find($id)->delete();

		return Redirect::route('listings.index');
	}

}