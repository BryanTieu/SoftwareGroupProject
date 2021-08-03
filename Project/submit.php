<?php include('server.php') ?>
<?php
$currentPrice = 1.50;
$companyProfit = .10;
$locationFactor = 0.04;
$history = 0.00;
$gallonfactor = 0.03;

$gallons = mysqli_real_escape_string($db, $_POST["gallons"]);
$state = mysqli_real_escape_string($db, $_POST["state"]);

$user_check_query = "SELECT * FROM fuelquote WHERE id='{$_SESSION["id"]}'";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) { // if user has a history exists
    $history = 0.01;
}

if($gallons > 1000) {
    $gallonfactor = 0.02;
}

if($state == "TX") {
    $locationFactor = 0.02;
}

// Margin =  Current Price * (Location Factor - Rate History Factor + Gallons Requested Factor + Company Profit Factor)
$margin = ($locationFactor - $history + $gallonfactor + $companyProfit) * $currentPrice;
$suggestedprice = $margin + $currentPrice;
$totalprice = $suggestedprice * (int)$gallons;

?>

<div class="input-group">
    <label>Suggested Price</label>
    <br>
    <label>
        <input type="text" name="sugprice" style="width:20em; text-align: left; padding: 5px 5px" value="<?php
        echo "$".$suggestedprice;
        ?>" readonly>
    </label>
    <br>
    <label>Total Price</label>
    <br>
    <label>
        <input type="text" name="sugprice" style="width:20em; text-align: left; padding: 5px 5px" value="<?php
        echo "$".$totalprice;
        ?>" readonly>
    </label>
</div>



