<?php require_once Root_Path."inc/header.php";?>
<?php require_once Root_Path.("inc/nav.php");?>
<?php require_once("src/db.php");?>
<?php require_once("src/DBFUNC.php");?>
<?php if (isset($_SESSION['success']) && $_SESSION['success'] == "your order has been saved successfully"): ?>
    <div id="success-message" class="alert alert-success">
        <?php echo $_SESSION['success']; ?>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<script>
    setTimeout(function() {
        var messageElement = document.getElementById('success-message');
        if (messageElement) {
            messageElement.style.display = 'none';
        }
    }, 5000);
</script>
<?php if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "SELECT * FROM `categories` WHERE `id` = '$id'";
    if(check($sql))
    {
        $str = "WHERE `categories`.`id` = '$id'";
        //$sql = "SELECT * FROM `categories`INNER JOIN `products` ON `categories`.id = `products`.category_id WHERE `categories`.id = '$id'";
        $res = inner_join("categories","products","id","category_id",$str);
        
    }
    else{
        header("Location:404.php");
        die();
    }
}
else
   {
    $str = '';
    if(isset($_GET['gender']))
    {
        $gender= $_GET["gender"];
  
        $str ="WHERE `gender` = '$gender'";
    }
      $res = inner_join("categories","products","id","category_id",$str);
    }
?>

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Categories</h1>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Gender
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="<?php echo url("shop&gender=men");?>">Men</a></li>
                            <li><a class="text-decoration-none" href="<?php echo url("shop&gender=women");?>">Women</a></li>
                            <li><a class="text-decoration-none" href="<?php echo url("shop&gender=children");?>">Children</a></li>
                        </ul>
                    </li>
                   
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Product
                            <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
                        </a>
                        <?php $categories = getall("categories");?>
                        <?php while($category = mysqli_fetch_assoc($categories)):?>
                        <ul class="collapse show list-unstyled pl-3">
                            <li><a class="text-decoration-none" href="<?php echo url("shop&id=".$category['id']);?>"><?php echo $category['name'];?></a></li>
                        </ul>
                        <?php endwhile;?>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9">
                
                <div class="row">
                    
                    <?php while($row = mysqli_fetch_assoc($res)):?>
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="<?php echo Base_Url."public/images/products/".$row['image'];?>">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white mt-2" href=<?php echo url("shop-single&id=".$row['id']);?>><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href=<?php echo url("add-to-card&id=".$row['id']);?>><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="<?php echo url("shop-single&id=".$row['id']);?>" class="h3 text-decoration-none"><h3><?php echo $row['title'];?></h3></a>
                                <h5><?php echo $row['name'];?></h5>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li><?php echo $row['description'];?></li>
                                   
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                      <?php echo str_repeat('<i class="text-warning fa fa-star"></i>',$row['rating']);?>
                                      <?php echo str_repeat('<i class="text-muted fa fa-star"></i>',5-$row['rating']);?>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">$<?php echo $row['price'];?></p>
                            </div>
                        </div>
                    </div>
                    <?php endwhile;?>
                </div>
               
            </div>

        </div>
    </div>
    <!-- End Content -->

    <!-- Start Brands -->
    <section class="bg-light py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Our Brands</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        Lorem ipsum dolor sit amet.
                    </p>
                </div>
                <div class="col-lg-9 m-auto tempaltemo-carousel">
                    <div class="row d-flex flex-row">
                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="prev">
                                <i class="text-light fas fa-chevron-left"></i>
                            </a>
                        </div>
                        <!--End Controls-->
                       <?php $res = getall("brand");?>
                       
                        <!--Carousel Wrapper-->
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner text-center">
        <?php 
        $is_first = true; // Flag for the first item
        while ($row = mysqli_fetch_assoc($res)): 
        ?>
        <div class="carousel-item <?php echo $is_first ? 'active' : '';?>">
            <img src="<?php echo Base_Url . "public/images/brands/" . $row['image'];?>" 
                 class="d-inline-block w-25" alt="Brand Logo">
        </div>
        <?php 
        $is_first = false; 
        endwhile; 
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-dark p-3 rounded-circle" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-dark p-3 rounded-circle" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>



                        <!--End Carousel Wrapper-->

                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-light fas fa-chevron-right"></i>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Brands-->
shop-single
