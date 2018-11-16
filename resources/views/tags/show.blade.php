{{--L64: SHOW SPECIFIC TAG AND MAKE BUTTON TO MANAGIT --}} @extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Tag | <strong>{{$tag->name}}</strong></h1>
            <div class="col-md-6">
                <span><a href="{{route('tags.edit', $tag->id )}}" class="btn btn-default">Edit</a></span>
            </div>
            <div class="col-md-6">
                <span>
                    <form action="{{ route('tags.destroy', $tag->id )}}" method="post">
                        {{ method_field('DELETE') }}{{csrf_field()}}
                        <input type="submit" name="delete" value="Delete Tag" class="btn btn-danger"/>
                    </form>
                </span>
            </div>
            
            
        </div>
        
        
        <div class="col-md-4">
            <h1>Informations about</h1>
            <h3>{{$tag->name}} is in <strong>{{$tag->posts()->count() }}</strong> tags</h3>
            
            <table>
                
                <thead>
                    <tr>
                        <th>
                            Tag Name
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $tag->posts as $post )
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