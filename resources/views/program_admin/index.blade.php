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
<div class="row">
    <div class="card">

         {{-- Awal landing page --}}
         <div class="card-header">
            <div class="float-right">
                <a href="{{route('web')}}" target="_blank">
                    <button  class="btn hor-grd btn-grd-info"  data-target="#exampleModal2" type="button">
                        <i class="ti ti-eye"></i> Kunjungi Web
                    </button>
                </a>  
            </div>
            <h5>Campaign</h5> <br>
            <a href="{{route('campaign.create')}}">
                <button style="margin-top: 10px" class="btn hor-grd btn-grd-info"  data-target="#exampleModal2" type="button">
                    <i class="fa fa-plus "></i> Buat Campaign Baru
                </button>
            </a>       
        
           </div>        
        <div class="row ml-2 mr-2" >
            @forelse ($jumlah as $item)

            <div class="col-md-6 col-lg-3 col-xl-3">             
                <div class="card mt-3">
                    <a href="#" class="pop">
                        <img style="max-height: 100px;" src="{{asset('storage/campaign/'.$item->img)}}" class="card-img-top" alt="...">
                    </a>
                  <div class="card-body">
                    <p class="card-title">{{ $item->nama }}</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar"
                         style="width: {{ $item->persen }}%; "></div>
                    </div>
                    <p class="card-text mt-3" style="float: left">Terkumpul <br> <b style="color: darkorange">{{ $item->jumlah }}</b> </p>
                    <?php
                        $day    = $item->waktu; 
                        $month   = $item->bulan;
                        $year    = $item->tahun;
                        // ddd($day);
                    $days    =(int)((mktime (0,0,0,$month,$day,$year) - time())/86400);
                    ?>
                    <p class="card-text mt-3" style="float: right">Durasi <br> <b id="demo" style="color: darkorange">
                        {{-- <script>
                            CountDownTimer('{{$item->created_at}}', 'countdown');
                            function CountDownTimer(dt, id)
                            {
                                var end = new Date('{{$item->waktu}}');
                                var _second = 1000;
                                var _minute = _second * 60;
                                var _hour = _minute * 60;
                                var _day = _hour * 24;
                                var timer;
                                function showRemaining() {
                                    var now = new Date();
                                    var distance = end - now;
                                    if (distance < 0) {
            
                                        clearInterval(timer);
                                        document.getElementById(id).innerHTML = '<b>TUGAS SUDAH BERAKHIR</b> ';
                                        return;
                                    }
                                    var days = Math.floor(distance / _day);
                                    var hours = Math.floor((distance % _day) / _hour);
                                    var minutes = Math.floor((distance % _hour) / _minute);
                                    var seconds = Math.floor((distance % _minute) / _second);
            
                                    document.getElementById(id).innerHTML = days + 'days ';
                                    document.getElementById(id).innerHTML += hours + 'hrs ';
                                    document.getElementById(id).innerHTML += minutes + 'mins ';
                                    document.getElementById(id).innerHTML += seconds + 'secs';
                                    document.getElementById(id).innerHTML +='<h2>TUGAS BELUM BERAKHIR</h2>';
                                }
                                timer = setInterval(showRemaining, 1000);
                            }
                        </script> --}}
                        <script>
                            // Set the date we're counting down to
                            var countDownDate = new Date("Jan 5, 2023 15:37:25").getTime();
                            
                            // Update the count down every 1 second
                            var x = setInterval(function() {
                            
                              // Get today's date and time
                              var now = new Date().getTime();
                                
                              // Find the distance between now and the count down date
                              var distance = countDownDate - now;
                                
                              // Time calculations for days, hours, minutes and seconds
                              var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                              var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                              var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                              var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                
                              // Output the result in an element with id="demo"
                              document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                              + minutes + "m " + seconds + "s ";
                                
                              // If the count down is over, write some text 
                              if (distance < 0) {
                                clearInterval(x);
                                document.getElementById("demo").innerHTML = "EXPIRED";
                              }
                            }, 1000);
                            </script>
                            
                    </b> </p>
                    {{-- <div class="text-center">
                        <a href="{{route('campaign.edit', $item->id)}}">
                            <button class="btn btn-warning btn-outline-warning btn-icon"  data-target="#exampleModal2" type="button">
                                <i class="ti-pencil-alt"></i>
                            </button>
                        </a>       
                        <a href="{{route('campaign.destroy', $item->id)}}">
                            <button class="btn btn-danger btn-outline-danger btn-icon" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')">
                                <i class="ti-trash"></i>
                            </button>
                        </a>
                    </div> --}}
                  </div>
                </div>        
        </div>
            @empty
            <b>TIDAK ADA DATA</b> 
            @endforelse
        </div> 
       {{-- akhir landing page --}}
        
    </div>

     {{-- awal pop up gambar --}}
     <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">							   
          <div class="modal-content">         						      
           <div class="modal-body">
                                                 
             <button type="button" class="close" data-dismiss="modal"><span 
             aria-hidden="true">&times;</span><span class="sr- 
             only">Close</span></button>						        
            <img src="" class="imagepreview" style="width: 100%;">
                                            
           </div>							    
         </div>								   
        </div>
    </div>
    {{-- awal pop up gambar --}}
</div>
<!-- Hover table card end -->
@endsection

@push('js-popup')
<script>
  $(function() {
      $('.pop').on('click', function() {
        $('.imagepreview').attr('src',$(this).find('img').attr('src'));
        $('#imagemodal').modal('show');   
        });		
    });

</script>
@endpush