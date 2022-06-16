@extends('template_fe.app')

@section('konten')    

  <!-- Start Blog  -->
  <div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <hr>
                    <h1>Download Berkas SEBI SOCIAL FUND</h1>
                    <hr>
                </div>
            </div>
        </div>

         <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{ asset('template_fe')}}/images/categories_img_01.jpg" alt="" />
                        <a class="btn hvr-hover" href="#">Lorem ipsum dolor</a>
                    </div>
                </div> --}}
                @foreach ($download as $item)
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="shop-cat-box">
                                {{-- <a href="http://localhost:8000/storage/download/{{ $item->file }}" target = "_ blank"> --}}
                                    <img src="{{asset('storage/download/'.$item->img)}}" alt="image" class="image-fluid"/>
                                {{-- </a>  --}}
                                <a class="btn hvr-hover" style="background-color: orange" target="_blank" href="http://localhost:8000/storage/download/{{ $item->file }}">
                                    {{ $item->nama }}
                                </a>
                            </div>
                        </div>
                @endforeach
                {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/categories_img_02.jpg" alt="" />
                        <a class="btn hvr-hover" href="#">Lorem ipsum dolor</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/categories_img_03.jpg" alt="" />
                        <a class="btn hvr-hover" href="#">Lorem ipsum dolor</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- End Categories -->

        <!-- Start Categories  -->
            {{-- <div class="categories-shop">
                <div class="container">
                    <div class="row">
                        @foreach ($download as $item)
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="shop-cat-box">
                                <a href="http://localhost:8000/storage/download/{{ $item->file }}" target = "_ blank">
                                    <img src="{{asset('storage/download/'.$item->img)}}" alt="image" class="image-fluid"/>
                                </a> 
                                <a class="btn hvr-hover" href="#">{{ $item->nama }}</a>
                            </div>
                        </div>
                        @endforeach
                      
                    </div>
                </div>
            </div> --}}
         <!-- End Categories -->
        {{-- <div class="row">
            @foreach ($campaign as $item)        
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
        </div> --}}
        {{-- <div class="row mt-5">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    {{ $berita->links() }}
                </div>
            </div>
        </div> --}}
    </div>
</div>
<!-- End Blog  -->

@endsection