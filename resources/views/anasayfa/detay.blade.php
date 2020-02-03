@extends ('anasayfa/template')
@section('icerik')

    <!-- Start page content -->
    <div id="page-content" class="page-wrapper">
        <div class="zm-section single-post-wrap bg-white ptb-70 xs-pt-30">
            <div class="container">
                <div class="row">
                    <!-- Start left side -->
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 columns">
                        {{--   <div class="row mb-40">
                               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                   <div class="section-title">
                                       <h2 class="h6 header-color inline-block uppercase">{{$yazi->baslik}}</h2>
                                   </div>
                               </div>
                           </div>--}}
                        <div class="row">
                            <!-- Start single post image formate-->
                            <div class="col-md-12">
                                <article class="zm-post-lay-single">


                                    @if($yazi->video != "")

                                        <div class="zm-post-video">
                                            <div class="embed-responsive-16by9 embed-responsive">
                                                <iframe src="{{ strip_tags($yazi->video) }}" class="embed-responsive-item" ></iframe>
                                            </div>
                                        </div>

                                    @else

                                    <div class="zm-post-thumb">
                                        <img src="/{{$yazi->resim}}" alt="img">
                                    </div>

                                    @endif

                                    <div class="zm-post-dis">
                                        <div class="zm-post-header">
                                            <h2 class="zm-post-title h2">{{$yazi->baslik}}</h2>
                                            <div class="zm-post-meta">
                                                <ul>
                                                    <li class="s-meta"><a href="#" class="zm-author">{{$yazi->kullanici->name}}</a></li>
                                                    <li class="s-meta"><a href="#" class="zm-date">{!! date('d-m-y', strtotime($yazi->created_at)) !!}</a></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="zm-post-content">
                                            {!! $yazi->icerik !!}

                                        </div>
                                        <div class="entry-meta-small clearfix ptb-0 mtb-40 border-top ">


                                        </div>
                                        {{--  <div class="administrator-info clearfix">
                                              <div class="administrator-avatar">
                                                  <img alt="administrator" src="images/post/single/author/1.jpg">
                                              </div>
                                              <div class="administrator-description">
                                                  <h4 class="post-title"><a href="#">About Thomson Smith</a></h4>
                                                  <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit. </p>
                                                  <div class="share-social-link">
                                                      <a href="#"><i class="fa fa-facebook"></i></a>
                                                      <a href="#"><i class="fa fa-twitter"></i></a>
                                                      <a href="#"><i class="fa fa-google-plus"></i></a>
                                                      <a href="#"><i class="fa fa-rss"></i></a>
                                                      <a href="#"><i class="fa fa-dribbble"></i></a>
                                                  </div>
                                              </div>
                                          </div>--}}
                                    </div>
                                </article>
                            </div>
                            <!-- End single post image formate -->
                        {{-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                             <nav class="zm-pagination ptb-40 mtb-40 text-center border-bottom border-top">
                                 <ul class="page-numbers clearfix">
                                     <li class=" pull-left"><a class="prev page-numbers" href="#">Previous</a></li>
                                     <li class="pull-right"><a class="next page-numbers" href="#">Next</a></li>
                                 </ul>
                             </nav>
                         </div>--}}
                        <!--Start Similar post -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <aside class="zm-post-lay-a2-area">
                                    <div class="post-title mb-40">
                                        <h2 class="h6 inline-block">Benzer İçerikler</h2>
                                    </div>
                                    <div class="row">
                                        <div class="zm-posts clearfix">

                                            @foreach($ilgililer as $ilgili)

                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                                    <article class="zm-post-lay-a2">
                                                        <div class="zm-post-thumb">
                                                            <a href="/yazi/{{$ilgili->id}}/{{$ilgili->slug}}"><img src="/{{$ilgili->resim}}" alt="img" width="350" height="150"></a>
                                                        </div>
                                                        <div class="zm-post-dis">
                                                            <div class="zm-post-header">
                                                                <h2 class="zm-post-title h2"><a href="/yazi/{{$ilgili->id}}/{{$ilgili->slug}}">{{$ilgili->baslik}}</a></h2>
                                                                <div class="zm-post-meta">
                                                                    <ul>
                                                                        <li class="s-meta"><a href="#" class="zm-author">{{$ilgili->kullanici->name}}</a></li>
                                                                        <li class="s-meta"><a href="#" class="zm-date">{!! date('d-m-y', strtotime($ilgili->created_at)) !!}</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </aside>
                            </div>
                            <!-- End similar post -->
                            <!-- Start Comment box  -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="review-area mt-50 ptb-70 border-top">
                                    <div class="post-title mb-5">
                                        <h2 class="h6 inline-block">Toplam Yorum Sayısı: {{$yazi->yorumlar->count()}}</h2>
                                    </div>
                                    <div class="post-title mb-40">
                                        <h2 class="h6 inline-block">Toplam Değerlendirme: {{$yazi->yorumlar->count()}}</h2>

                                        <p> <h2 class="h6 inline-block">Ortalama Değerlendirme Puanı: {{round($yazi->averageRating,1)}} @for($i=1;$i<=$yazi->ratingPercent(100);$i++)
                                               <i class="fa fa-star" aria-hidden="true"></i>
                                        @endfor </h2>
                                        </p>
                                    </div>
                                    <div class="review-wrap">
                                        <div class="review-inner">

                                            @foreach($yorumlar as $yorum)



                                            <div class="single-review clearfix">
                                                <div class="reviewer-img">
                                                    <img src="/{{$yorum->kullanici->avatar}}" alt="" width="125" height="75">
                                                </div>
                                                <div class="reviewer-info">
                                                    <h4 class="reviewer-name"><a href="#">{{$yorum->kullanici->name}}</a></h4>
                                                    <span class="date-time">{!! date('d-m-y', strtotime($yorum->created_at)) !!}</span>
                                                    <p class="reviewer-comment">{{$yorum->yorum}}</p>
                                                    <p> {{$yorum->rating}}
                                                        @for($i=1;$i<=$yorum->rating;$i++)
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            @endfor </p>



                                                </div>
                                            </div>
                                                @endforeach




                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Comment box  -->
                            @if(Auth::check())
                            <!-- Start comment form -->
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="comment-form-area">
                                    <div class="post-title mb-40">
                                        <h2 class="h6 inline-block">Yorum Yaz</h2>
                                    </div>
                                    <div class="form-wrap">
                                        <form action="{{route('yorum.gonder')}}" method="POST">
                                            {{csrf_field()}}
                                            <div class="form-inner clearfix">
                                                <div class="single-input">
                                                    <input type="hidden" value="{{$yazi->id}}" name="yazi">
                                                    <div class="post-title mb-40">
                                                        <h2 class="h6 inline-block">Değerlendirme</h2>
                                                        <input id="input-id" type="text" class="rating" data-size="sm" name="derece">
                                                    </div>


                                                    <textarea class="textarea" name="yorum" placeholder="Yorumunuzu Yazın..."></textarea>
                                                </div>
                                                <button class="submit-button" type="submit">Gönder</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @else
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        Yorum Yapabilmek İçin <a href="{{route('login')}}">Giriş Yapın</a> veya <a href="{{route('register')}}">Kayıt Olun</a>
                                    </div>



                                @endif
                            <!-- End comment form -->
                        </div>
                    </div>
                    <!-- End left side -->
                    <!-- Start Right sidebar -->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 sidebar-warp columns">
                        <div class="row">
                            <!-- Start post layout E -->
                            <aside class="zm-post-lay-e-area col-sm-6 col-md-12 col-lg-12 ">
                                <div class="row mb-40">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="section-title">
                                            <h2 class="h6 header-color inline-block uppercase">En Çok Yorum Alanlar</h2>
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
                            <!-- End post layout E -->
                            <aside class="zm-post-lay-f-area col-sm-6 col-md-12 col-lg-12 mt-70">
                                <div class="row mb-40">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="section-title">
                                            <h2 class="h6 header-color inline-block uppercase">Yeni Yorumlar</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="zm-posts">

                                            @foreach($yeniyorumlar as $sonyorum)

                                            <div class="zm-post-lay-f zm-single-post clearfix">
                                                <div class="zm-post-dis">
                                                    <p>{{$sonyorum->kullanici->name}}</a> - <em> {{$sonyorum->yorum}} </em>  <strong><a href="/yazi/{{$sonyorum->yazi->id}}/{{$sonyorum->yazi->slug}}">{{$sonyorum->yazi->baslik}}</a></strong></p>
                                                </div>
                                            </div>
                                           @endforeach

                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                    <!-- End Right sidebar -->
                </div>
            </div>
        </div>
    </div>
    <!-- End page content -->




@endsection



@section ('css')

@endsection
<script>
    // initialize with defaults
    $("#input-id").rating();

    // with plugin options (do not attach the CSS class "rating" to your input if using this approach)
    $("#input-id").rating({'size':'sm'});


</script>
@section('js')

@endsection
