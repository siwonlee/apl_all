<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upc;
use App\Models\Apl;

class SearchController extends Controller
{
    
    public function __construct()
    {
      //  $this->middleware('auth');
    }


    public function index()
    {

       
       // return view('search')->with('upcs','') ;
        return view('search')->with(['upcs'=>'', 'cd_output'=>'start']) ;

    }
   
        public function refresh($state)
    {

       
       // return view('search')->with('upcs','') ;
        return view('search')->with(['upcs'=>'', 'cd_output'=>'start', 'sstate'=> $state]) ;

    }
    

    public function general(Request $request)
    {

       
$upc = $request->input('upc');
$sstate = $request->input('sstate');

  //  dd($sstate);
    if ($sstate !=='all') {

            $result = Upc::select("id",
              "upc",
              "category",
              "cate_desc",
              "subcategory",
              "subcate_desc",
              "description",
              "uom",
              "state",
              "exchange"
              )->where('upc', 'like', '%'.$upc.'%')->where('state', $sstate)->get() ;

    } elseif($sstate =='all') {
      $result = Upc::select("id",
              "upc",
              "category",
              "cate_desc",
              "subcategory",
              "subcate_desc",
              "description",
              "uom",
              "state",
              "exchange"
              )->where('upc', 'like', '%'.$upc.'%')->get() ;
    }

    

// dd($result);

$cd_output="";

if($upc != '' and  !(strlen($upc)==12 or strlen($upc)==13 or strlen($upc)==8 or strlen($upc)==4 or strlen($upc)==5) )
      {

        $cd_output = "The upc length should be 8, 12 or 13 including a check digit at the end. ";
  

      }
      if($upc != '' and  (strlen($upc)==12 or strlen($upc)==13 or strlen($upc)==8 ))
      {
        if(strlen($upc)==12){
            $upc_left2=substr($upc,0,12);
            $b2 = str_split($upc_left2);
            $c2 = ($b2[0]+$b2[2]+$b2[4]+$b2[6]+$b2[8]+$b2[10])*3;
            $d2 = ($b2[1]+$b2[3]+$b2[5]+$b2[7]+$b2[9]);
            $e2 = $c2 + $d2;
            $f2 = $e2%10;
            $g2 = 10-$f2;
             if($g2==10){$g2=0;	}
            
             if($b2[11]==$g2){$cv = '1'; }else{$cv = '0';}
             
             $g=$g2;
             }
             
            if(strlen($upc)==13){
            $upc_left3=substr($upc,0,13);
            $b3 = str_split($upc_left3);
            $c3 = ($b3[0]+$b3[2]+$b3[4]+$b3[6]+$b3[8]+$b3[10]);
            $d3 = ($b3[1]+$b3[3]+$b3[5]+$b3[7]+$b3[9]+$b3[11])*3;
            $e3 = $c3 + $d3;
            $f3 = $e3%10;
            $g3 = 10-$f3;
             if($g3==10){$g3=0;	 }
             
             if($b3[12]==$g3){$cv = '1'; }else{$cv = '0';}
               
             $g=$g3;
             }



            if(strlen($upc)==8){
 $cv = '';
              
    
             }

             

     

      //dd($data_indi);

  
  if($cv == '0'){ $cd_output = " It has a wrong check digit.  It should be ".$g; }

   }






// $result = Upc::search($request->get('upc'))->paginate(10);


// $result = Upc::where('upc', $upc)
//         ->orWhere('brand',$upc)
//         ->orWhere('description',$upc)
//         ->orWhere('short_desc',$upc)
//         ->orWhere('pic',$upc)
//         ->orWhere('pic1',$upc)
//         ->orWhere('pic2',$upc)
//         ->orWhere('benefit_uom_wow',$upc)->get();


return view('search')->with(['upcs'=>$result,'upc'=>$upc, 'cd_output'=>$cd_output, 'sstate'=>$sstate]);

       
        
    }




    public function apl()
    {

       
//$upc = $request->input('upc');

//$result = Upc::search($request->get('upc'))->paginate(10);


// $result = Upc::where('upc', $upc)
//         ->orWhere('brand',$upc)
//         ->orWhere('description',$upc)
//         ->orWhere('short_desc',$upc)
//         ->orWhere('pic',$upc)
//         ->orWhere('pic1',$upc)
//         ->orWhere('pic2',$upc)
//         ->orWhere('benefit_uom_wow',$upc)->get();


$upcs['upcs'] = Apl::select("id",
"upc",
"category",
"cate_desc",
"subcategory",
"sub_desc",
"brand",
"description",
"size",
"uom",
"verify",
"verify_date",
"image",
"short_desc",
"subcat_full",
"category_full",
"end_date",
"compare",
"pic")->where('verify', 1) -> orderby('verify_date','desc')->get() ;

return $upcs['upcs'];

//return "siwon";
// return view('temp')->with($upcs);
// return view('search')->with(['upcs'=>$result,'upc'=>$upc]);
      
        
    }

