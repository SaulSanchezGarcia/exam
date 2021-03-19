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
                <th scope="col">Name</th>
                <th scope="col">Last_name</th>
                <th scope="col">Email</th>
                <th scope="col">Zip</th>
                <th scope="col">Phone</th>
              </tr>
            </thead>
            <?php
                require_once("../controller/controller.php");
                $conn = new ConectarDB();
                $connection = $conn->conectar();

                $query = "SELECT * FROM customers"; 
                $result = mysqli_query($connection, $query);
                while($in = mysqli_fetch_array($result)){
                    $datos = $in[0]."||".
                    $in[1]."||".
                    $in[2]."||".
                    $in[3]."||".
                    $in[4]."||".
                    $in[5];
            ?>
            <tbody >
            <tr>
                <td><?php echo $in['name']?></td>
                <td><?php echo $in['last_name']?></td>
                <td><?php echo $in['email']?></td>
                <td><?php echo $in['zip']?></td>
                <td><?php echo $in['phone']?></td>
                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLong" onclick="pintarDatos('<?php echo $datos?>');">Update</button></td>
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
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
            <label for="exampleInputEmail1">Name</label>
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
            <input type="email" class="form-control" id="zip" name="" placeholder="Zip Code" minlength="3" maxlength="4" value="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Phone</label>
            <input type="text" class="form-control" id="phone" name="" placeholder="Phone" minlength="10" maxlength="10" value="">
          </div>
          <input type="hidden" class="form-control" id="idC" name="" placeholder="Phone" minlength="10" maxlength="10" value="">

      </form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="update();">Update</button>
      </div>
    </div>
  </div>
</div>
<script src="app.js"></script>