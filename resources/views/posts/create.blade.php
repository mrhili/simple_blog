{{--L27: CREATING THE FORM TO CREATE A NEW POST--}} 
@extends('layouts.app') 

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h1 class="panel-title">Add a great post</h1>
  </div>
  <div class="panel-body">
    {{-- 
      L116: 
    <form method="post" role="form" class="form-horizontal" action="{{route('posts.store')}}" enctype="multipart/form-data"> 
    --}}
    <form method="post" role="form" class="form-horizontal" action="{{route('posts.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}


      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label for="title" class="col-md-4 control-label">Title</label>

        <div class="col-md-6">
          <input id="title" type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Shourt and mean something"  required autofocus /> @if ($errors->has('title'))
          <span class="help-block">
              <strong>{{ $errors->first('title') }}</strong>
          </span> @endif
        </div>
      </div>

      <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
        <label for="slug" class="col-md-4 control-label">Slug</label>

        <div class="col-md-6">
          <input id="slug" type="text" class="form-control" name="slug" value="{{old('slug')}}" placeholder="" required /> @if ($errors->has('slug'))
          <span class="help-block">
              <strong>{{ $errors->first('slug') }}</strong>
          </span> @endif
        </div>
      </div>

      <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
        <label for="body" class="col-md-4 control-label">Text</label>

        <div class="col-md-6">
          <textarea name="body" id="body" class="form-control" placeholder="Make it Great" cols="30" rows="10">{{old('body')}}</textarea> @if ($errors->has('body'))
          <span class="help-block">
              <strong>{{ $errors->first('body') }}</strong>
          </span> @endif
        </div>
      </div>
      
      
      
      {{-- 
          L115: INPUT TO ADDING AN IMG
       --}}
      <div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
        <label for="img" class="col-md-4 control-label">Upload an image</label>

        <div class="col-md-6">
          <input type="file" name="img" id="img" class="form-control" multiple="multiple">
          {{-- 
          @if ($errors->has('file'))
          <span class="help-block">
              <strong>{{ $errors->first('body') }}</strong>
          </span> 
          @endif 
          --}}
        </div>
      </div>
      
      
      
      
      
      {{-- L65: ADDING A SELECT FORM FOR ADDING TAGS --}}
      <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
        <label for="tags" class="col-md-4 control-label">Tags</label>

        <div class="col-md-6">
          <select name="tags[]" id="tags" class="form-control multiSelect" multiple="multiple">
            @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{ $tag->name }}</option>
            @endforeach
          </select>
          
          @if ($errors->has('tags'))
          <span class="help-block">
              <strong>{{ $errors->first('tags') }}</strong>
          </span> 
          @endif
          
        </div>
      </div>
      
      {{-- L87: ADDING A SELECT FORM FOR ADDING CATEGORIES FOR A POST --}}
      <div class="form-group{{ $errors->has('categories') ? ' has-error' : '' }}">
        <label for="categories" class="col-md-4 control-label">Categories</label>

        <div class="col-md-6">
          <select name="categories[]" id="categories" class="form-control multiSelectCat" multiple="multiple">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{ $category->name }}</option>
            @endforeach
          </select>
          
          @if ($errors->has('categories'))
          <span class="help-block">
              <strong>{{ $errors->first('categories') }}</strong>
          </span> 
          @endif
          
        </div>
      </div>
      
      
      
      
      
      
      <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
          <button type="submit" class="btn btn-primary">
            Share it with the worldwide !
          </button>
        </div>
      </div>



    </form>
  </div>
</div>
@stop


@section('scripts')

<script type="text/javascript">
$('.multiSelect').select2();

{{-- L87.1:  --}}
$('.multiSelectCat').select2();

</script>
@stop