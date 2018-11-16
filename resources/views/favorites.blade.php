{{-- L134: creating new page favorites.blade.php  --}}
@extends('layouts.app') 
  @section('content')


        <div class="col-md-8 col-md-offset-2">
            @if($user->UserPost()->count())
                @foreach($user->UserPost as $post)
                
                    @include('partials.post')
                
                @endforeach
            @else
                <div class="jumbotron">
                    <p>Nothing</p>
                    <hr>
                    <h3><a href="">Save</a></h3>
                </div>
            
            @endif
            
        </div>

    

@stop
