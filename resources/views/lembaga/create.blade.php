@extends('template_be.app')

@section('konten')

<!-- Hover table card start -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-2">Tambah Lembaga</h5> <br>
        <a  href="{{ route('lembaga')}}">
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
        <h4 class="sub-title">Tambah Lembaga Baru</h4>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="data-tab" data-toggle="tab" href="#data" role="tab" aria-controls="home" aria-selected="true">Data</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="cp-tab" data-toggle="tab" href="#cp" role="tab" aria-controls="cp" aria-selected="false">Contact Person</a>
            </li>
          </ul>
        <form  class="forms-sample mt-2" enctype="multipart/form-data" action="{{ route('lembaga.store') }}" method="post">
            @csrf
          <div class="tab-content" id="myTabContent">
            <div id="data" class="tab-pane fade show active" role="tabpanel" aria-labelledby="data-tab">
                <div class="form-group row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Lembaga</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ old('nama_lembaga')}}"  class="form-control {{ $errors->first('nama_lembaga') ? "is-invalid":""}}"  name="nama_lembaga" placeholder="masukan nama lembaga"/>
                                @error('nama_lembaga')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Phone</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ old('hp_lembaga')}}"  class="form-control {{ $errors->first('hp_lembaga') ? "is-invalid":""}}" class="form-control" name="hp_lembaga" placeholder="masukan phone lembaga"/>

                                @error('hp_lembaga')
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
                                <input type="text" value="{{ old('email_lembaga')}}"  class="form-control {{ $errors->first('email_lembaga') ? "is-invalid":""}}" class="form-control" name="email_lembaga" placeholder="email lembaga"/>

                                @error('email_lembaga')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">No. Rekening</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ old('no_rek_lembaga')}}"  class="form-control {{ $errors->first('no_rek_lembaga') ? "is-invalid":""}}" class="form-control" name="no_rek_lembaga" placeholder="nomor rekening lembaga"/>

                                @error('no_rek_lembaga')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Legalitas</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ old('legalitas_lembaga')}}"  class="form-control {{ $errors->first('legalitas_lembaga') ? "is-invalid":""}}" class="form-control" name="legalitas_lembaga" placeholder="legalitas lembaga"/>

                                @error('legalitas_lembaga')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">NPWP</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ old('npwp_lembaga')}}"  class="form-control {{ $errors->first('npwp_lembaga') ? "is-invalid":""}}" class="form-control" name="npwp_lembaga" placeholder="npwp lembaga"/>

                                @error('npwp_lembaga')
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
                                <input type="text" value="{{ old('alamat_lembaga')}}"  class="form-control {{ $errors->first('alamat_lembaga') ? "is-invalid":""}}" class="form-control" name="alamat_lembaga" placeholder="alamat lembaga"/>

                                @error('alamat_lembaga')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Desa/Kelurahan</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ old('kelurahan_lembaga')}}"  class="form-control {{ $errors->first('kelurahan_lembaga') ? "is-invalid":""}}" class="form-control" name="kelurahan_lembaga" placeholder="kelurahan lembaga"/>

                                @error('kelurahan_lembaga')
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
                                <input type="text" value="{{ old('kecamatan_lembaga')}}"  class="form-control {{ $errors->first('kecamatan_lembaga') ? "is-invalid":""}}" class="form-control" name="kecamatan_lembaga" placeholder="kecamatan lembaga"/>

                                @error('kecamatan_lembaga')
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
                                <input type="text" value="{{ old('kota_lembaga')}}"  class="form-control {{ $errors->first('kota_lembaga') ? "is-invalid":""}}" class="form-control" name="kota_lembaga" placeholder="kota lembaga"/>

                            @error('kota_lembaga')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Provinsi</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ old('provinsi_lembaga')}}"  class="form-control {{ $errors->first('provinsi_lembaga') ? "is-invalid":""}}" class="form-control" name="provinsi_lembaga" placeholder="provinsi lembaga"/>

                                @error('provinsi_lembaga')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Kode Pos</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ old('kdpos_lembaga')}}"  class="form-control {{ $errors->first('kdpos_lembaga') ? "is-invalid":""}}" class="form-control" name="kdpos_lembaga" placeholder="kdpos lembaga"/>

                                @error('kdpos_lembaga')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Negara</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ old('negara_lembaga')}}"  class="form-control {{ $errors->first('negara_lembaga') ? "is-invalid":""}}" class="form-control" name="negara_lembaga" placeholder="negara lembaga"/>

                                @error('negara_lembaga')
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
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ old('nama_person')}}"  class="form-control {{ $errors->first('nama_person') ? "is-invalid":""}}" class="form-control" name="nama_person" placeholder="masukan nama person"/>

                                @error('nama_person')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Phone</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ old('hp_person')}}"  class="form-control {{ $errors->first('hp_person') ? "is-invalid":""}}" class="form-control" name="hp_person" placeholder="masukan phone person"/>

                                @error('hp_person')
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
                                <input type="text" value="{{ old('email_person')}}"  class="form-control {{ $errors->first('email_person') ? "is-invalid":""}}" class="form-control" name="email_person" placeholder="email person"/>

                                @error('email_person')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">No.KTP</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ old('ktp_person')}}"  class="form-control {{ $errors->first('ktp_person') ? "is-invalid":""}}" class="form-control" name="ktp_person" placeholder="ktp person"/>

                                @error('ktp_person')
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
                                <input type="text" value="{{ old('tmptlhr_person')}}"  class="form-control {{ $errors->first('tmptlhr_person') ? "is-invalid":""}}" class="form-control" name="tmptlhr_person" placeholder="tempat lahir person"/>

                                @error('tmptlhr_person')
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
                                <input type="date" value="{{ old('tgllhr_person')}}"  class="form-control {{ $errors->first('tgllhr_person') ? "is-invalid":""}}" class="form-control" name="tgllhr_person" placeholder="tanggal lahir person"/>

                                @error('tgllhr_person')
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
                                    <input class="form-check-input" type="radio" name="jk" id="inlineRadio1" value="L">
                                    <label class="form-check-label" for="inlineRadio1">Laki - Laki</label>
                                </div>
                                <div class="form-check form-check-inline ml-5">
                                    <input class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="P">
                                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Desa/Kelurahan</label>
                            <div class="col-sm-8">
                                <input type="text" value="{{ old('kelurahan_person')}}"  class="form-control {{ $errors->first('kelurahan_person') ? "is-invalid":""}}" class="form-control" name="kelurahan_person" placeholder="kelurahan person"/>

                                @error('kelurahan_person')
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
                                <input type="text" value="{{ old('alamat_person')}}"  class="form-control {{ $errors->first('alamat_person') ? "is-invalid":""}}" class="form-control" name="alamat_person" placeholder="alamat person"/>

                                @error('alamat_person')
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
                                <input type="text" value="{{ old('kota_person')}}"  class="form-control {{ $errors->first('kota_person') ? "is-invalid":""}}" class="form-control" name="kota_person" placeholder="kota person"/>

                                @error('kota_person')
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
                                <input type="text" value="{{ old('kecamatan_person')}}"  class="form-control {{ $errors->first('kecamatan_person') ? "is-invalid":""}}" class="form-control" name="kecamatan_person" placeholder="kecamatan person"/>

                                @error('kecamatan_person')
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
                                <input type="text" value="{{ old('provinsi_person')}}"  class="form-control {{ $errors->first('provinsi_person') ? "is-invalid":""}}" class="form-control" name="provinsi_person" placeholder="provinsi person"/>

                                @error('provinsi_person')
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
                                <input type="text" value="{{ old('kdpos_person')}}"  class="form-control {{ $errors->first('kdpos_person') ? "is-invalid":""}}" class="form-control" name="kdpos_person" placeholder="kdpos person"/>

                                @error('kdpos_person')
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
                                <input type="text" value="{{ old('negara_person')}}"  class="form-control {{ $errors->first('negara_person') ? "is-invalid":""}}" class="form-control" name="negara_person" placeholder="negara person"/>

                                @error('negara_person')
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
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
        </form>
    </div>
</div>
<!-- Hover table card end -->

@endsection

@section('js')
   
@endsection