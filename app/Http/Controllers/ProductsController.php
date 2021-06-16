<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $data['products'] = Products::paginate(100);

        return view('products.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Controlador del formulario de creación de productos
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Recepcón de datos de productos y responder json

        $dataProducts = request()->except('_token');

        //almacena las fotos
        if ($request -> hasFile('product_picture')) {
            $dataProducts['product_picture']=$request->file('product_picture')->store('uploads','public');
        }

        //insertar datoss a la base
        Products::insert($dataProducts);

        //return response()->json($dataProducts);
        return redirect('products') -> with('message','producto agregado con éxito');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Editar formulario de producto
       $products = Products::findOrFail($id);

       return view('products.edit',compact('products'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Update button
        $dataProducts= request()->except(['_token','_method']);

            if ($request -> hasFile('product_picture')) {
                //recuperar foto
                $products = Products::findOrFail($id);
                //eliminar foto
                Storage::delete('public/'.$products->product_picture);
                $dataProducts['product_picture']=$request->file('product_picture')->store('uploads','public');
            }

        Products::where('id','=', $id) -> update ($dataProducts);

        //direccionar a Products
        $products = Products::findOrFail($id);
        return view('products.edit', compact('products'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminar producto
        $products = Products::findOrFail($id);
        if(Storage::delete('public/'.$products -> product_picture)){
            Products::destroy($id);
        };

        return redirect ('products') -> with('message','Producto eliminado');
    }
}
