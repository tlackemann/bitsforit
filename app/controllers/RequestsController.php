<?php

class RequestsController extends BaseController {

	/**
	 * Request Repository
	 *
	 * @var Request
	 */
	protected $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$requests = $this->request->all();

		return View::make('requests.index', compact('requests'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('requests.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Request::$rules);

		if ($validation->passes())
		{
			$this->request->create($input);

			return Redirect::route('requests.index');
		}

		return Redirect::route('requests.create')
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
		$request = $this->request->findOrFail($id);

		return View::make('requests.show', compact('request'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$request = $this->request->find($id);

		if (is_null($request))
		{
			return Redirect::route('requests.index');
		}

		return View::make('requests.edit', compact('request'));
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
		$validation = Validator::make($input, Request::$rules);

		if ($validation->passes())
		{
			$request = $this->request->find($id);
			$request->update($input);

			return Redirect::route('requests.show', $id);
		}

		return Redirect::route('requests.edit', $id)
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
		$this->request->find($id)->delete();

		return Redirect::route('requests.index');
	}

}