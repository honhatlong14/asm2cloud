<!DOCTYPE html>
<html>
    <head>
        <title>Insert data to ATN database</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1>Post your product</h1>
        <h2>Enter data into table</h2>
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <strong><i class="fa fa-plus"></i> Add New Product</strong>
            </div>
            <div class="card-body">
                <form action="AddProduct.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="barcode" class="col-form-label">Product ID</label>
                            <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Enter Product ID" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name" class="col-form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="price" class="col-form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Price" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="image" class="col-form-label">Image</label>
                            <input type="file" class="form-control" name="image" id="image" placeholder="Image URL">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-form-label">Description</label>
                        <textarea name="description" rows="5" class="form-control" id="description" placeholder="Description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-check-circle"></i> Save</button>
                </form>
            </div>
        </div>
        <br><br><br>

        <?php
        require_once'ConnecttoDB.php';
        $connection = new Connection();
        if (isset($_POST['submit'])) {
            $fnm = $_FILES["image"]["name"];
            $dst = "./img/" . $fnm;
            move_uploaded_file($_FILES["image"]["tmp_name"], $dst);
        }
        $sql = "INSERT INTO product(product_id,product_name,price,product_image,information)"
                . " VALUES('$_POST[barcode]','$_POST[name]','$_POST[price]','$_POST[image]','$_POST[description]')";
        echo ($sql);
        $stmt = $connection->pdo->prepare($sql);
//$stmt->execute();
        if (is_null($_POST[barcode])) {
            echo "ID must be not null";
        } else {
            if ($stmt->execute() == TRUE) {
                echo "Record inserted successfully.";
            } else {
                echo "Error inserting record: ";
            }
        }
        ?>
        <table class="table table-bordered table-condensed" width="50%" border="1" cellpadding="5" cellspacing="5" >
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Product image</th>
                    <th>Information</th>
                </tr>
            </thead>
            <tbody>
                <?php
// tạo vòng lặp
                require_once'ConnecttoDB.php';
                $connection = new Connection();
                $sql = "SELECT * FROM product ORDER BY product_id";
                $stmt = $connection->pdo->prepare($sql);
//Thiết lập kiểu dữ liệu trả về
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->execute();
                $resultSet = $stmt->fetchAll();
                echo '<p>Students information:</p>';
                foreach ($resultSet as $row) {
                    ?>

                    <tr>
                        <td scope="row"><?php echo $row['product_id'] ?></td>
                        <td><?php echo $row['product_name'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['product_image'] ?></td>
                        <td><?php echo $row['information'] ?></td>
                    </tr>

                    <?php
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
