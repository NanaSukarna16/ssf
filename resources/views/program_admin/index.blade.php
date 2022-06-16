@extends('template_be.app')

@section('konten')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @if (session('status'))
        <div class="alert-icon shadow-inner wrap-alert-b">
            <div class="alert alert-success alert-st-one" role="alert">
                <i class="fa fa-check edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                {{-- <p class="message-mg-rt"><strong>Well done!</strong> You successfully read this important message.</p> --}}
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Hover table card start -->
<div class="row">
    <div class="card">

         {{-- Awal landing page --}}
         <div class="card-header">
            <div class="float-right">
                <a href="{{route('web')}}" target="_blank">
                    <button  class="btn hor-grd btn-grd-info"  data-target="#exampleModal2" type="button">
                        <i class="ti ti-eye"></i> Kunjungi Web
                    </button>
                </a>  
            </div>
            <h5>Campaign</h5> <br>
            <a href="{{route('campaign.create')}}">
                <button style="margin-top: 10px" class="btn hor-grd btn-grd-info"  data-target="#exampleModal2" type="button">
                    <i class="fa fa-plus "></i> Buat Campaign Baru
                </button>
            </a>
           </div>        
        <div class="row ml-2 mr-2" >
            @forelse ($jumlah as $item)

            <div class="col-md-6 col-lg-3 col-xl-3">             
                <div class="card mt-3">
                    <a href="#" class="pop">
                        <img style="max-height: 100px;" src="{{asset('storage/campaign/'.$item->img)}}" class="card-img-top" alt="...">
                    </a>
                  <div class="card-body">
                    <p class="card-title">{{ $item->nama }}</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar"
                         style="width: {{ $item->persen }}%; "></div>
                    </div>
                    <p class="card-text mt-3" style="float: left">Terkumpul <br> <b style="color: darkorange">{{ $item->jumlah }}</b> </p>
                   
                    <p class="card-text mt-3" style="float: right">Durasi <br> <b id="demo" style="color: darkorange">
                        {{ \Carbon\Carbon::parse( $item->waktu_awal )->diffInDays( $item->waktu ) }}  Hari         
                    </b> </p> <br>
                
                </div>
                <div class="card-footer">
                        <div class="text-center">
                        <a href="{{route('campaign.edit', $item->id)}}">
                            <button class="btn btn-warning btn-outline-warning btn-icon"  data-target="#exampleModal2" type="button">
                                <i class="ti-pencil-alt"></i>
                            </button>
                        </a>       
                        <a href="{{route('campaign.destroy', $item->id)}}">
                            <button class="btn btn-danger btn-outline-danger btn-icon" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')">
                                <i class="ti-trash"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>        
        </div>
            @empty
            <b>TIDAK ADA DATA</b> 
            @endforelse
        </div> 

         {{-- @forelse ($campaign as $item)

            <div class="col-md-6 col-lg-3 col-xl-3">             
                <div class="card mt-3">
                    <a href="#" class="pop">
                        <img style="max-height: 100px;" src="{{asset('storage/campaign/'.$item->img)}}" class="card-img-top" alt="...">
                    </a>
                  <div class="card-body">
                    <p class="card-title">{{ $item->nama }}</p>
                    <p class="card-text mt-3" style="">Target <br> <b style="color: darkorange">Rp {{number_format($item->target_jumlah ?? 0, 2)}}</b> </p>
                    <p class="card-text mt-3" style="">Durasi <br> <b id="demo" style="color: darkorange">
                        {{ \Carbon\Carbon::parse( $item->waktu_awal )->diffInDays( $item->waktu ) }}  Hari           
                    </b> </p>
                    <div class="text-center">
                        <a href="{{route('campaign.edit', $item->id)}}">
                            <button class="btn btn-warning btn-outline-warning btn-icon"  data-target="#exampleModal2" type="button">
                                <i class="ti-pencil-alt"></i>
                            </button>
                        </a>       
                        <a href="{{route('campaign.destroy', $item->id)}}">
                            <button class="btn btn-danger btn-outline-danger btn-icon" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')">
                                <i class="ti-trash"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>        
        </div>
            @empty
            <b>TIDAK ADA DATA</b> 
            @endforelse
        </div>  --}}
       {{-- akhir landing page --}}
        
    </div>

     {{-- awal pop up gambar --}}
     <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">							   
          <div class="modal-content">         						      
           <div class="modal-body">
                                                 
             <button type="button" class="close" data-dismiss="modal"><span 
             aria-hidden="true">&times;</span><span class="sr- 
             only">Close</span></button>						        
            <img src="" class="imagepreview" style="width: 100%;">
                                            
           </div>							    
         </div>								   
        </div>
    </div>
    {{-- awal pop up gambar --}}
</div>
<!-- Hover table card end -->
@endsection

@push('js-popup')
<script>
  $(function() {
      $('.pop').on('click', function() {
        $('.imagepreview').attr('src',$(this).find('img').attr('src'));
        $('#imagemodal').modal('show');   
        });		
    });

</script>
@endpush