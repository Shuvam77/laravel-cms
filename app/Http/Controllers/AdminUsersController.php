<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UsersEditRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AdminUsersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.users.create',  compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if(trim($request->password) == ''){
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = Hash::make($request->password);
        }

        if ($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();
            $file->move('photos', $name);

            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;

//            $imagePath = request('photo_id')->store('userImage', 'public');
//            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
//            $photo =Photo::create(['file'=>$name]);
//            $input['photo_id'] = $photo->id;
        }
        User::create($input);

        return redirect()->intended('admin-users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);


        return view('admin.users.edit', compact('user','roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        $user=User::findOrFail($id);

        if(trim($request->password) == ''){
            $input = $request->except('password');
        } else {
            $input = $request->all();
            $input['password'] = Hash::make($request->password);
        }

        if ($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();
            $file->move('photos', $name);

            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;

        }
        $user->update($input);

        return redirect()->intended('admin-users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user =  User::findOrFail($id);
       unlink(public_path().$user->photo->file);
        Photo::findOrFail($user->photo->id)->delete();

        $user->delete();

        return redirect()->intended('admin-users');
    }
}
