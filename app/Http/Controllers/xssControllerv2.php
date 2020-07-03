<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class xssControllerv2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $xss_roles= DB::table('xss_roles')->get();
       
        return view('Dash.pages.xss_roles.index', ['xss_roles' => $xss_roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dash.pages.xss_roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules=[
                                    'msg' => 'required' ,
                                    'content' => 'required',
                                    'ref' => 'required' ,
                                    'class_type' => 'required',
                                    'sid' => 'required',
                                    'rev'  => 'required' ,
                                    'meta_data' => 'required'  ];

$this->validate($request,$rules);

 //dd(1);

$msg = $request->input('msg');
$content = $request->input('content');
$ref = $request->input('ref');
$class_type = $request->input('class_type');
$sid = $request->input('sid');
$rev = $request->input('rev');
$meta_data = $request->input('meta_data');
$data=array("msg"=>$msg,"content"=>$content,"ref"=>$ref,"class_type"=>$class_type, "sid" =>$sid,
"rev" => $rev , "meta_data" => $meta_data);
DB::table('xss_roles')->insert($data);
    return redirect('/xss')->with('success' , 'rule added successfully');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $rules = DB::select('select * from xss_roles where id = ?',[$id]);
       // dd($rules);
        return view('Dash.pages.xss_roles.show',['rules'=>$rules]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rules = DB::select('select * from xss_roles where id = ?',[$id]);
        return view('Dash.pages.xss_roles.edit',['rules'=>$rules]);
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
        
        $msg = $request->input('msg');
        $content = $request->input('content');
        $ref = $request->input('ref');
        $class_type = $request->input('class_type');
        $sid = $request->input('sid');
        $rev = $request->input('rev');
        $meta_data = $request->input('meta_data');
        DB::update('update xss_roles set msg = ?,content=?,ref=?,class_type=?,sid=?,rev=?,meta_data=? where id = ?',[$msg,$content,$ref,$class_type,$sid,$rev,$meta_data,$id]);
        return redirect('/xss')->with('success' , 'rule updated successfully');
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
