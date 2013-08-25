<?php

class NotificationsController extends BaseController {

	/**
	 * Notification Repository
	 *
	 * @var Notification
	 */
	protected $notification;

	public function __construct(Notification $notification)
	{
		$this->notification = $notification;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$notifications = $this->notification->all();

		return View::make('notifications.index', compact('notifications'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('notifications.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Notification::$rules);

		if ($validation->passes())
		{
			$this->notification->create($input);

			return Redirect::route('notifications.index');
		}

		return Redirect::route('notifications.create')
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
		$notification = $this->notification->findOrFail($id);

		return View::make('notifications.show', compact('notification'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$notification = $this->notification->find($id);

		if (is_null($notification))
		{
			return Redirect::route('notifications.index');
		}

		return View::make('notifications.edit', compact('notification'));
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
		$validation = Validator::make($input, Notification::$rules);

		if ($validation->passes())
		{
			$notification = $this->notification->find($id);
			$notification->update($input);

			return Redirect::route('notifications.show', $id);
		}

		return Redirect::route('notifications.edit', $id)
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
		$this->notification->find($id)->delete();

		return Redirect::route('notifications.index');
	}

}