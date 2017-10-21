<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class UnitController extends Controller
{
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
    public function index(Request $r)
    {
        $data['units'] = DB::table("units")->where("active", 1)->orderBy("name")->paginate(12);
        return view("units.index", $data);
    }
    //
}
