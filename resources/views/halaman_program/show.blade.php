@extends('template_fe.app')

@section('konten')   

<style>
    .videoWrapper {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 56.25%;
    }
    .video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>

  <!-- Start All Title Box -->
    <div class="all-title-box" style="background-image: url({{ asset('template_fe')}}/images/about1.png)"> 
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Program Detail</h2>
                    <ul class="breadcrumb" style="background-color: orange">
                        <li class="breadcrumb-item"><a href="{{ route('program_web')}}">Program</a></li>
                        <li class="breadcrumb-item active">Shop Detail </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="{{asset('storage/campaign/'.$program_detail->img)}}" alt="First slide"> </div>
                        </div>
                      
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h1>  <b> {{ $program_detail->nama }} </b></h1>
                        <h3>Deskripsi Program</h3>
						<p>{{ $program_detail->detail}}</p>
                        {{-- <a href="whatsapp://send?text=http://localhost:8000/program/show/{{ $program_detail->id }}">Bagikan ke WhatsApp</a> --}}
                        <h3>Jumlah Dana Yang di Butuhkan</h3>
                        <h2 style="color: #fbb714">Rp {{number_format($program_detail->target ?? 0, 2)}}</h2>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{ $program_detail->persen }}%;">{{ $program_detail->persen }}%</div>
                        </div>
                        <div class="add-to-btn mt-5">
							<div class="add-comp">
								<h1><b>Terkumpul</b> </h1>
                                <h2 style="color: #fbb714"> Rp {{number_format($program_detail->jumlah ?? 0, 2)}}</h2>
							</div>
							<div class="share-bar">
								<h1><b>Durasi</b> </h1>
                                <h2 style="color: #fbb714"> {{ \Carbon\Carbon::parse( $program_detail->waktu_awal )->diffInDays( $program_detail->waktu ) }} Hari Lagi</h2>
							</div>
						</div>
                        <div class="row" style="margin-top: 80px">
                            <div class="col-lg-12">
                                <div class="special-menu text-center">
                                    <div class="button-group filter-button-group">
                                        <a href="{{ route('donasi2', $program_detail->id)}}">
                                            <button style="background-color: #fbb714" class="active" data-filter="*">DONASI SEKARANG</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="title-all text-center mt-2">
                <h1>Video Progam</h1>
                <p>SEBI SOCIAL FUND</p>
            </div>
            <div class="videoWrapper" style=" position: relative; width: 100%; height: 0; padding-bottom: 56.25%;">
                <iframe src="{{$program_detail->video}}" 
                    style=" position: absolute; top: 0; left: 0; width: 100%; height: 100%;" 
                    frameborder="0" allowfullscreen class="video">
                </iframe>
			</div>
		

            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Program Lainnya</h1>
                        <p>SEBI SOCIAL FUND</p>
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">
                        @foreach ($program_lainnya as $item)
                            <div class="item">
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
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->

@endsection