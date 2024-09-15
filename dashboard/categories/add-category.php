<?php require_once 'src/db.php'; ?>
<?php require_once 'src/DBFUNC.php'; ?>
<?php require_once 'src/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add category</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add New category</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8 offset-md-2">

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $name= $_POST['name'];
           
              $image = $_FILES['image']['name'];

              // Upload image
              $target_dir = "public/images/categories/";
              $target_file = $target_dir . basename($image);

              if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $sql = "INSERT INTO categories (`name`, `image`) VALUES ('$name',  '$image')";
                if (mysqli_query($conn, $sql)) {
                  echo "<div class='alert alert-success'>New category added successfully</div>";
                } else {
                  echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
                }
              } else {
                echo "<div class='alert alert-danger'>Sorry, there was an error uploading your file.</div>";
              }
            }
            ?>

            <form method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              
              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
              </div>
              <button type="submit" class="btn btn-primary">Add category</button>
              <a href="<?php echo url("categoriesdashboard");?>" class="btn btn-secondary">Back</a>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
