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
        <h5 class="mb-2">Lembaga</h5> <br>
        <a href="{{route('lembaga.create')}}">
            <button class="btn hor-grd btn-grd-info"  data-target="#exampleModal2" type="button">
                <i class="ti-pencil-alt"></i> Lembaga Baru
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
    <div class="card-block table-border-style">
        {{-- <div class="float-left">
            <form >
                <div class="form-group row ">
                    <div class="input-group">
                       <small class="mt-2 mr-2 ml-3">Show</small> 
                        <select class="form-control w-full" onchange="this.form.submit();" name="page" id="forBeasiswa" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <small class="mt-2 ml-2">entries</small> 
                    </div>
                </div>
            </form> 
        </div> --}}
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
                        <th>Nama Lembaga</th>
                        <th>No HP Lembaga</th>
                        <th>Email Lembaga</th>
                        <th>Alamat Lembaga</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lembaga as $item)   
                    <tr>
                        <td>{{++$no}}</td>
                        <td>{{$item->nama_lembaga}}</td>
                        <td>{{$item->hp_lembaga}}</td>
                        <td>{{$item->email_lembaga}}</td>
                        <td>{{$item->alamat_lembaga}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                            <a href="{{route('lembaga.edit', $item->id)}}">
                                <button class="btn btn-warning btn-outline-warning btn-icon"  data-target="#exampleModal2" type="button">
                                    <i class="ti-pencil-alt"></i>
                                </button>
                            </a>       
                            <a href="{{route('lembaga.destroy', $item->id)}}">
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
            {{ $lembaga->links() }}
        </div>
    </div>
</div>
<!-- Hover table card end -->


@endsection

