<?php

include "includes/admin_header.php";?>

    <div id="wrapper">

    <!-- Navigation -->
    <?php
    include "includes/admin_navigation.php";?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">


                    <h1 class="page-header">
                        Welcome Admin
                        <small>Autorinho</small>
                    </h1>
                    <div class="col-xs-6">
<?php
                        insert_cat();
                        ?>
                        <form action="" method="post">
                       <div class="form-group">
                           <label for="cat_title">Add category</label>
                           <input type="text" class="form-control" name = "cat_title">
                       </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name = "submit" value="Add category">
                            </div>


                        </form>

                        <?php
                        if(isset($_GET['edit']))
                        {
                            include "includes/update_categories.php";


                        }

                        ?>
                        
                    </div>
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category title</th>
                            </tr>

                            </thead>
                            <tbody>
                            <?php
                           showAll_cat();

                          delete_cat();

                            ?>

                            </tbody>
                        </table>


                    </div>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>