    public function aplSearch($upc)
    {
        //$this->cate = $cate;
        $upcs['upcs'] = Upc::select("id",
        "upc",
        "category",
        "cate_desc",
        "subcategory",
        "sub_desc",
        "brand",
        "description",
        "size",
        "uom",
        "verify",
        "verify_date",
        "image",
        "short_desc",
        "subcat_full",
        "category_full",
        "end_date",
        "compare",
        "pic")->where('verify', 1) -> where('upc', $upc)->get() ;

      //  return view('temp')->with($upcs);
        //return $arr;
        return $upcs['upcs'];
       //$upc = $request->input('upc');

      // $result = Upc::search($request->get('upc'))->paginate(10);
      // $result = $upcs['upcs'];


      // return view('search')->with(['upcs'=>$result,'upc'=>$upc]);
    }

    public function aplSearchSimple($upc)
    {
        //$this->cate = $cate;
        $upcs['upcs'] = Upc::select("id",
        "upc",
        "category",
        "cate_desc",
        "subcategory",
        "sub_desc",
        "brand",
        "description",
        "size",
        "uom",
        "verify",
        "verify_date",
        "image",
        "short_desc",
        "subcat_full",
        "category_full",
        "end_date",
        "compare",
        "pic")->where('verify', 1) -> where('upc', $upc)->get() ;

      //  return view('temp')->with($upcs);
        //return $arr;
       // return $upcs['upcs'];
       //$upc = $request->input('upc');

      // $result = Upc::search($request->get('upc'))->paginate(10);
       $result = $upcs['upcs'];


        return view('searchsimple')->with(['upcs'=>$result,'upc'=>$upc]);
    }

 



    
    public function edit(Request $request, $id)
    {
 
 
        $request->validate([
        
            'upc' => 'required',
            'category_full' => 'required',
            'subcat_full' => 'required',
            'brand' => 'required',
            'description' => 'required',
            'short_desc' => 'required',
    
            'high_cost' => 'required',
            'benefit_qt' => 'required',
            'benefit_uom_wow' => 'required',
            'verify_date' => 'required',
         

        ]);

 
  


        $time = $request->input('time');
        $staff = $request->input('staff');
    
        $upc = $request->input('upc');          
        
      
  
  
        $verify_date = $request->input('verify_date');
        $category_full = $request->input('category_full');
        $subcat_full = $request->input('subcat_full');
        $brand = $request->input('brand');
        $description = $request->input('description');
        $short_desc = $request->input('short_desc');
 
        $high_cost = $request->input('high_cost');
  
        $benefit_qt = $request->input('benefit_qt');
        
        $benefit_uom_wow = $request->input('benefit_uom_wow');
   
    
 
         $end_date=$request->input('end_date');
  
        $plu_indicator=$request->input('plu_indicator');
        $broadband_flag=$request->input('broadband_flag');
    
        $benefit_uom_wow = strtoupper($benefit_uom_wow);



        Upc::where('id', $id)
              ->update([
 
       
                 'edit_date'=>$time,
                 'edit_staff'=>$staff,
        
    
               'category_full'=>   $category_full,
            'subcat_full'=>     $subcat_full, 
               'brand'=>  $brand, 
              'description'=>    $description,
               'short_desc'=>   $short_desc,
               'long_desc'=>   $short_desc,
      
  
               'high_cost'=>   $high_cost,
            'benefit_uom_wow'=>    $benefit_uom_wow,
            'benefit_qt' => $benefit_qt,
           'end_date'=>       $end_date,
           'verify_date'=>       $verify_date, 
           'plu_indicator'=>$plu_indicator,
           'broadband_flag'=>$broadband_flag,
                 
                 ]);
 




              return redirect()->back()->with('approved','The item( '.$upc.' ) has been updated.');

 

    }



    public function category(Request $request)
    {

       
$upc = $request->input('upc');

$result = Upc::search($request->get('upc'))->paginate(10);


// $result = Upc::where('upc', $upc)
//         ->orWhere('brand',$upc)
//         ->orWhere('description',$upc)
//         ->orWhere('short_desc',$upc)
//         ->orWhere('pic',$upc)
//         ->orWhere('pic1',$upc)
//         ->orWhere('pic2',$upc)
//         ->orWhere('benefit_uom_wow',$upc)->get();

return view('search')->with(['upcs'=>$result,'upc'=>$upc]);
  
        
    }

 
 
 
 


    }