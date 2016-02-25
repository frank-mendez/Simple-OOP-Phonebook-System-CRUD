
  <?php include('includes/header.php'); ?>

   

      <?php 

        $search_btn = $_POST['search_btn'];

        if(isset($search_btn)){

          $data = $_POST['search'];


          $result = Query::search($data);
        }

        

      ?>

       <?php include('includes/navbar.php'); ?>
    
     <div class="container">

       <div class="col-sm-12">

          <div class="page-header">
            <h1>Search Result</h1>
          </div>

          <?php if($result): ?>
            <table class="table">

                <thead>
                  <th>ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Mobile Number</th>
                  <th>Address</th>
                  <th>Action</th>
                </thead>
                <tbody>

                <?php while($row = mysqli_fetch_assoc($result)){ ?>

                  <tr>
                    <td><?php echo $row["user_id"]; ?></td>
                    <td><?php echo $row["first_name"]; ?></td>
                    <td><?php echo $row["last_name"]; ?></td>
                    <td><?php echo $row["mobile"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td>
                      <a href="edit-user.php?id=<?php echo $row["user_id"]; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
                      <a href="delete-user.php?id=<?php echo $row["user_id"]; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
            </table>
          <?php else: ?>
            <p>No Data</p>
          <?php endif; ?>
         
       </div>

     </div>


  <?php include('includes/footer.php'); ?>