@extends('layouts.admin') 
@section('content')
 
 
 
 
    
@if($upcs !=='' and $upcs->count() > 0)
 
 

@foreach ($upcs as $c )
 

<svg id="{{$c->upc}}"></svg>
<script>JsBarcode("#{{$c->upc}}","{{$c->upc}}" );</script> 


 
 
 
  
{{$c->upc}}

@endforeach

 

@endif

  

 
 

@endsection



