<?php require_once('src/db.php');?>
<?php require_once('src/DBFUNC.php');?>
<?php require_once Root_Path."inc/header.php";?>
<?php require_once Root_Path.("inc/nav.php");?>



    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Checkout</h1>
           
        </div>
    </div>

    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">
            <form class="col-md-9 m-auto" method="post" action = "<?php echo url("save-order")?>"role="form">
            <span class="text-success" style="font-size: 28px; font-weight: bold; display: block; text-align: center; line-height: 1.5; padding: 10px;">
    <?php echo $_SESSION['success'] ?? '';?>
</span>
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">Name</label>
                        <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Name">
                        <span class = "text-danger"><?php echo $_SESSION['errors']['name'] ?? '';?></span>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">Email</label>
                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                        <span class = "text-danger"><?php echo $_SESSION['errors']['email'] ?? '';?></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputsubject">Address</label>
                    <input type="text" class="form-control mt-1" id="address" name="address" placeholder="Address">
                    <span class = "text-danger"><?php echo $_SESSION['errors']['address'] ?? '';?></span>
                </div>
                <div class="mb-3">
                    <label for="inputsubject">Phone</label>
                    <input type="text" class="form-control mt-1" id="phone" name="phone" placeholder="Phone Number">
                    <span class = "text-danger"><?php echo $_SESSION['errors']['phone'] ?? '';?></span>
                </div>
                <div class="mb-3">
                    <label for="inputmessage">Info</label>
                    <textarea class="form-control mt-1" id="info" name="info" placeholder="Info" rows="8"></textarea>
                    <span class = "text-danger"><?php echo $_SESSION['errors']['info'] ?? '';?></span>

                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3">Save Order</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

<?php unset($_SESSION['errors']);?>
<?php unset($_SESSION['success']);?>

    <!-- End Contact -->

    <?php require_once Root_Path."inc/footer.php";?>