<link rel="stylesheet" href="../access/bootstrap/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<!--Para abrir modales se usa bootstrap.min.js-->
<script src="../access/bootstrap/js/bootstrap.min.js"></script>



<nav class="navbar navbar-expand-lg navbar-light">
<div class="container">
  <a class="navbar-brand" href="#">NBA SHOES</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalLong">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Contact</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li> -->
      <li class="nav-item">
        <button type="button" class="btn btn-primary" onclick="Gologin();">LOGIN</button>
      </li>
    </ul>
  </div>
  </div>
</nav>

<table class="table" id ="tbody">
          <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Acronym</th>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody >
                <?php
                  require_once("../controller/controller.php");
                  foreach($show as $index){
                    echo "<tr><td><img src=".$index['img'].
                    "><td>".$index['name']."</td>".
                    "<td>".$index['brand']."</td>".
                    "<td>".$index['model']."</td>".
                    "<td>"."$".$index['price'].".00"."</td>".
                    "<td><button type='button' class='btn btn-success' id='boton' data-toggle='modal' data-target='#exampleModalLongCompra' onclick='venta($index[price]);'>Add to Cart</button></td></td></tr>";
                  }
                ?>
            </tbody>
            </table>

<!-- Button trigger modal -->
<button type="button" onclick="venta();">Launch demo modal</button>

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalLongCompra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sale</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="">Update</button>
      </div>
    </div>
  </div>
</div> -->
<script src="app.js"></script>
