<?php require_once 'src/db.php'; ?>
<?php require_once 'src/DBFUNC.php'; ?>
<?php require_once 'src/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Slider</title>
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
            <h1 class="m-0">Add New Slider</h1>
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
              $title = $_POST['title'];
              $subtitle = $_POST['subtitle'];
              $description = $_POST['description'];
              $image = $_FILES['image']['name'];

              // Upload image
              $target_dir = "public/images/slider/";
              $target_file = $target_dir . basename($image);

              if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $sql = "INSERT INTO slider (title, `sub-title`, description, image) VALUES ('$title', '$subtitle', '$description', '$image')";
                if (mysqli_query($conn, $sql)) {
                  echo "<div class='alert alert-success'>New slider added successfully</div>";
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
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
              </div>
              <div class="form-group">
                <label for="subtitle">Sub Title</label>
                <input type="text" class="form-control" id="subtitle" name="subtitle" required>
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
              </div>
              <button type="submit" class="btn btn-primary">Add Slider</button>
              <a href="<?php echo url("dashboard");?>" class="btn btn-secondary">Back</a>

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
