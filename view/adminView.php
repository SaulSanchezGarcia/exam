<link rel="stylesheet" href="../access/bootstrap/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<!--Para abrir modales se usa bootstrap.min.js-->
<script src="../access/bootstrap/js/bootstrap.min.js"></script>


<nav class="navbar navbar-expand-lg navbar-light">
<div class="container">
  <a class="navbar-brand" href="#">ADMINISTRATOR</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalLong">Insert New Customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalLong2">Delete Customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../view/adminUpdate.php">Update Customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalLongP">Insert New Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalLongP2">Delete Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../view/adminUpdateProduct.php">Update Product</a>
      </li>
    </ul>
  </div>
  </div>
</nav>

<!-- Modal Create Insert-->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Insert a New Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="name" name="" aria-describedby="emailHelp" placeholder="Name">    
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="" placeholder="Last Name">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" class="form-control" id="email" name="" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Zip</label>
            <input type="email" class="form-control" id="zip" name="" placeholder="Zip Code" minlength="3" maxlength="4">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Phone</label>
            <input type="text" class="form-control" id="phone" name="" placeholder="Phone" minlength="10" maxlength="10">
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <button type="button" class="btn btn-primary"  onclick="insert();">Insert</button>
          </div>
          <table class="table" id ="tbody">
          <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Last_name</th>
                <th scope="col">Email</th>
                <th scope="col">Zip</th>
                <th scope="col">Phone</th>
              </tr>
            </thead>
            <tbody >
                <?php
                  require_once("../controller/controller.php");
                  foreach($showInsert as $in){
                    echo "<tr><td>".$in[1].
                    "<td>".$in[2]."</td>".
                    "<td>".$in[3]."</td>".
                    "<td>".$in[4]."</td>".
                    "<td>".$in[5]."</td></td></tr>";
                  }
                ?>
             
            </tbody>
            </table>
      </form>
        
      </div>
      
    </div>
  </div>
</div> 

<!-- Modal Delete-->
<div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Delete Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
          
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-primary" onclick="buscar();">Search</button> -->
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <!-- <button type="button" class="btn btn-danger"  onclick="insert();">Delete</button> -->
          </div>
          <table class="table" id ="tbodyDel">
          <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Last_name</th>
                <th scope="col">Email</th>
                <th scope="col">Zip</th>
                <th scope="col">Phone</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody >
            <?php
                  require_once("../controller/controller.php");
                  foreach($showInsert as $in){
                    echo "<tr><td>".$in[1].
                    "<td>".$in[2]."</td>".
                    "<td>".$in[3]."</td>".
                    "<td>".$in[4]."</td>".
                    "<td>".$in[5]."</td>".
                    "<td><button type='button' class='btn btn-danger' onclick='del($in[0])'>Delete</button></td></td></tr>";
                  }
                ?>
            </tbody>
            </table>
      </form>
        
      </div>
      
    </div>
  </div>
</div> 

<!-- Modal Insert Product-->
<div class="modal fade" id="exampleModalLongP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                    echo "<tr><td>".$inP[1].
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

<!-- Modal Delete Product-->
<div class="modal fade" id="exampleModalLongP2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                    echo "<tr><td>".$showIP[1].
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
<script src="app.js"></script>