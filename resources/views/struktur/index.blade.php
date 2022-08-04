@extends('template_be.app')

@section('konten')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @if (session('status'))
        <div class="alert-icon shadow-inner wrap-alert-b">
            <div class="alert alert-success alert-st-one" role="alert">
                <i class="fa fa-check edu-checked-pro admin-check-pro" aria-hidden="true"></i>
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
        <h5 class="mb-2">Struktur SSF</h5> <br>
        <button class="btn hor-grd btn-grd-info" data-toggle="modal" data-target="#exampleModal" type="button">
            <i class="ti-pencil-alt"></i> Struktur SSF Baru
        </button>

         <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Struktur SSF</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{route('struktur.store')}}">
                    @csrf
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Nama</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="text" value="{{ old('nama')}}"  class="form-control {{ $errors->first('nama') ? "is-invalid":""}}" class="form-control" name="nama" placeholder="masukan nama"/>

                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Jabatan</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="text" value="{{ old('jabatan')}}"  class="form-control {{ $errors->first('jabatan') ? "is-invalid":""}}" class="form-control" name="jabatan" placeholder="masukan jabatan"/>

                                @error('jabatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Gambar</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <input type="file" name="img" class="form-control {{ $errors->first('img') ? "is-invalid":""}}">
                                    @error('img')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label class="login2 pull-right pull-right-pro">Jenis Tentang</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control {{ $errors->first('tentang_id') ? "is-invalid":""}}" name="tentang_id">
                                    <option value="" selected disabled>Pilih Jenis Tentang Kami</option>
                                    @foreach ($tentang as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('tentang_id')
                                    <div class="bg-red-300 border-l-4 mb-2 border-orange-500 text-orange-800 p-4 mt-2" role="alert">
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
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($struktur as $item)   
                    <tr>
                        <td>{{++$no}}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>
                            <a href="#" class="myImg">
                                <img src="{{asset('storage/nazhir/'.$item->img)}}" alt="image" width="70px"/>
                            </a> 
                        </td>
                        <td>
                            <a href="{{route('struktur.edit', $item->id)}}">
                                <button class="btn btn-warning btn-outline-warning btn-icon"  data-target="#exampleModal2" type="button">
                                    <i class="ti-pencil-alt"></i>
                                </button>
                            </a>       
                            <a href="{{route('struktur.destroy', $item->id)}}">
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
        {{-- <div class="float-left">
            <b>Jumlah Data : <?php echo $total; ?></b>
        </div> --}}
        <div class="float-right">
            {{ $struktur->links() }}
        </div>
    </div>
</div>
<!-- Hover table card end -->


<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <div class="modal-title">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
      </div>
      <div class="modal-body">
          <img class="modal-content" id="imgMe">
          <div id="caption"></div>
      </div>
    </div>
    </div>
  </div>

@endsection

@push('js-popup')
<script>
$('.myImg').on('click',()=>{
	
	if(event.target.attributes.src.nodeValue)
	{
		$('#myModal').modal('show');
		$('#imgMe').attr('src', event.target.attributes.src.nodeValue);
		$('.modal-backdrop').hide();
	}
});


</script>
@endpush

