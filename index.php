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
                if(isset($_GET['page']))
                {
                    $page = $_GET['page'];
                }
                else
                {
                    $page = "";
                }
                if ($page == "" || $page == 1){
                   $page_1 = 0;
                }
                else
                {
                    $page_1 = ($page * 5) - 5;
                }


                $select_allstmt = $db->prepare("SELECT * FROM posts WHERE post_status='published'");
                $select_allstmt->execute();
                $count = $select_allstmt->fetchAll(PDO::FETCH_ASSOC);
                $count = count($count);
                $count_per_page = ceil($count/5);
                try{

                    $select_stmt = $db->prepare("SELECT * FROM posts WHERE post_status='published' LIMIT $page_1, 5");
                    $select_stmt->execute();
                    $row = $select_stmt->fetchAll(PDO::FETCH_ASSOC);


                    if(empty($row))
                    {
                        echo "<h1>No posts :/</h1>";
                    }
                    foreach($row as $result) {
                        $post_id = $result['post_id'];
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
                            <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="author.php?author=<?php echo $post_author?>"><?php echo $post_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                        <hr>
                        <a href="post.php?p_id=<?php echo $post_id ?>">
                        <img class="img-responsive" src="images/<?php echo $post_image ?>" alt=""></a>
                        <hr>
                        <p><?php echo substr($post_content, 0, 100)  ?> </p>
                        <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>

                        <?php

                    }

                }
                catch(PDOException $e)
                {
                    $e->getMessage();
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
    <ul class="pager">
       <?php
       for ($i=1; $i<=$count_per_page; $i++)
       {
           echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
       }

       ?>

    </ul>


        <?php
include "includes/footer.php";
?>