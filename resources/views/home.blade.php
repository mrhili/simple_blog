@extends('layouts.app') 
@section('content')

  <?php $imgBanner = "img/withYou.png" ?>
  
  <?php $bigTitle = "موقعي" ?>
  
  <?php $description = "" ?>
  
  @include('partials/header', compact('imgBanner') )



<div class="container">
  <div class="row">
    <div class="col-xs-12">

      
      @if($posts->count()) 
        @foreach($posts as $post) 
          @include('partials/post') 
        @endforeach 
      @else
      <div class="jumbotron">
        <p>No post right know try to add one</p>
      </div>
      @endif

    </div>
    <hr />

    <div class="row">
      <div class="">
        {!!$posts->links()!!}
      </div>
    </div>

  </div>
</div>
@endsection