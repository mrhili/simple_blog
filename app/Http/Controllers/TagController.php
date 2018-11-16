<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*
* L43: USING THE CLASS APP
*/
use App\Tag;

/*
*L46: USING THE Post namespace
*/
use App\Post;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
/*
     change public function index() TO
        L103: IF THERE IS A QUERY FETCH IN HOME IF NOT PLAY NORMAL
      */
    public function index(Request $request)
    {
     
      $query = $request->get('q');
        
        if( $query ){
            
            $posts = $query ? Post::search( $query )->orderBy( 'id', 'desc' )->paginate('7') : Post::all();
            return view('home', compact('posts') );
            
        }else {
        /*
        *L43:ORDERING THE RETURNED TAG WITH THE 
        URL
        /tags/
        AND THE VIEW PAGE IS resources/views/tags/inde.blade.php
        */
            $tags = Tag::orderBy('name')->paginate(5);
            return view('tags.index', compact('tags'));
            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function store(Request $request)
    {
        //
        /*
        *L47: STORE THE TAG AT THE tags TABLE
        */
        $this->validate($request, array('name'=>'required|max:255'));
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();
        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        /*
        *L48: SHOWING THE SPECIFIC TAG BY THE RECIVING ID
              AND SHOWING THE VIEW tags/show.blade.php
        */
        
        $tag = Tag::find($id);
        return view('tags.show', compact('tag'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        /*
        *L50: EDITING THE RECIEVING TAG
        */
        $tag = Tag::find($id);
        return view('tags.edit', compact('tag'));
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
        *L51: MAKE THE EDIT FOR THE RECIEVING TAG
        AND MAKING THE VALIDAT
        */
        $tag = Tag::find($id);
        $this->validate($request, array('name'=>'required|max:255'));
        $tag->name = $request->name;
        $tag->save();
        return redirect()->route('tags.index');
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
        *L52: DESTROYING THE RECIEVING TAG
        */
        $tag = Tag::find($id);
        $this->validate($request, array('name'=>'required|max:255'));
        // DETACHING THE RECIEVING TAG FROM THE posts TABLE
        $tag->posts()->detach();
        // DESTROYIT
        Tag::destroy($id);
        // MAKE THE REDIRECTION TO tags.index in the url /tags
        return redirect()->route('tags.index');
    }
}
