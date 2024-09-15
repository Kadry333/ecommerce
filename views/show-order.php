<?php require_once Root_Path."inc/header.php";?>
<?php require_once Root_Path.("inc/nav.php");?>
<?php if(!get_Session("auth"))
{
    redirect("login");
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


    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Order Details </h1>
            <p>
                Proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet.
            </p>
        </div>
    </div>

    <!-- Start Contact -->
    <div class="container py-5">
    <div class = "row py-5">
    <div class = "col-12">
    <?php $id = $_GET['order_id'];?>
        <?php $sql = "SELECT * FROM orders WHERE id ='$id'";?>
        <?php $orders = mysqli_query($conn,$sql);
        $order = mysqli_fetch_assoc($orders);?>
         <div class="order-info border p-3">
            <h2>Order Info</h2>
            <h4>Time : <?php echo $order['created_at'];?></h4>
            <h4>Name : <?php echo $order['name'];?></h4>
            <h4>Email : <?php echo $order['email'];?></h4>
            <h4>Info : <?php echo $order['info'];?></h4>
            <h4>Phone : <?php echo $order['phone'];?></h4>
            <h4>Address : <?php echo $order['address'];?></h4>
            <h4>Status : <?php echo $order['status'];?></h4>
            <h4>Price : <?php echo $order['total_price'];?></h4>
        </div>
      <?php
      $sql = "SELECT orders.*,products.*,order_products.quantity AS or_quantity
      FROM orders INNER JOIN order_products ON `orders`.`id` = `order_products`.`order_id`
      INNER JOIN products ON `products`.`id` = `order_products`.`product_id`
      WHERE orders.id = '$id'";
      $res = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_assoc($res)):?>
        <div class="border p-5">
            <h2>Product Info</h2>
            <h4>Title : <?php echo $row['title'];?></h4>
            <h4>Price : <?php echo $row['price'];?></h4>
            <h4>Quantity : <?php echo $row['or_quantity'];?></h4>
    </div>   
    <?php endwhile;?>  
</div>
  
    <!-- End Contact -->
    <?php require_once Root_Path."inc/footer.php";?>