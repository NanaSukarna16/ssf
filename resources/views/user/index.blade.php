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
        <h5 class="mb-2">User</h5> <br>
        <a href="{{route('user.create')}}">
            <button class="btn hor-grd btn-grd-info"  data-target="#exampleModal2" type="button">
                <i class="ti-pencil-alt"></i> User Baru
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
        {{-- <div class="float-right">
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
        </div> --}}
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user as $item)   
                    <tr>
                        <td>{{++$no}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->email }}</td>
                        <td>{{$item->role}}</td>
                        <td>
                            {{-- <a href="{{route('user.edit', $item->id)}}">
                                <button class="btn btn-warning btn-outline-warning btn-icon"  data-target="#exampleModal2" type="button">
                                    <i class="ti-pencil-alt"></i>
                                </button>
                            </a>        --}}
                            <a href="{{route('relawan.destroy', $item->id)}}">
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
            {{ $user->links() }}
        </div>
    </div>
</div>
<!-- Hover table card end -->


@endsection
