
<div class="post-preview">
                    <a href="{{route('slug', $post->slug)}}">
                        <h2 class="post-title">
                            {{$post->title}}
                        </h2>
                    </a>
                        <p class="post-subtitle">
                          <div class="floatRight marginLeftXL relativeHolder">
                            <img src="{{ asset( 'photos/'.$post->image ) }}" alt="" class="img-responsive">   
                            <div class="absouteAppearTop text-center">
                                <a href="" >
                                    <span class="">
                                        Name
                                    </span>
                                </a>
                            </div>
                            <div class="absoluteAppearBottom">
                               
                                <span class="marginRightXL">
                                كتب مع {{ $post->created_at->hour . ' : ' . $post->created_at->minute . ' يوم ' . $post->created_at->day . ' / ' . $post->created_at->month . ' / ' . $post->created_at->year  }}
                                </span>
                            </div>
                                     
                          </div>
                          @if( strlen( $post->body ) > 500 )
                          
                            {{ mb_substr($post->body,0,500,'utf-8') . ' ... ' }}
                          
                          @else
                            
                            {{ $post->body }}
                          
                          @endif
                          <div class="clearfix"></div>
                        </p>
                    
                </div>
                <hr>
                





               {{-- <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            Man must explore, and this is exploration at its greatest
                        </h2>
                        <h3 class="post-subtitle">
                            Problems look mighty small from 150 miles up
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 24, 2014</p>
                </div>
                <hr> --}}






