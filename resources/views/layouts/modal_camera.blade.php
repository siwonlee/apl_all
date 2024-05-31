 

<!-- Modal -->
{{-- <div class="modal fade" id="edit{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}
<style>


  .scan-frame {
    pointer-events: none;
    position: absolute;
    top: 60%;
    left: 45%;
    transform: translate(-50%, -50%) scale(.7);
}

  </style>



     <!-- Modal -->
  <div class="modal fade"  id="scancamera" role="dialog" >






    <div class=" modal-dialog" class="h-full">
    {{-- <div  class="h-full"> --}}

			  <!-- Modal content-->
			  <div class="modal-content">
						<div class="modal-header" >
                              <h4 class="inset-y-0 font-bold modal-title"></h4>

						  <button   class="close" id="closecamera"  class="p-2 bg-white border-2 rounded-full shadow-lg" >  <i class="text-2xl text-black fa fa-solid fa-times"></i></button>
						           {{-- <button class="button" id="resetButton">Reset</button> --}}
						  {{-- <button type="button" class="close" id="close_camera" data-dismiss="modal" >&times;</button> --}}
							</div>
			 
 





             <video
                        id="video"
                        width="300"
                        height="200"
                        style="border: 1px solid gray"

						class="w-full h-auto"
                    ></video>

                  <div id="scanFrame" class="scan-frame" style="width: 349.714px; height: 262.286px; opacity: 0.5;"> 
  
<svg width="410" height="133" viewBox="0 0 410 133" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M379 127.319H391.5C391.5 127.319 405 127.319 405 113.604V99.5M405 32.5V19.3958C405 5.68091 391.5 5.68091 391.5 5.68091L379 5.68091M32 127.319H17.5C17.5 127.319 5 127.319 5 113.604V99.5M5 32.5V19.3959C5 5.68091 17.5 5.68091 17.5 5.68091H32" stroke="white" stroke-width="10" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
  
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"> 
    <path d="M336 448h56a56 56 0 0056-56v-56M448 176v-56a56 56 0 00-56-56h-56M176 448h-56a56 56 0 01-56-56v-56M64 176v-56a56 56 0 0156-56h56" fill="none" stroke="white" 
    stroke-linecap="round" stroke-linejoin="round" stroke-width="10"></path> </svg> 
  
   --}}
  </div>



         <div id="sourceSelectPanel" style="display: none">
                    <label for="sourceSelect">Change video source:</label>
                    <select id="sourceSelect" style="max-width: 400px"></select>
                </div>



 




 
			 

		 


			  </div>

    </div>
  </div>









</div>
