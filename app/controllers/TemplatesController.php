<?php

class TemplatesController extends BaseController {

	/**
	 * Template Repository
	 *
	 * @var Template
	 */
	protected $template;

	public function __construct(Template $template)
	{
		$this->template = $template;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$templates = $this->template->all();

		return View::make('templates.index', compact('templates'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('templates.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Template::$rules);

		if ($validation->passes())
		{
			$this->template->create($input);

			return Redirect::route('templates.index');
		}

		return Redirect::route('templates.create')
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
		$template = $this->template->findOrFail($id);

		return View::make('templates.show', compact('template'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$template = $this->template->find($id);

		if (is_null($template))
		{
			return Redirect::route('templates.index');
		}

		return View::make('templates.edit', compact('template'));
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
		$validation = Validator::make($input, Template::$rules);

		if ($validation->passes())
		{
			$template = $this->template->find($id);
			$template->update($input);

			return Redirect::route('templates.show', $id);
		}

		return Redirect::route('templates.edit', $id)
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
		$this->template->find($id)->delete();

		return Redirect::route('templates.index');
	}

}