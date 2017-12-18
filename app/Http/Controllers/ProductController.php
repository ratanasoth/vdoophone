<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index()
    {
        $query = DB::table("products")
                ->leftJoin("categories","products.category_id","=","categories.id")
                ->select("products.id","products.barcode","products.name","products.photo","categories.name as category_name");
        $data['products'] = $query->get();

        return view('products.index', $data);
    }

    public function create()
    {
        $data["categories"] = DB::table('categories')->get();

        return view('products.create', $data);
    }

    public function edit($id)
    {
        $data["categories"] = DB::table('categories')->get();

        $data['product'] = DB::table("products")->where("id", $id)->first();

        return view('products.edit', $data);
    }

    public function stockin()
    {
        return view('products.stockin');
    }

    public function createstockin()
    {
        return view('products.createstockin');
    }

    public function stockout()
    {
        return view('products.stockout');
    }

    public function createstockout()
    {
        return view('products.createstockout');
    }

    public function stockonhand()
    {
        $data["onhands"] = DB::table('onhands as t')
                            ->rightJoin('products as p', 't.product_id', '=', 'p.id')
                            ->select('t.product_id', 't.quantity', 'p.barcode', 'p.name')
                            ->get();

        return view('products.stockonhand', $data);
    }

    public function save(Request $request)
    {
        $file_name ="default.png";
        if ($request->hasFile("pimg"))
        {
            $now = Carbon::now();
            $standard_date = $now->format('Y_m_j_H_i_s_A_e');
            $file = $request->file('pimg');
            $file_name = str_replace(' ','_',$standard_date."_".$file->getClientOriginalName());
            $destinationPath = 'uploads/products/';
            $file->move($destinationPath, $file_name);
        }

        $data = array(
            "barcode" => $request->barcode,
            "name" => $request->name,
            "category_id" => $request->category_id,
            "description" => $request->description,
            "price" => $request->price,
            "photo" => $file_name
        );

        $result = DB::table('products')->insert($data);
        
        if($result)
        {
            $request->session()->flash("sms", "New product has been created successfully!");
            return redirect("/product/create");
        }
        else
        {
            $request->session()->flash("sms1", "Fail to create new branch!");
            return redirect("/product/create")->withInput();
        }
    }

    public function update(Request $request)
    {
        $file_name = $request->photo;
        if ($request->hasFile("pimg"))
        {
            $now = Carbon::now();
            $standard_date = $now->format('Y_m_j_H_i_s_A_e');
            $file = $request->file('pimg');
            $file_name = str_replace(' ','_',$standard_date."_".$file->getClientOriginalName());
            $destinationPath = 'uploads/products/';
            $file->move($destinationPath, $file_name);
        }

        $data = array(
            "barcode" => $request->barcode,
            "name" => $request->name,
            "category_id" => $request->category_id,
            "description" => $request->description,
            "price" => $request->price,
            "photo" => $file_name
        );

        $result = DB::table('products')->where('id', $request->id)->update($data);
        
        if($result)
        {
            $request->session()->flash("sms", "New product has been created successfully!");
            return redirect("/product/edit/".$request->id);
        }
        else
        {
            $request->session()->flash("sms1", "Fail to create new branch!");
            return redirect("/product/edit/".$request->id)->withInput();
        }
    }
}
