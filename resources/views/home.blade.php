@extends('template_be.app')

@section('konten')


<div class="row">

    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <h6 class="m-b-20">Jumlah Penerimaan </h6>
                <h6 class="text-right"><i class="ti-dropbox-alt f-left"></i><span><?php echo $totalPenerimaan ?></span></h6>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <h6 class="m-b-20">Donatur Personal</h6>
                <h6 class="text-right"><i class="ti-user f-left"></i><span><?php echo $totalDonatur ?></span></h6>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-yellow order-card">
            <div class="card-block">
                <h6 class="m-b-20">Donatur Lembaga</h6>
                <h6 class="text-right"><i class="ti-reload f-left"></i><span><?php echo $totalLembaga ?></span></h6>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-pink order-card">
            <div class="card-block">
                <h6 class="m-b-20">Dana Terkumpul</h6>
                <h6 class="text-right"><i class="ti-money f-left"></i><span>Rp. {{number_format($countProgram ??0,2)}}</span></h6>
            </div>
        </div>
    </div>

    {{-- program --}}
  <div class="col-12 mt-3">
      <div class="card card-chart">
          <div class="card-header ">
            <div class="row">
              <div class="col-sm-12">
                  <h4>Penerimaan Ziswaf By Program</h4>
                </div>
                {{-- <div class="col-sm-12"> --}}
                  
          {{-- </div> --}}
              </div>
          </div>
          <div class="card-body px-3">
            <table class="table">
              <thead class="font-weight-bold">
                <tr>
                  <td  rowspan="2">No</td>
                  <td> Program</td>
                  <td >Jumlah</td>
					        <td></td>
                </tr>
              </thead>
              <tbody id="lembagaParent">
				        <?php
				        $lembagaG = [];
				        $tot=0;

				        ?>
                    
                @foreach ($totalProgram as $key => $p)              
                <tr>
                  <td class="font-weight-bold">{{++$no}}</td>
                
                  <td>{{$p->prog_penerimaan}}</td>
                
                  <td>Rp. {{number_format($p->jumlah ?? 0, 2)}}</td>
                  <td></td>
                </tr>          
                @endforeach
                {{-- <tr>
                  <td><b>Jumlah</b></td>
                  <td></td>
                  <td><b>Rp. {{number_format($countProgram ?? 0,2)}}</b></td>
                  <td></td>
                </tr>    --}}
              </tbody>
				      <tbody id="lembagaSubContent"></tbody>
            </table>
            <div class="float-right">
              {{ $totalProgram->links() }}
            </div>
          </div>
      </div>
  </div>

<div class="col-12 mt-3">
  <div id="grup" class="card card-chart">
      <div class="card-header ">
          <div class="row">
              <div class="col-sm-12">
                  <h4>Penerimaan Ziswaf By Grup</h4>
                </div>
                {{-- <div class="col-sm-6">
          </div> --}}
          </div>
          {{-- <hr> --}}
      </div>
      <div class="card-body px-3">
          <table class="table">
            <thead class="font-weight-bold">
              <tr>
                <td width="4%" rowspan="2">No</td>
                <td> Grup</td>
                <td >Jumlah</td>
                <td>
                  <a href="javascript:byGroupBack()" id="by-group-back" style="display:block" class="btn btn-sm btn-success btn-round btn-icon">
                    <i class="ti ti-angle-double-left"></i>
                  </a>
                </td>
              </tr>
                {{-- <tr>
                  <td >Jumlah</td>
                  <td>Rp. {{number_format($totalGrup ??0,2)}}</td>
                  <td></td>
                </tr> --}}
            </thead>
            <tbody id="by-group1">
              <?php
                $grup_by = array_column(json_decode($countPerRelawan,true), 'grup');
                //  dd('grup.nama');
              ?>
              
                @foreach ($grup as $key => $g)
                
                <tr>
                  <td class="font-weight-bold">{{++$no1}}</td>
                  <td>{{$g->nama}}</td>
                <?php
                $dana = [];
                
                if(in_array($g->nama, $grup_by))
                {
                  foreach($countRelawan as $inNo => $wkwk)
                  {
                    
                    if($wkwk->grup == $g->nama)
                    {
                      // ddd($wkwk->idUser);
                      $rp     = $wkwk->jumlah;
                      $dana[] = ['index' => $wkwk->idUser, 'nominal'=> $rp];
                      break;
                    }
                    else
                      {
                        $dana[] = ['index' => $wkwk->idPenerima,'nominal' => 0];
                      }
                  } 
                }
                else
                  {
                    $rp = 0;
                  }
                ?>
                  <td>Rp. {{ number_format($rp,0) }}</td>

                  @if (count($g->users) > 0)
                  <td> <button onclick="viewGrup('{!! base64_encode($g->users) !!}', '{!! base64_encode($g->nama) !!}','{!! base64_encode($countPerRelawan) !!}','{!! base64_encode(json_encode($dana)) !!}')" type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
                    <i class="ti ti-angle-double-right"></i>
                  </button></td>
                  @else
                  <td></td>
                  @endif
                </tr>
                

                @endforeach
                <tr>
                  <td><b>Jumlah</b></td>
                  <td></td>
                  <td> <b>Rp. {{number_format($totalGrup ??0,2)}}</b> </td>
                 
                </tr>
            </tbody>
            <tbody id="by-group2"></tbody>
          </table>
          <div class="float-right">
            {{ $grup->links() }}
          </div>
            {{-- <div class="float-left ml-3">
              <strong>JUMLAH</strong>
              <strong style="margin-left: 380px">Rp. {{number_format($totalGrup ??0,2)}}</strong> 
            </div>
            <div class="float-right mr-5">
             
            </div>   --}}
      </div>
  </div>
