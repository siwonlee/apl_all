<?use Carbon\Carbon;?>
<?

//$upc = Request::input('upc');
?>
@extends('layouts.admin')

@section('content')
<?
//dd($upcs);
?>
 
 
 
 
   
    
@if($upcs !=='' and $upcs->count() > 0)

<div class="px-3 py-2">
 

 
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




 

 
 


  

</div>
 

</div>

 
@elseif($upc =='' )


<div class="p-4 ">

 

<div class="p-4 alert alert-danger" align=center> 
 

<b>No</b> upc submitted
  <br><br>You need to scan a food product barcode to get a result.
 

</div>

 
 
 

@else

 

 
<div class="p-4 ">

 

<div class="p-4 alert alert-danger" align=center> 



<b>Not</b> in our APL (Approved Product List)
  <br><br>Not all WIC approved fresh fruits and vegetables scan as WIC approved in the APL Checker App. 
  <br><br>Vendors must map fresh produce to the appropriate PLU.
  <br><br>Consult the Authorized Foods List to ensure the product meets the criteria for approval. 
  <!--<br><br>Click <a href="https://apl.mdwic.org/upc_upload_new/index.php" target=_blank>here</a>  to submit for our review.-->
    <br><br>Click <a href="https://up.wicapl.org/dashboard?upc={{$upc}}" target=_blank>here</a>  to submit for our review.

</div>

 
 
  </div>

 
@endif


           
    <div data-role="footer" data-position="fixed" style="font-size:80%; font-color:#505050; text-align:right;padding-right:50px;">the latest db update date :  
  <?=date("F j, Y", time() - 86400);?> </div>     
   
 
    </div>
 


@endsection


