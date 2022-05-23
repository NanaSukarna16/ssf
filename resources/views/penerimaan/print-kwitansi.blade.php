<style>

	#bottom {
  		/* position: absolute; */
  		width: 50%;
  		/* bottom: 10px; */
		/* align-items: center; */
		margin-top: 40%;
		
	} 
	.img{  
	 height: 250px;  
	 width: 250px;  
	 }  
	#left {    
	 text-align: left;  
	 width: auto;
	 float: left;
	 height: auto;
	 font-size: 14px;
	 }  
	 #center {    
	 text-align: center;  
	 } 
	 th {
		 border:1px;
	 }
	 #right{    
	 text-align: right;
	 float: right;
	 width: auto;
	 height: auto;
	 font-size: 14px;
	 }
	</style>
	<!-- {{-- zis --}} -->
	@if($penerimaanf->program->nama === 'Zakat Maal' || $penerimaanf->program->nama === 'Zakat Profesi' || $penerimaanf->program->nama === 'Zakat Fitrah')
		<img src="https://i.imgur.com/8LvZpTFt.png" id="left"  style="margin-top: -50px;" class="img">
		<div id="left">
			<br> <br><br><br> <br><br>
		<span style="margin-left: -145px;">
		SEBI SOCIAL FUND
		</span>
		<br>
		<span style="margin-left: -145px;">
		Jl. Raya Bojongsari, Pondok Rangga, 
		</span><br>
		<span style="margin-left: -145px;">
		Curug, Bojongsari, Depok 16517,
		</span><br>
		<span style="margin-left: -145px;">
		Telp. 0821-3497-2462, <br>
		</span>
		<span style="margin-left: -145px;">
		Email: socialfund.sebi@gmail.com, ssf.sebi.ac.id
		</span> <br>
		</span>
		</div>
		<img src="https://i.imgur.com/P8gjtzOt.png" id="right" style="margin-top: -50px" class="img">	
		<div id="right" style="margin-top: 105px;">		
		<span style="margin-right: -145px;">
			Rekomendasi BAZNAS RI Nomor 105 Tahun 2017
		</span>
		<br>
		<span style="margin-right: -145px;">
			SK Kakanwil Kemenag Prov Jawa Barat 
		</span><br>
		<span style="margin-right: -145px;">
			Nomor 1082 Tahun 2017
		</span>
		
		
		</span>
		</div>
	@else
	<!-- {{-- wakaf --}} -->
		<img src="https://i.imgur.com/txOEGEi.png" id="left" class="img">
		<div id="left">
			<br> <br><br><br> <br><br>
		<span style="margin-left: -335px;">
		NAZHIR WAKAF YAYASAN BINA TSAQOFAH
		</span>
		<br>
		<span style="margin-left: -335px;">
		Jl. Raya Bojongsari, Pondok Rangga, 
		</span><br>
		<span style="margin-left: -335px;">
		Curug, Bojongsari, Depok 16517,
		</span><br>
		<span style="margin-left: -335px;">
		Telp. 0821-3497-2462, <br>
		</span>
		<span style="margin-left: -335px;">
		Email: socialfund.sebi@gmail.com, ssf.sebi.ac.id
		</span> <br>
		<span style="margin-left: -335px;">
		Website : sebisocialfund.org
		</span>
		</span>
		</div>
		<img src="https://i.imgur.com/5IQePpo.png" id="right" class="img">	
		<div id="right" style="margin-top: 105px;">		
		<span style="margin-right: -95px;">
			SK OPERASIONAL LEMBAGA NAZHIR WAKAF
		</span>
		<br>
		<span style="margin-right: -95px;">
			BADAN WAKAF INDONESIA 
		</span><br>
		<span style="margin-right: -95px;">
			Nomor 33 00202 Tahun 2019
		</span>
		
		</span>
		</div>
	@endif
<b>------------------------------------------------------------------------------------------------------------------------------------</b>
<br><br><br>
@if(empty($penerimaanf->nama_bs)) 
	@if($penerimaanf->program->nama === 'Zakat Maal' || $penerimaanf->program->nama === 'Zakat Profesi' || $penerimaanf->program->nama === 'Zakat Fitrah')
		<center><b style="font-size: 20px;">BUKTI SETOR : ZAKAT</b></center>
	@elseif($penerimaanf->program->nama === 'Infak terikat - Beasiswa Dhuafa penghafal Quran' || $penerimaanf->program->nama === 'Infak terikat - Beasiswa anak negeri berprestasi' || $penerimaanf->program->nama === 'Infak terikat - Beasiswa kakak asuh' || $penerimaanf->program->nama === 'Infak tidak terikat' || $penerimaanf->program->nama === 'Infak terikat - Lainnya')
		<center><b style="font-size: 20px;">BUKTI SETOR : INFAK</b></center>
	@elseif($penerimaanf->program->nama === 'Sedekah')
		<center><b style="font-size: 20px;">BUKTI SETOR : Sedekah</b></center>
	@else
		<center><b style="font-size: 20px;">BUKTI SETOR : WAKAF</b></center>
	@endif
