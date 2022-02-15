@extends('template_be.app')

@section('konten')


<!-- Hover table card start -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-2">Edit Program</h5> <br>
        <a  href="{{ route('program')}}">
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
        <h4 class="sub-title">Edit Grup</h4>
        <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('program.update',$program['id'])}}">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Program</label>
                <div class="col-sm-5">
                    <input type="text" value="{{ $program['nama']}}"  class="form-control {{ $errors->first('nama') ? "is-invalid":""}}" class="form-control" name="nama" placeholder="nama">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-5">
                    <input type="text" value="{{ $program['keterangan']}}"  class="form-control {{ $errors->first('keterangan') ? "is-invalid":""}}" class="form-control" name="keterangan" placeholder="keterangan">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Target Jumlah</label>
                <div class="col-sm-5">
                    <input type="number" value="{{ $program['target_jml']}}"  class="form-control {{ $errors->first('target_jml') ? "is-invalid":""}}" class="form-control" name="target_jml" placeholder="target jumlah">
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