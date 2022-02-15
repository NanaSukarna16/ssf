@extends('template_be.app')

@section('konten')

<!-- Hover table card start -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-2">Edit Berita</h5> <br>
        <a  href="{{ route('berita_admin')}}">
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
        <h4 class="sub-title">edit Berita</h4>
       
        <form  class="forms-sample mt-2" enctype="multipart/form-data" action="{{ route('berita_admin.update', $berita['id']) }}" method="post">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Judul Berita</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ $berita['judul_berita'] }}"  class="form-control {{ $errors->first('judul_berita') ? "is-invalid":""}}" class="form-control" name="judul_berita" placeholder="masukan judul Berita"/>
                                @error('judul_berita')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>  
                </div>
                <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Gambar Berita</label>
                            <div class="col-sm-8">
                                @if ($berita['img_berita'])  
                                    <img src="{{ asset('storage/berita/'.$berita['img_berita'])}}" width="120px" alt="gambar">                       
                                @else
                                    <span class="text-danger">Tidak Ada Gambar</span>
                                @endif
                                <input type="file" name="img_berita" class="form-control {{ $errors->first('img_berita') ? "is-invalid":""}}">
                                    @error('img_berita')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                <small class="text-danger">Kosongkan Jika Tidak Ingin Mengubah Gambar</small>
                            </div>
                        </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Deskripsi Berita</label>
                            <div class="col-sm-8">
                                <textarea name="berita" id="berita" class="form-control" rows="15">{{$berita['berita']}}</textarea>
                                @error('berita')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
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