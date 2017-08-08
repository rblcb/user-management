<?php

class UsersController extends \BaseController {

    /**
     * User Model
     * @var User
     */
    protected $user;

    /**
     * Inject the models.
     * @param User       $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		return View::make('admin::users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
	public function create()
	{
        $groups = Group::lists('name', 'id');
		return View::make('admin::users.create', compact('groups'));
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

        // Validate the inputs
        $rules = array(
            'username' => 'required|alpha_dash|unique:users,username',
            'fullname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|between:4,11|confirmed',
            'password_confirmation' => 'between:4,11',
        );


        $validator = Validator::make($data = Input::all(), $rules);

        if ($validator->fails()){
            $messages = $validator->messages();
            return Redirect::to('admin/users/create')->withInput()->with('messages', $messages);
        }else{
            $this->user->username = Input::get( 'username' );
            $this->user->fullname = Input::get( 'fullname' );
            $this->user->email = Input::get( 'email' );
            $this->user->password = Input::get( 'password' );

            $this->user->save($rules);

            if(Input::get("groups") != "default"){
                $group = Group::find(Input::get("groups"));
                $this->user->groups()->attach($group);

            }
        }

        return Redirect::route('admin.users.index');
    }

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);
        $groups = $user->groups->all();

		return View::make('admin::users.show', compact('user', 'groups'));
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
        $groups = Group::lists('name', 'id');

        foreach(Group::all() as $group){
            // check id group already assigned to user
            foreach($group->users as $u){
                if($user->id == $u->id){
                    unset($groups[$group->id]);
                }
            }
        }

		return View::make('admin::users.edit', compact('user', 'groups'));
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $user = User::find($id);
        // If the 'admin' user is being updated, the username of this user will have been
        // disabled in the form, and so won't be present in the form POST values.
        // We'll change the rules here accordingly. The admin user cannot be renamed
        // or deleted.

        if ($user->username == 'admin') {
            // Validate the inputs
            $rules = array(
                'fullname'=> 'required',
                'email' => 'required|email|unique:users,email,'. $user->id,
                'password' => 'between:4,11|confirmed',
                'password_confirmation' => 'between:4,11',
            );
        } else {
            // Validate the inputs
            $rules = array(
                'username'=> 'required|unique:users,username,'. $user->id,
                'fullname'=> 'required',
                'email' => 'required|email|unique:users,email,'. $user->id,
                'password' => 'between:4,11|confirmed',
                'password_confirmation' => 'between:4,11',
            );
        }

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {

            if ($user->username != 'admin') {
                $user->username = Input::get( 'username' );
            }
            $user->fullname = Input::get( 'fullname' );
            $user->email = Input::get( 'email' );
            $password = Input::get( 'password' );
            if(!empty($password)){
                $user->password = Hash::make($password);
            }

            if(Input::get("groups") != "default"){
                $group = Group::find(Input::get("groups"));
                $user->groups()->attach($group);

            }

            // Save if valid. Password field will be hashed before save
            $user->save();
			return Redirect::back()->withErrors($validator)->withInput();
		}else{
            // Form validation failed
            return Redirect::to('admin/users/' . $user->id . '/edit')->withInput()->withErrors($validator);
        }

	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		return Redirect::route('admin.users.index');
	}

    public function removeGroup($group_id, $user_id){
        $user = User::find($user_id);
        $group = Group::find($group_id);
        $user->groups()->detach($group);
        return Redirect::to('admin/users/'.$user->id.'/edit');
    }

}
