<?use Carbon\Carbon;?>
<?

$upc = Request::input('upc');



//$cd_output = "";

?>
@extends('layouts.admin')

  @section('content')
<?
//dd($upcs);
?>



 <div align=center>
          <div style="margin:auto;margin-top:25px;"><img   src="wic_apl_checker.png" width=30%>
         {{-- <div class="text-5xl" style="text-align:center;"> APL Checker</div></div> --}}

   </div>





   <div align=center class="px-4 mt-4">



<div  style="margin-bottom:5px;" ><i class="fa fa-solid fa-camera"></i> is an experimental feature.  If the camera scan is not working properly,
   please simply type the upc directly in the input field. </div>

   <form action="{{route('search.general')}}" method="post" >
<div class="max-w-sm mx-auto">
 
   <select id="countries" name = "sstate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
   focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
    dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option  value="all" >Nationwide</option>
 <option @if (isset($sstate) && $sstate=="AK")
     selected
 @endif="AK">AK - Alaska</option>
<option  @if (isset($sstate) && $sstate=="AR")selected @endif 
value="AR">AR - Arkansas</option>
<option  @if (isset($sstate) && $sstate=="AR")selected @endif  
value="CA">CA - California</option>
<option  @if (isset($sstate) && $sstate=="CO")selected @endif  value="CO">CO - Colorado</option>
<option  @if (isset($sstate) && $sstate=="HI")selected @endif  value="HI">HI - Hawaii</option>
<option  @if (isset($sstate) && $sstate=="ID")selected @endif  value="ID">ID - Idaho</option>
<option  @if (isset($sstate) && $sstate=="IL")selected @endif  value="IL">IL - Illinois</option>
<option  @if (isset($sstate) && $sstate=="IN")selected @endif  value="IN">IN - Indiana</option>
<option  @if (isset($sstate) && $sstate=="LA")selected @endif  value="LA">LA - Louisiana</option>
<option  @if (isset($sstate) && $sstate=="MA")selected @endif  value="MA">MA - Massachusetts</option>
<option  @if (isset($sstate) && $sstate=="MD")selected @endif  value="MD">MD - Maryland</option>
<option  @if (isset($sstate) && $sstate=="MI")selected @endif  value="MI">MI - Michigan</option>
<option  @if (isset($sstate) && $sstate=="MN")selected @endif  value="MN">MN - Minnesota</option>
<option  @if (isset($sstate) && $sstate=="MO")selected @endif  value="MO">MO - Missouri</option>
<option  @if (isset($sstate) && $sstate=="MT")selected @endif  value="MT">MT - Montana</option>
<option  @if (isset($sstate) && $sstate=="NC")selected @endif  value="NC">NC - North Carolina</option>
<option  @if (isset($sstate) && $sstate=="SC")selected @endif  value="SC">SC - South Carolina</option>
<option  @if (isset($sstate) && $sstate=="TX")selected @endif  value="TX">TX - Texas</option>
<option  @if (isset($sstate) && $sstate=="UT")selected @endif  value="UT">UT - Utah</option>
<option  @if (isset($sstate) && $sstate=="VA")selected @endif  value="VA">VA - Virginia</option>
<option  @if (isset($sstate) && $sstate=="VT")selected @endif  value="VT">VT - Vermont</option>
<option  @if (isset($sstate) && $sstate=="WA")selected @endif  value="WA">WA - Washington</option>
<option  @if (isset($sstate) && $sstate=="WV")selected @endif  value="WV">WV - West Virginia</option>

  </select>
 




</div>

<div class="px-3 py-2">

 	 {{-- <div id="qr-reader"  ></div> --}}
<!--	  	 <div id="qr-reader" style="width: 100%"></div>-->
{{-- <div id="qr-reader-results" hidden ></div> --}}

</div>










             @csrf

          <input type=hidden name=upc value=""  id='hidden_upc' ></input>




    <div class="flex w-full mb-4 ">

   <input type=text    class="w-full px-3 py-2 ml-2 leading-tight text-gray-700 border-t border-l border-r-0 rounded shadow appearance-none shadow-r-0 border-bottom focus:outline-none focus:shadow-outline "  style="font-size:200%;  text-align: center;" id='upc1' placeholder="type UPC or PLU" name=upc    autofocus   @if ($upc)
    value="{{$upc}}"
   @else
value=""
   @endif required  >


            </input>

       <button
    class="!absolute right-1 top-1 z-10 select-none rounded   py-2 px-4 text-center align-middle    appearance-none   rounded
          bg-white border-l-0   border-t border-bottom border-r mr-2    shadow

      "
    type="button"  id="startButton" data-target="#scancamera" data-toggle="modal" >

     <i class="text-black fa fa-solid fa-camera"></i>
  </button>

    </div>





{{--
      <input type="text" id="upcjson" class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
      style="font-size:200%; text-align: center; "  placeholder="type UPC or PLU" name="upc"  id="upc1" autofocus     @if ($upc)
    value="{{$upc}}"
   @else
value=""
   @endif required /> --}}

    @if (isset($upc))

   <a href="{{route("refresh",['state'=>$sstate])}}"<button class=" btn btn-primary btn-lg"  >Clear</button></a>
   @else


   <button type=submit class=" btn btn-primary btn-lg" id='status_btn' >Check</button>

 @endif


      {{-- <input type=submit class="ml-2 btn btn-primary btn-lg" id="check"  value=" CHECK ">   --}}
      {{-- <input type=submit class="ml-2 btn btn-primary btn-lg" id="status_btn"  value=" CHECK ">   --}}

</form>

</div>


 





 <div id="status"  ></div>


 <?//dd($upcs);?>


