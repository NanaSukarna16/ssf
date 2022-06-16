@extends('template_fe.app')

@section('konten')    

<!-- Start Slider -->
<div id="slides-shop" class="cover-slides">
    <ul class="slides-container">
        @forelse ($home as $item)
        <li class="text-center">
            <a href="#" class="pop">
                <img src="{{asset('storage/lp/'.$item->img_lp)}}" alt="image" width="100%" height="100%"/>
            </a>
        </li>         
        @empty
        <b>TIDAK ADA DATA</b> 
        @endforelse
       
       
    </ul>
    <div class="slides-navigation">
        <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </div>
</div>
<!-- End Slider -->

<!-- Start Categories  -->
{{-- <div class="categories-shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="shop-cat-box">
                    <img class="img-fluid" src="{{ asset('template_fe') }}/images/categories_img_01.jpg" alt="" />
                    <a class="btn hvr-hover" href="#">Lorem ipsum dolor</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="shop-cat-box">
                    <img class="img-fluid" src="{{ asset('template_fe') }}/images/categories_img_02.jpg" alt="" />
                    <a class="btn hvr-hover" href="#">Lorem ipsum dolor</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="shop-cat-box">
                    <iframe width="180" height="100" src="https://www.youtube.com/embed/TejElyHTyHQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <a class="btn hvr-hover" href="#">Lorem ipsum dolor sdvfvsdgfsdhfhshdhfhsdf</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- End Categories -->

{{-- <div class="box-add-products">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="offer-box-products">
                    <img class="img-fluid" src="{{ asset('template_fe') }}/images/add-img-01.jpg" alt="" />
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="offer-box-products">
                    <img class="img-fluid" src="{{ asset('template_fe') }}/images/add-img-02.jpg" alt="" />
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- Start Products  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>PROGRAM SEBI SOCIAL FUND</h1>
                </div>
            </div>
        </div>
        <div class="row special-list">
            @foreach ($program as $item) 
            <div class="col-lg-3 col-md-6 special-grid best-seller" data-aos="fade-up" data-aos-duration="2000">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <div class="type-lb">
                            <a href="{{ route('donasi2', $item->id)}}">
                                <p class="sale"  style="background-color: #fbb714;">DONASI SEKARANG</p>
                            </a>
                        </div>
                        <a href="{{ route('program.show', $item->id)}}">
                            <img src="{{asset('storage/campaign/'.$item->img)}}" class="img-fluid" alt="Image">
                        </a>
                        <div class="mask-icon" style="font-size: 9px">
                            <ul>
                                <li><a style="background-color: #fbb714" href="{{ route('program.show', $item->id)}}" data-toggle="tooltip" data-placement="left" title="Lihat"><i class="fas fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="why-text">
                        <a href="{{ route('program.show', $item->id)}}">
                            <h3 class="mb-3"><b>{{ $item->nama }}</b></h3>
                        </a>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ $item->persen }}%;"></div>
                        </div>
                        <div class="float-right mt-2">
                            <p><b>Durasi</b></p>
                            <h5 style="background-color: #fbb714; font-size: 10px"> {{ \Carbon\Carbon::parse( $item->waktu_awal )->diffInDays( $item->waktu ) }} Hari Lagi</h5>
                        </div>
                        <p class="mt-2"><b>Terkumpul</b></p>
                        <h5 style="background-color: #fbb714; font-size: 10px"> Rp {{number_format($item->jumlah ?? 0, 2)}}</h5>
                    </div>
                </div>
            </div>               
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <a href="{{ route('program_web')}}">
                            <button style="background-color: #fbb714" class="active" data-filter="*">Program Lainnya</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Products  -->


<!-- Start Blog  -->
{{-- <div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>PROGAM SEBI SOCIAL FUND</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($program as $item)        
            <div class="col-md-6 col-lg-4 col-xl-4">   
                <div class="card mt-3">
                        <a href="#" class="pop">
                            <img style="max-height: 140px;" src="{{asset('storage/campaign/'.$item->img)}}" class="card-img-top" alt="...">
                        </a>
                      <div class="card-body">
                        <h3 class="card-title"> <a href="#"><strong>{{ $item->nama }}</strong> </a> </h3>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ $item->persen }}%;">{{ $item->persen }}%</div>
                        </div>
                        <div class="mt-3">
                            <p class="card-text mt-3" style="float: left">Terkumpul <br> <b style="color: darkorange">Rp {{number_format($item->jumlah ?? 0, 2)}}</b> </p>
                            <p class="card-text mt-3" style="float: right">Durasi <br> <b style="color: darkorange">{{ \Carbon\Carbon::parse( $item->waktu_awal )->diffInDays( $item->waktu ) }} Hari Lagi</b> </p>
                        </div>
                        <div class="text-center" style="margin-top: 90px">
                            <button type="button" style="margin-top: 90px; background-color: darkorange;" class="btn text-center text-white" data-toggle="button" aria-pressed="false" autocomplete="off">
                                <strong>Donasi Sekarang</strong> 
                            </button>
                        </div>  
                      </div>
                       
                </div>     
            </div>
            @endforeach
        </div>
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <a href="{{ route('program_web')}}">
                        <button type="submit" class="btn btn-warning" style="background-color: darkorange; color: white">Program Lainnya</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- End Blog  -->



<!-- Start Blog  -->
<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Berita SEBI SOCIAL FUND</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($berita_terbaru as $item)
                <div class="col-md-6 col-lg-4 col-xl-4"  data-aos="fade-up" data-aos-anchor-placement="center-bottom">             
                    <div class="card mt-3">
                        <a href="{{ route('berita.show', $item->id )}}">
                            <img style="max-height: 180px;" src="{{asset('storage/berita/'.$item->img_berita)}}" class="card-img-top" alt="...">
                        </a>
                      <div class="card-body">
                        <h3 class="card-title"> <a href="{{ route('berita.show', $item->id )}}"><strong>{{ $item->judul_berita}}</strong> </a> </h3>
                        <p class="card-text">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat(' d F Y') }}</p>
                      </div>
                    </div>        
                </div>
            @endforeach
        </div>
        <div class="row mt-2">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <a href="{{ route('berita')}}">
                        <button type="submit" class="btn btn-warning" style="background-color: darkorange; color: white">Berita Lainnya</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog  -->


