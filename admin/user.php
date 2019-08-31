<?php require('includes/header.php'); ?>
<?php require('includes/sidebar.php'); ?>

        <!-- Left side column. contains the logo and sidebar -->
        

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                   User
                    <small>List</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Data tables</li>
                </ol>
              <?php if(isset($_GET['msg'])){ ?>
                 <div class="alert alert-success alert-dismissible" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <?php if(isset($_GET['msg'])) {echo $_GET['msg']; } ?>
                 </div>
              <?php  } ?>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- /.box -->
                         <div class="box">
                            <div class="box-header">
                             <a class="btn btn-primary btn-flat pull-left"  href="#add-user" data-toggle="modal" ><i class="fa fa-fw fa-plus"></i><strong>New</strong></a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                              <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Email</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Date Added</th>
                                            <th>Tools</th>
                                        </tr>
                                      </thead>
                                    <tbody>
                                      <?php foreach ($adminObj->GetUsers($databaseObj->connection) as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value['photo'] ?></td>
                                            <td><?php echo $value['email'] ?></td>
                                            <td><?php echo $value['firstname'], 
                                                 $value['lastname'] ?></td>
                                            <td><?php echo $value ['status'] ?></td>
                                            <td><?php echo $value ['contact_info'] ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-flat"  href="cart.php"><i class="fa fa-fw fa-search"></i><strong>Cart</strong></a>
                                                <a class="edit btn btn-info btn-flat"   data-id="<?php echo $value['id'] ?>" <i class="fa fa-fw fa-edit"></i><strong>Edit</strong></a>
                                                    <a class="btn btn-danger btn-flat "  href="#delete-user" data-toggle="modal" onclick= "dltUser(<?php echo $value['id']; ?>)" ><i class="fa fa-fw fa-trash"></i><strong>Delete</strong></a>
                                                </td>
                                        
                                      </tr>
                                      <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Email</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Date Added</th>
                                            <th>Tools</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    
        <!-- add new user modal -->
        
        <div class="modal fade" id="add-user">
          <div class="modal-dialog">
           <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New User</b></h4>
             </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="ajax_requests.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Address</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="address" name="address"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Contact Info</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact" name="contact">
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div> -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="submit"><i class="fa fa-save"></i> Save</button>
               </div>
            </form>
            </div>
        
    </div>
</div> 
         
        <!-- Delete User modal -->
        <div class="modal fade" id="delete-user">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header" style="background:maroon;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <center ><h4 class="modal-title">Delete User</h4></center>
              </div>
              <div class="modal-body">
                <p><h3>Are you Sure?</h3></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                 <a href="" id="delete_user" class="btn btn-primary">Save changes</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- Edit users Modal -->
        <div class="modal fade" id="edit-user">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">User Detail </h4>
              </div>
              <div class="modal-body">
               <form class="form-horizontal" method="POST" action="ajax_requests.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name" class="col-sm-3 control-label">Email</label>
                  <input type="hidden" class="userid" name="id">
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="edit_email" value="" name="email" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-sm-3 control-label">Password</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="edit_password" value="" name="password" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="firstname" class="col-sm-3 control-label">FirstName</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="edit_firstname" value="" name="firstname" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Lastname" class="col-sm-3 control-label">LastName</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="edit_lastname" value="" name="lastname" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="address" class="col-sm-3 control-label">Address</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="edit_address" value="" name="address" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="contactinfo" class="col-sm-3 control-label">Contact Info</label>
            
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="edit_contact" name="contactinfo"  value="" required="">
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="photo" class="col-sm-3 control-label">Photo</label>

                   <div class="col-sm-8">
                    <input type="file" id="photo" name="photo">
                  </div>
               </div>  -->
               <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="edit">Save changes</button>
              </div>
            </form>
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


      <!-- Delete Product modal -->
    <?php require('includes/footer.php'); ?>
     <script>
      function dltUser(x) {
        $("#delete_user").attr('href', 'ajax_requests.php?dlt_user='+x);

         }
   </script>
<script>
  $(function(){

   $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit-user').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  // $(document).on('click', '.delete', function(e){
  //   e.preventDefault();
  //   $('#delete').modal('show');
  //   var id = $(this).data('id');
  //   getRow(id);
  // });

  // $(document).on('click', '.photo', function(e){
  //   e.preventDefault();
  //   var id = $(this).data('id');
  //   getRow(id);
  // });

  // $(document).on('click', '.status', function(e){
  //   e.preventDefault();
  //   var id = $(this).data('id');
  //   getRow(id);
  // });

});
function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'ajax_requests.php',
    data: {user_id:id},
    dataType: 'json',
    success: function(user){
    console.log("user_ID",user);   
      $('.userid').val(user.id);
      $('#edit_email').val(user.email);
      $('#edit_password').val(user.password);
      $('#edit_firstname').val(user.firstname);
      $('#edit_lastname').val(user.lastname);
      $('#edit_address').val(user.address);
      $('#edit_contact').val(user.contact_info);
      $('.fullname').html(user.firstname+' '+user.lastname);
    },
    error: function(error){
      console.log("error: ",error);
    }
  });
}
</script>

     