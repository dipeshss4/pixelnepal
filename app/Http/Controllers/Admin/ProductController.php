<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use function Sodium\compare;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $product=Product::all();

       return view('backend.pages.product.view-product',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    $category=Category::all();
       return view('backend.pages.product.add-product',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'type'=> 'required',
            'status' =>'required',



        ]);
        $product=Product::create([
           'name'          =>$request->input('name'),
            'product_type' =>$request->input('type'),
            'status'       =>$request->input('status'),
            'category_id'  =>$request->input('category'),
            'price'        =>$request->input('price'),
        ]);
        if($product->save())
        {
            return redirect()->back()->with('success','Data successfully Insereted');
        }
        else{
            return redirect()->back()->with('error','Data Cannot Be insereted');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        return view('back.pages.product.edit-product',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
             'name'  =>$request->input('name'),
             'type'  =>$request->input('type'),
             'status' =>$request ->input('status'),
         ]);

         $data=array(
             'name' =>$request->input('name'),
             'type' =>$request->input('key'),
             'status' =>$request ->input('status'),
             $img = Image::make('public/foo.jpg'),

// apply slight blur filter
        $img->blur(),

// apply stronger blur
        $img->blur($request->input('name'))


         );
         if(Product::where('id',$id)->update($data))
         {
           return redirect('/')->with('sucesss','Data Sucessfully Inserted');

         }
         else
         {
             return redirect('/')->with('error','Data cannot be insereted');
         }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = Product::find($id);
        $product->delete();
        return redirect('/')->with('success ','Sucessfully Deleted');
    }
}
