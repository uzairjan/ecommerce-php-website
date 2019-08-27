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
                                                <a class="btn btn-primary btn-flat"  href="#edit-user" data-toggle="modal"><i class="fa fa-fw fa-edit"></i><strong>Edit</strong></a>
                                                    <a class="btn btn-primary btn-flat"  href="#delete-user" data-toggle="modal"><i class="fa fa-fw fa-trash"></i><strong>Delete</strong></a>
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
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Add New User </h4>
              </div>
              <div class="modal-body">
               <form class="form-horizontal" method="POST" action="products_add.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name" class="col-sm-3 control-label">Email</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="price" class="col-sm-3 control-label">Price</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="price" name="price" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="price" class="col-sm-3 control-label">FirstName</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="price" name="price" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="price" class="col-sm-3 control-label">LastName</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="price" name="price" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="price" class="col-sm-3 control-label">Address</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="price" name="price" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="price" class="col-sm-3 control-label">Contact Info</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="price" name="price" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="photo" class="col-sm-3 control-label">Photo</label>

                   <div class="col-sm-8">
                    <input type="file" id="photo" name="photo">
                  </div>
               </div> 
            </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        
        <!-- Delete User modal -->
        <div class="modal fade" id="delete-user">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete User</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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
               <form class="form-horizontal" method="POST" action="products_add.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name" class="col-sm-3 control-label">Email</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="price" class="col-sm-3 control-label">Price</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="price" name="price" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="price" class="col-sm-3 control-label">FirstName</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="price" name="price" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="price" class="col-sm-3 control-label">LastName</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="price" name="price" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="price" class="col-sm-3 control-label">Address</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="price" name="price" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="price" class="col-sm-3 control-label">Contact Info</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="price" name="price" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="photo" class="col-sm-3 control-label">Photo</label>

                   <div class="col-sm-8">
                    <input type="file" id="photo" name="photo">
                  </div>
               </div> 
            </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      <!-- Delete Product modal -->
    
     <?php require('includes/footer.php'); ?>