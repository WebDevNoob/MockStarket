<p class="text-danger">
Cost of sale $<?=number_format($stockCost,2);?>
<p>
New cash balance $<?=number_format($_SESSION["cash"],2);?>
</p>

<a href="javascript:history.go(-1);" class="btn btn-default">Go Back</a>
<p>
<p>
<a href="../index.php" class="btn btn-primary">Go to Portfolio</a>
