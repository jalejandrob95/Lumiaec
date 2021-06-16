Formulario con datos comunes en edit y create
@extends('layouts.app')

@section('content')
<div class="container">


<h1>{{$mode}} Producto</h1>

<div class="form-group">
    <label for="ID Producto">ID Producto</label>
    <input type="text" class="form-control" name="product_id" value="{{isset($products -> product_id)?$products -> product_id:''}}" id="product_id">
    <br>
</div>

<div class="form-group">
    <label for="Codigo producto">Codigo producto</label>
    <input type="text" class="form-control" name="product_code" value="{{isset($products -> product_code)?$products -> product_code:''}}" id="product_code">
    <br>
</div>

<div class="form-group">
    <label for="Nombre producto">Nombre producto</label>
    <input type="text" class="form-control" name="product_name" value="{{isset($products -> product_name)?$products -> product_name:''}}" id="product_name">
    <br>
</div>

<div class="form-group">
    <label for="Descripción del producto">Descripción del producto</label>
    <input type="text" class="form-control" name="product_description" value="{{isset($products -> product_description)?$products -> product_description:''}}" id="product_description">
    <br>
</div>

<div class="form-group">
    <label for="Precio del producto">Precio del producto</label>
    <input type="text" class="form-control" name="product_price" value="{{isset($products -> product_price)?$products -> product_price:''}}" id="product_price">
    <br>
</div>

<div class="form-group">
    <label for="Stock del producto">Stock del producto</label>
    <input type="text" class="form-control" name="product_stock" value="{{isset($products -> product_stock)?$products -> product_stock:''}}" id="product_stock">
    <br>
</div>

<div class="form-group">
    <label for="ID de categoria">ID de categoria</label>
    <input type="text" class="form-control" name="product_idcategory" value="{{isset($products -> product_idcategory)?$products -> product_idcategory:''}}" id="product_idcategory">
    <br>
</div>

<div class="form-group">
    <label for="ID de subcategoria">ID de subcategoria</label>
    <input type="text" class="form-control" name="product_idsubcategory" value="{{isset($products -> product_idsubcategory)?$products -> product_idsubcategory:''}}" id="product_idsubcategory">
    <br>
</div>


    <label class="form-label" for="Imagen del Producto">Imagen del Producto</label>
    <br>
        @if (isset($products->product_picture))
        <img src="{{ asset('storage').'/'.$products->product_picture}}" width="100" alt="">
        @endif
        <input class="form-control" type="file" name="product_picture" value="" id="product_picture" accept="image/*">
            @error('file')
                <small class="text danger">{{$message}}</small>
            @enderror

<br>
<br>
<label for="Enviar"></label>
<input type="submit" value="{{$mode}} producto">

<a href="{{url('products/')}}">Regresar</a>
<br>


</div>
@endsection

