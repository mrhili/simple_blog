{{--L27: CREATING THE VIEW FOR FETCHING A FORM --}} 
@extends('layouts.app') 
@section('content')
  <?php $imgBanner = asset( 'photos/'.$post->image ) ?>
  
  <?php $bigTitle = $post->title ?>
  
  <?php $description = "الكاتب" ?>
  @include('partials/header', compact('imgBanner') )
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <p class="lead">{!!$post->body!!}</p>
                </div>
            </div>
            
            
                {{-- 
            L150: UI COMMENTS
            --}}
            <div class="col-md-12 well" id="commentsForm">
                <h3>شاركنا برأيك في الموضوع</h3>
                <form action="{{ route('comments.store', $post->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" placeholder="الإسم" class="form-control" />
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="email" placeholder="البريد الإلكتروني" class="form-control" />
                        </div>
                        <div class="form-group col-md-12">
                            <textarea class="form-control" name="comment" placeholder="تعليقك"></textarea>
                            
                        </div>
                        
                        <div class="form-group col-md-12">
                            <button type="Submit" name="submitComment" class="default-primary-color-gradient btn buttonLink text-primary-color fullWidth">إضافة</button>
                            
                        </div>
                        
                        
                    </div>
                    
                </form>
            </div>
            <br />
            <hr />
            <br />
            <div class="col-md-12 media">
                @foreach($post->comment as $comment)
                    <div class="well">
                        
                        <a class="floatRight marginLeftXL" href="#">
                             <img class="media-object" src="{{ Identicon::getImageDataUri( $comment->email ) }}" alt="">
                        </a>
                        <div class="media-body">
                        <h4 class="media-heading">{{ $comment->name }}</h4>
                        <p>{{ strip_tags( $comment->comment ) }}</p>
                        </div>
                        <small class="pull-left secondary-text-color">كتب مع {{ $post->created_at->hour . ' : ' . $post->created_at->minute . ' يوم ' . $post->created_at->day . ' / ' . $post->created_at->month . ' / ' . $post->created_at->year  }}</small>
                        
                        <div class="clearfix"></div>
                    </div>
                    
                @endforeach
                
            </div>
            
            
            
            
        </div>
        

        
        
        <div class="col-sm-6 col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>كتب مع :</dt>
                    <dd>{{ $post->created_at->hour . ' : ' . $post->created_at->minute }}</dd>
                    <dd>{{ 'يوم ' . $post->created_at->day . ' / ' . $post->created_at->month . ' / ' . $post->created_at->year }}</dd>
                </dl>
                <hr />
                <dl class="dl-horizontal">
                    <dt>حدت مع :</dt>
                    <dd>{{ $post->updated_at->hour . ' : ' . $post->created_at->minute }}</dd>
                    <dd>{{ 'يوم ' . $post->updated_at->day . ' / ' . $post->updated_at->month . ' / ' . $post->updated_at->year }}</dd>
                </dl>
                <hr />
                <dl class="dl-horizontal">
                    <dt>علامات :</dt>
                    <dd>
                    <ul>
                    @foreach($post->tags as $tag)
                    
                        <li class="list-unstyled"><a href="{{ route('tags.show', $tag->id) }}" class="label label-default">{{ $tag->name }}</a></li>
                    
                    @endforeach
                    </ul>
                    </dd>
                    
                </dl>
                <hr />
                <dl class="dl-horizontal">
                    <dt>قسم :</dt>
                    @foreach($post->categories as $category)
                        <dd><a href="{{ route('categories.show', $category->id) }}" class="label label-default">{{ $category->name }}</a></dd>
                    @endforeach
                </dl>
            </div>

            
            <div class="well">
                <div class="row">
                    <div class="col-xs-6 text-center">
                        <a href="{{ route('posts.edit', $post->id) }}" class="default-primary-color-gradient btn buttonLink text-primary-color">تحديث</a>
                    </div>
                    

                    
                    <div class="col-xs-6 text-center">
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <input type="submit" value="حذف" class="default-primary-color-gradient btn buttonLink text-primary-color">
                        </form>
                    </div>

                    <br />
                    <br />
                    
                    <div class="col-xs-12">
                        <a href="" class="default-primary-color-gradient btn buttonLink text-primary-color fullWidth">كل المواضيع</a>
                    </div>
                    
               </div>
                
                
            </div>
            
            <hr />
            
            
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    </div>
</div>


@stop 

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    {{--  --}}





