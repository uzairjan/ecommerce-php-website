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
                <?php if(isset($_SESSION ['success_addcategory'])){ ?>
                 <div class="alert alert-success alert-dismissible" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <?php  echo  $_SESSION ['success_addcategory'];
                        unset( $_SESSION ['success_addcategory']);  ?>
                 </div>
              <?php  } ?>
              <?php if(isset($_SESSION ['success_updatecategory'])){ ?>
                 <div class="alert alert-success alert-dismissible" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <?php  echo  $_SESSION ['success_updatecategory'];
                        unset( $_SESSION ['success_updatecategory']);  ?>
                 </div>
              <?php  } ?>
              <?php if(isset($_SESSION ['success_deletecategory'])){ ?>
                 <div class="alert alert-success alert-dismissible" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <?php  echo  $_SESSION ['success_deletecategory'];
                        unset( $_SESSION ['success_deletecategory']);  ?>
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
                             <a class="btn btn-primary btn-flat pull-left"  href="#add_category" data-toggle="modal" ><i class="fa fa-fw fa-plus"></i><strong>New</strong></a>
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
                                              <a class="cat_edit btn btn-success btn-flat"  data-id="<?php echo $value['id'] ?>" data-toggle="modal"><i class="fa fa-fw fa-edit"></i><strong>Edit</strong></a>
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
        <div class="modal fade" id="add_category">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title">Add Category</h4></center>
              </div>
              <div class="modal-body">
               <form class="form-horizontal" method="POST" action="ajax_requests.php" enctype="multipart/form-data">
              
              <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Category Name</label>

                <div class="col-sm-8">
                  <input type="text" class="form-control" id="cat_name" name=" name" required="">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit1">Save changes</button>
              </div>
          </form>
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- Edit Product Modal -->
      <div class="modal fade" id="edit_category">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="background:maroon;color:#fff">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title">Update Category </h4></center>
            </div>
            <div class="modal-body">
             <form class="form-horizontal" method="POST" action="ajax_requests.php" enctype="multipart/form-data">
             <input type="hidden" class="cat_id" name="category_id">
              <div class="form-group">
                <label for="price" class="col-sm-3 control-label">Name</label>

                <div class="col-sm-8">
                  <input type="text" class="form-control" id="name" name=" name" value="" required="">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submt"  class="btn btn-danger" name="edit1">Save Changes</a>
            </div>
            </form>
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
                 <center><h4 class="modal-title">Delete Category</h4></center>
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
     <script>
  $(function(){

   $(document).on('click', '.cat_edit', function(e){
    e.preventDefault();
    $('#edit_category').modal('show');
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
    data: {cat_id:id},
    dataType: 'json',
    success: function(user){
    console.log("user_ID",user);   
      $('.cat_id').val(user.id);
      $('#name').val(user.name);
      // $('.fullname').html(user.firstname+' '+user.lastname);
    },
    error: function(error){
      console.log("error: ",error);
    }
  });
}
</script>