
  <?php include('includes/header.php'); ?>

    


    <?php 

        $db = Database::getInstance();
        $mysqli = $db->getConnection();

        $save = $_POST['btn_save'];

        $data = '';
        
        if(isset($save))
        {

          $first_name = $_POST['first_name'];
          $last_name = $_POST['last_name'];
          $mobile = $_POST['mobile'];
          $address = $_POST['address'];

          $result = Query::insert_user($first_name, $last_name, $mobile, $address);

          if($result){
            
            header('Location: index.php');

          }else{

          }

        }



    ?>
    <?php include('includes/navbar.php'); ?>
    
     <div class="container">

       <div class="col-sm-12">

          <div class="page-header">
            <h1>Create User</h1>
          </div>

          <form method="post" action="" class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-2 control-label">First Name</label>
              <div class="col-sm-5">
                <input type="text" name="first_name" class="form-control" placeholder="First Name">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Last Name</label>
              <div class="col-sm-5">
                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Mobile</label>
              <div class="col-sm-5">
                <input type="text" name="mobile" class="form-control" placeholder="09xxxxxx">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Address</label>
              <div class="col-sm-5">
                <input type="text" name="address" class="form-control" placeholder="Adress">
              </div>
            </div>
    
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="btn_save" class="btn btn-default">Create</button>
              </div>
            </div>
          </form>
          
         
       </div>

     </div>


  <?php include('includes/footer.php'); ?>