
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de Materiales</title>
        <link href="/css/app.css" rel="stylesheet" type="text/css">

</head>
<body>
    <br>
    <h3>Listado de Materiales</h3>
    
    <div class="Suma">
        <a href="javascript:Peticion('/material/0')" class="GMas"> <strong>+</strong>  </a>
    </div>    
    
    <table>

        <tr>
          <th>Acciones</th>
          <th><strong>Nombre</strong></th>
          <th><strong>Descripción</strong></th>
          <th><strong>Estado</strong></th>
          <th><strong>Stock Minimo</strong></th>
          <th><strong>Categoria
            <a href="javascript:Peticion('/categorias')" class=" Mas">✎</a>
         </strong></th>
          <th><strong>Creado a</strong></th>    
        </tr>
    
      <tbody>
       @foreach($datos as $indice =>$patmt)
                                
                                <?php 
                                  $borrable=true;
                                  $editable=true; 
                                ?>                                
    
                                <tr style="background: #ffff;">
                                  
                                    <td width="5" class="botones">
                                        <a href="javascript:Peticion('/material/{{$patmt['id'] ?? '' }}')" class="tab-btn edit">&#128395;</a> 

                                        <a href="javascript:Peticion('/BorrarSN/{{$patmt['id'] ?? '' }}')" class="tab-btn borra">&#128465;</a>  
                                    </td>
                                  
                                    <td class="CNombre" >{{$patmt['nombre'] ?? '' }}</td>
                                    <td>{{$patmt['descripcion'] ?? '' }}</td>                        
                                    <td>{{$patmt['estado'] ?? '' }}</td>    
                                    <td>{{$patmt['stock_minimo'] ?? '' }}</td>
                                    <td>  
                                        @foreach ($categ as $item)
                                          @if ($patmt['categoria_id']==$item['id'])
                                                {{ $item['nombre'] }}
                                          @endif  
                                        @endforeach
                                    </td>
                                    <td>{{$patmt['created_at'] ?? '' }}</td>
                                    
                                </tr>
                  @endforeach
        </tbody>
     </table>
    
</body>





</html>
@include('vModal')

<script src="js/peticiones.js"></script>
<script src="/js/ajax.js"></script>

<script>
  
  
  
  function resetea()
    {
      var Myelement = document.querySelector('input[name="id"]');
      Myelement.value = "0";
      
      var Myelement = document.querySelector('input[name="nombre"]');
      Myelement.value = "";
      Myelement.focus();  
    }
</script>

