<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Notifications\MyFirstNotification;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use PDF;
use Notification;
//use App\Notifications\MyFirstNotification;

class AdminController extends Controller
{
    public function view_category()
    {
        $data=category::all();

        return view('admin.category',compact('data'));
    }
    public function add_category(Request $request)
    {
        $data=new category;
        $data->category_name=$request->category;
        $data->save();
        return redirect()->back()->with('message', 'Category added succesfully!');
    }
    public function delete_category($id)
    {
        $data=category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Category deleted succesfully!');
    }
    public function view_product()
    {
        $category = category::all();

        return view('admin.product', compact('category'));
    }
    public function add_product(Request $request)
    {
        $product = new product;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->discount_price=$request->dis_price;
        $product->category=$request->category;

        $image=$request->image;
        $image_name=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $image_name);
        $product->image=$image_name;
        $product->save();
        return redirect()->back()->with('message','Product added succesfully!');
    }

    public function show_product()
    {
        $product=product::all();
        return view('admin.show_product', compact('product'));
    }
    public function delete_product($id)
    {
        $product=product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product deleted succefully!');
    }
    public function update_product($id)
    {
        $product = product::find($id);
        $category = category::all();
        return view('admin.update_product', compact('product','category'));
    }
    public function update_product_confirm(Request $request, $id)
    {
        $product = product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->dis_price;
        $product->category=$request->category;
        $product->quantity=$request->quantity;
        $image=$request->image;
        if ($image)
        {
            $image_name=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product', $image_name);
            $product->image=$image_name;
        }


        $product->save();
        return redirect()->back()->with('message','Product saved succesfully!');
    }

    public function order()
    {
        $order=order::all();
        return view('admin.order', compact('order'));
    }
    public function delivered($id)
    {
        $order=order::find($id);
        $order->delivery_status="Kiszállítva";
        $order->payment_status="Kifizetve";
        $order->save();
        return redirect()->back();
    }
    public function print_pdf($id)
    {
        $order=order::find($id);
        $pdf=PDF::loadView('admin.pdf', compact('order'));
        return $pdf->download('rendelés_részletei.pdf');
    }
    public function send_email($id){
        $order=order::find($id);
        return view('admin.email_info',compact('order'));
    }
    public function send_user_email(Request $request, $id)
    {
        $order=order::find($id);
        $details = [
          'greeting'=>  $request->greeting,
            'firstline'=>  $request->firstline,
            'body'=>  $request->body,
            'button'=>  $request->button,
            'url'=>  $request->url,
            'lastline'=>  $request->lastline,
        ];

        Notification::send($order,new MyFirstNotification($details));
        return redirect()->back()->with('message','E-mail sikeresen elküldve!');
    }
    public function searchdata(Request $request){
        $searchText=$request->search;
        $order=order::where('name','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->orWhere('email','LIKE',"%$searchText%")->orWhere('address','LIKE',"%$searchText%")->orWhere('product_title','LIKE',"%$searchText%")->get();
        return view('admin.order',compact('order'));
    }

}
