<?php include "includes/db.php"
?>

<div class="col-md-4">


    <!-- Blog Search Well -->
    <div class="well">


        <h4>Blog Search</h4>
        <form action="search.php" method="post">
        <div class="input-group">
            <input name="search" type="text" class="form-control">
            <span class="input-group-btn">
                            <button name ="submit"class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
        </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Login -->
    <div class="well">


        <h4>Login</h4>
        <form action="includes/login.php" method="post">
            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Enter username">

            </div>
            <div class="input-group">
                <input name="password" type="password" class="form-control" placeholder="Enter password">
                <span class ="input-group-btn">

                    <button class="btn btn-primary" name="login" type="submit">
                        Submit
                    </button>

                </span>

            </div>
        </form>
        <!-- /.input-group -->
    </div>



    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">

            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php
                    try{
                        $select_stmt = $db->prepare("SELECT * FROM categories");
                        $select_stmt->execute();
                        $row = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
                        //  echo count($row);
                        foreach($row as $result) {
                            echo "<li><a href='category.php?category={$result{'cat_id'}}'>{$result['cat_title']}</a></li>";
                        }

                    }
                    catch(PDOException $e)
                    {
                        $e->getMessage();
                    }

                    ?>

                </ul>
            </div>
            <!-- /.col-lg-6 -->

            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>



    <!-- Side Widget Well -->
  <?php include "widget.php" ?>

</div>