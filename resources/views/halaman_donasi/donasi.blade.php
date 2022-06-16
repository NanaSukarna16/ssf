@extends('template_fe.app')
@section('konten')

<!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>DONASI SEKARANG</h2>
                        <p>Isilah Form di bawah ini dengan Sebenar - benarnya</p>
                        <form  class="forms-sample mt-2" enctype="multipart/form-data" action="{{ route('donasi.store') }}" method="post">
                            @csrf 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="nama" placeholder="Nama Lengkap" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" placeholder="Email" id="email" class="form-control" name="email" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="subject" name="no" placeholder="No WhatsApp" required data-error="Please enter your No">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="subject" name="jumlah" placeholder="Jumlah Donasi" required data-error="Please enter your Jumlah">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="file" class="form-control" id="subject" name="bukti" placeholder="Upload bukti Transfer" required data-error="Please enter your bukti transfer">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select class="form-control" name="campaign" required data-error="Please enter your program">
                                        <option selected disabled>Pilih Program</option>
                                        @foreach ($campaign as $item)
                                            <option value="{{ $item->id }}" {{$item->id == $campaign2['id'] ? 'selected' : ''}}>{{$item->nama}}</option>
                                        @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center">
                                        <button type="submit" style="background-color: orange" class="btn btn-primary">DONASIKAN</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
				<div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left" style="background-image: none">
                        <p>
                            Yuk salurkan sedekah terbaik sahabat melalui SEBI Social Fund 
                        رَبِّ لَوْلَا أَخَّرْتَنِي إِلَى أَجَلٍ قَرِيبٍ فَأَصَّدَّقَ "Wahai Tuhanku, sekiranya Engkau berkenan menunda [kematian]ku sedikit waktu lagi,
                            maka aku dapat bersedekah…” (QS. Al Munafiqun: 10) Usia Boleh Terputus, Umur Amal Mengalir Terus
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End Cart -->

    
@endsection