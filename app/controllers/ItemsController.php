<?php

class ItemsController extends BaseController {

	/**
	 * Item Repository
	 *
	 * @var Item
	 */
	protected $item;

	public function __construct(Item $item)
	{
		$this->item = $item;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$items = $this->item->all();

		return View::make('items.index', compact('items'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('items.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Item::$rules);

		if ($validation->passes())
		{
			$this->item->create($input);

			return Redirect::route('items.index');
		}

		return Redirect::route('items.create')
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
		$item = $this->item->findOrFail($id);

		return View::make('items.show', compact('item'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$item = $this->item->find($id);

		if (is_null($item))
		{
			return Redirect::route('items.index');
		}

		return View::make('items.edit', compact('item'));
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
		$validation = Validator::make($input, Item::$rules);

		if ($validation->passes())
		{
			$item = $this->item->find($id);
			$item->update($input);

			return Redirect::route('items.show', $id);
		}

		return Redirect::route('items.edit', $id)
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
		$this->item->find($id)->delete();

		return Redirect::route('items.index');
	}

}