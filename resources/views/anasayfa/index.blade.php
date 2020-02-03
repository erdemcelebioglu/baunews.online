@extends ('anasayfa/template')
@section('icerik')
    <!-- Start Popular News [layout A+D]  -->
    <div class="zm-section bg-white ptb-70">
        <div class="container">
            <div class="row mb-40">
                <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                    <div class="section-title">
                        <h2 class="h6 header-color inline-block uppercase">Popüler Haberler</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-sm-12 col-xs-12 col-lg-6">
                    <div class="zm-posts">
                        @if (isset($tekli))
                            <article class="zm-post-lay-a">
                                <div class="zm-post-thumb">
                                    <a href="/yazi/{{$tekli->id}}/{{$tekli->slug}}"><img src="/{{$tekli->resim}}" alt="img"></a>
                                </div>
                                <div class="zm-post-dis">
                                    <div class="zm-post-header">
                                        <div class="zm-category"><a href="/kategori/{{$tekli->kategori->id}}/{{$tekli->kategori->slug}}" class="bg-cat-1 cat-btn">{{$tekli->kategori->baslik}}</a></div>
                                        <h2 class="zm-post-title h2"><a href="/yazi/{{$tekli->id}}/{{$tekli->slug}}">{{$tekli->baslik}}</a></h2>
                                        <div class="zm-post-meta">
                                            <ul>
                                                <li class="s-meta">{{trans('meta.yazar')}} : <a href="#" class="zm-author">{{$tekli->kullanici->name}}</a></li>
                                                <li class="s-meta">{{trans('meta.tarih')}} : <a href="#" class="zm-date">{!! date('d-m-y', strtotime($tekli->created_at)) !!}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="zm-post-content">
                                        <p>{{str_limit(strip_tags($tekli->icerik), $limit=150, $end='...')}}</p>
                                    </div>
                                </div>
                            </article>
                            @endif
                    </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12 col-lg-6">
                    <div class="zm-posts">
                        @if (isset($yazilar) && count($yazilar) > 0)
                        @foreach($yazilar as $yazi)

                              <article class="zm-post-lay-d clearfix">
                            <div class="zm-post-thumb f-left">
                                <a href="/yazi/{{$yazi->id}}/{{$yazi->slug}}"><img src="/{{$yazi->resim}}" alt="img"></a>
                            </div>
                             <div class="zm-post-dis f-right">
                                <div class="zm-post-header">
                                    <div class="zm-category"><a href="/kategori/{{$yazi->kategori->id}}/{{$yazi->kategori->slug}}" class="bg-cat-2 cat-btn">{{$yazi->kategori->baslik}}</a></div>
                                    <h2 class="zm-post-title"><a href="/yazi/{{$yazi->id}}/{{$yazi->slug}}">{{$yazi->baslik}}</a></h2>
                                    <div class="zm-post-meta">
                                        <ul>
                                            <li class="s-meta">{{trans('meta.yazar')}} :<a href="#" class="zm-author">{{$yazi->kullanici->name}}</a></li>
                                            <li class="s-meta">{{trans('meta.tarih')}} :<a href="#" class="zm-date">{!! date('d-m-y', strtotime($tekli->created_at)) !!}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                            @endforeach
                            @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Video Post [View layout A]  -->
    <div class="video-post-area ptb-70 bg-dark">
        <div class="container">
            <div class="row mb-40">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-title">
                        <h2 class="h6 header-color inline-block uppercase">Videolar</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="zm-video-post-list zm-posts owl-active-3 navigator-1 clearfix">

                    @if (isset($videolar) && count($videolar) > 0)
                        @foreach($videolar as $video)

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="zm-video-post zm-video-lay-a zm-single-post">
                                    <div class="zm-video-thumb"  data-dark-overlay="2.5" >
                                        <img src="/{{$video->resim}}" alt="video" width="386" height="248">
                                        <a href="/yazi/{{$video->id}}/{{$video->slug}}">
                                            <i class="fa fa-play-circle-o"></i>
                                        </a>
                                    </div>
                                    <div class="zm-video-info text-white">
                                        <h2 class="zm-post-title"><a href="/yazi/{{$video->id}}/{{$video->slug}}">{{$video->baslik}}</a></h2>
                                        <div class="zm-post-meta">
                                            <ul>
                                                <li class="s-meta">{{trans('meta.yazar')}} : <a href="#" class="zm-author">{{$video->kullanici->name}}</a></li>
                                                <li class="s-meta">{{trans('meta.tarih')}} : <a href="#" class="zm-date">{!! date('d-m-y', strtotime($video->created_at)) !!}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                        @endif

                </div>
            </div>
        </div>
    </div>
    <!-- End Video Post [View layout A]  -->
    <div class="zm-section bg-white pt-20 pb-40">
        <div class="container">
            <div class="row">
                <!-- Start left side -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 columns">
                    <div class="row mb-40">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="section-title">
                                <h2 class="h6 header-color inline-block uppercase">Yeni Haberler</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="zm-posts">
                                @if (isset($yeniler) && count($yeniler) > 0)
                                @foreach($yeniler as $yeni)


                                <article class="zm-post-lay-c zm-single-post clearfix">
                                    <div class="zm-post-thumb f-left">
                                        <a href="/yazi/{{$yeni->id}}/{{$yeni->slug}}"><img src="/{{$yeni->resim}}" alt="img"></a>
                                    </div>
                                    <div class="zm-post-dis f-right">
                                        <div class="zm-post-header">
                                            <div class="zm-category"><a href="/kategori/{{$yeni->kategori->id}}/{{$yeni->kategori->slug}}" class="bg-cat-{{array_rand($renkler)}} cat-btn" style="color:#000000">{{$yeni->kategori->baslik}}</a></div>
                                            <h2 class="zm-post-title"><a href="/yazi/{{$yeni->id}}/{{$yeni->slug}}">{{$yeni->baslik}}</a></h2>
                                            <div class="zm-post-meta">
                                                <ul>
                                                    <li class="s-meta">{{trans('meta.yazar')}} :<a href="#" class="zm-author">{{$yeni->kullanici->name}}</a></li>
                                                    <li class="s-meta">{{trans('meta.tarih')}} :<a href="#" class="zm-date">{!! date('d-m-y', strtotime($yeni->created_at)) !!}</a></li>
                                                </ul>
                                            </div>
                                            <div class="zm-post-content">
                                                <p>{{str_limit(strip_tags($yeni->icerik), $limit=150, $end='...')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                    @endforeach
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
                <!-- End left side -->
                <!-- Start Right sidebar -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 sidebar-warp columns">
                    <div class="row">

                        <!-- Start post layout E -->
                        <aside class="zm-post-lay-e-area col-xs-12 col-sm-6 col-md-6 col-lg-12 mt-60 hidden-md">
                            <div class="row mb-40">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="section-title">
                                        <h2 class="h6 header-color inline-block uppercase">En Fazla Yorum Alanlar</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="zm-posts">


                                        @foreach($enfazlayorumlar as $yorumlar)

                                            <article class="zm-post-lay-e zm-single-post clearfix">
                                                <div class="zm-post-thumb f-left">
                                                    <a href="/yazi/{{$yorumlar->id}}/{{$yorumlar->slug}}"><img src="/{{$yorumlar->resim}}" alt="img" width="250" height="100"></a>
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


                    </div>
                </div>
            </div>
            </aside>
            <!-- Start post layout E -->
                    </div>
                </div>
                <!-- End Right sidebar -->
            </div>

            @if (isset($reklam))
                @if($reklam->link2 != "")
                    <div class="advertisement">
                        <div class="row mt-40">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                <a href="{{$reklam->link2}}"><img src="{{$reklam->reklam2}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                @endif
            @endif

        </div>
    </div>

@endsection



@section ('css')

@endsection

@section('js')

@endsection
