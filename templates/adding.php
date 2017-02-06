<p >Current available funds: USD$ <?=number_format($_SESSION['cash'],2);?></p>
<form action="addFunds.php" method="post">
    <fieldset>
        <div class="form-group">
        Funds to add: <input class="form-control" name="funds" type="int" maxlength="10" style="width: 75px;"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Add Funds</button>
            <button class="btn btn-default" onclick="javascript:history.go(-1);">Go Back</button>
        </div>
    </fieldset>
</form>
