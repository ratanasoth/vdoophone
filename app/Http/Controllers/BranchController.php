<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class BranchController extends Controller
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
    // index
    public function index()
    {
        $query = DB::table("branches")
                ->where("active",1);
        if(Auth::user()->role_id>1)
        {
            $query->where("company_id", Auth::user()->company_id);
        }
        $data['branches'] =  $query->paginate(12);
        return view("branches.index", $data);
    }
    public function create()
    {
        $data['companies'] = null;
        if(Auth::user()->role_id==1)
        {
            $data['companies'] = DB::table("companies")->where("active",1)->orderBy("name")->get();
        }
        return view("branches.create", $data);
    }
    public function edit($id)
    {
        $data['companies'] = null;
        if(Auth::user()->role_id==1)
        {
            $data['companies'] = DB::table("companies")->where("active",1)->orderBy("name")->get();
        }
        $data['branch'] = DB::table("branches")->where("id", $id)->first();
        return view("branches.edit", $data);
    }
    public function save(Request $r)
    {
        $company_id = $r->company_id;
        if(Auth::user()->role_id>1)
        {
            $company_id = Auth::user()->company_id;
        }
        $data = array(
            "code" => $r->code,
            "name" => $r->name,
            "email" => $r->email,
            "phone" => $r->phone,
            "description" => $r->description,
            "company_id" => $company_id
        );
        $i = DB::table('branches')->insert($data);
        if($i)
        {
            $r->session()->flash("sms", "New branch has been created successfully!");
            return redirect("/branch/create");
        }
        else{
            $r->session()->flash("sms1", "Fail to create new branch!");
            return redirect("/branch/create")->withInput();
        }
    }
    public function update(Request $r)
    {
        $company_id = $r->company_id;
        if(Auth::user()->role_id>1)
        {
            $company_id = Auth::user()->company_id;
        }
        $data = array(
            "code" => $r->code,
            "name" => $r->name,
            "email" => $r->email,
            "phone" => $r->phone,
            "description" => $r->description,
            "company_id" => $company_id
        );
        $i = DB::table('branches')->where("id", $r->id)->update($data);
        if($i)
        {
            $r->session()->flash("sms", "All changes have been saved successfully!");
            return redirect("/branch/edit/".$r->id);
        }
        else{
            $r->session()->flash("sms1", "Fail to save change. It seems you don't change any thing!");
            return redirect("/branch/edit/".$r->id);
        }
    }
    public function delete($id)
    {
        DB::table('branches')->where('id', $id)->update(["active"=>0]);
        $page = @$_GET['page'];
        if ($page>0)
        {
            return redirect('/branch?page='.$page);
        }
        return redirect('/branch');
    }
}
