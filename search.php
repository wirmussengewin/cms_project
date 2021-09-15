<?php
include "includes/header.php";
include "includes/navigation.php";
?>




    <!-- Page Content -->
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php


            if (isset($_POST['search'])) {
                try {
                    $search = $_POST['search'];
                    $select_stmt = $db->prepare("SELECT * FROM posts WHERE post_tags LIKE '%$search%'");
                    $select_stmt->execute();
                    $row = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
                    if (count($row) == 0) {
                        echo "No result";
                    } else {


                     foreach($row as $result) {
                    $post_title = $result['post_title'];
                    $post_author = $result['post_author'];
                    $post_date = $result['post_date'];
                    $post_image = $result['post_image'];
                    $post_content = $result['post_content'];
                    ?>
                    <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="#"><?php echo $post_title ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                    <hr>
                    <p><?php echo $post_content ?> </p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                    <?php }
                    }
                } catch (PDOException $e) {
                    $e->getMessage();
                }


            }





            ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php
        include "includes/sidebar.php";
        ?>

    </div>
    <!-- /.row -->

    <hr>


<?php
include "includes/footer.php";
?>