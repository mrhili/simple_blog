{{--L63: CREATE INDEX OF TAGS WITH A CREATE TAG FORM --}} 
@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-4">
            <div class="well">
                <h3>Create Tag</h3>
                <hr />
                   
                <form method="post" role="form" class="form-horizontal" action="{{route('tags.update', $tag->id)}}">
                    {{method_field('PUT')}}{{csrf_field()}}


                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $tag->name }}" placeholder="Tag Name"  required autofocus /> @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span> @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Update Tag
                        </button>
                        </div>
                    </div>

                 </form>
            
            </div>
            
        </div>
        
    </div>
</div>
@stop