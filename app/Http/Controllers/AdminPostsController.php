<?php

namespace App\Http\Controllers;

use App\category;
use App\Http\Requests\PostsCreateRequest;
use App\Http\Requests\PostsEditRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $posts = Post::all();
        $posts = Auth::user()->posts->all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {

        $input = $request->all();
        $user = Auth::user();

        if ($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();
            $file->move('photos', $name);

            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;

        }
        $user->posts()->create($input);
        return redirect()->intended('admin-posts');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if (Auth::user()->id == $post->user_id){
            $categories = category::all();
            return view('admin.posts.edit',compact('post', 'categories'));
        } else{
            return redirect()->intended('admin-posts');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsEditRequest $request, $id)
    {
        $input = $request->all();

        if ($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();
            $file->move('photos', $name);

            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;

        }
        Auth::user()->posts()->whereId($id)->first()->update($input);

        return redirect()->intended('admin-posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $post = Post::findOrFail($id);
//        if (Auth::user()->id == $post->user_id){
            unlink(public_path().$post->photo->file);
            Photo::findOrFail($post->photo->id)->delete();

            $post->delete();
            return redirect()->intended('admin-posts');
//        } else{
//            return redirect()->intended('admin-posts');
//        }


    }
}
