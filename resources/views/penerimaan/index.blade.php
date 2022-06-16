@extends('template_be.app')

@section('css-modal')
    <style>
      #myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modals_sS_s {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)}
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
/*
.close {
  position: relative;
  top: 15px;
  right: 300px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}
*/

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
    </style>
@endsection

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
        <h5 class="mb-2">Penerimaan</h5> <br>
        <a href="{{route('penerimaan.create')}}">
            <button class="btn hor-grd btn-grd-info"  data-target="#exampleModal2" type="button">
                <i class="ti-pencil-alt"></i> Penerimaan Baru
            </button>
        </a>  

    @if (Auth::user()->role == 'admin' )
           <a href="{{route('penerimaan.export-excel')}}">
            <button class="btn hor-grd btn-grd-info"  data-target="#exampleModal2" type="button">
                <i class="ti-download"></i> Download Penerimaan
            </button>
        </a>  

    <div class="row mt-5">
        <div class="col-md-3">
            <form action="{{route('penerimaanByProgram.export-excel')}}">
                <label for="download_program">Download Penerimaan By Program</label>
                <select class="form-control filter_angkatan" name="program" id="download_program" onchange="this.form.submit();">
                    <option hidden>Pilih Program</option>
                    @foreach ($program as $item)
                    <option value="{{ $item->id}}"> {{ $item->nama}} </option>
                    @endforeach
                </select>
            </form>  
        </div>  

        <div class="col-md-3">
            <form action="{{route('penerimaanByTgl.export-excel')}}">
                <label for="download_tgl">Download Penerimaan By Tanggal</label>
                <select class="form-control filter_angkatan" name="tgl" id="download_tgl" onchange="this.form.submit();">
                    <option hidden>Pilih Tanggal</option>
                    @foreach ($tgl as $item)
                    <option value="{{ $item->tgl }}">{{ \Carbon\Carbon::parse($item->tgl)->translatedFormat(' d F Y') }}</option>
                    @endforeach
                </select>
            </form>  
        </div> 
    </div>        
    @endif     
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
                        <input type="text"  name="cari" class="form-control" placeholder="cari data" aria-label="Recipient's username">
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
                        <th>Kode</th>
                        <th>Relawan</th>
                        <th>Donatur</th>
                        <th>Program</th>
                        <th>Setoran</th>
                        <th>User By</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($penerimaan as $item)   
                    <tr>
                        <td>{{++$no}}</td>
                        <td>{{$item->reff}}</td>
                        @if(empty($item->user) && empty($item->relasi))
                            <td>-</td>
                        @else
                            <td>{{$item->user->nama}} - {{ $item->relasi->nama }}</td>
                        @endif
                        @if(!empty($item->donatur))
                            <td>{{ $item->donatur->nama ?? '' }}</td>
                        @else
                            <td>{{ $item->lembaga->nama_lembaga ?? '-' }}</td>
                        @endif
                        @if(empty($item->program) )
                            <td> {{ $item->campaign->nama }}</td>
                        @else
                            <td>
                                {{ $item->program->nama ?? '-' }} <br>           
                            </td>
                        @endif
                        <td>
                            @if(!empty($item->rekening))
                                {{$item->rekening->bank}} - {{$item->rekening->nama_pemilik_rekening}} - {{$item->rekening->kegunaan}}
                            @endif
                            <a class="btn btn-sm btn-warning fa fa-image myImg" src="{{asset('storage/'.$item->bukti)}}" alt="Bukti Transfer" style="width: auto; height:auto;"></a>
                        </td>
                         <td>
                            <span class="badge bg-danger text-white">
                                {{$item->person_at}}
                            </span>
                        </td>
                        <td> 
                            @if (Auth::user()->role == 'admin')
                                 <a href="{{route('penerimaan.edit', $item->id)}}" class="btn-success btn-sm btn-round btn-icon" data-toggle="tooltip" data-placement="top" data-original-title="edit">
                                    <i class="ti-pencil-alt"></i>
                                </a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
                            @endif
                            <a href="{{route('penerimaan.destroy', $item->id)}}" class="btn-danger btn-sm btn-round btn-icon" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')" data-toggle="tooltip" data-placement="top" data-original-title="Hapus">
                                    <i class="ti-trash"></i>
                            </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{ route('penerimaan.print-kwitansi', ['id' => $item->id]) }}" target="_blank" class="btn-info btn-sm btn-round btn-icon" data-toggle="tooltip" data-placement="top" data-original-title="Kwitansi"><i class="fa fa-print"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                @php
                                    $penerimaans = DB::table('penerimaan')->where('id', $item->id)->first();
                                    $prog_penerimaan = DB::table('prog_penerimaan')->where('id', $penerimaans->prog_penerimaan_id)->where('nama', 'like', 'Wakaf%')->first();
                                @endphp
                            @if($prog_penerimaan)
                            <a href="{{ route('penerimaan.print-sertifikat', ['id' => $item->id]) }}" target="_blank" class="btn-primary btn-sm btn-round btn-icon" data-toggle="tooltip" data-placement="top" data-original-title="Sertifikat"><i class="fa fa-credit-card" ></i></a>
                            @endif
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
            {{ $penerimaan->links() }}
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


