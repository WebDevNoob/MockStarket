<p >Available funds: USD$ <?=number_format($cash,2);?></p>
<table align="center" class="table table-striped">
        <th style="padding-right:15px">Stock Name</th>
        <th style="padding-right:15px">Stock Symbol</th>
        <th style="padding-right:15px">Amount Owned</th>
        <th style="padding-right:15px">Stock Price</th>
        <th style="padding-right:15px">Stock Value</th>
        <th colspan="4" style="padding-left:3em">Stock Options</th>
<?php
foreach ($positions as $position){
$bUrl = "buy.php?symbol=" . $position["symbol"];
$sUrl = "sell.php?symbol=" . $position["symbol"];
$hUrl = "history.php?symbol=" . $position['symbol'];
?>
   <tr><td align="left"><?=$position["name"  ];?></td>
       <td align="left"><?=$position["symbol"];?></td>
       <td style="padding-right:5em"><?=$position["shares"];?></td>
       <td align="left">$<?=$position["price" ];?></td>
       <td align="left">$<?=number_format($position["shares"] * $position["price"],2)?>
       <td align="left"><a href="<?=$bUrl?>">Buy</a></td>
       <td align="left"><a href="<?=$sUrl?>">Sell</a></td>
       <td align="left"><a href="<?=$hUrl?>">Transaction History</a></td>
       <?php
}
?>
</table> 
