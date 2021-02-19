<?php include("includes/header.php");
require_once('admin/scripts/service/impl/PhotoService.php');
require_once "admin/scripts/utils/Pagination.php";

$photo_service = $photo_service ?? null;


$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

$message = isset($_POST['m']) ? $_POST['m'] : '';

$items_per_page = 4;

$allData = $photo_service->fetchAll();

$items_total_count = count($allData);

$paginate = new Pagination($page, $items_per_page, $items_total_count);

$photos = $photo_service->getRange($paginate->offset(), $items_per_page);

if (!empty($_GET['s'])) {
    $str = htmlentities(trim(strtolower($_GET['s'])));
    $data = array_filter($allData, fn(Photo $entry): bool => str_contains(htmlentities(strtolower($entry->title)), $str));
    if (empty($data)) {
        $message = "Not Found!";
        $_POST['m'] = $message;
    } else {
        $items_total_count = count($data);
        $photos = $photo_service->getRange($paginate->offset(), $items_per_page, $data);
    }
}


?>


<div class="row">
    <?php include("includes/sidebar.php"); ?>

    <div><?= $message ?></div>
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


</div>
<!-- /.row -->

<?php include("includes/footer.php"); ?>
