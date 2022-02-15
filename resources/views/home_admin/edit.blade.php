@extends('template_be.app')

@section('konten')
<!-- Hover table card start -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-2">Edit Landing Page</h5> <br>
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
        <h4 class="sub-title">Edit Landing Page</h4>
        <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('home_admin.update',$lp['id'])}}">
            @csrf
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Gambar Landing Page</label>
                <div class="col-sm-8">
                    @if ($lp['img_lp'])  
                        <img src="{{ asset('storage/lp/'.$lp['img_lp'])}}" width="120px" alt="gambar">                       
                    @else
                        <span class="text-danger">Tidak Ada Gambar</span>
                    @endif
                    <input type="file" name="img_lp" class="form-control {{ $errors->first('img_lp') ? "is-invalid":""}}">
                    @error('img_lp')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                    <small class="text-danger">Kosongkan Jika Tidak Ingin Mengubah Gambar</small>
                </div>
            </div>  
            <div class="form-group row">
                <label class="col-sm-4 col-form-label"></label>
                <div class="col-sm-5">
                    <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Hover table card end -->

@endsection

@section('js')
   
@endsection