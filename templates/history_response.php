<script>
//This seemed eaiser and more dynamic than making a new css class for the table
$(document).ready(function(){
    $("tr:even").css("background-color", "LightGray");
});
</script>
<p class="text-danger">
<table align="center" class="table table-striped">
        <th>Transaction Date</th>
        <th>Stock Symbol</th>
        <th>Shares</th>
        <th>Stock Price</th>
        <th>Transaction Type</th>
<?php
foreach ($transactions as $transaction){
?>   
    <tr><td align="left"><?=$transaction["transactionDate"]; ?></td>
        <td align="left"><?=$transaction["symbol"]; ?></td>
        <td align="left"><?=$transaction["transactionShares"]; ?></td>
        <td align="left"><?=$transaction["sharePrice"]; ?></td>
        <td align="left"><?=$transaction["transactionType"]; ?></td></tr>
<?php
}
?>
</table>        
</p>
<a href="../index.php" class="btn btn-primary">Go to Portfolio</a>

<p>

