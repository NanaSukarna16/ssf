@extends('template_be.app')

@section('konten')

<!-- Hover table card start -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-2">Edit Download</h5> <br>
        <a  href="{{ route('download')}}">
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
        <h4 class="sub-title">Edit Download</h4>
       
        <form  class="forms-sample mt-2" enctype="multipart/form-data" action="{{ route('download.update', $download['id']) }}" method="post">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ $download['nama'] }}"  class="form-control {{ $errors->first('nama') ? "is-invalid":""}}" class="form-control" name="nama" placeholder="masukan nama"/>
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>  
                </div>
                <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gambar</label>
                            <div class="col-sm-8">
                                <input type="file" name="img" class="form-control {{ $errors->first('img') ? "is-invalid":""}}">
                                    @error('img')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                        </div>
                </div>
                <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File</label>
                            <div class="col-sm-8">
                                <input type="file" name="file" class="form-control {{ $errors->first('file') ? "is-invalid":""}}">
                                    @error('file')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                        </div>
                </div>
            </div>
    
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">UPDATE</button>
            </div>
        </form>
    </div>
</div>
<!-- Hover table card end -->

@endsection

@section('js')
   
@endsection