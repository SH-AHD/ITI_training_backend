<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
 
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{




    function savePosts($posts)
    {

        session()->put('posts', $posts);
    }


    function index()
    {
        $posts = Post::paginate(10);

        return view('posts.index', compact('posts'));
    }

    function show($id)
    {
        $posts = Post::findOrFail($id);

        return view('posts.show', compact('posts'));
    }




    function create()
    {

        return view('posts.create');
    }


    function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string|max:600',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);


        Post::create($request->all());
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }



    function edit($id)
    { 
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    function update(Request $request, $id)
    {
        
        $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string|max:600',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048' 
        ]);
    
        
        $post = Post::findOrFail($id);
    
        
        $post->title = $request->title;
        $post->description = $request->description;
    
        
        if ($request->hasFile('image')) {
            
            if ($post->image) {
                Storage::delete('public/imgs/' . $post->image);
            }
    
          
            $imgName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/imgs', $imgName);
            $post->image = $imgName;
        }
    
       
        $post->save();
    
       
        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }
    

    function destroy($id)
    {
        $post = Post::findOrFail($id);
        // dd($post);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Deleted successfully');
    }
}
