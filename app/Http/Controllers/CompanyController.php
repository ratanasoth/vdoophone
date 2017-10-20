<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class CompanyController extends Controller
{
    // index
    public function index(Request $r)
    {
        if (Auth::user()==null)
        {
            return redirect("/login");
        }
        $data['companies'] = DB::table("companies")->where("active",1)->orderBy("name")->paginate(12);
        return view("companies.index", $data);
    }
    // load detail company info
    public function detail($id)
    {
        if (Auth::user()==null)
        {
            return redirect("/login");
        }
        $data['company'] = DB::table("companies")->where("id", $id)->first();
        return view("companies.detail", $data);
    }
}
