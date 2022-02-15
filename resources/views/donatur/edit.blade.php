@extends('template_be.app')

@section('konten')

<!-- Hover table card start -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-2">edit Donatur</h5> <br>
        <a  href="{{ route('donatur')}}">
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
        <h4 class="sub-title">Edit Donatur</h4>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="data-tab" data-toggle="tab" href="#data" role="tab" aria-controls="home" aria-selected="true">Data</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="cp-tab" data-toggle="tab" href="#cp" role="tab" aria-controls="cp" aria-selected="false">Profile</a>
            </li>
          </ul>
        <form  class="forms-sample mt-2" enctype="multipart/form-data" action="{{ route('donatur.update',$donatur['id']) }}" method="post">
            @csrf
          <div class="tab-content" id="myTabContent">
            <div id="data" class="tab-pane fade show active" role="tabpanel" aria-labelledby="data-tab">
                <input  name="person_at" type="hidden" value="{{ Auth::user()->nama }}">
                <div class="form-group row">                 
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ $donatur['nama'] }}"  class="form-control {{ $errors->first('nama') ? "is-invalid":""}}" class="form-control" name="nama" placeholder="masukan nama donatur"/>
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
                            <label class="col-sm-3 col-form-label">Kode</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ $donatur['kode'] }}"  class="form-control {{ $errors->first('kode') ? "is-invalid":""}}" class="form-control" name="kode" placeholder="masukan kode"/>
                                @error('kode')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ $donatur['hp'] }}"  class="form-control {{ $errors->first('hp') ? "is-invalid":""}}" class="form-control" name="hp" placeholder="masukan phone donatur"/>

                                @error('hp')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ $donatur['email'] }}"  class="form-control {{ $errors->first('email') ? "is-invalid":""}}" class="form-control" name="email" placeholder="email donatur"/>

                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NPWP</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ $donatur['npwp'] }}"  class="form-control {{ $errors->first('npwp') ? "is-invalid":""}}" class="form-control" name="npwp" placeholder="npwp"/>

                                @error('npwp')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NPWZ</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ $donatur['npwz'] }}"  class="form-control {{ $errors->first('npwz') ? "is-invalid":""}}" class="form-control" name="npwz" placeholder="npwz"/>

                                @error('npwz')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="cp" role="tabpanel" aria-labelledby="cp-tab">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">No KTP</label>
                            <div class="col-sm-8">
                                <input type="number" value="{{ $donatur['ktp'] }}"  class="form-control {{ $errors->first('ktp') ? "is-invalid":""}}" class="form-control" name="ktp" placeholder="32082xxxxxx"/>

                                @error('ktp')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ $donatur['tmptlhr'] }}"  class="form-control {{ $errors->first('tmptlhr') ? "is-invalid":""}}" class="form-control" name="tmptlhr" placeholder="tempat lahir"/>

                                @error('tmptlhr')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-8">
                                <input type="date" value="{{ $donatur['tgllhr'] }}"  class="form-control {{ $errors->first('tgllhr') ? "is-invalid":""}}" class="form-control" name="tgllhr" placeholder="tanggal lahir"/>

                                @error('tgllhr')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <div class="form-check form-check-inline ml-3">
                                    <input @if ($donatur->jk == "L")
                                    checked
                                @endif class="form-check-input" type="radio" name="jk" id="inlineRadio1" value="L">
                                    <label class="form-check-label" for="inlineRadio1">Laki - Laki</label>
                                </div>
                                <div class="form-check form-check-inline ml-5">
                                    <input @if ($donatur->jk == "P")
                                    checked
                                @endif class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="P">
                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Desa/Kelurahan</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ $donatur['kelurahan'] }}"  class="form-control {{ $errors->first('kelurahan') ? "is-invalid":""}}" class="form-control" name="kelurahan" placeholder="kelurahan"/>

                                @error('kelurahan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ $donatur['alamat']}}"  class="form-control {{ $errors->first('alamat') ? "is-invalid":""}}" class="form-control" name="alamat" placeholder="alamat"/>

                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Kota/Kabupaten</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ $donatur['kota'] }}"  class="form-control {{ $errors->first('kota') ? "is-invalid":""}}" class="form-control" name="kota" placeholder="kota"/>

                                @error('kota')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kecamatan</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ $donatur['kecamatan'] }}"  class="form-control {{ $errors->first('kecamatan') ? "is-invalid":""}}" class="form-control" name="kecamatan" placeholder="kecamatan"/>

                                @error('kecamatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Provinsi</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ $donatur['provinsi'] }}"  class="form-control {{ $errors->first('provinsi') ? "is-invalid":""}}" class="form-control" name="provinsi" placeholder="provinsi"/>

                                @error('provinsi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Kode Pos</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ $donatur['kdpos'] }}"  class="form-control {{ $errors->first('kdpos') ? "is-invalid":""}}" class="form-control" name="kdpos" placeholder="kdpos"/>

                                @error('kdpos')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Negara</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{  $donatur['negara'] }}"  class="form-control {{ $errors->first('negara') ? "is-invalid":""}}" class="form-control" name="negara" placeholder="negara"/>

                                @error('negara')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
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