</div>

<script>
  // grup
const viewGrup = function (users, nama, countPerRelawan,jmll){
  
  $('#by-group-back').removeAttr('style');
  $('#by-group1').attr('style',"display:none");
  $('#by-group2').empty()
                 .append(generateUsers(users,countPerRelawan,jmll));
}
//   const generateUsers = function(users,countPerRelawan){
//     let element = '';
//     let no = 1;
//     users.forEach(function(user){
//       element += ` <tr >
//             <td class="font-weight-bold">${no++}</td>
//             <td>${user.nama}</td>
//             <td>Rp. ${countPerRelawan}</td>
//             <td></td>
//             </tr>`;
//     });
//     return element;
//   }
const generateUsers = function(users,countPerRelawan,jmll){
  let element = '';
  let no = 1;
  
  users = JSON.parse(atob(users)) //base64 decoder
  countPerRelawan = JSON.parse(atob(countPerRelawan)) //base64 decoder
  jmll = JSON.parse(atob(jmll)) //base64 decoder
  console.log(countPerRelawan);
  users.forEach(function(user,noo){
    let countUser = '';
    countPerRelawan.forEach(count => {        
        if(count.idUser == user.id) {
            countUser += count.jumlah;
        }                  
    });
    console.log(countUser);
    element += `
      <tr>
          <td class="font-weight-bold">${no++}</td>
          <td>${user.nama}</td>
          <td>Rp. ${countUser}</td>
          <td></td>
      </tr>`;
  });
  return element;
}
let add_ = 0;
let dataG= {!! json_encode($lembagaG) !!};
let tot  = 0;
(Object.entries(dataG)).forEach(function(obj){
obj[1].nominal.forEach(function(row){
  tot += Number(row);
});
document.getElementById(obj[1].target+'_m').innerHTML = 'Rp.'+Number(tot).toLocaleString();
});
//   program
function subProgram(target)
{
if(add_ === 0)
{
  $(`#lembagaParent`).css({display:"none"});
  $(`#lembagaSubContent`).empty();
  $(`#lembagaSubContent`).append(`
    <tr>
      <th>#</th>
      <th>${dataG[target].header}</th>
      <th>${document.getElementById(dataG[target].target+'_m').innerHTML}</th>
      <th>
        <button onClick="subProgram('${dataG[target].target}')" class="btn btn-success btn-sm btn-round btn-icon">
          <i class="ti ti-angle-double-left"></i>
        </button>
      </th>
    </tr>
  `);
  dataG[target].nama.forEach(function(row,no){
    $(`#lembagaSubContent`).append(`
      <tr>
        <td>${no+1}</td>
        <td>${row}</td>
        <td>Rp.${Number(dataG[target].nominal[no]).toLocaleString()}</td>
        <td></td>
      </tr>
    `);
  });
  add_ = 1;
}
else
{
  $(`#lembagaParent`).removeAttr('style');
  $(`#lembagaSubContent`).empty();
  add_ = 0;
}
}
function byGroupBack()
{
$('#by-group-back').attr('style', 'display:none');
$('#by-group2').empty();
$('#by-group1').removeAttr('style');
}
</script>

@endsection
