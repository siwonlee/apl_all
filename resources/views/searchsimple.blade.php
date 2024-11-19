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
 

 
  <div class="overflow-x-auto">
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="border border-gray-300 px-4 py-2 text-left">State</th>
                <th class="border border-gray-300 px-4 py-2 text-left">UPC</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Category</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Description</th>
                <th class="border border-gray-300 px-4 py-2 text-left">UOM</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Exchange</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($upcs as $c)
            <tr class="hover:bg-gray-100">
                <td class="border border-gray-300 px-4 py-2">{{ $c->state }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $c->upc }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $c->cate_desc }} - {{ $c->subcate_desc }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $c->description }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $c->uom }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $c->exchange }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



 

 
 


  

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
  <br><br>Not all WIC approved fresh fruits and vegetables scanned as WIC approved in the APL Checker App. 
  <br><br>Vendors must map fresh produce to the appropriate PLU.
  <br><br>Consult the Authorized Foods List to ensure the product meets the criteria for approval. 
  <!--<br><br>Click <a href="https://apl.mdwic.org/upc_upload_new/index.php" target=_blank>here</a>  to submit for our review.-->
    {{-- <br><br>Click <a href="https://up.wicapl.org/dashboard?upc={{$upc}}" target=_blank>here</a>  to submit for our review. --}}

</div>

 <div class="p-4 alert alert-danger mt-1" align=center> 

   The result might contain incorrect information due to the delayed db update.  Please contact the State's WIC office for the most updated APL information.   

</div>
 
  </div>

 
@endif


           
    {{-- <div data-role="footer" data-position="fixed" style="font-size:80%; font-color:#505050; text-align:right;padding-right:50px;">the latest db update date :  
  <?=date("F j, Y", time() - 86400);?> </div>     
    --}}
 
    </div>
 


@endsection



