{{--L27: CREATING THE VIEW FOR FETCHING A FORM --}} 
@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="text-center">{{$post->title}}</h2>
             {{-- 
                L120: SHOWING IMG
            --}}
            <span><img src="{{ asset( 'photos/'.$post->image ) }}" alt=""></span>
            <div class="col-md-12">
                <p class="lead">{!!$post->body!!}</p>
            </div>
            
                       
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Added On:</dt>
                    <dd>{{$post->created_at}}</dd>
                </dl>
            </div>
            
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Updated At:</dt>
                    <dd>{{$post->updated_at}}</dd>
                </dl>
            </div>
            
            
            {{-- L67: ADDING THE SHOW FOR TAGS --}}
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Tags:</dt>
                    <dd>
                    <ul>
                    @foreach($post->tags as $tag)
                    
                        <li class="label label-default"><a href="{{ route('tags.show', $tag->id) }}" class="">{{ $tag->name }}</a></li>
                    
                    @endforeach
                    </ul>
                    </dd>
                </dl>
            </div>
            
            
            
            {{-- L87.9: ADDING THE SHOW FOR CATS --}}
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Categories:</dt>
                    <dd>
                    <ul>
                    @foreach($post->categories as $category)
                    
                        <li class="label label-default"><a href="{{ route('categories.show', $category->id) }}" class="">{{ $category->name }}</a></li>
                    
                    @endforeach
                    </ul>
                    </dd>
                </dl>
            </div>
            
            
            
            
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Slug:</dt>
                    <dd><a href="{{ url('b', $post->slug) }}">{{$post->slug}}</a></dd>
                </dl>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a>
                    </div>
                    
                    <div class="col-sm-6">
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <input type="submit" value="Delete" class="btn btn-primary btn-block">
                        </form>
                    </div>
                
                </div>
                
                
            </div>
            
            <hr />
            
            <div class="col-sm-12">

                <a href="{{ route('posts.index') }}" class="btn btn-primary btn-block">All posts</a>
            </div>
        </div>
    </div>
</div>
@stop