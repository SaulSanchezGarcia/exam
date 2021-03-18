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
        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalLong3">Update Customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Insert New Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Delete Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Update Product</a>
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    echo "<tr><td>".$in['name'].
                    "<td>".$in['last_name']."</td>".
                    "<td>".$in['email']."</td>".
                    "<td>".$in['zip']."</td>".
                    "<td>".$in['phone']."</td></td></tr>";
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
              </tr>
            </thead>
            <tbody >
            <?php
                  require_once("../controller/controller.php");
                  foreach($showInsert as $in){
                    echo "<tr><td>".$in['name'].
                    "<td>".$in['last_name']."</td>".
                    "<td>".$in['email']."</td>".
                    "<td>".$in['zip']."</td>".
                    "<td>".$in['phone']."</td>".
                    "<td><button type='button' class='btn btn-danger' onclick='del($in[idC])'>Delete</button></td></td></tr>";
                  }
                ?>
            </tbody>
            </table>
      </form>
        
      </div>
      
    </div>
  </div>
</div> 


<!-- Modal Update-->

<div class="modal fade" id="exampleModalLong3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="name" name="" aria-describedby="emailHelp" placeholder="Name" value="<?php echo $ind['name'];?>">    
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
          <input type="hidden" class="form-control" id="idHidden" placeholder="Ciudad" value="">

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary"  onclick="update();">Go</button>
          </div>
          <table class="table" id ="tbody2">
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
                  foreach($showUpdate as $ind){
                    echo "<tr><td>".$ind['name'].
                    "<td>".$ind['last_name']."</td>".
                    "<td>".$ind['email']."</td>".
                    "<td>".$ind['zip']."</td>".
                    "<td>".$ind['phone']."</td>".
                    "<td><button type='button' class='btn btn-success'>Update</button></td></td></tr>";
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