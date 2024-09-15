

<?php require_once '../src/config.php';?>
<?php require_once '../src/DBFUNC.php';?>


<?php
$conn = mysqli_connect("localhost","root","","zay-store");
if (isset($_GET['query'])) {
    $searchQuery = htmlspecialchars($_GET['query']);

    // Sanitize the input (You can use a prepared statement for a database query)
    // $searchQuery = $conn->real_escape_string($searchQuery);

    // Example query (Replace with your actual search logic)
    $sql = "SELECT * FROM products WHERE `title` LIKE '%$searchQuery%'";
     $res = mysqli_query($conn,$sql);
     ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Table Example</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-custom {
            border-collapse: separate;
            border-spacing: 0;
            border: 1px solid #dee2e6;
        }
        .table-custom th, .table-custom td {
            border: 1px solid #dee2e6;
            padding: 12px;
        }
        .table-custom thead th {
            background-color: #343a40;
            color: #ffffff;
        }
        .table-custom tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
        .table-custom tbody tr:hover {
            background-color: #e9ecef;
        }
        .table-custom img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Search Results</h2>
        <table class="table table-custom">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Rating</th>
                    <th>Review</th>
                    <th>Description</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($res)): ?>
                <tr>
                <td><a href="<?php echo "http://localhost:8000/index.php?page=shop-single&id=". ($row['id']); ?>" >"<?php echo htmlspecialchars($row['title']); ?></a></td>
                <td><?php echo htmlspecialchars($row['price']); ?></td>
                    <td><?php echo htmlspecialchars($row['rating']); ?></td>
                    <td><?php echo htmlspecialchars($row['review']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td><img src="<?php echo "http://localhost:8000/public/images/products/". ($row['image']); ?>" alt="Product Image"></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>






    <?php
}
?>

