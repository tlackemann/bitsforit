<?php

class MotdsController extends BaseController {

	/**
	 * Motd Repository
	 *
	 * @var Motd
	 */
	protected $motd;

	public function __construct(Motd $motd)
	{
		$this->beforeFilter('admin_auth');

		$this->motd = $motd;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Find the current user
	    if ( ! Sentry::check())
		{
		    // User is not logged in, or is not activated
		    Session::flash('error', 'You must be logged in to perform that action.');
			return Redirect::to('/');
		}
		
		$motds = $this->motd->all();

		return View::make('motds.index', compact('motds'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('motds.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Motd::$rules);

		if ($validation->passes())
		{
			$this->motd->create($input);

			return Redirect::route('motds.index');
		}

		return Redirect::route('motds.create')
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
		$motd = $this->motd->findOrFail($id);

		return View::make('motds.show', compact('motd'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$motd = $this->motd->find($id);

		if (is_null($motd))
		{
			return Redirect::route('motds.index');
		}

		return View::make('motds.edit', compact('motd'));
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
		$validation = Validator::make($input, Motd::$rules);

		if ($validation->passes())
		{
			$motd = $this->motd->find($id);
			$motd->update($input);

			return Redirect::route('motds.show', $id);
		}

		return Redirect::route('motds.edit', $id)
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
		$this->motd->find($id)->delete();

		return Redirect::route('motds.index');
	}

}