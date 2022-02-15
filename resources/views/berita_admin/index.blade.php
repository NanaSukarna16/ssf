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
            <h5>Berita</h5> <br>
            <a href="{{route('berita_admin.create')}}">
                <button style="margin-top: 10px" class="btn hor-grd btn-grd-info"  data-target="#exampleModal2" type="button">
                    <i class="fa fa-plus "></i> Tambah Berita
                </button>
            </a>       
        
           </div>        
        <div class="row ml-2 mr-2" >
            @forelse ($berita as $item)
            <div class="col-md-6 col-lg-3 col-xl-3">             
                <div class="card mt-3">
                    <a href="#" class="pop">
                        <img style="max-height: 100px;" src="{{asset('storage/berita/'.$item->img_berita)}}" class="card-img-top" alt="...">
                    </a>
                  <div class="card-body">
                    <p class="card-title">{{ $item->judul_berita}}</p>
                    <div class="text-center">
                        <a href="{{route('berita_admin.edit', $item->id)}}">
                            <button class="btn btn-warning btn-outline-warning btn-icon"  data-target="#exampleModal2" type="button">
                                <i class="ti-pencil-alt"></i>
                            </button>
                        </a>       
                        <a href="{{route('berita_admin.destroy', $item->id)}}">
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