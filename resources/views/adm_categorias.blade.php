<link href="/css/app.css" rel="stylesheet" type="text/css">

<br>
<h2>Listado de Categorias</h2>
<div style="background: #ffff; margin:10px; display: flex; flex-direction: row; flex-wrap: wrap; width: 1000px">
    <script src="/js/ajax.js"></script>
        <div style="   width: 70%;">
        <table >

            <tr>
            <th>Acciones</th>
            <th><strong>Nombre</strong></th>
            <th><strong>Estado</strong></th>
            <th><strong>Creado a</strong></th>    
            </tr>
        
        <tbody>
        @foreach($datos as $indice =>$patmt)
                                                    
        
                                    <tr style="background: #ffff;">
                                    
                                        <td width="5" class="botones">
                                            <a href="javascript:ajaxp('/categoria/{{$patmt['id'] ?? '' }}','editCat')" class="tab-btn edit">&#128395;</a> 

                                            <a href="javascript:Peticion('/BorrarSN/{{$patmt['id'] ?? '' }}')" class="tab-btn borra">&#128465;</a>  
                                        </td>
                                    
                                        <td class="CNombre" >{{$patmt['nombre'] ?? '' }}</td>
                                        <td>{{$patmt['estado'] ?? '' }}</td>                        
                                        <td>{{$patmt['created_at'] ?? '' }}</td>
                                        
                                    </tr>
                    @endforeach
            </tbody>
        </table>
        </div>
        <div style="   width: 25%;" id="editCat">
            @include('categoria')
        </div>
</div>
