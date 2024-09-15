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
            <h1 class="h1">Shopping Card </h1>
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
        <?php $user_id = $_SESSION['auth']['id'];?>
        <?php $sql = "SELECT `orders`.* FROM `orders` INNER JOIN `user` on `orders`.`user_id` = `user`.`id` WHERE `orders`.`user_id`='$user_id'";?>
        <?php $orders = mysqli_query($conn,$sql);?>
        <table class = "table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th>Total Price</th>
                    <th>Created At</th>
                    <th>Show</th>
                  

                </tr>

            </thead>
            <tbody>
                <?php $i = 1;while($order = mysqli_fetch_assoc($orders)):?>
                <tr>
              

                    <td><?php echo $i++;?></td>
                    <td><?php echo $order['user_id'];?></td>
                    <td><?php echo $order['total_price'];?>$</td>
                    <td><?php echo $order['created_at'];?></td>
                    <td>
                        <a href="<?php echo url("show-order&order_id=".$order['id']);?>" class="btn btn-success">View</a>
                    </td>

                
                </tr>
                <?php endwhile;?>
                
            </tbody>


        </table>

</div>     
</div>
  
    <!-- End Contact -->
    <?php require_once Root_Path."inc/footer.php";?>