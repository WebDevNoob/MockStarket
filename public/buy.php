<?php
    // configuration
    require("../includes/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        render("buying.php", ["title"=>"Buying Stocks" , "symbol"=>$_GET["symbol"]]);
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["buyAmount"])){
            apologize("Please enter an amount to buy");
            exit;
        }
        if(empty($_POST["buyStock"])){
            apologize("Please enter a stock to buy");
            exit;
        }
        
        $_POST["buyStock"] = strtoupper($_POST["buyStock"]);
                
        if(!(preg_match("/^\d+$/", $_POST["buyAmount"]))){
            apologize("Please only buy whole stocks");
            exit;
        }else{
            $stock = lookup($_POST["buyStock"]);
            $stockCost = floatval($stock['price'] * intval($_POST["buyAmount"]));
            $email = query("SELECT username FROM users WHERE id = ?",$_SESSION["id"]);    
            if($stockCost > $_SESSION["cash"]){
                apologize("Insufficent Funds to Complete Transaction");
                exit;
            }else{
                $_SESSION["cash"] = $_SESSION["cash"] - $stockCost;
                query("UPDATE users SET cash = ? WHERE id = ?", $_SESSION["cash"], $_SESSION["id"]);
                $shares = query("SELECT shares FROM userData WHERE id = ? && symbol = ?", $_SESSION["id"], $_POST["buyStock"]);
                if(empty($shares)){
                    $shares = 0;
                }
                $shares = intval($shares[0]['shares']) + $_POST['buyAmount'];
                query("INSERT INTO transactionHistory (symbol,transactionShares,sharePrice,transactionType,id) VALUES(?,?,?,'BUY ',?)",$_POST['buyStock'], $_POST['buyAmount'], $stock['price'],$_SESSION['id']);          
                query("INSERT INTO userData (id, symbol, shares) VALUES(?,?,?) ON DUPLICATE KEY UPDATE shares = ?", $_SESSION['id'], $_POST['buyStock'], $shares, $shares);     
            }
        }
        if ($stock != false){
        //ASSUMES GMAIL CAUSE IVE DONE ENOUGH WORK ON THIS
        //THIS WOULD NEED TO BE WORKED ON IN ORDER TO GET WORKING
        //NEED USERS TO REGISTER EMAIL WHEN REGISTERING
        $mailCheck = mail($email[0]['username'] . "@gmail.com","Sold Stock Recipt", "Profit from sale $" . strval($stockCost));
        buy_response($stockCost);
        }else if($stock ==  false){
            apologize("Error Getting Stock Information :(");
            exit;        
        }
    }
