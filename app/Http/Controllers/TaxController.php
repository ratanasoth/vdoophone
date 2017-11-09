<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class TaxController extends Controller
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
    	 $data['taxes'] = DB::table("taxes")
    	 	->where("active" , 1)
            ->where("company_id", Auth::user()->company_id)
            ->orderBy("name")
            ->paginate(12);
    	return view('tax.index' , $data);
    }

    public function create(Request $r) {
    	return view('tax.create');
    }

    public function save(Request $r){
    	$data = array(
            "name" => $r->name,
            "type" => $r->type,
            "computation" => $r->computation,
            "amount" => $r->amount,
            "create_by" => Auth::user()->id,
            "company_id" => Auth::user()->company_id
        );
        $i = DB::table("taxes")->insert($data);
        if ($i)
        {
            $r->session()->flash("sms", "New tax has been created successfully!");
            return redirect("/tax/create");
        }
        else{
            $r->session()->flash("sms1", "Fail to create new tax!");
            return redirect("/tax/create");
        }
    }

    public function edit($id)
    {
        
        $data['tax'] = DB::table("taxes")->where("id", $id)->first();
        return view("tax.edit", $data);
    }

    public function update(Request $r){
    	$data = array(
            "name" => $r->name,
            "type" => $r->type,
            "computation" => $r->computation,
            "amount" => $r->amount,
        );
        $i = DB::table("taxes")->where("id", $r->id)->update($data);
        if ($i)
        {
            $r->session()->flash("sms", "All changes have saved successfully!");
            return redirect("/tax/edit/". $r->id);
        }
        else{
            $r->session()->flash("sms1", "Fail to save change. You may not make any change!");
            return redirect("/tax/edit/". $r->id);
        }
    }

    public function delete($id)
    {
        DB::table('taxes')->where('id', $id)->update(["active"=>0]);
        $page = @$_GET['page'];
        if ($page>0)
        {
            return redirect('/tax?page='.$page);
        }
        return redirect('/tax');
    }
}