@if($upcs !=='' and $upcs->count() > 0 and $cd_output == '')



<div class="px-5 py-2">


<table class="ui celled table">
<thead>
    <th>State</th>
    <th>UPC</th>
    <th>Category</th>
    <th>Description</th>
    <th>UOM</th>
    <th>Exchange</th>
</thead>


 



@foreach ($upcs as $c )

 
<tr>

<td>{{$c->state}}</td>
<td>{{$c->upc}}</td>
<td>{{$c->cate_desc}} - {{$c->subcate_desc}}</td>
<td>{{$c->description}}</td>
<td>{{$c->uom}}</td>
<td>{{$c->exchange}}</td>
 


</tr>

  




    @endforeach

</table>

 


@elseif($cd_output !== 'start'  and $cd_output !== '')



<div class="p-4 ">



<div class="p-4 alert alert-danger" align=center>


 {{$cd_output}}


</div>



  </div>







@elseif($cd_output == '' and $upcs->count() == 0)




<div class="p-4 ">


<div class="p-4 alert alert-danger" align=center>


 {{$upc}} is not found on {{$sstate}} APL.


</div>

 


  </div>

</div>
@endif





  <div data-role="footer" data-position="fixed" style="font-size:80%; font-color:#505050; text-align:right;padding-right:50px;">the latest db update date :
 5/1/2024 </div>
 {{-- <div data-role="footer" data-position="fixed" style="font-size:80%; font-color:#505050; text-align:right;padding-right:50px;">the latest db update date :
  <?=date("F j, Y",time() - 86400);?> </div> --}}
</div>


</div>

      @include('layouts.modal_camera')



@endsection







<!-- include the library -->

{{--

<script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>

 --}}

{{--

<script>


    function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === "complete"
            || document.readyState === "interactive"


			) {
            // call on next available tick
            setTimeout(fn, 1);
        } else {
            document.addEventListener("DOMContentLoaded", fn);


        }
    }


 var start = function () {
        var resultContainer = document.getElementById('qr-reader-results');
        var resultContainer2 = document.getElementById('upc1');
        var lastResult, countResults = 0;
		var isScanned = true;
        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;

                console.log(`Scan result ${decodedText}`, decodedResult);
              	resultContainer.innerHTML = decodedText;
				resultContainer2.value = decodedText;
				console.log(resultContainer2.value);
				console.log(isScanned);
				html5QrcodeScanner.clear();


            }
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
       //     "qr-reader", { fps: 20, qrbox: 500 });
"qr-reader", { fps: 30,showZoomSliderIfSupported: true, willReadFrequently: true,
            showZoomSliderIfSupported: true,
            defaultZoomValueIfSupported: 5 });

	   html5QrcodeScanner.render(onScanSuccess);
    }





</script> --}}


<script
            type="text/javascript"
            src="https://unpkg.com/@zxing/library@latest/umd/index.min.js"
        ></script>

        <script>

            a=new AudioContext() // browsers limit the number of concurrent audio contexts, so you better re-use'em
function beep(vol, freq, duration){
  v=a.createOscillator()
  u=a.createGain()
  v.connect(u)
  v.frequency.value=freq
  v.type="square"
  u.connect(a.destination)
  u.gain.value=vol*0.01
  v.start(a.currentTime)
  v.stop(a.currentTime+duration*0.001)
}
        </script>







<script type="text/javascript">
            window.addEventListener("load", function () {
                let selectedDeviceId;
                const codeReader = new ZXing.BrowserMultiFormatReader();
                console.log("ZXing code reader initialized");
                 const upc1 = document.getElementById('upc1').value;
                codeReader
                    .listVideoInputDevices()
                    .then((videoInputDevices) => {
                        const sourceSelect =
                            document.getElementById("sourceSelect");
                        selectedDeviceId = videoInputDevices[0].deviceId;
                        if (videoInputDevices.length >= 1) {
                            videoInputDevices.forEach((element) => {
                                const sourceOption =
                                    document.createElement("option");
                                sourceOption.text = element.label;
                                sourceOption.value = element.deviceId;
                                sourceSelect.appendChild(sourceOption);
                            });

                            sourceSelect.onchange = () => {
                                selectedDeviceId = sourceSelect.value;
                            };

                            const sourceSelectPanel =
                                document.getElementById("sourceSelectPanel");
                            sourceSelectPanel.style.display = "block";
                        }

                        document
                            .getElementById("startButton")
                            .addEventListener("click", () => {

// const constraints = window.constraints = {
//     audio:false,
//     video:{facingMode:{exact:"environment"}}};

                                codeReader.decodeFromVideoDevice(
                                    selectedDeviceId, "video",
                                // codeReader.decodeOnceFromConstraints(
                                //     constraints, "video",
                                    (result, err) => {
                                        if (result) {
                                            console.log(result);
                                            beep(5, 720, 200);
                                            codeReader.reset();
                                           $('#scancamera').modal('hide');

                                              $('#upc1').attr("value", result.text );
                                              console.log("scan completed");
                                          document.getElementById('status_btn').click();

                                        }
                                        if (
                                            err &&
                                            !(
                                                err instanceof
                                                ZXing.NotFoundException
                                            )
                                        ) {
                                            console.error(err);
                                            document.getElementById(
                                                "result"
                                            ).textContent = err;
                                        }
                                    }
                                );
                                console.log(
                                    `Started continous decode from camera with id ${selectedDeviceId}`
                                );
                            });

                        document
                            .getElementById("closecamera")
                            .addEventListener("click", () => {
                                codeReader.reset();
                                      $('#scancamera').modal('hide');

                                console.log("Reset.");

                            });




                    })
                   .catch((err) => {
                        console.error(err);
                    });
            });





        </script>
