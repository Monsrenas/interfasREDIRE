
@php


@endphp

<style>
    .gra_btn {
        width:48%; display:flex; float:left; text-align: center;
        margin: 2px;
    }
</style>

<link href="/css/material.css" rel="stylesheet" type="text/css">


<p style="color: white; text-align: center">¿ Esta seguro que desea borrar la fila seleccionada ?</p>

<a href="/" class="fcc-btn gra_btn" style="background:red;">Cancelar</a>

<a href="/BorraMaterial/{{$id}}" class="fcc-btn gra_btn" style="background:green;">Confirmar eliminación</a>
   
