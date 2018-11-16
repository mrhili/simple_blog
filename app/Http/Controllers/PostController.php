<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*
  
  L126.04 : INITIALIZE DB
*/ 
use Illuminate\Support\Facades\DB;




/*
L24: USING POST NAME SPACE FOR ORKING IN CRUD OPERATION
*/
use App\Post;

    /*
    L55: USING Tag NAME SPACE FOR LINKING WITH Posts DATABASE
    */
use App\Tag;

/*    L82:*/
/*
  L126.05 : INITIALIZE AUTH 
*/   
use Auth;    

use App\Category;

/*
  L111: USING STORAGE TO STORAGE AND IMAGE TO MAKING IMAGES
*/
use Image;
use Storage;

/*
        137: use The Session
    */
 use Session;   



use Carbon\Carbon;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     /*
     change public function index() TO
        L101: IF THERE IS A QUERY FETCH IN HOME IF NOT PLAY NORMAL
      */
    public function index(Request $request)
    {
      
      $carbon = new Carbon;
      /*
        L126.1
      */
      if( Auth::check() ){
        $fav = DB::table('post_user')->whereUserId(Auth::user()->id)->pluck('post_id')->all(); 
      }
      $query = $request->get('q');
        
        if( $query ){
            
            $posts = $query ? Post::search( $query )->orderBy( 'id', 'desc' )->paginate(20) : Post::all();
            /*
            CHANGE
            return view('home', compact('posts') );
            TO
            
            */
            return view('home', compact('posts', 'fav', 'carbon') );
            
        }else {
          # code...
            /*
            L9: RETURNING THE home.blade.php VIEW
            */
            /*
            L25: LIMITING POSTS AND RETERNIT TO THE home.blade.php
            */
            $posts = Post::orderBy('id', 'desc')->paginate(20);
            /*
            CHANGE
            return view('home', compact('posts') );
            TO
            
            */
            return view('home', compact('posts', 'fav', 'carbon') );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      /*
      L26: RETURNING THE VIEW FROM resources/views/posts/create.blade.php
      */
      /*
      L56: CHANGING THE RETURN
      
      return view('posts.create', compact('tags'));
      
       AND SENDING AN VARIABLE THAT HAVE ALL TAGS
      */
      
      $tags = Tag::all();
      /*
      L83: 
      */
      $categories = Category::all();
      /*
      L84: CHANGING AND ADDING THE SENDING categories
      return view('posts.create', compact('tags'));
      
      */
      
      return view('posts.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        L26: MAKE A VALIDATION AN STORE ALL AND REDIRECTE TO 
        URL: posts/show
        */
      $this->validate($request, array(
        'title' => 'required|max:255',
        'slug' => 'required|min:3|max:255|unique:posts',
        'body' => 'required',
        
        /*
          L109: ADDING AN IMAGE VALIDATION
        */
        'img' =>  'image'
      ));
      
      $post=new Post;
      $post->title=$request->title;
      $post->slug=$request->slug;
      $post->body=$request->body;
      
      /*
        L112: SAVING THE IMAGE
      */
      
      if( $request->hasFile('img') ){
        
        $image = $request->file('img');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $location = 'photos/'.$imageName;
        Image::make($image)->save($location);
        $post->image = $imageName;
        
      }
      
      $post->save();
      /*
      L68: ADDING TAGS TO POST
      */
      
      $post->tags()->sync(
            $request->tags, false
          );
          
      /*
      L85: ADDING CATEGORIES TO POST
      */
      
      $post->categories()->sync(
            $request->categories, false
          );
      
      /*
        138: ADDING THE SUCCESS OR NON SUCCESS MESSAGES
      */
      Session::flash('success', 'The post has been published with success');
      return redirect()->route('posts.show', $post->id);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*
        * GET THE ID AND SEND IT TO 
        resources/views/post/show.blade.php
        */
        $post = Post::find($id);
        
        
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*
        L57: CHANGING THE edit METHODE 
        
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
        
        AND ADDING ALL TAGS FOR SENDING ALL TAGS TO URL: /posts/edit

        */
        
        $tags = Tag::all();
        
        /*
        L86: 
        */
        $categories = Category::all();
        
        $post = Post::find($id);
        /*
        L87: CHANGING TO SENDING A categories variable to the front end
        return view('posts.edit', compact('post', 'tags'));
        */
        
        return view('posts.edit', compact('post', 'tags', 'categories'));
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
        /*
        L26: MAKE A VALIDATION AN STORE ALL AND REDIRECTE TO 
        URL: posts/show
        */
      $post = Post::find($id);
      $this->validate($request, array(
        'title' => 'required|max:255',
        'slug' => "required|min:3|max:255|unique:posts,slug,$id",
        'body' => 'required',
        
        /*
          L110: ADDING AN IMAGE VALIDATION
        */
        'img' =>  'image'
      ));
      
      $post=new Post;
      $post->title=$request->title;
      $post->slug=$request->slug;
      $post->body=$request->body;
      
      /*
        L112: SAVING THE IMAGE
      */
      
      if( $request->hasFile('img') ){
        
        $image = $request->file('img');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $location = 'photos/'.$imageName;
        Image::make($image)->save($location);
        
        $oldPhoto = $post->image;
        
        $post->image = $imageName;
        
        Storage::delete($oldPhoto);
      }
      
      $post->save();
      
      /*
      L58: if there is tags on this updating
           sync the tags
            */
      if (isset($request->tags)) {
        # code...
          
          $post->tags()->sync(
            $request->tags
          );
      }else{
          $post->tags()->sync(
            array()
          );
      }
      
      /*
      L88:
      */
      if (isset($request->categories)) {
        # code...
          
          $post->categories()->sync(
            $request->categories
          );
      }else{
          $post->categories()->sync(
            array()
          );
      }
      
      
      
      return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*
        L28: DESTROY THE GIVEN id AND REDIRECT TO
        HOME PAGE
        */
        $post = Post::find($id);
        
        /*
        L59: DESTROY THE GIVEN id AND REDIRECT TO
        HOME PAGE
        */
        $post->tags()->detach();
        
        /*
        L89: DESTROY THE GIVEN id AND REDIRECT TO
        HOME PAGE
        */
        $post->categories()->detach();
        
        Post::destroy($id);
        return redirect('/');
    }
}