<?php
$query = "SELECT * FROM products";
$result=mysqli_query($connection, $query);
$row=mysqli_fetch_array($result);