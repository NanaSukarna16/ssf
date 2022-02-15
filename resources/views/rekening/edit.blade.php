@extends('template_be.app')

@section('konten')

<!-- Hover table card start -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-2">Edit Rekening</h5> <br>
        <a  href="{{ route('rekening')}}">
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
        <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('rekening.update',$rekening['id'])}}">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Bank</label>
                <div class="col-sm-5">
                    <input type="text" value="{{ $rekening['bank']}}"  class="form-control {{ $errors->first('bank') ? "is-invalid":""}}" class="form-control" name="bank" placeholder="nama grup">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kegunaan</label>
                <div class="col-sm-5">
                    <input type="text" value="{{ $rekening['kegunaan']}}"  class="form-control {{ $errors->first('kegunaan') ? "is-invalid":""}}" class="form-control" name="kegunaan">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pemilik</label>
                <div class="col-sm-5">
                    <input type="text" value="{{ $rekening['nama_pemilik_rekening']}}"  class="form-control {{ $errors->first('nama_pemilik_rekening') ? "is-invalid":""}}" class="form-control" name="nama_pemilik_rekening">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Cabang</label>
                <div class="col-sm-5">
                    <input type="text" value="{{ $rekening['cabang']}}"  class="form-control {{ $errors->first('cabang') ? "is-invalid":""}}" class="form-control" name="cabang">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">No. Rekening</label>
                <div class="col-sm-5">
                    <input type="text" value="{{ $rekening['no_rek']}}"  class="form-control {{ $errors->first('no_rek') ? "is-invalid":""}}" class="form-control" name="no_rek">
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