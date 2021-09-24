formulario mascotas

<form action="{{url('/ingresarDatosForm')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="nombre"> nombre de tu masco</label>
    <input type="text" name="nommascota" id="nommascota">
    <br>

    <label for="color"> color de tu mascota</label>
    <input type="text" name="color" id="color">
    <br>

    <label for="peso"> peso de tu mascota</label>
    <input type="text" name="peso" id="peso">
    <br>

    <label for="rasgoParticular"> rasgo particular de tu mascota</label>
    <input type="text" name="rasgoparticular" id="rasgoparticular">
    <br>
    
    <input type="file" name="rutaFoto" id="rutaFoto">
    <br>

    <input type="submit" name="enviar" >

</form>
    