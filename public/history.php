<?php
    require("../includes/config.php");
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        if(empty($_GET)){
            $rows = query("SELECT * FROM transactionHistory WHERE id = ?", $_SESSION['id']);
        }else{
            $rows = query("SELECT * FROM transactionHistory WHERE symbol = ? && id = ?", $_GET['symbol'],$_SESSION['id']);
        }
        $transactions = [];
        foreach($rows as $row){
        $transactions[] = [
             "transactionDate"   => $row["transactionDate"],
             "symbol" => $row["symbol"],
             "transactionShares" => $row["transactionShares"],
             "sharePrice" => $row["sharePrice"],
             "transactionType" => $row["transactionType"]];       
        }
        render("history_response.php", ["title" => "History of Transactions", "transactions" => $transactions]);      
    }    
?>

