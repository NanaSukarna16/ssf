@extends('template_be.app')

@section('konten')

<!-- Hover table card start -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-2">Tambah Campaign</h5> <br>
        <a  href="{{ route('campaign')}}">
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
        <h4 class="sub-title">Tambah Campaign Baru</h4>
       
        <form  class="forms-sample mt-2" enctype="multipart/form-data" action="{{ route('campaign.store') }}" method="post">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6">
                    <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nama Campaign</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ old('nama')}}"  class="form-control {{ $errors->first('nama') ? "is-invalid":""}}" class="form-control" name="nama" placeholder="nama relawan/campaign"/>
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
                            <label class="col-sm-4 col-form-label">Waktu Akhir</label>
                            <div class="col-sm-8">
                                <input type="date" value="{{ old('waktu')}}"  class="form-control {{ $errors->first('waktu') ? "is-invalid":""}}" class="form-control" name="waktu"/>
                                @error('waktu')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>  
                </div>
                <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Gambar Campaign</label>
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
                            <label class="col-sm-4 col-form-label">Target Jumlah</label>
                            <div class="col-sm-8">
                                <input type="number" name="target" class="form-control {{ $errors->first('target') ? "is-invalid":""}}">
                                    @error('target')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                        </div>
                </div> 
                <div class="col-sm-6">
                    <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Detail Campaign</label>
                            <div class="col-sm-8">
                                <textarea name="detail" class="form-control" rows="15">{{old('detail')}}</textarea>
                                @error('detail')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>  
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Link Video</label>
                            <div class="col-sm-8">
                                <input type="text" name="video" class="form-control {{ $errors->first('video') ? "is-invalid":""}}">
                                @error('video')
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
                </div> --}}
                {{-- <div class="col-sm-6"> 
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Program</label> 
                        <div class="col-sm-8">
                            <select class="form-control" name="prog_id">
                                <option selected disabled>Pilih Program</option>
                                @foreach ($program as $r)
                                <option value="{{ $r->id }}">{{ $r->nama }}</option>
                                @endforeach
                            </select>
                            @error('program')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div> 
                </div>            --}}
            </div>
    
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
        </form>
    </div>
</div>
<!-- Hover table card end -->

@endsection

@section('js')
   
@endsection