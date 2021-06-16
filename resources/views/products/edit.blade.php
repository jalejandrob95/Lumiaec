Formulario de edicion de productos
<form action="{{ url('/products/'.$products->id) }}" method="post" enctype="multipart/form-data">
 @csrf

{{method_field('PATCH')}}

@include('products.form',['mode'=>'Editar']);

</form>

