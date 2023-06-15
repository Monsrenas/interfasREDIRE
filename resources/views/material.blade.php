
@php
    if ($datos){
        
        $datos=$datos[0];
    }

@endphp

<link href="/css/material.css" rel="stylesheet" type="text/css">


<form  id="RegMaterial" method="POST"  id="material" action="/Xmaterial" >
    <h3>Admnistración de Listado de Materiales</h3>

    @csrf
        <input type="hidden" name="id" value="{{$datos['id'] ?? "0"}}" >

        <Label for="nombre">Nombre</Label>
        <input type="text" name="nombre" value="{{$datos['nombre'] ?? ""}}" required>
        
        <Label>Descripcion</Label>
        <input type="text" name="descripcion" value="{{$datos['descripcion'] ?? ""}}" required>
    
        <Label>Stock minimo</Label>
        <input type="text" name="stock_minimo" value="{{$datos['stock_minimo'] ?? ""}}" required>

        <div class="selLab">
            <Label>Estado</Label>
            <select name="estado">
                <option value="ACTIVO" {{(($datos['estado'] ?? "ACTIVO")=="ACTIVO")? "selected" : ""}}> ACTIVO</option>
                <option value="INACTIVO" {{(($datos['estado'] ?? "ACTIVO")!="ACTIVO")? "selected" : ""}}>INACTIVO</option>
            </select>
        </div>

        <div class="selLab">
            <Label>Categoria</Label>
            <select name="categoria_id">
                @foreach ($categ as $ct)
                    <option value="{{$ct['id']}}"   {{(($datos['categoria_id'] ?? "")==$ct['id'])? "selected" : ""}}  >{{$ct['nombre']}}</option>
                @endforeach
            </select>    
        </div>

        <a href="/" class="fcc-btn" style="background:red;">Cancelar</a>    
        <button class="fcc-btn" style="background:green; margin-right:0">Guardar</button>
</form>    
