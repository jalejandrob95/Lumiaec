@extends('layouts.app')

@section('content')
<div class="container">

@if (Session::has('message'))

{{ Session::get('message') }}

@endif

<a href="{{url('products/create')}}" class="btn btn-secondary">Crear un nuevo producto</a>
<table class="table table-light">


    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>ID Producto</th>
            <th>Codigo producto</th>
            <th>Nombre producto</th>
            <th>Descripcion del producto</th>
            <th>Precio del producto</th>
            <th>Stock del producto</th>
            <th>ID de categoria</th>
            <th>ID de subcategoria</th>
            <th>Imagen del producto</th>
        </tr>
    </thead>

    //Consulta a la tabla Products
    <tbody>
        @foreach ($products as $products)
        <tr>
            <td>{{$products -> product_id}}</td>
            <td>{{$products -> product_code}}</td>
            <td>{{$products -> product_name}}</td>
            <td>{{$products -> product_description}}</td>
            <td>{{$products -> product_price}}</td>
            <td>{{$products -> product_stock}}</td>
            <td>{{$products -> product_idcategory}}</td>
            <td>{{$products -> product_idsubcategory}}</td>
            <td>
                <img src="{{ asset('storage').'/'.$products->product_picture }}" width="100" alt="">
            </td>
            <td>
                <a href="{{ url('/products/'.$products->id.'/edit') }}" class="btn btn-outline-warning">
                    Editar
                </a>



                <form action="{{url('/products/'.$products->id)}}"  class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-outline-danger" type="submit" onclick="return confirm('Seguro deseas borrar este producto?')"
                    value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
