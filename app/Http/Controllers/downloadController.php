<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \wapmorgan\UnifiedArchive\UnifiedArchive;
use File;
use Response;
use App\LogEntry;
use Illuminate\Support\LazyCollection;
use App\web_server_roles;
use Illuminate\Support\Facades\DB;

class downloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = "https://rules.emergingthreats.net/open/snort-2.9.7.0/emerging.rules.tar.gz";
        $contents = file_get_contents($url);
        $name = 'rules.tar.gz';
      Storage::put($name, $contents);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       

        $filename1='/storage/app/emerging.rules.tar.gz';
       
     $archive = UnifiedArchive::open( $filename1);
       
     
        return redirect()->back()->with('IT WORKS!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $content= File::get(storage_path('/app/emerging.rules/rules/emerging-snmp.rules'));
       dd($content);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show1()
    {
        //for sipliting lines 
        //$line =File::get(storage_path('/app/emerging.rules/rules/emerging-snmp.rules'));
       //$p= array_pop($line);
      // $arr = implode("alert",   $p);
       // var_dump($arr);
        //dd($arr);
        //dd(substr_count( $line,"#alert"));

       // $filename=storage_path("/app/emeging.rules/rules/emerging-malware.rules");
        //$filename =File::get(storage_path('/app/emerging.rules/rules/emerging-snmp.rules'));
       //$response = Response::make($filename, 200);
       // $content = File::get($filename);
     // foreach($response as $line) {
      //      dd($line) ;
      

       // while (($line = fgets($filename)) !== false) {
     // echo $line;
      // return $response;

     /* LazyCollection::make(function () {
    $handle = fopen('storage/app/emerging.rules/rules/emerging-snmp.rules', 'r');

    while (($line = fgets($handle)) !== false){ 

        yield $line;
    } 
       
     
 }); */


$file = fopen(storage_path("/app/emerging.rules/rules/emerging-web_server.rules"), "r");
      
     



     while(!feof($file)) {
        $line=fgets($file);
        if(substr($line, 0, 5 ) === "alert"){
          foreach(explode('(',$line) as $row){
            //print_r($row);
           //dd($row);
            if(strpos($row, "msg") !== false){

          //$whatIWant =explode(";", substr($row, strpos($row, "msg") + 4)) ;
        $whatIWant = substr($row, strpos($row, "msg") + 4);
      
        //$msg=array[0];
        //dd($msg);
      //dd( $whatIWant);
           if(strpos($row, ":") !== false){
            $whatIWant1 = substr($row, strpos($row, ":") + 1);
           $role= explode(';',$whatIWant1) ;
           //dd($role);
           $msg=$role[0];

        print_r($msg);
           // substr($row, strpos($row, "content:") + 1);
        $flow = substr($role[1] ?? "", strpos($role[1] ?? "", "flow:") + 6);
        //dd($flow);

       $content = substr($role[2] ?? "", strpos($role[2] ?? "", "content:") + 8);
         $cs = $role[3] ?? "";
           //dd($case);
         $depth = substr($role[4] ?? "", strpos($role[4] ?? "", "depth:") + 6);
       $ref = substr($role[5] ?? "", strpos($role[5] ?? "", "reference:") + 10);
         $class_type = substr($role[9] ?? "", strpos($role[9] ?? "", "class_type:") + 10);
        // dd( $class_type);
        $sid= substr($role[10] ?? "", strpos($role[10] ?? "", "sid:") + 4);
       // dd($sid);
        $rev = substr($role[11] ??"", strpos($role[11] ?? "", "rev:") + 4);
        print_r($rev);
      $metadata = substr($role[12] ?? "", strpos($role[12] ?? "", "metadata:") + 9);
    
     /*DB::insert('insert into web_server_roles(msg,content,cs,ref,class_type,sid,rev,meta_data)values(?,?,?,?,?,?,?,?)',[$msg,$content,$cs,$ref,$class_type,$sid,$rev,$metadata]);*/
       //$web_server_roles = new web_server_roles;
     // $web_server_roles::create(['msg' => $msg]);
     //$web_server_roles->save();
   
     
       //dd($metadata);
       // dd($rev);
        // dd($depth);
      
           //$content=$role[1];
         //  
           /* if(strpos($row, "msg") !== false){
             $msg = substr($row, 4, strpos($row, ";"));


             //dd($variable); 
              
}*/
//$number =  strpos($row, ";") ;

 /*if(strpos($row, "content") !== false){
$content = substr($row, strrpos($row,'content'), $number);
dd($content);
    }*/
              /* $msg = $row['msg'];

                $flow = $row['flow'];
                $content = $row['content'];
                $case=$row['case'];
                 $reference=$row['reference'];
                $class_type = $row['class_type'];
                $sid = $row['sid'];
                $rev = $row['rev'];
                $meta_data = $row['meta_data'];*/
     
      //dd( $whatIWant1);

           //$split_strings = preg_split('/[\ \n\,]+/', $row);
           // dd($split_strings);
           }

}

          }
          
        }

    }
    

    fclose($file);

 //return view('roles.blade.php')->with('role',$msg);

}


    

    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
