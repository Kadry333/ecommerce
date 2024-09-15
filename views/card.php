<?php require_once Root_Path."inc/header.php";?>
<?php require_once Root_Path.("inc/nav.php");?>

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
        <?php if(get_session("card")):?>
        <table class = "table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Quantity</th>
                    <th>Remove</th>

                </tr>

            </thead>
            <tbody>
                <?php $i = 1;$total = 0;foreach(get_session("card") as $key => $value):?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $value['title'];?></td>
                    <td><?php echo $value['price'];?></td>
                    <?php $total += $value['price'];?>
                    <td><?php echo $value['price']*$value['quantity'];?></td>
                    <td><?php echo $value['quantity'];?></td>
                    <td>
                        <a href = "<?php echo url("card-remove&id=".$key);?>"class = "btn btn-danger"style="width: 60%;">Delete</a>
                    </td>
                </tr>
                <?php endforeach;?>
                <tr>
                    <td><h4>Total Price</h4></td>
                    <td colspan="4"><h4><?php echo $total;?></h4></td>
                    <td>
                        <a href="<?php echo url("checkout");?>"class = "btn btn-info"style="width: 60%;"> checkout</a>
                    </td>
                </tr>
            </tbody>


        </table>
        <?php else:?>
            <div class="alert alert-info">Cart Is Impty</div>
            <?php endif;?>
</div>     
</div>
  
    <!-- End Contact -->
    <?php require_once Root_Path."inc/footer.php";?>