    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
            <?php  if(isset($_SESSION['username'])) : 
                 ?>
                <p><?php echo $_SESSION['username'];
                // unset($_SESSION['username']); ?></p>
                   <?php endif  ?>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
           </span>
            </div>
        </form> -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">REPORTS</li>
            
               <li>
                    <a href="index.php">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                    <i class=" pull-right"></i>
                  </span>
                 </a>
            </li>
            <li >
                <a href="sales.php">
                    <i class="fa fa-dashboard"></i> <span>Sales</span>
                    <span class="pull-right-container">
                    <i class=" pull-right"></i>
                  </span>
                 </a>
            </li>
            <li class="header">MANAGE</li>
            <li>
                <a href="user.php">
                    <i class="fa fa-dashboard"></i><span>Users</span>
                    <i class=" pull-right"></i>
                 </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Product</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                 </a>
                <ul class="treeview-menu">
                    <li><a href="product.php"><i class="fa fa-circle-o"></i>Products List</a></li>
                    <li><a href="category.php"><i class="fa fa-circle-o"></i> Category</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
