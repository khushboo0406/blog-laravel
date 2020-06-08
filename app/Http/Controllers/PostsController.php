<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Post;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
        $posts = DB::select('SELECT * FROM posts');
        return view('Post.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'title'                    =>'required|between:5,100',
        'description'              =>'required|between:20,500'],[
            'title.required'       => 'The title field is required',
            'description.required' =>'The description field is required',
            'title.between'        => 'The first field must be between :min - :max characters long.',
            'description.between'  => 'The second answer must be between :min - :max characters long.',

        ]);

    
        $post = new Post;
        $post->title = $request->input('title');
        $post->Description = $request->input('description');
        $post->save();
        return redirect('/posts');

          
       

        // return 123;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =  Post::find($id);
        return view('Post.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post =  Post::find(decrypt(urldecode($id)));
        return view('Post.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required|between:5,100',
            'description'=>'required|between:20,500'],[
                'title.required' => 'The title field is required',
                'description.required' =>'The description field is required',
                'title.between' => 'The first field must be between :min - :max characters long.',
                'description.between' => 'The second answer must be between :min - :max characters long.',
    
            ]);
           
            $post = Post::find($id);
            $post->title = $request->input('title');
            $post->Description = $request->input('description');
            $post->save();
            return redirect('/posts');

            
            
          
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post = Post::find($id);
       $post->delete();
       return redirect('/posts');
    
    }

}
