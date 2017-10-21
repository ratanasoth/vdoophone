<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class CategoryController extends Controller
{
    // index
    public function index(Request $r)
    {
        if (Auth::user()==null)
        {
            return redirect("/login");
        }
        $data['categories'] = DB::table("categories")
            ->where("active", 1)
            ->where("company_id", Auth::user()->company_id)
            ->orderBy("name")
            ->paginate(12);
        return view("categories.index", $data);
    }
    public function create(Request $r)
    {
        if (Auth::user()==null)
        {
            return redirect("/login");
        }
        $data['categories'] = DB::table("categories")
            ->where("active", 1)
            ->where("company_id", Auth::user()->company_id)
            ->orderBy("name")
            ->get();
        return view("categories.create", $data);
    }
    public function save(Request $r)
    {
        if (Auth::user()==null)
        {
            return redirect("/login");
        }
        $data = array(
            "name" => $r->name,
            "parent_id" => $r->parent,
            "create_by" => Auth::user()->id,
            "company_id" => Auth::user()->company_id
        );
        $i = DB::table("categories")->insert($data);
        if ($i)
        {
            $r->session()->flash("sms", "New category has been created successfully!");
            return redirect("/category/create");
        }
        else{
            $r->session()->flash("sms1", "Fail to create new category!");
            return redirect("/category/create");
        }
    }
}
