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
                    <button class="btn hor-grd btn-grd-info"  data-target="#exampleModal2" type="button">
                        <i class="ti-eyes"></i> Kunjungi Web
                    </button>
                </a>  
            </div>
            <h5>Gambar Landing Page</h5> <br>
            <button style="margin-top: 10px" type="button"  class="btn hor-grd btn-grd-info" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus "></i> Tambah Data
            </button>
            <br>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Halaman Home</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('home_admin.store')}}">
                        @csrf
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Landing Page</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="file" name="img_lp" class="form-control {{ $errors->first('img_lp') ? "is-invalid":""}}">
                                    @error('img_lp')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group-inner mt-2">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Mitra</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="file" name="img_mitra" class="form-control {{ $errors->first('img_mitra') ? "is-invalid":""}}">
                                    @error('img_mitra')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>        
        </div>        
        <div class="row ml-2 mr-2" >
            @forelse ($lp as $item)
            <div class="col-md-6 col-xl-2">
                <div class="card order-card">
                    <div class="card-block">                       
                        <div class="mb-3">
                            <a href="#" class="pop">
                                <img src="{{asset('storage/lp/'.$item->img_lp)}}" alt="image" width="100%" height="100%"/>
                            </a> 
                        </div>
                        <div class="text-center">
                            <a href="{{route('home_admin.edit', $item->id)}}">
                                <button class="btn btn-warning btn-outline-warning btn-icon"  data-target="#exampleModal2" type="button">
                                    <i class="ti-pencil-alt"></i>
                                </button>
                            </a>       
                            <a href="{{route('home_admin.destroy', $item->id)}}">
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

       {{-- Awal Mitra --}}
        <div class="card-header">
            <h5>Gambar Mitra</h5> <br>
            <button style="margin-top: 10px" type="button"  class="btn hor-grd btn-grd-info" data-toggle="modal" data-target="#exampleModal2">
                <i class="fa fa-plus "></i> Tambah Data
            </button>
            <br>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Halaman Home</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('home_admin.store2')}}">
                        @csrf
                        <div class="form-group-inner mt-2">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Mitra</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="file" name="img_mitra" class="form-control {{ $errors->first('img_mitra') ? "is-invalid":""}}">
                                    @error('img_mitra')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>        
        </div> 
        <div class="row ml-2 mr-2" >
            @forelse ($mitra as $item)
            <div class="col-md-6 col-xl-2">
                <div class="card order-card">
                    <div class="card-block">                       
                        <div class="mb-3">
                            <a href="#" class="pop">
                                <img src="{{asset('storage/lp/'.$item->img_mitra)}}" alt="image" width="100%" height="100%"/>
                            </a> 
                        </div>
                        <div class="text-center">
                            <a href="{{route('home_admin.edit2', $item->id)}}">
                                <button class="btn btn-warning btn-outline-warning btn-icon"  data-target="#exampleModal2" type="button">
                                    <i class="ti-pencil-alt"></i>
                                </button>
                            </a>       
                            <a href="{{route('home_admin.destroy2', $item->id)}}">
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
        {{--Akhir Mitra  --}}

         {{-- Awal Video--}}
         <div class="card-header">
            <h5>Video Sahabat Wakaf</h5> <br>
            <button style="margin-top: 10px" type="button"  class="btn hor-grd btn-grd-info" data-toggle="modal" data-target="#exampleModal3">
                <i class="fa fa-plus "></i> Tambah Data
            </button>
            <br>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('home_admin.store3')}}">
                        @csrf
                        <div class="form-group-inner mt-2">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Judul Video</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="judul_video" class="form-control {{ $errors->first('judul_video') ? "is-invalid":""}}">
                                    @error('judul_video')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner mt-2">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Link Video</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="video" class="form-control {{ $errors->first('video') ? "is-invalid":""}}">
                                    @error('video')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                         <div class="form-group-inner mt-2">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Jenis Video</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <select class="form-control w-full" name="jenis" id="forBeasiswa" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">            
                                        <option value="" selected disabled>Pilih Jenis Video</option>
                                        <option value="testimoni">Testimoni Tokoh</option>
                                        <option value="penerima">Penerima Manfaat</option>
                                
                                        @error('jenis')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                        </div>
                           
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>        
        </div> 
        <div class="row ml-5">
             <p>Video Testimoni Tokoh</p>
        </div>
        <div class="row ml-2 mr-2" >         
            @forelse ($video as $item)
            <div class="col-md-6 col-xl-3">
                <div class="card order-card">
                    <div class="card-block">                       
                        <div class="mb-3">
                            <iframe width="180" height="100" src="{{$item->video}}" 
                            title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                            </iframe>
                        </div>
                        <div>
                           <p class="text-dark text-left">
                              {{ $item->judul_video}}
                           </p>
                        </div>
                        <div class="text-center">
                            <a href="{{route('home_admin.edit3', $item->id)}}">
                                <button class="btn btn-warning btn-outline-warning btn-icon"  data-target="#exampleModal2" type="button">
                                    <i class="ti-pencil-alt"></i>
                                </button>
                            </a>       
                            <a href="{{route('home_admin.destroy3', $item->id)}}">
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
        <div class="row ml-5">
             <p>Video Penerima Manfaat</p>
        </div>
        <div class="row ml-2 mr-2" >
            @forelse ($video2 as $item)
            <div class="col-md-6 col-xl-3">
                <div class="card order-card">
                    <div class="card-block">                       
                        <div class="mb-3">
                            <iframe width="180" height="100" src="{{$item->video}}" 
                            title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                            </iframe>
                        </div>
                        <div>
                           <p class="text-dark text-left">
                              {{ $item->judul_video}}
                           </p>
                        </div>
                        <div class="text-center">
                            <a href="{{route('home_admin.edit3', $item->id)}}">
                                <button class="btn btn-warning btn-outline-warning btn-icon"  data-target="#exampleModal2" type="button">
                                    <i class="ti-pencil-alt"></i>
                                </button>
                            </a>       
                            <a href="{{route('home_admin.destroy3', $item->id)}}">
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
        {{--Akhir Video --}}

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