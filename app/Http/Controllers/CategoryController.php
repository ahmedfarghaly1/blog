<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\category;
use Validator;
use Auth;

class CategoryController extends Controller
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
        $categories = category::paginate(10);
        return view('category.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create', compact('category'));
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
            'name' => 'required|unique:categories|max:256',
        ]);

        if ($validator->fails()) {
            return redirect('category/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {

            $category = category::create([
                'name' => $request->name,
            ]);

        }

        return redirect('category');
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
        $category = category::findOrFail($id);

        return view('category.show',compact('category'));
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

        $category = category::findOrFail($id);

        return view('category.create', compact('category'));
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
        $category = category::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:256|unique:categories'.',id,' . $id,
        ]);

        if ($validator->fails()) {
            return redirect('category/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {

            $category->update([
                'name' => $request->name,
            ]);

        }

        return redirect('category');
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

        $category = category::findOrFail($id)->delete();

        return redirect()->back();
    }


    public function upload_image($image)
    {
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = storage_path('/app/public/');
        $image->move($destinationPath, $image_name);
        return $image_name;
    }

}
