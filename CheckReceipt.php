<?php

?>
<!DOCTYPE html>
<html>
<body>
<h1>Thong tin don hang</h1>
<div id="container">
<table class="table table-bordered table-condensed" width="50%" border="1" cellpadding="5" cellspacing="5" >
    <thead>
      <tr>
        <th>Receipt ID</th>
        <th>Date</th>
        <th>Customer ID</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // tạo vòng lặp 
             foreach ($resultSet as $row) {
      ?>
   
      <tr>
        <td scope="row"><?php echo $row['ReceiptID'] ?></td>
        <td><?php echo $row['Date'] ?></td>
        <td><?php echo $row['CustomerID'] ?></td>
      </tr>
     
      <?php
        }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>


