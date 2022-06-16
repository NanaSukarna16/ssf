@extends('template_be.app')

@section('konten')

<!-- Hover table card start -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-2">Edit Tentang Kami</h5> <br>
        <a  href="{{ route('tentang_admin')}}">
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
        <h4 class="sub-title">Edit Tentang Kami</h4>
        <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('tentang.update',$tentang['id'])}}">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-5">
                    <input type="text" value="{{ $tentang['nama']}}"  class="form-control {{ $errors->first('nama') ? "is-invalid":""}}" class="form-control" name="nama" placeholder="nama">
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