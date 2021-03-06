<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class AttributeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()==null)
            {
                return redirect("/login");
            }
            return $next($request);
        });
    }

    public function index(Request $r){
    	 $data['attributes'] = DB::table("attributes")
            ->where("company_id", Auth::user()->company_id)
            ->orderBy("name")
            ->paginate(12);
    	return view('attribute.index' , $data);
    }

    public function create(Request $r) {
    	return view('attribute.create');
    }

    public function save(Request $r){
    	$data = array(
            "name" => $r->name,
            "value" => $r->value,
            "create_by" => Auth::user()->id,
            "company_id" => Auth::user()->company_id
        );
        $i = DB::table("attributes")->insert($data);
        if ($i)
        {
            $r->session()->flash("sms", "New attribute has been created successfully!");
            return redirect("/attribute/create");
        }
        else{
            $r->session()->flash("sms1", "Fail to create new attribute!");
            return redirect("/attribute/create");
        }
    }

    public function edit($id)
    {
        
        $data['attribute'] = DB::table("attributes")->where("id", $id)->first();
        return view("attribute.edit", $data);
    }

    public function update(Request $r){
    	$data = array(
            "name" => $r->name,
            "value" => $r->value
        );
        $i = DB::table("attributes")->where("id", $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash("sms", "All changes have saved successfully!");
            return redirect("/attribute/edit/". $r->id);
        }
        else{
            $r->session()->flash("sms1", "Fail to save change. You may not make any change!");
            return redirect("/attribute/edit/". $r->id);
        }
    }

    public function delete($id)
    {
        
        DB::table('attributes')->where('id', $id)->delete();
        $page = @$_GET['page'];
        if ($page>0)
        {
            return redirect('/attribute?page='.$page);
        }
        return redirect('/attribute');
    }
}
