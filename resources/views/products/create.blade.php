//Formulario de creacion de productos

<form action="{{ url('/products') }}" method="post" enctype="multipart/form-data" >
@csrf
@include('products.form',['mode'=>'Crear']);
</form>
