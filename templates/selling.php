<p >Available funds: USD$ <?=number_format($_SESSION['cash'],2);?></p>
<form action="sell.php" method="post">
    <fieldset>
        <div class="form-group">
        Stock being sold: <input class="form-control" name="sellStock" value="<?=$_GET['symbol']?>" type="text" maxlength="8" style="width: 150px;" />
        </div>
        <div class="form-group">
        Amount of stock to sell: <input autofocus class="form-control" name="sellAmount" placeholder="0" type="int" style="width: 75px;" maxlength="10"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Sell Stock</button>
            <button class="btn btn-default" onclick="javascript:history.go(-1);">Go Back</button>
        </div>
    </fieldset>
</form>
