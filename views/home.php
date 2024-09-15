
<?php require_once Root_Path."inc/header.php";?>
<?php require_once Root_Path.("inc/nav.php");?>
<?php require_once("src/db.php");?>
<?php require_once("src/DBFUNC.php");?>


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



    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            
            <?php $i=0;?>
            <?php $res1 = getall("slider");?>
            <?php while($row = mysqli_fetch_assoc($res1)):?>
            <div class="carousel-item <?php if($i==0) echo "active";$i++?>">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="<?php echo Base_Url."public/images/slider/". $row['image'];?>"
                             alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><?php echo ucwords($row['title']);?></h1>
                                <h3 class="h2"><?php echo ucwords($row['sub-title']);?></h3>
                                <p>
                                   <?php echo $row['description'];?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        <?php endwhile;?>
            
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Categories of The Month</h1>
                <p>
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
        <?php $res2 = getall("categories");?>
        <div class="row">
            <?php while($row2 = mysqli_fetch_assoc($res2)):?>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="<?php echo Base_Url."public/images/categories/".$row2['image'];?>" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3"><?php echo $row2['name'];?></h5>
                <p class="text-center"><a class="btn btn-success"href="<?php echo url("shop")?>&id=<?php echo $row2['id'];?>">Go Shop</a></p>
            </div>
            
           <?php endwhile;?>
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Featured Product</h1>
                    <p>
                        Reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident.
                    </p>
                </div>
            </div>
            <div class="row">
                <?php $res = getall("products");?>
              <?php while($row3 = mysqli_fetch_assoc($res)):?>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href=<?php echo url("shop-single&id=".$row3['id']);?>>
                            <img src="<?php echo Base_Url."public/images/products/".$row3['image'];?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <?php echo str_repeat('<i class="text-warning fa fa-star"></i>',$row3['rating']);?>
                                    <?php echo str_repeat('<i class="text-muted fa fa-star"></i>',5-$row3['rating']);?>                
                                </li>
                                <li class="text-muted text-right">$<?php echo $row3['price'];?></li>
                            </ul>
                            <a href="<?php echo url("shop-single&id=".$row['id']);?>" class="h2 text-decoration-none text-dark"><?php echo $row3['title'];?></a>
                            <p class="card-text">
                                <?php echo $row3['description'];?>
                            </p>
                            <p class="text-muted">Reviews (<?php echo $row3['review'];?>)</p>
                        </div>
                    </div>
                </div>
                
                <?php endwhile;?>
                
            </div>
        </div>
    </section>
    <!-- End Featured Product --
    <?php require_once Root_Path."inc/footer.php";?>