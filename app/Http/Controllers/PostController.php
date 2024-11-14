<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::Paginate(5);
        return view('index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'max:2028', 'image'],
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'category_id' => ['required', 'integer'],
        ]);

        $filename = time() . '_' . $request->image->getClientOriginalName();
        $filepath = $request->image->storeAs('uploads', $filename);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->image = $filepath;
        $post->save();

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::findorfail($id);
        return view('show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findorfail($id);
        $category = Category::all();
        return view('edit', compact('post', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            // 'image' => ['required','max:2028','image'],
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'category_id' => ['required', 'integer'],
        ]);

        $post = Post::findorfail($id);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['required', 'max:2028', 'image'],

            ]);

            $filename = time() . '_' . $request->image->getClientOriginalName();
            $filepath = $request->image->storeAs('uploads', $filename);

            File::delete(public_path($post->image));

            $post->image = $filepath;
        }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;

        $post->save();

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findorfail($id);
        $post->delete();

        return redirect()->route('post.index');
    }

    public function trashed()
    {
        $post = Post::onlyTrashed()->get();
        return view('trashed',compact('post'));    
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->back();
    }

    public function force($id)
    {
        $post = Post::onlyTrashed()->findorfail($id);
        $post->forceDelete();

        return redirect()->back();
    }

    public function updated(Request $request , string $id){

       $request->validate([
          'title' => ['required','min:10','max:50','alpha'],
          'description' => ['required'],
       ]);

        $post = Post::findorfail($id);
        $post->save();

    }
}
