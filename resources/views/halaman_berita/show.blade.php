@extends('template_fe.app')

@section('konten')    

<div class="container-fluid">
	<div class="row mt-5 ml-2 mr-2">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-8">
                    <h1 style="font-size: 40px"> <strong>{{ $berita_detail->judul_berita}}</strong></h1> <br>
                    <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($berita_detail->created_at)->translatedFormat(' d F Y') }}</li>
                        <li class="list-inline-item"><i class="fa fa-clock"></i> {{ \Carbon\Carbon::parse($berita_detail->created_at)->translatedFormat('h:i:s A') }}</li>
                        <li class="list-inline-item"><i class="fa fa-user"></i> Administrator</li>
                    </ul>
                    <hr>
					<img alt="Bootstrap Image Preview" style=" max-width:100%; height: auto;" src="{{asset('storage/berita/'.$berita_detail->img_berita)}}"/>
					<div class="mt-3 mb-3">
						<p class="text-justify">
							<b>{{$berita_detail->berita}}</b>
						</p>
					</div>
				</div>
				<div class="col-md-4  col-lg-4 col-xl-4">
                    <div class="card">
                        <div style="background-color: darkorange">  
                            <h2 class="card-title ml-3 mt-3 text-white"><strong>Berita Lainnya</strong></h2>
                        </div> 
                        <div class="card-body">
                            @foreach ($berita_lainnya as $item)                      
                            <div class="media pt-3">
                                <a href="{{ route('berita.show', $item->id )}}">
                                    <img style="max-width: 80px;" class="mr-3" alt="Bootstrap Media Preview" src="{{asset('storage/berita/'.$item->img_berita)}}" />
                                </a>
                                <div class="media-body">
                                    <h5 class="mt-0">
                                        <a href="{{ route('berita.show', $item->id )}}">
                                            {{ $item->judul_berita}}
                                        </a>
                                    </h5>
                                    <span class="badge bg-primary text-white">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat(' d F Y') }}</span>
                                    <span class="badge bg-danger text-white"> {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('h:i:s') }}</span>
                                </div>
                            </div>                      
                            @endforeach
                        </div>
                      </div>
                    
                    {{-- <ul class="simple-post-list">
                        <li>    
                                <div class="post-image" >
                                    <div class="img-thumbnail">
                                        <img src="https://petik.or.id/asset/img/baru235.jpg" class="img-responsive img-keg">
                                    </div>
                                </div>
                                <div class="post-info">
                                    <a href="https://petik.or.id/berita/get_index1" class="lnk-secondary">Pengumuman Kelulusan Mahasantri Penerima Program Beasiswa Pesantren PeTIK Angkatan VIII Tahun Akademik 2020/2021</a>
                                    <div class="post-meta">
                                        <span class="label label-primary label-lg">2020-08-14</span>
                                        <span class="label label-secondary label-lg">03:16:40</span>
                                    </div>
                                </div>
                            </li>
                    </ul> --}}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
