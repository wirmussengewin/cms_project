<?php
include "includes/db.php";
?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Start Bootstrap</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                 try{
                     $select_stmt = $db->prepare("SELECT * FROM categories");
                     $select_stmt->execute();
                     $row = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
                   //  echo count($row);
                     foreach($row as $result) {
                         echo "<li><a href='#'>{$result['cat_title']}</a></li>";
                     }

                 }
                 catch(PDOException $e)
                 {
                     $e->getMessage();
                 }
                ?>
                <li>
                    <a href="admin">Admin</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>