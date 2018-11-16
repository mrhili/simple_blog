{{--L80: CREATE PAGE FOR EDITING A CATEGORY --}} 
@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-4">
            <div class="well">
                <h3>Edite Category</h3>
                <hr />
                   
                <form method="post" role="form" class="form-horizontal" action="{{route('categories.update', $category->id)}}">
                    {{method_field('PUT')}}{{csrf_field()}}


                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $category->name }}" placeholder="Category Name"  required autofocus /> 
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
                            Update Category
                        </button>
                        </div>
                    </div>

                 </form>
            
            </div>
            
        </div>
        
    </div>
</div>
@stop