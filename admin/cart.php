<?php require('includes/header.php'); ?>
<?php require('includes/sidebar.php'); ?>

        <!-- Left side column. contains the logo and sidebar -->
        

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                   Product
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
                             <a class="btn btn-primary btn-flat pull-right"  href="#add-product" data-toggle="modal" ><i class="fa fa-fw fa-plus"></i><strong>Print</strong></a>
                             <a class="btn btn-primary btn-flat pull-left"  href="#add-user" data-toggle="modal" ><i class="fa fa-fw fa-plus"></i><strong>New</strong></a>
                             <a class="btn btn-primary btn-flat pull-center"  href="user.php"  ><i class="fa fa-fw fa-plus"></i><strong>Users</strong></a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                              <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Tools</th>
                                               
                                        </tr>
                                      </thead>
                                    <tbody>
                                        <tr>
                                            <td>Trident</td>
                                            <td> 4</td>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td> 4</td>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>4</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
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
    
        <!-- add new product modal -->
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
                  <label for="name" class="col-sm-1 control-label">Name</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="name" name="name" required="">
                  </div>

                  <label for="category" class="col-sm-1 control-label">Category</label>

                  <div class="col-sm-5">
                    <select class="form-control" id="category" name="category" required="">
                      <option value="" selected="">- Select -</option>
                    
                        <option value="1" class="append_items">Laptops</option>
                      
                        <option value="3" class="append_items">Tablets</option>
                      
                        <option value="4" class="append_items">Smart Phones</option>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="price" class="col-sm-1 control-label">Price</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="price" name="price" required="">
                  </div>

                  <label for="photo" class="col-sm-1 control-label">Photo</label>

                  <div class="col-sm-5">
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
    
          <!-- /.modal-dialog -->
        
        <!-- Edit Product Modal -->

      
     <?php require('includes/footer.php'); ?>