<link rel="stylesheet" href="../access/bootstrap/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<!--Para abrir modales se usa bootstrap.min.js-->
<script src="../access/bootstrap/js/bootstrap.min.js"></script>

<nav class="navbar navbar-expand-lg navbar-light">
<div class="container">
  <a class="navbar-brand" href="#">EMPLOYEE</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalLongPE">Insert a New Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalLongPE2">Delete Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../view/adminUpdateProduct.php">Update a Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalLongOP">Create a New PO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalLongPOD">Delete PO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../view/adminUpdatePO.php" >Update PO</a>
      </li>
    </ul>
  </div>
  </div>
</nav>

<!-- Modal Employee Insert Product-->
<div class="modal fade" id="exampleModalLongPE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Insert a New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Img</label>
            <input type="text" id="img" name="" class="form-control" aria-describedby="emailHelp"  placeholder="../img/imgName.jpg">    
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" class="form-control" id="name2" name="" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Brand</label>
            <input type="text" class="form-control" id="brand" name="" placeholder="Brand">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Model</label>
            <input type="email" class="form-control" id="model" name="" placeholder="Model">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Stock</label>
            <input type="email" class="form-control" id="stock" name="" placeholder="Stock">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="text" class="form-control" id="price" name="" placeholder="Price" minlength="10" maxlength="10">
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <button type="button" class="btn btn-primary"  onclick="insertProduct();">Insert</button>
          </div>
          <table class="table" id ="tbodyP">
          <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Img</th>
                <th scope="col">Name</th>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Stock</th>
                <th scope="col">Price</th>
              </tr>
            </thead>
            <tbody >
            <?php
                  require_once("../controller/controller.php");
                  foreach($showInsertProduct as $inP){
                    echo "<tr><td>".$inP[0].
                    "<td>".$inP[1]."</td>".
                    "<td>".$inP[2]."</td>".
                    "<td>".$inP[3]."</td>".
                    "<td>".$inP[4]."</td>".
                    "<td>".$inP[5]."</td>".
                    "<td>"."$".$inP[6]."</td></td></tr>";
                  }
                ?>
            </tbody>
            </table>
      </form>
        
      </div>
      
    </div>
  </div>
</div> 

<!-- Modal Employee Delete Product-->
<div class="modal fade" id="exampleModalLongPE2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete a Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
          
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <!-- <button type="button" class="btn btn-primary"  onclick="insert();">Insert</button> -->
          </div>
          <table class="table" id ="tbodyDelP">
          <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Img</th>
                <th scope="col">Name</th>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Stock</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody >
            <?php
                  require_once("../controller/controller.php");
                  foreach($showInsertProduct as $showIP){
                    echo "<tr><td>".$showIP[0].
                    "<td>".$showIP[1]."</td>".
                    "<td>".$showIP[2]."</td>".
                    "<td>".$showIP[3]."</td>".
                    "<td>".$showIP[4]."</td>".
                    "<td>".$showIP[5]."</td>".
                    "<td>"."$".$showIP[6]."</td>".
                    "<td><button type='button' class='btn btn-danger' onclick='delProd($showIP[0])'>Delete</button></td></td></tr>";
                  }
                ?>
            </tbody>
            </table>
      </form>
        
      </div>
      
    </div>
  </div>
</div> 

<!-- Modal Employee Insert PO-->
<div class="modal fade" id="exampleModalLongOP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create a New PO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Date</label>
            <input type="text" id="date" name="" class="form-control" aria-describedby="emailHelp"  placeholder="YYY/MM/DD">    
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">#Customer</label>
            <input type="text" class="form-control" id="idC" name="" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">#Employee</label>
            <input type="text" class="form-control" id="idE" name="" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">#Product</label>
            <input type="email" class="form-control" id="idP" name="" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">#Outlet</label>
            <input type="email" class="form-control" id="idO" name="" placeholder="">
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <button type="button" class="btn btn-primary"  onclick="insertOrder();">Insert</button>
          </div>
          <table class="table" id ="tablePO">
          <thead>
              <tr>
                <th scope="col">PO</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Price</th>
                <th scope="col">Date</th>
              </tr>
            </thead>
            <tbody >
                  <?php
                  require_once("../controller/controller.php");
                    foreach($showOrder as $sO){
                      echo "<tr><td>".$sO[0].
                      "<td>".$sO[1]."</td>".
                      "<td>".$sO[2]."</td>".
                      "<td>".$sO[3]."</td>".
                      "<td>".$sO[4]."</td>".
                      "<td>".$sO[5]."</td>".
                      "<td>".$sO[6]."</td></td></tr>";
                    }
                  ?>
            </tbody>
            </table>
      </form>
        
      </div>
      
    </div>
  </div>
</div> 

<!-- Modal Employee Delete PO-->
<div class="modal fade" id="exampleModalLongPOD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete a Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
          
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <!-- <button type="button" class="btn btn-primary"  onclick="insert();">Insert</button> -->
          </div>
          <table class="table" id ="tbodyDelPO">
          <thead>
              <tr>
                <th scope="col">PO</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Price</th>
                <th scope="col">Date</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody >
            <?php
                  require_once("../controller/controller.php");
                  foreach($showOrder as $sO){
                    echo "<tr><td>".$sO[0].
                    "<td>".$sO[1]."</td>".
                    "<td>".$sO[2]."</td>".
                    "<td>".$sO[3]."</td>".
                    "<td>".$sO[4]."</td>".
                    "<td>".$sO[5]."</td>".
                    "<td>".$sO[6]."</td>".
                    "<td><button type='button' class='btn btn-danger' onclick='delPO($sO[0])'>Delete</button></td></td></tr>";
                  }
                ?>
            </tbody>
            </table>
      </form>
        
      </div>
      
    </div>
  </div>
</div> 
<script src="app.js"></script>