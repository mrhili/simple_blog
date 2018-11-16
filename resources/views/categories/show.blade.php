{{--L81: SHOW SPECIFIC CATEGORY AND MAKE BUTTON TO MANAGIT --}} 
@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Category | <strong>{{$category->name}}</strong></h1>
            <div class="col-md-6">
                <span><a href="{{route('categories.edit', $category->id )}}" class="btn btn-default">Edit</a></span>
            </div>
            <div class="col-md-6">
                <span>
                    <form action="{{ route('categories.destroy', $category->id )}}" method="post">
                        {{ method_field('DELETE') }}{{csrf_field()}}
                        <input type="submit" name="delete" value="Delete Category" class="btn btn-danger"/>
                    </form>
                </span>
            </div>
        </div>
        
        
        <div class="col-md-4">
            <h1>Informations about</h1>
            <h3>{{$category->name}} is in <strong>{{$category->postsCat()->count() }}</strong> posts</h3>
            
            <table>
                
                <thead>
                    <tr>
                        <th>
                            Post Name
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $category->postsCat as $post )
                    <tr>
                        <td>
                            <a href="{{ route('slug', $post->slug) }}">{{ $post->title }}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            
            </table>
            
        </div>
        
        
        
    </div>
</div>
@stop