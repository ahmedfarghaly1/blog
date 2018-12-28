<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Category;
use App\post;
use Validator;
use Auth;

class PostController extends Controller
{

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
        $posts = post::paginate(10);
        return view('post.post', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:256',
            'content' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect('post/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {  

            $image_path = $this->upload_image($request->image);
            
            $post = post::create([
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content,
                'image' => $image_path,
                'category_id' => $request->category,
            ]);
        }
        return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = post::findOrFail($id);

        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = post::findOrFail($id);
        return view('post.create', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = post::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:256|unique:posts'.',id,' . $id,
            'content' => 'required',
            'description' => 'required',
            'category' => 'required',

        ]);
        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        } else {  
            
            if ($request->hasFile('image')) {
                $image_path = $this->upload_image($request->image);
            }             
            $post = $post->update([
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content,
                'image' => isset($image_path) ?$image_path:$post->image,
                'category_id' => $request->category,
            ]);
        }
        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = post::findOrFail($id)->delete();

        return redirect()->back();
    }

    public function upload_image($image)
    {
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/posts/');
        $image->move($destinationPath, $image_name);
        return $image_name;
    }
}
