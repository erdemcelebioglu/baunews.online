<div class="slider-post-area">
    <div class="container">
        <div class="row">
            <!-- Start Left side -->
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-8">
                <div class="slider-post-area-content">
                    <ul class="slide-posts owl-carousel list-unstyled">

                        @foreach($sliders as $slider)
                            <li class="item">
                                <a href="/yazi/{{$slider->id}}/{{$yazi->slug}}"><img src="/{{$slider->resim}}" alt="img" width="804" height="467"></a>
                            </li>
                            @endforeach

                    </ul><!--/.owl-slider-->
                    <ul class="posts-thumbnails-wrapper list-unstyled">

                        @foreach($sliders as $slider)
                        <li class="post-thumbnail">
                            <a href="#"><img src="/{{$slider->resim}}" alt="img" width="150" height="75"></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- End Left side -->

            <!-- Start Righr side -->
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-md">
                <!-- Start post layout E -->
                <aside class="zm-post-lay-e-area">
                    <div class="row mb-30">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="zm-posts-tab-menu">
                                <ul class="nav nav-tabs">
                                    <li><a data-toggle="tab" href="#latest_posts">Popüler İçerikler</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="zm-posts-tab-content tab-content">
                                <!-- Start Latest Posts -->
                                <div id="latest_posts" class="zm-posts tab-pane fade in active">

                                    @foreach($enfazlayorumlar as $yorumlar)

                                        <article class="zm-post-lay-e zm-single-post clearfix">
                                            <div class="zm-post-thumb f-left">
                                                <a href="/yazi/{{$yorumlar->id}}/{{$yorumlar->slug}}"><img src="/{{$yorumlar->resim}}" alt="img" width="225" height="96"></a>
                                            </div>
                                            <div class="zm-post-dis f-right">
                                                <div class="zm-post-header">
                                                    <h2 class="zm-post-title"><a href="/yazi/{{$yorumlar->id}}/{{$yorumlar->slug}}">{{$yorumlar->baslik}}</a></h2>
                                                    <div class="zm-post-meta">
                                                        <ul>
                                                            <li class="s-meta"><a href="#" class="zm-author">{{$yorumlar->kullanici->name}}</a></li>
                                                            <li class="s-meta"><a href="#" class="zm-date">{!! date('d-m-y', strtotime($yorumlar->created_at)) !!}</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach



                                </div><!-- End Trending Posts -->
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- End post layout E -->
            </div>
            <!-- End Right side -->
        </div>
    </div>
</div>