<!-- Start Blog  -->
<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Video Testimonial</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($video as $item)
            <div class="col-md-6 col-lg-4 col-xl-4"> 
                <iframe width="360" height="200" src="{{ $item->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <h3> <strong>{{ $item->judul_video }} </strong>  </h3>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Blog  -->

    <div class="row" style="background-color: orange">
        <div class="col-lg-12">
            <div class="title-all text-center">
                <h1 class="text-white mt-4">Jumlah Donatur SEBI SOCIAL FUND</h1>
                <img style="width: 60px;" src="{{asset('storage/donatur.png')}}" class="card-img-top" alt="...">
                <h1 class="text-white mt-4"><?php echo $jumlahDonatur ?> Donatur</h1>
            </div>
        </div>
    </div>

<!-- Start Blog  -->
<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Video Penerima Manfaat</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($video2 as $item)
            <div class="col-md-6 col-lg-4 col-xl-4"> 
                <iframe width="360" height="200" src="{{ $item->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <h3> <strong>{{ $item->judul_video }} </strong>  </h3>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Blog  -->


<!-- Start Instagram Feed  -->
<div class="instagram-box" style="background-color: darkorange">
    <h1 class="text-center text-white mb-3">Mitra SEBI Social Fund</h1>
    <div class="main-instagram owl-carousel owl-theme">
       
        @foreach ($mitra as $item)          
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{asset('storage/lp/'.$item->img_mitra)}}" alt="image"/>
                {{-- <img src="{{ asset('template_fe') }}/images/adira2.png" alt=""/> --}}
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- End Instagram Feed  -->

@endsection
