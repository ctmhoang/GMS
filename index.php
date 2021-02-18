<?php include("includes/header.php");
require_once "admin/scripts/PhotoService.php";
require_once "admin/scripts/Pagination.php";

$photo_service = $photo_service ?? null;


$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;


$items_per_page = 4;


$items_total_count = count($photo_service->fetchAll());


$paginate = new Pagination($page, $items_per_page, $items_total_count);


$photos = $photo_service->getRange($paginate->offset(), $items_per_page);


?>


<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-12">


        <div class="thumbnails row">


            <?php foreach ($photos as $photo): ?>


                <div class="col-xs-6 col-md-3">

                    <a class="thumbnail" href="photo.php?id=<?php echo $photo->id; ?>">

                        <img class="home_page_photo img-responsive " src="admin/<?php echo $photo->dir; ?>"
                             alt="">


                    </a>


                </div>


            <?php endforeach; ?>


        </div>


        <div class="row">


            <ul class="pager">

                <?php


                if ($paginate->totalPages() > 1) {

                    if ($paginate->hasNxt()) {

                        echo "<li class='next'><a href='index.php?page={$paginate->next()}'>Next</a></li>";


                    }


                    for ($i = 1; $i <= $paginate->totalPages(); $i++) {


                        if ($i == $paginate->getCurrentPage()) {


                            echo "<li class='active'><a href='index.php?page={$i}'>{$i}</a></li>";


                        } else {

                            echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";


                        }

                    }


                    if ($paginate->hasPrev()) {

                        echo "<li class='previous'><a href='index.php?page={$paginate->previous()}'>Previous</a></li>";


                    }


                }


                ?>


            </ul>


        </div>


    </div>


    <!-- Blog Sidebar Widgets Column -->
    <!--   <div class="col-md-4">
-->

    <?php // include("includes/sidebar.php"); ?>


</div>
<!-- /.row -->

<?php include("includes/footer.php"); ?>
