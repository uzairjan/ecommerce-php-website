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
                <?php if(isset($_SESSION ['success_addproduct'])){ ?>
                  <div class="alert alert-success alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <?php echo $_SESSION ['success_addproduct'];
                            unset($_SESSION ['success_addproduct']);  ?>
                  </div>
                <?php } ?>
                <?php if(isset($_SESSION ['success_updateimage'])){ ?>
                  <div class="alert alert-success alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <?php echo $_SESSION ['success_updateimage'];
                            unset($_SESSION ['success_updateimage']);  ?>
                  </div>
                <?php } ?>
                <?php if(isset($_SESSION ['error_updateimage'])){ ?>
                  <div class="alert alert-success alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <?php echo $_SESSION ['error_updateimage'];
                            unset($_SESSION ['error_updateimage']);  ?>
                  </div>
                <?php } ?>
              
                <?php if(isset($_SESSION ['success_updateproduct'])){ ?>
                  <div class="alert alert-success alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <?php echo $_SESSION ['success_updateproduct'];
                            unset($_SESSION ['success_updateproduct']);  ?>
                  </div>
                <?php } ?>
                <?php if(isset($_SESSION ['success_deleteproduct'])){ ?>
                  <div class="alert alert-success alert-dismissible" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <?php echo $_SESSION ['success_deleteproduct'];
                            unset($_SESSION ['success_deleteproduct']);  ?>
                  </div>
                <?php } ?>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- /.box -->
                         <div class="box">
                            <div class="box-header">
                             <a class="btn btn-primary btn-flat pull-left"  href="#add-product" data-toggle="modal" ><i class="fa fa-fw fa-plus"></i><strong>New</strong></a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Photo</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Use Today</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($adminObj->GetProducts($databaseObj->connection) as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value['name'] ?></td>
                                            <td>  <img src="<?php echo 'assets/img/'. $value['photo'] ?> " width="30" height="30" alt="" >
                                            <span class='pull-right'><a  class='edit_image' data-toggle='modal' data-id='<?php echo $value['id'] ?>'><i class='fa fa-edit'></i></a></span>
                                             </td>
                                            <td> <a class="view_prod btn btn-primary btn-flat"  data-id="<?php echo $value['id'] ?>" data-toggle="modal"><i class="fa fa-fw fa-search"></i><strong>View</strong></a></td>
                                            <td><?php echo $value['price'] ?> </td>
                                            <td><?php echo $value['date_view'] ?></td>
                                            <td> 
                                              <a class="prod_edit btn btn-success btn-flat"  data-id="<?php echo $value['id'] ?>" data-toggle="modal"><i class="fa fa-fw fa-edit"></i><strong>Edit</strong></a>
                                              <a class="btn btn-danger btn-flat"  href="#delete-product" data-toggle="modal" onclick="creatUrl(<?php echo $value['id'] ?>)"><i class="fa fa-fw fa-trash"></i><strong>Delete</strong></a>
                                         </td>
                                        </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Photo</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Use Today</th>
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
        <div class="modal fade" id="add-product">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Product </h4>
              </div>
              <div class="modal-body">
              <form class="form-horizontal" method="POST" action="ajax_requests.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name" class="col-sm-1 control-label">Name</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="name" name="name" required>
                  </div>

                  <label for="category" class="col-sm-1 control-label">Category</label>

                  <div class="col-sm-5">
                    <select class="form-control" id="category" name="category" >
                      <option value="" selected>- Select -</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="price" class="col-sm-1 control-label">Price</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="price" name="price" required>
                  </div>

                  <label for="photo" class="col-sm-1 control-label">Photo</label>

                  <div class="col-sm-5">
                    <input type="file" id="add_photo" name="add_photo">
                  </div>
                </div>
                <p><b>Description</b></p>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea id="editor2" name="description" rows="10" cols="80" required></textarea>
                  </div>
                  
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add_product"><i class="fa fa-save"></i> Save</button>
              </form>
              </div>
             
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- Edit Product Modal -->
        <div class="modal fade" id="edit_product">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Product </h4>
              </div>
              <div class="modal-body">
              <form class="form-horizontal" method="POST" action="ajax_requests.php" enctype="multipart/form-data">
                <input type="hidden" class="update_pro" name="product_id" > 
                <div class="form-group">  
                  <label for="name" class="col-sm-1 control-label">Name</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="prod_name" name="pro_name" required="">
                  </div>

                  <label for="category" class="col-sm-1 control-label">Category</label>
                  
                   <div class="col-sm-5">
                   <input type="text" class="form-control" id="prod_categ" name="prod_cat" required="">
                   </div>
                </div>
                <div class="form-group">
                  <label for="price" class="col-sm-1 control-label">Price</label>

                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="prod_price" name="pro_price" required="">
                  </div>
                </div>
                <p><b>Description</b></p>
                <div class="form-group">
                  <!-- changes -->
                   
                  <textarea id="editor1" name="editor1" rows="10" cols="80">
                                         
                  </textarea>
                 
                 <!-- /changes -->
                  
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" name="edit_pro">Save changes</button>
              </div>
            </form>
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <!-- Delete Product modal -->
        <div class="modal fade" id="delete-product">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header" style="background:maroon;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Product</h4>
              </div>
            
              <div class="modal-body">
                <p><h3>Are you sure ?&hellip;</h3></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <a href=""  id="delete_product" class="btn btn-danger">Delete Product</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- view product modal -->
  <div class="modal fade" id="product_description">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><Span class="product_name" ></Span></b></h4>
            </div>
            <div class="modal-body">
              <p id="desc"></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>
 <!--  start of product pic modal -->
<div class="modal fade" id="update_product_image">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><Span class="prodimage_name"></Span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="ajax_requests.php" enctype="multipart/form-data">
                <input type="hidden" class="update_prod_image" name="product_image_id" > 
                 <div class="form-group">
                   <label for="photo" class="col-sm-1 control-label">Photo</label>
                    <div class="col-sm-5">  
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>
               
             <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat pull-right" name="submit" ><i class="fa fa-close"></i> Update</button>
            </div>
            </form>
            </div>

            
        </div>
    </div>
</div>
<!-- end of update product pic modal -->
<?php require('includes/footer.php'); ?>
        <script >
        function creatUrl(x){
        $("#delete_product").attr('href','ajax_requests.php?Prod_id='+x);
           }
        </script>
    
<script> 
 $(function(){

    $(document).on('click', '.view_prod', function(e){
    e.preventDefault();
    $('#product_description').modal('show');
    var id = $(this).data('id');
    getdescription(id);
    });
});
function getdescription(id){
$.ajax({
 type: 'POST',
 url: 'ajax_requests.php',
 data: {pro_descr:id},
 dataType: 'json',
 success: function(product){
 console.log("pro_descr",product);   
   $('.pro_descr').val(product.id);
   $('.product_name').html(product.name);
   $('#desc').html(product.description);
 },
 error: function(error){
   console.log("error: ",error);
 }
});
}
</script>

<script> 
 $(function(){

    $(document).on('click', '.edit_image', function(e){
    e.preventDefault();
    $('#update_product_image').modal('show');
    var id = $(this).data('id');
    getproductImage(id);
    });
});
function getproductImage(id){
$.ajax({
 type: 'POST',
 url: 'ajax_requests.php',
 data: {update_prod_image:id},
 dataType: 'json',
 success: function(product){
 console.log("update_prod_image",product);   
   $('.update_prod_image').val(product.id);
   $('.prodimage_name').html(product.name);
  //  $('#desc').html(product.description);
 },
 error: function(error){
   console.log("error: ",error);
 }
});
}
</script>
<script>
    $(function(){

   $(document).on('click', '.prod_edit', function(e){
    e.preventDefault();
    $('#edit_product').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

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
    data: {update_pro:id},
    dataType: 'json',
    success: function(user){
    console.log("user_ID",user);   
      $('.update_pro').val(user.id);
      $('#prod_name').val(user.name);
      $('#prod_price').val(user.price);
      // $('#editor1').val(user.description);
      var string = user.description;
      console.log(string);
      CKEDITOR.instances["editor1"].setData(string);
      // $('.fullname').html(user.firstname+' '+user.lastname);
    },
    error: function(error){
      console.log("error: ",error);
    }
  });

 }
</script>


 
 
