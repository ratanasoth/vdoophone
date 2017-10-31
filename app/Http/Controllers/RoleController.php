<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class RoleController extends Controller
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
        $data['roles'] = DB::table("roles")->where("active",1)->orderBy("name")->paginate(12); 
        if(Auth::user()->role_id>1)
        {
        $data['roles'] = DB::table("roles")
            ->where("active",1)
            ->where("company_id", Auth::user()->company_id)
            ->orderBy("name")->paginate(12);         
        }
        return view("roles.index", $data);
    }
    // create
    public function create()
    {
        $data['companies'] = null;
        if(Auth::user()->role_id==1)
        {
            $data['companies'] = DB::table("companies")->where("active",1)->orderBy("name")->get();
        }
        return view("roles.create", $data);
    }
    // edit
    public function edit($id)
    {
        $data['companies'] = null;
        if(Auth::user()->role_id==1)
        {
            $data['companies'] = DB::table("companies")->where("active",1)->orderBy("name")->get();
        }
        $data['role'] = DB::table("roles")->where("id", $id)->first();
        return view("roles.edit", $data);
    }
    // insert
    public function save(Request $r)
    {
        $company_id = $r->company_id;
        if(Auth::user()->role_id>1)
        {
            $company_id = Auth::user()->company_id;
        }
        $data = array(
            "name" => $r->name,
            "create_by" => Auth::user()->id,
            "company_id" => $company_id
        );
        $i = DB::table('roles')->insert($data);
        if($i)
        {
            $r->session()->flash("sms", "New role has been created successfully!");
            return redirect("/role/create");
        }
        else{
            $r->session()->flash("sms1", "Fail to create new role!");
            return redirect("/role/create")->withInput();
        }
    }
    // update
    public function update(Request $r)
    {
        $company_id = $r->company_id;
        if(Auth::user()->role_id>1)
        {
            $company_id = Auth::user()->company_id;
        }
        $data = array(
            "name" => $r->name,
            "company_id" => $company_id
        );
        $i = DB::table('roles')->where("id", $r->id)->update($data);
        if($i)
        {
            $r->session()->flash("sms", "All changes have been saved successfully!");
            return redirect("/role/edit/".$r->id);
        }
        else{
            $r->session()->flash("sms1", "Fail to save change. You might not change any thing!");
            return redirect("/role/edit/".$r->id);
        }
    }
    // delete
    public function delete($id)
    {
        DB::table('roles')->where('id', $id)->update(["active"=>0]);
        $page = @$_GET['page'];
        if ($page>0)
        {
            return redirect('/role?page='.$page);
        }
        return redirect('/role');
    }
}
