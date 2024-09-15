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
            <h1 class="h1">Login </h1>
            <p>
                Proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet.
            </p>
        </div>
    </div>

    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">
            
            <form class="col-md-9 m-auto" method="post" action = "<?php echo url("check-login");?>" role="form">
            <?php if (isset($_SESSION['login']) && $_SESSION['login'] == "not"): ?>
            <div class="alert alert-danger">
            WRONG EMAIL OR PASSWORD!
            </div>
        <?php endif; ?>
                <div class="row">
                    <div class="form-group col-md-12 mb-3">
                        <label for="inputname">Email</label>
                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label for="inputpassword">Password</label>
                        <input type="password" class="form-control mt-1" id="password" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group col-md-12 mb-3 text-center">
                       <p class="mb-0">
                        You don’t have an account ? 
                    <a href="<?php echo url('register'); ?>" class="btn btn-link text-decoration-none" style="font-weight: bold; color: #007bff;">
                                Register Now
        </a>
    </p>
               </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php unset($_SESSION['login']);?>
    <!-- End Contact -->
    <?php require_once Root_Path."inc/footer.php";?>