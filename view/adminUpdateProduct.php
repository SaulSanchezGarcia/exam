<link rel="stylesheet" href="../access//bootstrap/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!--Para abrir modales se usa bootstrap.min.js-->
<script src="../access/bootstrap/js/bootstrap.min.js"></script>
<div>
<form>
<div class="form-group">
            <!-- <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="name" name="" aria-describedby="emailHelp" placeholder="Name" value="">    
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="" placeholder="Last Name" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" class="form-control" id="email" name="" placeholder="Email" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Zip</label>
            <input type="text" class="form-control" id="zip" name="" placeholder="Zip Code" minlength="3" maxlength="4" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Phone</label>
            <input type="text" class="form-control" id="phone" name="" placeholder="Phone" minlength="10" maxlength="10" value="">
          </div>
          <input type="hidden" class="form-control" id="idHidden"  value="">
          <button class="btn btn-primary" type="button" data-toggle='modal' data-target='exampleModalLong3'>Actualizar</button> -->
            <table class="table" id ="tbody2">
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
            <?php
                require_once("../controller/controller.php");
                $conn = new ConectarDB();
                $connection = $conn->conectar();

                $query = "SELECT * FROM products"; 
                $result = mysqli_query($connection, $query);
                while($prod = mysqli_fetch_array($result)){
                    $data = $prod[0]."||".
                    $prod[1]."||".
                    $prod[2]."||".
                    $prod[3]."||".
                    $prod[4]."||".
                    $prod[5]."||".
                    $prod[6];
            ?>
            <tbody id="tableBody">
            <tr>
                <td><?php echo $prod[1]?></td>
                <td><?php echo $prod[2]?></td>
                <td><?php echo $prod[3]?></td>
                <td><?php echo $prod[4]?></td>
                <td><?php echo $prod[5]?></td>
                <td><?php echo "$".$prod[6]?></td>
                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLongProd" onclick="pintarDatosProd('<?php echo $data?>');">Update</button></td>
            </tr>
           
            </tbody>
            <?php
                  }
            ?>
            </table>
</form>
 
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModalLongProd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
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
            <label for="exampleInputEmail1">Img</label>
            <input type="text" class="form-control" id="img" name="" aria-describedby="emailHelp" placeholder="../img/imgName.jpg" value="">    
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" class="form-control" id="name" name="" placeholder="Name" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Brand</label>
            <input type="text" class="form-control" id="brand" name="" placeholder="Brand" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Model</label>
            <input type="text" class="form-control" id="model" name="" placeholder="Model" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Stock</label>
            <input type="text" class="form-control" id="stock" name="" placeholder="Stock" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="text" class="form-control" id="price" name="" placeholder="Price" value="">
          </div>
          <input type="hidden" class="form-control" id="idP" name=""  value="">

      </form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="actProd();">Update</button>
      </div>
    </div>
  </div>
</div>
<script src="app.js"></script>