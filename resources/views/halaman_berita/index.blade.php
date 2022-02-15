@extends('template_fe.app')

@section('konten')    

  <!-- Start Blog  -->
  <div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <hr>
                    <h1>Berita Sebi Social Fund</h1>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($berita as $item)        
            <div class="col-md-6 col-lg-4 col-xl-4">             
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
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    {{ $berita->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog  -->

@endsection
