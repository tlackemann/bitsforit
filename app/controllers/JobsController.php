<?php

class JobsController extends BaseController {

	/**
	 * Job Repository
	 *
	 * @var Job
	 */
	protected $job;

	public function __construct(Job $job)
	{
		$this->job = $job;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$jobs = $this->job->all();

		return View::make('jobs.index', compact('jobs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('jobs.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Job::$rules);

		if ($validation->passes())
		{
			$this->job->create($input);

			return Redirect::route('jobs.index');
		}

		return Redirect::route('jobs.create')
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
		$job = $this->job->findOrFail($id);

		return View::make('jobs.show', compact('job'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$job = $this->job->find($id);

		if (is_null($job))
		{
			return Redirect::route('jobs.index');
		}

		return View::make('jobs.edit', compact('job'));
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
		$validation = Validator::make($input, Job::$rules);

		if ($validation->passes())
		{
			$job = $this->job->find($id);
			$job->update($input);

			return Redirect::route('jobs.show', $id);
		}

		return Redirect::route('jobs.edit', $id)
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
		$this->job->find($id)->delete();

		return Redirect::route('jobs.index');
	}

}