<p >Available funds: USD$ <?=number_format($_SESSION['cash'],2);?></p>
<form action="buy.php" method="post">
    <fieldset>
        <div class="form-group">
        Stock being bought: <input class="form-control" name="buyStock" value="<?=$_GET['symbol']?>" type="text" maxlength="8" style="width: 150px;" />
        </div>
        <div class="form-group">
        Amount of stock to Buy: <input autofocus class="form-control" name="buyAmount" placeholder="0" type="int" style="width: 75px;" maxlength="10"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Buy Stock</button>
            <button class="btn btn-default" onclick="javascript:history.go(-1);">Go Back</button>
        </div>
    </fieldset>
</form>