@elseif(!empty($penerimaanf->nama_bs))
<center><b style="font-size: 20px;">BUKTI SETOR : {{ucfirst(trans($penerimaanf->nama_bs))}}</b></center>
@endif
<br>
<table style="border: none;">
	<tr>	
		<td><b style="font-size:16px;margin-left:100px;">Tanggal</b></td>
		<td><b> :</b></td>
		<td><b>{{ \Carbon\Carbon::parse($penerimaanf->tgl_tf)->translatedFormat(' d F Y') }}</b></td>
		<td><b style="font-size:16px;" >No </b></td>
		<td><b style="font-size:16px;" >: </b></td>
		<td><b style="font-size:16px;" >{{$penerimaan->id}}</b></td>
	</tr>
	<tr>	
		<td><b style="font-size:16px;margin-left:100px;">NAMA DONATUR </b></td>
		<td><b> :</b></td>
		@if(!empty($donatur))
		<td><b>{{$donatur->nama}}</b></td>
		@else
		<td><b>{{$lembaga->nama_lembaga}}</b></td>
		@endif
	</tr>
	<tr>	
		<td><b style="font-size:16px;margin-left:100px;">ALAMAT </b></td>
		<td><b> :</b></td>
		@if(!empty($donatur))
		<td><b>{{$donatur->alamat}}</b></td>
		@else
		<td><b>{{$lembaga->alamat_lembaga}}</b></td>
		
		@endif
	</tr>
	<tr>	
		<td><b style="font-size:16px;margin-left:100px;">NO TLP </b></td>
		<td><b> :</b></td>
		@if(!empty($donatur))
		<td><b>{{$donatur->hp}}</b></td>
		@else
		<td><b>{{$lembaga->hp_lembaga}}</b></td>
		@endif
	</tr>
</table>
<br><br>
<table style="border: 1px;margin-left:10px;border: 1px solid #dddddd;width:100%">soal
	<tr>
		<th><b>PROGRAM</b></th>
		<th><b>ATAS NAMA</b></th>
		<th><b>NOMINAL</b></th>
	</tr>
	@foreach ($penerimaand as $p)	
	<tr style="border: 1px;">
		<td ><center>{{$p->program->nama}}</center></td>
		@if(!empty($p->donatur->nama))
		<td ><center>{{$p->donatur->nama}}</center></td>
		@else
		<td ><center>{{$p->lembaga->nama_lembaga}}</center></td>
		@endif
		<td ><center>Rp {{number_format($p->nominal ?? 0, 2)}}</center></td>
	</tr>
	@endforeach
</table>
@php
$total_penawaran = 0;
foreach($penerimaand as $key => $penawarans) {
	$total_penawaran    += $penawarans->nominal ?? 0;
}
@endphp
<span id="right"><b style="font-size: 16px">JUMLAH Rp {{number_format($total_penawaran ?? 0,2)}}</b></span>
<br>
<b>------------------------------------------------------------------------------------------------------------------------------------</b>
@if(empty($penerimaanf->nama_bs)) 
	@if($penerimaanf->program->nama === 'Zakat Maal' || $penerimaanf->program->nama === 'Zakat Profesi' || $penerimaanf->program->nama === 'Zakat Fitrah')
	<center>Jazakumullah Khair Katsiraa atas Zakat nya semoga Allah mudahkan segala urusannya pun menjadi amal kebaikan untuk Bapak/Ibu</center>
	@elseif($penerimaanf->program->nama === 'Infak terikat - Beasiswa Dhuafa penghafal Quran' || $penerimaanf->program->nama === 'Infak terikat - Beasiswa anak negeri berprestasi' || $penerimaanf->program->nama === 'Infak terikat - Beasiswa kakak asuh' || $penerimaanf->program->nama === 'Infak tidak terikat' || $penerimaanf->program->nama === 'Infak terikat - Lainnya')
	<center>Jazakumullah Khair Katsiraa atas Infak nya semoga Allah mudahkan segala urusannya pun menjadi amal kebaikan untuk Bapak/Ibu</center>
	@elseif($penerimaanf->program->nama === 'Sedekah')
	<center>Jazakumullah Khair Katsiraa atas Sedekah nya semoga Allah mudahkan segala urusannya pun menjadi amal kebaikan untuk Bapak/Ibu</center>
	@else
		<center>Jazakumullah Khair Katsiraa atas Wakaf nya semoga Allah mudahkan segala urusannya pun menjadi amal kebaikan untuk Bapak/Ibu</center>
	@endif
@elseif(!empty($penerimaanf->nama_bs))
<center>Jazakumullah Khair Katsiraa atas {{$penerimaanf->nama_bs}} nya semoga Allah mudahkan segala urusannya pun menjadi amal kebaikan untuk Bapak/Ibu</center>

@endif

<br><br><br>
@if($penerimaanf->program->nama === 'Zakat Maal' || $penerimaanf->program->nama === 'Zakat Profesi' || $penerimaanf->program->nama === 'Zakat Fitrah')
<p hidden> Program Zakat</p>
@else
<center>
	<img src="https://i.imgur.com/EqStfnH.png" width="300"  id="bottom">
</center>
@endif
	


