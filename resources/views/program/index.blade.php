@extends('template_be.app')

@section('konten')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @if (session('status'))
        <div class="alert-icon shadow-inner wrap-alert-b">
            <div class="alert alert-success alert-st-one" role="alert">
                <i class="fa fa-check edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                {{-- <p class="message-mg-rt"><strong>Well done!</strong> You successfully read this important message.</p> --}}
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Hover table card start -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-2">Program Penerimaan</h5> <br>
        <button class="btn hor-grd btn-grd-info" data-toggle="modal" data-target="#exampleModal" type="button">
            <i class="ti-pencil-alt"></i> Program Penerimaan Baru
        </button>

         <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Program Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{route('program.store')}}">
                    @csrf
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Nama</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="text" value="{{ old('nama')}}"  class="form-control {{ $errors->first('nama') ? "is-invalid":""}}" class="form-control" name="nama" placeholder="masukan program baru"/>

                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Keterangan</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="text" value="{{ old('keterangan')}}"  class="form-control {{ $errors->first('keterangan') ? "is-invalid":""}}" class="form-control" name="keterangan" placeholder="masukan keterangan"/>

                                @error('keterangan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Target Jumlah</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="number" value="{{ old('target_jml')}}"  class="form-control {{ $errors->first('target_jml') ? "is-invalid":""}}" class="form-control" name="target_jml" placeholder="masukan target"/>

                                @error('target_jml')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                    </form>
                </div>
            </div>
            </div>
        </div>

        <div class="card-header-right">
            <ul class="list-unstyled card-option">
                <li><i class="fa fa-chevron-left"></i></li>
                <li><i class="fa fa-window-maximize full-card"></i></li>
                <li><i class="fa fa-minus minimize-card"></i></li>
                <li><i class="fa fa-refresh reload-card"></i></li>
            </ul>
        </div> <br>
    </div>
    <div class="card-block table-border-style">
        <div class="float-right">
            <form >
                <div class="form-group row ">
                    <div class="input-group">
                        <input type="text"  name="cari" class="form-control" placeholder="Cari Berdasarkan Nama" aria-label="Recipient's username">
                        <button class="btn hor-grd btn-grd-info" type="submit">
                            Cari
                        </button>
                    </div>
                </div>
            </form> 
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Program</th>
                        <th>Keterangan</th>
                        <th>Target Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($program as $item)   
                    <tr>
                        <td>{{++$no}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->keterangan}}</td>
                        <td>Rp. {{ number_format($item->target_jml, 2) }}</td>
                        <td>
                            <a href="{{route('program.edit', $item->id)}}">
                                <button class="btn btn-warning btn-outline-warning btn-icon"  data-target="#exampleModal2" type="button">
                                    <i class="ti-pencil-alt"></i>
                                </button>
                            </a>       
                            <a href="{{route('program.destroy', $item->id)}}">
                                <button class="btn btn-danger btn-outline-danger btn-icon" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')">
                                    <i class="ti-trash"></i>
                                </button>
                            </a>
                        </td>
                    </tr>  
                    @empty
                    <tr>
                        <td class="border px-4 py-2 text-center text-danger" colspan="6"><b>TIDAK ADA DATA</b></td>
                    </tr>     
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="float-left">
            <b>Jumlah Data : <?php echo $total; ?></b>
        </div>
        <div class="float-right">
            {{ $program->links() }}
        </div>
    </div>
</div>
<!-- Hover table card end -->


@endsection