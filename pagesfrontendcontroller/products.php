<?php
require_once("./pagesfrontendcontroller/cart.php");

$result=mysqli_query($connection, "SELECT * FROM products ORDER BY productId DESC");
$i=0;

while($row=mysqli_fetch_array($result)) {
    $i++;
    if($i == 1) {

        echo "<div class=\"row\">";
    }
    ?>
        <div class="col s12 m3">
        <div class="card">

        <div class="card-image"><img src="./images/<?php echo $row['productPicture']?>"></div>

        <div class="card-content">
                   <ul>
                       <li style="font-size: 17px"><?php echo trim(htmlspecialchars($row['productName']));?> </li>
                       <li style="font-size: 17px"> <?php if($row['isDailySpecialOffer'] == NULL){
                               echo "<b>Price:</b>"; echo $row['price'];
                           }elseif($row['isDailySpecialOffer'] == !NULL){
                               echo "<b style='color:#faa61a;'>OfferPrice: </b>"; echo trim(htmlspecialchars($row['isDailySpecialOffer']));
                           } ?>
                           <b>kr</b></li>

                   </ul>
         </div>

            <div class="cardlinks">
                <a href="index.php?page=productdetails&productId=<?php echo $row['productId']?>"
                   class="waves-effect waves-light btn">See details</a>

                <form method="post" action="./index.php?page=products&action=addcart&productId=<?php echo $row['productId']?>">
                        <button type="submit" class="waves-effect waves-light btn col s12">Add To Cart
                        <input type="hidden" name="code" value="<?php print $row['code']?>"></button>
                </form>
            </div>

        </div>
        </div>
<?php

    if($i == 4) {

        echo "</div>";
        $i=0;
    }

}


