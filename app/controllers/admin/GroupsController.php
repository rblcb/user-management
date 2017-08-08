<?php

class GroupsController extends \BaseController {

    protected $group;

    /**
     * Inject the models.
     * @param Group $group
     */
    public function __construct(Group $group)
    {
        $this->group = $group;
    }

	/**
	 * Display a listing of groups
	 *
	 * @return Response
	 */
	public function index()
	{
		$groups = Group::all();

		return View::make('admin.groups.index', compact('groups'));
	}

	/**
	 * Show the form for creating a new group
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.groups.create');
	}

	/**
	 * Store a newly created group in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        // Validate the inputs
        $rules = array(
            'name' => 'required|unique:groups'
        );

        $validator = Validator::make($data = Input::all(), $rules);

        if ($validator->fails()){
            $messages = $validator->messages();
            return Redirect::to('admin/groups/create')->withInput()->with('messages', $messages);
        }else{
            $this->group->name = Input::get( 'name' );
            $this->group->save($rules);

        }

        return Redirect::route('admin.groups.index');
	}

	/**
	 * Display the specified group.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $group = Group::findOrFail($id);
		return View::make('admin::groups.show', compact('group'));
	}

	/**
	 * Show the form for editing the specified group.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$group = Group::find($id);

		return View::make('admin.groups.edit', compact('group'));
	}

	/**
	 * Update the specified group in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$group = Group::find($id);

        // Validate the inputs
        $rules = array(
            'name' => 'required|between:4,11|unique:groups'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {

            $group->name = Input::get( 'name' );

            // Save if valid. Password field will be hashed before save
            $group->save();
            return Redirect::back()->withErrors($validator)->withInput();
        }else{
            // Form validation failed
            return Redirect::to('admin/groups/' . $group->id . '/edit')->withInput()->withErrors($validator);
        }
	}

	/**
	 * Remove the specified group from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $group = Group::find($id);
        // if group still has members you can't delete it
        if(count($group->users)){
            return Redirect::back()->with("message", "Group has members");
        }else{
            Group::destroy($id);
            return Redirect::route('admin.groups.index');
        }

    }

}
