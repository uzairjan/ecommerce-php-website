<?php require('includes/header.php'); ?>
<?php require('includes/sidebar.php'); ?>

        <!-- Left side column. contains the logo and sidebar -->
        

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                   CATEGORY
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Data tables</li>
                </ol>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php if(isset($_GET['msg'])) {echo $_GET['msg']; } ?>
</div>
            </section>
           
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- /.box -->
                         <div class="box">
                            <div class="box-header">
                             <a class="btn btn-primary btn-flat pull-left"  href="#add-category" data-toggle="modal" ><i class="fa fa-fw fa-plus"></i><strong>New</strong></a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <th> Category Name</th>
                                        <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($adminObj->GetCategories($databaseObj->connection) as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value['name'] ?></td>
                                            <td> 
                                              <a class="btn btn-primary btn-flat"  href="#edit-category" data-toggle="modal"><i class="fa fa-fw fa-edit"></i><strong>Edit</strong></a>
                                              <a class="btn btn-danger btn-flat" onclick="createUrl(<?php echo $value['id']; ?>)"  href="#delete-category" data-toggle="modal"><i class="fa fa-fw fa-trash"></i><strong>Delete</strong></a>
                                            </td>
                                        </tr>
                                     <?php } ?>
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th> Category Name</th>
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
        <div class="modal fade" id="add-category">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Category</h4>
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
        <!-- Edit Product Modal -->
        <div class="modal fade" id="edit-category">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Category</h4>
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
        <div class="modal fade" id="delete-category">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background:maroon;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                 <center ><h4 class="modal-title">Delete Category</h4></center>
              </div>
              <div class="modal-body">
                <p><h3>Are You Sure?</h3> </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <a href=""  id="delete_cate" class="btn btn-danger">Delete Category</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <script>
          function createUrl(x){
            $("#delete_cate").attr('href', 'ajax_requests.php?cat_id='+x);
          } 
        </script>

     <?php require('includes/footer.php'); ?>