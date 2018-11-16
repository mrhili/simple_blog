{{--L79: CREATE INDEX OF CATEGORIES WITH A CREATE CATEGORY FORM --}} 
@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="header">Categories</div>
            @foreach($categories as $category)
            <p>
               <a href="{{ route('categories.show', $category->id) }}" class="btn btn-default btn-lg">Category <span><small><b>{{ $category->postsCat()->count()}}</b></small></span> : {{ $category->name }}</a>
               <br />
               
            </p>
            <hr />
            @endforeach
            <div class="row">
                <div class="col-md-8">
                    {{ $categories->links() }}
                </div>
            </div>
            
        </div>
        
        <div class="col-md-4">
            <div class="well">
                <h3>Create Category</h3>
                <hr />
                   
                <form method="post" role="form" class="form-horizontal" action="{{route('categories.store')}}">
                    {{csrf_field()}}


                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Add Category"  required autofocus /> 
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span> 
                        @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Create the Category
                        </button>
                        </div>
                    </div>

                 </form>
            
            </div>
            
        </div>
        
    </div>
</div>
@stop