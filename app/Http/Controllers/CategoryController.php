<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*
*L75: USING THE Post namespace
*/
use App\Post;

/*
*L90: USING THE Post namespace
*/
use App\Category;
/*
    L76: MAKING THE HALL RESOURCES
*/
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     /*
     change public function index() TO
        L102: IF THERE IS A QUERY FETCH IN HOME IF NOT PLAY NORMAL
      */
    public function index(Request $request)
    {
     
      $query = $request->get('q');
        
        if( $query ){
            
            $posts = $query ? Post::search( $query )->orderBy( 'id', 'desc' )->paginate('7') : Post::all();
            
            return view('home', compact('posts') );
        }else {

            $categories = Category::orderBy('name')->paginate(5);
            return view('categories.index', compact('categories'));
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
        //

        $this->validate($request, array('name'=>'required|max:255'));
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index');
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

        $category = Category::find($id);
        return view('categories.show', compact('category'));
        
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

        $category = Category::find($id);
        return view('categories.edit', compact('category'));
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
        //

        $category = Category::find($id);
        $this->validate($request, array('name'=>'required|max:255'));
        $category->name = $request->name;
        $category->save();
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $category = Category::find($id);
        $this->validate($request, array('name'=>'required|max:255'));
        // DETACHING THE RECIEVING TAG FROM THE posts TABLE
        $category->postsCat()->detach();
        // DESTROYIT
        Category::destroy($id);
        // MAKE THE REDIRECTION TO tags.index in the url /tags
        return redirect()->route('categories.index');
    }
}
