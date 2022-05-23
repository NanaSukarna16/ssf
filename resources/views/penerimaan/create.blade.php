@extends('template_be.app')

@section('konten')

<!-- Hover table card start -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-2">Tambah Penerimaan</h5> <br>
        <a  href="{{ route('penerimaan')}}">
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
        <h4 class="sub-title">Tambah Penerimaan Baru</h4>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="data-tab" data-toggle="tab" href="#data" role="tab" aria-controls="home" aria-selected="true"><b> Penerimaan Metode Tunai</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="cp-tab" data-toggle="tab" href="#cp" role="tab" aria-controls="cp" aria-selected="false"><b>Penerimaan Metode Transfer</b> </a>
            </li>
          </ul>
        <form  class="forms-sample mt-2" enctype="multipart/form-data" action="{{ route('penerimaan.store') }}" method="post">
            @csrf 
                <div class="tab-content" id="myTabContent">
                    <div id="data" class="tab-pane fade show active" role="tabpanel" aria-labelledby="data-tab">
                        <input  name="person_at" type="hidden" value="{{ Auth::user()->nama }}">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Reff</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ old('reff')}}"  class="form-control {{ $errors->first('reff') ? "is-invalid":""}}" class="form-control" name="reff" placeholder="no.kwitansi/kupon/struik ATM"/>
                                        @error('reff')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Nama Bukti</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{ old('nama_bs')}}"  class="form-control {{ $errors->first('nama_bs') ? "is-invalid":""}}" class="form-control" name="nama_bs" placeholder="nama bukti setor"/>
        
                                        @error('nama_bs')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tgl.Kwitansi</label>
                                    <div class="col-sm-8">
                                        <input type="date" value="{{ old('tgl')}}"  class="form-control {{ $errors->first('tgl') ? "is-invalid":""}}" class="form-control" name="tgl"/>
        
                                        @error('tgl')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    {{-- <label for="relawan" class="form-label mb-3">
                                        <strong><span class="text-danger">*</span> Relawan</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a class="btn btn-sm btn-success"  href="{{ route('relawan.create') }}"><i class="ti ti-plus"></i></a>
                                    </label> --}}
                                    <label class="col-sm-4 col-form-label">Relawan</label> 
                                    <div class="col-sm-8">
                                        <select class="form-control" name="relawan">
                                            <option selected disabled>Pilih relawan</option>
                                            @foreach ($relawan as $r)
                                              <option value="{{ $r->id }}">{{ $r->nama}} - {{$r->grup['name']}}</option>
                                            @endforeach
                                        </select>
        
                                        @error('relawan')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    {{-- <label for="relawan" class="form-label mb-3">
                                        <strong><span class="text-danger">*</span> Relawan</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a class="btn btn-sm btn-success"  href="{{ route('relawan.create') }}"><i class="ti ti-plus"></i></a>
                                    </label> --}}
                                    <label class="col-sm-4 col-form-label">Donatur Lembaga</label> 
                                    <div class="col-sm-8">
                                        <select class="form-control" name="lembaga">
                                            <option selected disabled>Pilih lembaga</option>
                                            @foreach ($lembaga as $r)
                                              <option value="{{ $r->id }}">{{ $r->nama_lembaga }}</option>
                                            @endforeach
                                        </select>
        
                                        @error('lembaga')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    {{-- <label for="relawan" class="form-label mb-3">
                                        <strong><span class="text-danger">*</span> Relawan</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a class="btn btn-sm btn-success"  href="{{ route('relawan.create') }}"><i class="ti ti-plus"></i></a>
                                    </label> --}}
                                    <label class="col-sm-4 col-form-label">Donatur Personal</label> 
                                    <div class="col-sm-8">
                                        <select class="form-control" name="donatur">
                                            <option selected disabled>Pilih Donatur</option>
                                            @foreach ($donatur as $r)
                                              <option value="{{ $r->id }}">{{ $r->nama}}</option>
                                            @endforeach
                                        </select>
        
                                        @error('donatur')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    {{-- <label for="relawan" class="form-label mb-3">
                                        <strong><span class="text-danger">*</span> Relawan</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a class="btn btn-sm btn-success"  href="{{ route('relawan.create') }}"><i class="ti ti-plus"></i></a>
                                    </label> --}}
                                    <label class="col-sm-4 col-form-label">Relasi</label> 
                                    <div class="col-sm-8">
                                        <select class="form-control" name="relasi">
                                            <option selected disabled>Pilih Relasi</option>
                                            @foreach ($relasi as $r)
                                              <option value="{{ $r->id }}">{{ $r->nama }}</option>
                                            @endforeach
                                        </select>
        
                                        @error('relasi')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    {{-- <label for="relawan" class="form-label mb-3">
                                        <strong><span class="text-danger">*</span> Relawan</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a class="btn btn-sm btn-success"  href="{{ route('relawan.create') }}"><i class="ti ti-plus"></i></a>
                                    </label> --}}
                                    <label class="col-sm-4 col-form-label">Program</label> 
                                    <div class="col-sm-8">
                                        <select class="form-control" name="program">
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
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    {{-- <label for="relawan" class="form-label mb-3">
                                        <strong><span class="text-danger">*</span> Relawan</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a class="btn btn-sm btn-success"  href="{{ route('relawan.create') }}"><i class="ti ti-plus"></i></a>
                                    </label> --}}
                                    <label class="col-sm-4 col-form-label">Nominal</label> 
                                    <div class="col-sm-8">
                                        <input type="number" value="{{ old('nominal')}}"  class="form-control {{ $errors->first('reff') ? "is-invalid":""}}" class="form-control" name="nominal" placeholder="masukan nominal"/>
                                        @error('nominal')
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
                                    <label class="col-sm-3 col-form-label">Tgl.Transfer</label>
                                    <div class="col-sm-8">
                                        <input type="date" value="{{ old('tgl_tf')}}"  class="form-control {{ $errors->first('tgl_tf') ? "is-invalid":""}}" class="form-control" name="tgl_tf"/>
        
                                        @error('tgl_tf')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>  
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    {{-- <label for="relawan" class="form-label mb-3">
                                        <strong><span class="text-danger">*</span> Relawan</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a class="btn btn-sm btn-success"  href="{{ route('relawan.create') }}"><i class="ti ti-plus"></i></a>
                                    </label> --}}
                                    <label class="col-sm-4 col-form-label">Rekening Tujuan</label> 
                                    <div class="col-sm-8">
                                        <select class="form-control" name="rekening">
                                            <option selected disabled>Pilih rekening tujuan</option>
                                            @foreach ($rekening as $r)
                                              <option value="{{ $r->id }}">{{$r->bank}} - {{ $r->nama_pemilik_rekening }} - {{$r->no_rek}}</option>
                                            @endforeach
                                        </select>
        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Bukti Transfer</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="bukti" class="form-control {{ $errors->first('bukti') ? "is-invalid":""}}">
                                        @error('bukti')
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