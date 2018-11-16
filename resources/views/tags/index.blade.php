{{--L62: CREATE INDEX OF TAGS WITH A CREATE TAG FORM --}} 
@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="header">Tags</div>
            @foreach($tags as $tag)
            <p>
               <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-default btn-lg">Tag <span><small><b>{{ $tag->posts()->count()}}</b></small></span> : {{ $tag->name }}</a>
               <br />
               
            </p>
            <hr />
            @endforeach
            <div class="row">
                <div class="col-md-8">
                    {{ $tags->links() }}
                </div>
            </div>
            
        </div>
        
        <div class="col-md-4">
            <div class="well">
                <h3>Create Tag</h3>
                <hr />
                   
                <form method="post" role="form" class="form-horizontal" action="{{route('tags.store')}}">
                    {{csrf_field()}}


                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Add Tag"  required autofocus /> @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span> @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Update the tag
                        </button>
                        </div>
                    </div>

                 </form>
            
            </div>
            
        </div>
        
    </div>
</div>
@stop