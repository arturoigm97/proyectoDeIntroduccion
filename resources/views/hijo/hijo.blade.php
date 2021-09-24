@extends('master')

@section('hijo')

<h1>Vista hija</h1>
 
{{$carro}}


{{-- hr ES LA LINEA QUE SE MUESTRA --}}
<hr>

@foreach ($mujerAlfa as $elementoArreglo)
        {{$elementoArreglo}}
@endforeach
        
        <hr>
        @foreach ($machoAlfa as $elementoArreglo)
        {{$elementoArreglo}}
@endforeach

<hr>
@foreach ($arregloDoble as $item)
    
<h5> nombre: {{$item['nombre']}}</h5>
<h5> edad: {{$item['edad']}}</h5>
    
@endforeach 