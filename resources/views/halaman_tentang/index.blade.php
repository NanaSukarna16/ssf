 @extends('template_fe.app')

 @section('konten')    
 
 <!-- Start About Page  -->
 <div class="about-box-main">
    <div class="container">
        <div class="row">
            @foreach ($profil as $item)
            <div class="col-lg-6">
                <div class="banner-frame"> <img class="img-fluid" src="{{asset('storage/profil/'.$item->img)}}" width="100%" alt="" />
            </div>
            </div>
            <div class="col-lg-6">
                <h2 class="noo-sh-title-top">Profil <br> <span style="color: rgb(243, 143, 29);">SEBI SOCIAL FUND</span></h2> <hr>
                <p> <b>{{ $item->profil}}</b> </p>
                {{-- <a class="btn hvr-hover" href="#">Read More</a> --}}
            </div>
            @endforeach
         
        </div>

        <div class="row my-5">
            @foreach ($visi as $item)
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3> <b> Visi </b> </h3>
                    <p>{{ $item->visi}}</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3>Misi</h3>
                    <ul>
                        @php
                            $teksnya = $item->misi;
                            $teks = explode('.', $teksnya);
                        @endphp
                        </td>
                        @foreach ($teks as $key => $data)
                            <li style="list-style: disc" > 
                                {{ $data }}
                            </li>
                        @endforeach
                        
                        {{-- <li style="list-style: disc">
                            Melakukan penjajakan secara masif kepada
                            stakeholders potensial untuk dijadikan sebagai
                            mitra strategis dalam pengembangan SDM yang
                            profesional di bidang Ekonomi Syariah.
                        </li>
                        <li style="list-style: disc">
                            Melakukan penjajakan secara masif kepada
                            stakeholders potensial untuk dijadikan sebagai
                            mitra strategis dalam pengembangan SDM yang
                            profesional di bidang Ekonomi Syariah.
                        </li>
                        <li style="list-style: disc">
                            Melakukan penjajakan secara masif kepada
                            stakeholders potensial untuk dijadikan sebagai
                            mitra strategis dalam pengembangan SDM yang
                            profesional di bidang Ekonomi Syariah.
                        </li> --}}
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3>Legalitas</h3>
                    <ul>
                        <li>
                            <strong style="font-size: 20px">Akta Pendirian Yayasan Bina Tsaqofah</strong> <br>
                            Nomor 09 Tanggal 8 Maret 2018 <br>
                            Notaris : Jhon Edy Rahman.,SH.,MKN
                        </li> <br>
                        <li>
                            <strong style="font-size: 20px">Keputusan Menteri Hukum dan Hak Asasi Manusia RI Nomor : </strong> <br>
                            AHU.0005483.AH.01.12. <br>
                            TAHUN 2018 Tanggal 23 Maret 2018
                        </li> <br>
                        <li>
                            <strong style="font-size: 20px">NPWP Yayasan Bina Tsaqofah :</strong> <br>
                            31.305.705.1-412.000
                        </li> <br>
                        <li>
                            <strong style="font-size: 20px">Sertifikat Nazhir Wakaf Uang Yayasan Bina Tsaqofah :</strong> <br>
                            No : 33.00202 <br> dari Badan Wakaf Indonesia
                        </li> <br>
                        <li>
                            <strong style="font-size: 20px">Mitra Dari</strong> <br>
                            LAZ Zakat Sukses <br> <img src="{{asset('template_fe')}}/images/legalitas.png" width="90%" alt="">
                        </li> <br>
                    </ul>
                </div>
            </div>       
            @endforeach
        </div>

        <div class="row my-4">
            @if ($tentang2->nama === 'Struktur Nazhir')
                <div class="col-12"  style="margin-top: -100px">
                    <h2 class="noo-sh-title text-center">Struktur Nazhir Yayasan Bina Tsaqofah</h2>
                </div> 
            @elseif($tentang2->nama === 'Struktur SEBI SOCIAL FUND')
                <div class="col-12" style="margin-top: -100px">
                    <h2 class="noo-sh-title text-center">Struktur SEBI SOCIAL FUND</h2>
                </div>
            @endif
            
            @foreach ($nazhir as $item)
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="{{asset('storage/nazhir/'.$item->img)}}" alt="" />
                            <div class="team-content">
                                <h3 class="title">{{ $item->nama }}</h3> <span class="post">{{ $item->jabatan }}</span>
                            </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        {{-- <div class="team-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut
                                ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc
                                tristique purus turpis. Maecenas vulputate. </p>
                        </div> --}}
                        <hr class="my-0">
                    </div>
                </div>
            @endforeach

            @foreach ($struktur as $item)
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team"> <img src="{{asset('storage/nazhir/'.$item->img)}}" alt="" />
                            <div class="team-content">
                                <h3 class="title">{{ $item->nama }}</h3> <span class="post">{{ $item->jabatan }}</span>
                            </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-twitter"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-google-plus"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-youtube"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                        {{-- <div class="team-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut
                                ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc
                                tristique purus turpis. Maecenas vulputate. </p>
                        </div> --}}
                        <hr class="my-0">
                    </div>
                </div>
            @endforeach
           
        </div>

        {{-- <div class="row my-5">
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3> <b> Visi </b> </h3>
                    <p>Menjadi Lembaga Filantropi Terkemuka 
                        dalam Pengembangan Pendidikan dan 
                        Sumber Daya Manusia Unggul Kelas Dunia</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3>Misi</h3>
                    <ul>
                        <li style="list-style: disc" >
                            Melakukan penjajakan secara masif kepada
                            stakeholders potensial untuk dijadikan sebagai
                            mitra strategis dalam pengembangan SDM yang
                            profesional di bidang Ekonomi Syariah.
                        </li>
                        <li style="list-style: disc">
                            Melakukan penjajakan secara masif kepada
                            stakeholders potensial untuk dijadikan sebagai
                            mitra strategis dalam pengembangan SDM yang
                            profesional di bidang Ekonomi Syariah.
                        </li>
                        <li style="list-style: disc">
                            Melakukan penjajakan secara masif kepada
                            stakeholders potensial untuk dijadikan sebagai
                            mitra strategis dalam pengembangan SDM yang
                            profesional di bidang Ekonomi Syariah.
                        </li>
                        <li style="list-style: disc">
                            Melakukan penjajakan secara masif kepada
                            stakeholders potensial untuk dijadikan sebagai
                            mitra strategis dalam pengembangan SDM yang
                            profesional di bidang Ekonomi Syariah.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3>Legalitas</h3>
                    <ul>
                        <li>
                            <strong style="font-size: 20px">Akta Pendirian Yayasan Bina Tsaqofah</strong> <br>
                            Nomor 09 Tanggal 8 Maret 2018 <br>
                            Notaris : Jhon Edy Rahman.,SH.,MKN
                        </li> <br>
                        <li>
                            <strong style="font-size: 20px">Keputusan Menteri Hukum dan Hak Asasi Manusia RI Nomor : </strong> <br>
                            AHU.0005483.AH.01.12. <br>
                            TAHUN 2018 Tanggal 23 Maret 2018
                        </li> <br>
                        <li>
                            <strong style="font-size: 20px">NPWP Yayasan Bina Tsaqofah :</strong> <br>
                            31.305.705.1-412.000
                        </li> <br>
                        <li>
                            <strong style="font-size: 20px">Sertifikat Nazhir Wakaf Uang Yayasan Bina Tsaqofah :</strong> <br>
                            No : 33.00202 <br> dari Badan Wakaf Indonesia
                        </li> <br>
                        <li>
                            <strong style="font-size: 20px">Mitra Dari</strong> <br>
                            LAZ Zakat Sukses <br> <img src="{{asset('template_fe')}}/images/legalitas.png" width="90%" alt="">
                        </li> <br>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container" style="margin-top: -80px">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="noo-sh-title">STRUKTUR CREATIVE OFFICER</h2>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">    
                <div class="col-sm-6 col-lg-3" data-aos="fade-down">
                    <div class="hover-team">
                        <div class="our-team"> <img src="{{ asset('template_fe') }}/images/pak_aris.jpg" alt="" />
                            <div class="team-content">
                                <h3 class="title" style="font-size: 15px">Aries Hermawan, SEI, ME</h3> <span class="post">Chief Executive Officer</span>
                             </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-instagram"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center mt-5">    
                <div class="col-sm-6 col-lg-3 mr-5"  data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                    <div class="hover-team">
                        <div class="our-team"> <img src="{{ asset('template_fe') }}/images/pak_kos.jpg" alt="" />
                            <div class="team-content">
                                <h3 class="title" style="font-size: 15px">Kostaman, SEI</h3> <span class="post">Manager Public Realtion</span> </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-instagram"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 ml-5"  data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine">
                    <div class="hover-team">
                        <div class="our-team"> <img src="{{ asset('template_fe') }}/images/pak_fadil.jpg" alt="" />
                            <div class="team-content">
                                <h3 class="title" style="font-size: 15px">Fadhillah, S.Si</h3> <span class="post">Corporate Secretary</span> </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-instagram"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center mt-5">    
                <div class="col-sm-6 col-lg-3 mr-5" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                    <div class="hover-team">
                        <div class="our-team"> <img src="{{ asset('template_fe') }}/images/bu_ucu.png" alt="" />
                            <div class="team-content">
                                <h3 class="title" style="font-size: 15px">Ucu Musahidah, SE</h3> <span class="post">Manager Digital Marketing and Retail</span> </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-instagram"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 ml-5" data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine">
                    <div class="hover-team">
                        <div class="our-team"> <img src="{{ asset('template_fe') }}/images/bu_siha.jpg" alt="" />
                            <div class="team-content">
                                <h3 class="title" style="font-size: 15px">Nasiha Sakina R, S.Akun</h3> <span class="post">Finance</span> </div>
                            <ul class="social">
                                <li>
                                    <a href="#" class="fab fa-facebook"></a>
                                </li>
                                <li>
                                    <a href="#" class="fab fa-instagram"></a>
                                </li>
                            </ul>
                            <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
<!-- End About Page -->

@endsection
 
