 <!-- Start trending post area -->
    <div class="trending-post-area">
        <div class="container-fluid">
            <div class="row">
                <div class="trend-post-list zm-posts owl-active-1 clearfix">
                    <!-- Start single trend post -->


                    @foreach($sliders as $slider)


                    <div class="col-2">
                        <article class="zm-trending-post zm-lay-a zm-single-post" data-dark-overlay="2.5"  data-scrim-bottom="9" data-effict-zoom="3">
                            <div class="zm-post-thumb">
                                <img src="/{{$slider->resim}}" alt="img">
                            </div>
                            <div class="zm-post-dis text-white">
                                <div class="zm-category"><a href="/kategori/{{$slider->kategori->id}}/{{$slider->kategori->slug}}" class="bg-cat-3 cat-btn">{{$slider->kategori->baslik}}</a></div>
                                <h2 class="zm-post-title"><a href="/yazi/{{$slider->id}}/{{$slider->slug}}">{{$slider->baslik}}</a></h2>
                                <div class="zm-post-meta">
                                    <ul>
                                        <li class="s-meta"><a href="#" class="zm-author">{{$slider->kullanici->name}}</a></li>
                                        <li class="s-meta"><a href="#" class="zm-date">{!! date('d-m-y',strtotime($slider->created_at))!!}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

