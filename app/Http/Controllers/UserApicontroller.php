<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wishlist;
use App\Models\user_detail;
use App\Models\user_order_detail;
use App\Mail\ordermail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class UserApicontroller extends Controller
{
    public function addwishlist(Request $req)
    {
        $val=$req->validate([
           'useremail'=>'required|email',
           'productname'=>'required',
           'price'=>'required',
           'quantity'=>'required',
           'image'=>'required'
          
        ]);
        if($val)
        {
            
           $data=new wishlist();
           $data->useremail=$req->useremail;
           $data->productname=$req->productname;
           $data->price=$req->price;
           $data->quantity=$req->quantity;
           $data->image=$req->image;
           $res=$data->save();
           if($res)
           {
               return back()->with('msg','Wishlist added Successfully');
           }
           else
           return back()->with('msg','Wishlist not added');
           
        }
    }


    public function adduserdetails(Request $req)
    {
           $val=$req->validate([
                'firstname'=>'required',
                'lastname'=>'required',
                'email'=>'required|email',
                'phonenumber'=>'required',
                'address'=>'required',
                'city'=>'required',
                'state'=>'required',
                'pincode'=>'required',
             
            ]);
            if($val)
            {
                $data=new user_detail();
                $data->firstname=$req->firstname;
                $data->lastname=$req->lastname;
                $data->email=$req->email;
                $data->phonenumber=$req->phonenumber;
                $data->address=$req->address;
                $data->city=$req->city;
                $data->state=$req->state;
                $data->pincode=$req->pincode;
                $res=$data->save();
                if($res)
                {
                    return response()->json(['msg','User details added Successfully']);
                }
                else
                return response()->json('msg','User details not added ');
            }
    }

    public function adduserorder(Request $req)
    {
           $val=$req->validate([
                'useremail'=>'required|email',
                'product_id'=>'required',
                'price'=>'required',
                'quantity'=>'required',
                'total'=>'required',
                'productname'=>'required',
                'payment_mode'=>'required',
             
            ]);
            if($val)
            {
                $data=new user_order_detail();
                $data->useremail=$req->useremail;
                $data->product_id=$req->product_id;
                $data->price=$req->price;
                $data->quantity=$req->quantity;
                $data->productname=$req->productname;
                $data->total=$req->total;
                $data->payment_mode=$req->payment_mode;
                $res=$data->save();
                 Mail::to($req->email)->send(new ordermail($req->all()));
                if($res)
                {
                    return response()->json(['msg','User details added Successfully']);
                }
                else
                return response()->json('msg','User details not added ');
            }
    }

    public function showuserdetails()
    {
        $data=user_detail::all();
        $product=user_order_detail::all();
        return view('admin.showorderdetails',compact('data','product'));
    }


    public function index()
    {
        $result = DB::select(DB::raw("select count(*)as total,role_id from users where role_id=5 group by role_id"));
        $chartData = "";
        foreach ($result as $list) {
            $chartData .= "['" . $list->role_id . "',     " . $list->total . "],";
        }
        $arr['chartData'] = rtrim($chartData, ",");
        return view('admin.reports', $arr);
    }

}
