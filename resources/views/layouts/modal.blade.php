 <?use Carbon\Carbon;?>

     <!-- Modal -->
  <div class="modal fade" id="edit{{$c->id}}" role="dialog">
    <div class="modal-dialog">

			  <!-- Modal content-->
		  <div class="modal-content">
		  	<div class="modal-header" >
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>


			<div class="modal-body">
	 
 		
			
					<form action="{{route('edit', ['id'=>$c->id])}}"  method=post>
						<input name = "id" class="form-control" type=hidden value="{{$c->id}}"  ></input>
						            <input name = "time" class="form-control  "  type=hidden value=" {{Carbon::now()->format('Y-m-d')}}"   ></input>
				                <input name = "staff" class="form-control  "  type=hidden value="{{Auth::user()->name}} "   ></input>
				<input name = "verify" class="form-control  "  type=hidden value="{{$c->verify}} "   ></input>
				<input name = "upc" class="form-control  "  type=hidden value="{{$c->upc}} "   ></input>
	   @csrf
	
			<div class="form-group row">
  			<label class="control-label col-md-3 col-sm-3 col-xs-3 text-gray-700" for="short_desc"> Image(url link) </label>
			<div class="col-md-9 col-sm-9 col-xs-9">
  			<input name = "image" class="form-control form-input rounded-md shadow-sm mt-1 block w-full "  type=text value=" {{$c->image}}"   ></input>
			</div> </div> 
			<div class="form-group row">
  			<label class="control-label col-md-3 col-sm-3 col-xs-3 text-gray-700" for="short_desc"> Status </label>
			<div class="col-md-9 col-sm-9 col-xs-9">
  			<input name = "approved" class="form-control form-input rounded-md shadow-sm mt-1 block w-full "  type=text value="{{$c->approved}} " readonly  ></input>
			</div> </div> 
			<div class="form-group row">
  			<label class="control-label col-md-3 col-sm-3 col-xs-3 text-gray-700" for="short_desc"> Verify Staff </label>
			<div class="col-md-9 col-sm-9 col-xs-9">
  			<input name = "verify_staff" class="form-control form-input rounded-md shadow-sm mt-1 block w-full "  type=text value="{{$c->verify_staff}} " readonly  ></input>
			</div> </div> 
			<div class="form-group row">
  			<label class="control-label col-md-3 col-sm-3 col-xs-3 text-gray-700" for="short_desc"> UPC </label>
			<div class="col-md-9 col-sm-9 col-xs-9">
  			<input name = "upc" class="form-control form-input rounded-md shadow-sm mt-1 block w-full "  type=text value="{{$c->upc}} "  readonly ></input>
			</div> </div> 
		 
			<div class="form-group row">
			<label class="control-label col-md-3 col-sm-3 col-xs-3 text-gray-700" for="short_desc" > Category </label>
			 
			<div class="col-md-9 col-sm-9 col-xs-9">
  			<input name = "category" class="form-control form-input rounded-md shadow-sm mt-1 block w-full "  type=text value=" {{$c->category}} "  required  ></input>
			</div> </div> 
			<div class="form-group row">
			<label class="control-label col-md-3 col-sm-3 col-xs-3 text-gray-700" for="short_desc"> Subcategory </label>
			<div class="col-md-9 col-sm-9 col-xs-9">
  			<input name = "subcategory" class="form-control form-input rounded-md shadow-sm mt-1 block w-full "  type=text value=" {{$c->subcategory}} "required></input>
			</div> </div> 
			<div class="form-group row">
			<label class="control-label col-md-3 col-sm-3 col-xs-3 text-gray-700" for="short_desc">Brand  </label>
			<div class="col-md-9 col-sm-9 col-xs-9">
  			<input name = "brand" class="form-control form-input rounded-md shadow-sm mt-1 block w-full "  type=text value=" {{$c->brand}} "  required  ></input>
			</div> </div> 
			<div class="form-group row">
						<label class="control-label col-md-3 col-sm-3 col-xs-3 text-gray-700" for="short_desc"> Description </label>
			<div class="col-md-9 col-sm-9 col-xs-9">
  			<input name = "description" class="form-control form-input rounded-md shadow-sm mt-1 block w-full "  type=text value="{{$c->description}}  " required   ></input>
			</div> </div> 
			<div class="form-group row">
						<label class="control-label col-md-3 col-sm-3 col-xs-3 text-gray-700" for="short_desc">Short Description  </label>
			<div class="col-md-9 col-sm-9 col-xs-9">
  			<input name = "short_desc" class="form-control form-input rounded-md shadow-sm mt-1 block w-full "  type=text value=" {{$c->short_desc}}  "  required  ></input>
			</div> </div> 
			<div class="form-group row">
						<label class="control-label col-md-3 col-sm-3 col-xs-3 text-gray-700" for="short_desc">Size  </label>
			<div class="col-md-9 col-sm-9 col-xs-9">
  			<input name = "size" class="form-control form-input rounded-md shadow-sm mt-1 block w-full "  type=text value=" {{$c->size}}"   required ></input>
			</div> </div> 
			<div class="form-group row">
			<label class="control-label col-md-3 col-sm-3 col-xs-3 text-gray-700" for="short_desc"> UOM </label>
			<div class="col-md-9 col-sm-9 col-xs-9">
  			<input name = "uom" class="form-control form-input rounded-md shadow-sm mt-1 block w-full "  type=text value=" {{$c->uom}} "  required  ></input>
			</div> </div> 
			<div class="form-group row">
			<label class="control-label col-md-3 col-sm-3 col-xs-3 text-gray-700" for="short_desc"> High Cost Item </label>
			<div class="col-md-9 col-sm-9 col-xs-9">
			<select   class="col-md-12 col-sm-12 col-xs-12 form-control"    name=high_cost  ; "  required  >

				<option value="0" <?if($c->high_cost==0){echo 'selected';}?> >NO HC</option>
				<option value="1" <?if($c->high_cost==1){echo 'selected';}?> >HC</option>


			</select>
  		 
			</div> </div> 

						<div class="form-group row">
			<label class="control-label col-md-3 col-sm-3 col-xs-3 text-gray-700" for="short_desc"> Ingredients </label>
			<div class="col-md-9 col-sm-9 col-xs-9">
  	<textarea  name = "ingredients" style="height:100px;"  class="form-control col-md-12 col-sm-12 col-xs-12"  >{{$nu->ingredients}}</textarea> 
			</div> </div> 

						<div class="form-group row">
			<label class="control-label col-md-3 col-sm-3 col-xs-3 text-gray-700" for="short_desc"> Nutrition </label>
			<div class="col-md-9 col-sm-9 col-xs-9">
 	<textarea name = "nutrition" style="height:100px;"  class=" form-control col-md-12 col-sm-12 col-xs-12"   >{{$nu->nutrition}}</textarea> 
			</div> </div> 

						<div class="form-group row">
			<label class="control-label col-md-3 col-sm-3 col-xs-3 text-gray-700" for="short_desc"> Benefit QT  </label>
			<div class="col-md-9 col-sm-9 col-xs-9">
  			<input name = "benefit_qt" class="form-control form-input rounded-md shadow-sm mt-1 block w-full "  type=text value=" {{$c->benefit_qt}} "  required  ></input>
			</div> </div> 	 
 						<div class="form-group row">
			<label class="control-label col-md-3 col-sm-3 col-xs-3 text-gray-700" for="short_desc">UOM for WOW  </label>
			<div class="col-md-9 col-sm-9 col-xs-9">


			<select   class="col-md-12 col-sm-12 col-xs-12 form-control"    name=benefit_uom ; "  required  >



			<option value="BAG" <?if($c->benefit_uom=='BAG'){echo 'selected';}?> >BAG_BAG</option>

 
			<option value="CAN" <?if($c->benefit_uom=='CAN'){echo 'selected';}?> >CAN_CAN</option> 
			<option value="CTR" <?if($c->benefit_uom=='CTR'){echo 'selected';}?> >CTR_CONTAINER</option>

			<option value="DOZ" <?if($c->benefit_uom=='DOZ'){echo 'selected';}?> >DOZ_DOZEN</option>

			<option value="GAL" <?if($c->benefit_uom=='GAL'){echo 'selected';}?> >GAL_GALLON</option>
			<option value="HGL" <?if($c->benefit_uom=='HGL'){echo 'selected';}?> >HGL_HALF GALLON</option>
 
			<option value="LB" <?if($c->benefit_uom=='LB'){echo 'selected';}?> >LB_POUND</option>

			<option value="OZ" <?if($c->benefit_uom=='OZ'){echo 'selected';}?> >OZ_OZ</option>
			<option value="PKG" <?if($c->benefit_uom=='PKG'){echo 'selected';}?> >PKG_PACKAGE</option>

			<option value="QT" <?if($c->benefit_uom=='QT'){echo 'selected';}?> >QT_QUART</option>
			<option value="4PK" <?if($c->benefit_uom=='4PK'){echo 'selected';}?> >4PK_4 PACKAGES</option>
			<option value="6PK" <?if($c->benefit_uom=='6PK'){echo 'selected';}?> >6PK_6 PACKAGES</option>

			<option value="$$$" <?if($c->benefit_uom=='$$$'){echo 'selected';}?> >$$$_DOLLAR</option>



 
			</select>

 

 
			</div> </div> 	 
  						<div class="form-group row">
			<label class="control-label col-md-3 col-sm-3 col-xs-3 text-gray-700" for="short_desc"> Comment </label>
			<div class="col-md-9 col-sm-9 col-xs-9">
  			<input name = "comment" class="form-control form-input rounded-md shadow-sm mt-1 block w-full "  type=text value="{{$c->comment}}  "    ></input>
			</div> </div> 	 
 

 
 
 

									<div align=center style="margin-top:10px;">
									<button class="btn btn-success btn-sm"  type=submit >Submit</button>
									</div>


					</form>


 
 
				</div>

				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>


			  </div>


    </div>
  </div>







 