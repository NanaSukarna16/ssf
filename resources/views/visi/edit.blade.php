@extends('template_be.app')

@section('konten')

<!-- Hover table card start -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-2">Visi, Misi & Legalitas</h5> <br>
        <a  href="{{ route('visi')}}">
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
        <h4 class="sub-title">Edit Data</h4>
        <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('visi.update',$visi['id'])}}">
            @csrf
            <div class="form-group-inner">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Visi</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <textarea name="visi" id="visi" class="form-control" rows="10">{{$visi['visi']}}</textarea>

                        @error('visi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Misi</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <textarea name="misi" id="misi" class="form-control" rows="10">{{$visi['misi']}}</textarea>

                        @error('misi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Legalitas</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <textarea name="legalitas" id="misi" class="form-control" rows="10">{{$visi['legalitas']}}</textarea>

                        @error('legalitas')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Jenis Tentang</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control {{ $errors->first('tentang_id') ? "is-invalid":""}}" name="tentang_id">
                            <option value="" selected disabled>Pilih Jenis Tentang Kami</option>
                            @foreach ($tentang as $item)
                            <option value="{{ $item->id }}" {{$item->id == $visi['tentang_id'] ? 'selected' : ''}}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('tentang_id')
                            <div class="bg-red-300 border-l-4 mb-2 border-orange-500 text-orange-800 p-4 mt-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror 
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label class="login2 pull-right pull-right-pro">Gambar</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        @if ($visi['img_legalitas'])  
                            <img src="{{ asset('storage/legalitas/'.$visi['img_legalitas'])}}" width="120px" alt="gambar">                       
                        @else
                            <span class="text-danger">Tidak Ada Gambar</span>
                        @endif
                        <input type="file" value="{{ old('img_leglitas')}}"  class="form-control {{ $errors->first('img') ? "is-invalid":""}}"  name="img"/>
                        <small class="text-danger">Kosongkan Jika Tidak Ingin Mengubah Gambar</small>  
                        {{-- <input type="file" name="img" class="form-control {{ $errors->first('img') ? "is-invalid":""}}">
                            @error('img')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror --}}
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

