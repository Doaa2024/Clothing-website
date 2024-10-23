<?php require_once("class/products.class.php");
$products = new Products(); ?>

<!DOCTYPE html>
<html>

<head>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php $allimages = $products->getimages(21) ?>
            <?php foreach ($allimages as $k => $row) { ?>
                <div class="carousel-item <?php echo $k == 0 ? 'active' : ''; ?>">
                    <img class="d-block w-100" src="assets/img/<?php echo $row['image_name'] ?>" alt="Slide <?php echo $k + 1; ?>">
                </div>
            <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Manual Initialization -->
    <script>
        $(document).ready(function() {
            $('#carouselExampleControls').carousel();
        });
    </script>

</body>

</html>