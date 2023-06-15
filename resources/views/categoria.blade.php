

<link href="/css/material.css" rel="stylesheet" type="text/css">


<form  id="RegMaterial" method="POST"  id="categoriaFRM" action="Xcategoria" >
    <h3>Admnistración de Listado de categoria</h3>

    @csrf
        <input type="hidden" name="id" value="{{$catedit['id'] ?? "0"}}" >

        <Label for="nombre">Nombre</Label>
        <input type="text" name="nombre" value="{{$catedit['nombre'] ?? ""}}" required>
        
        <div class="selLab">
            <Label>Estado</Label>
            <select name="estado">
                <option value="ACTIVO" {{(($catedit['estado'] ?? "ACTIVO")=="ACTIVO")? "selected" : ""}}> ACTIVO</option>
                <option value="INACTIVO" {{(($catedit['estado'] ?? "ACTIVO")!="ACTIVO")? "selected" : ""}}>INACTIVO</option>
            </select>
        </div>

        <a href="/" class="fcc-btn" style="background:red;">Cancelar</a>    
        <button class="fcc-btn" style="background:green; margin-right:0" >Guardar</button>
        <a href="javascript:resetea()" class="fcc-btn" style="background:rgb(8, 100, 197);">+</a>    
</form>    

<script>
    resetea();
</script>