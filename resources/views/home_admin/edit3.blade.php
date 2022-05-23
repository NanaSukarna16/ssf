@extends('template_be.app')

@section('konten')
<!-- Hover table card start -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-2">Edit Video Sahabat Wakaf</h5> <br>
        <a  href="{{ route('home_admin')}}">
            <button class="btn hor-grd btn-grd-info" data-toggle="modal" data-target="#exampleModal" type="button">
                <i class="ti-arrow-circle-left"></i> Kembali
            </button>
        </a>

        <div class="card-header-right">
            <ul class="list-unstyled card-option">
                <li><i class="fa fa-chevron-left"></i></li>
                <li><i class="fa fa-window-maximize full-card"></i></li>
                <li><i class="fa fa-minus minimize-card"></i></li>
                <li><i class="fa fa-refresh reload-card"></i></li>
            </ul>
        </div> <br>
    </div>
    <div class="card-block">
        <h4 class="sub-title">Edit Video Sahabat Wakaf</h4>
        <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('home_admin.update3', $video['id'])}}">
            @csrf
            <div class="form-group-inner mt-2">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Judul Video</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <input type="text" value="{{ $video['judul_video']}}" name="judul_video" class="form-control {{ $errors->first('judul_video') ? "is-invalid":""}}">
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
                        <input type="text" value="{{ $video['video']}}" name="video" class="form-control {{ $errors->first('video') ? "is-invalid":""}}">
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
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
    </div>
</div>
<!-- Hover table card end -->

@endsection

@section('js')
   
@endsection