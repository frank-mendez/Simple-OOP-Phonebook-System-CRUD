
  <?php include('includes/header.php'); ?>

    <?php include('includes/navbar.php'); ?>


    <?php 

        $id = $_GET['id'];

        $query_result = Query::get_user_by_id($id);

        $result = mysqli_fetch_assoc($query_result);

        $first_name = $result['first_name'];
        $last_name = $result['last_name'];
        $mobile = $result['mobile'];
        $address = $result['address'];

        $save = $_POST['btn_save'];

        if(isset($save)){

          $first_name = $_POST['first_name'];
          $last_name = $_POST['last_name'];
          $mobile = $_POST['mobile'];
          $address = $_POST['address'];

          $query_result = Query::update_user($first_name, $last_name, $mobile, $address, $id);

          if($query_result){
            
            header('Location: index.php');

          }else{

          }

        }


    ?>

    
     <div class="container">

       <div class="col-sm-12">

          <div class="page-header">
            <h1>Update User</h1>
          </div>

          <form method="post" action="" class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-2 control-label">First Name</label>
              <div class="col-sm-5">
                <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Last Name</label>
              <div class="col-sm-5">
                <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Mobile</label>
              <div class="col-sm-5">
                <input type="text" name="mobile" class="form-control" value="<?php echo $mobile; ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Address</label>
              <div class="col-sm-5">
                <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
              </div>
            </div>
    
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="btn_save" class="btn btn-default">Update</button>
              </div>
            </div>
          </form>
          
         
       </div>

     </div>


  <?php include('includes/footer.php'); ?>