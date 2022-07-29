<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Comment;


class HomeController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        $new_product = Product::where('new',1)->paginate(8);
        $sanpham_khuyenmai = Product::where('promotion_price','<>', 0) -> paginate(4);
        $new_promotion = Product::where('promotion_price', '<>', 0) ->get();
        return view('page.trangchu', compact('slide', 'new_product','sanpham_khuyenmai'));
    }
    
    public function getLoaiSp($type)
    {
        $sp_theoloai = Product::where('id_type', $type)->get();
        $type_product = ProductType::all();
        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);

        return view('page.loai_sanpham', compact('sp_theoloai', 'type_product', 'sp_khac'));
    }
    public function getDetail(Request $request){
        $sanpham = Product::where('id',$request->id)->first();
        $splienquan=Product::where('id','<>',$sanpham->id,'and','id_type','=',$sanpham->id_type,)->paginate(3);
        $comments=Comment::where('id_product',$request->id)->get();
        return view('page.Detail',compact('sanpham','splienquan','comments'));
    }
}
