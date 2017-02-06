<?php
    // configuration
    require("../includes/config.php");
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        render("selling.php", ["title"=>"Selling Stocks" , "symbol"=>$_GET["symbol"]]);
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        if(empty($_POST["sellAmount"])){
            apologize("Please enter an amount to sell");
            exit;
        }
        if(empty($_POST["sellStock"])){
            apologize("Please enter a stock to sell");
            exit;
        }
          
        $shares = query("SELECT shares FROM userData WHERE id = ? && symbol = ?", $_SESSION["id"], $_POST["sellStock"]);
        $shares = intval($shares[0]['shares']);
        $stock = lookup($_POST["sellStock"]);
        $email = query("SELECT username FROM users WHERE id = ?",$_SESSION["id"]); 
        
        if($_POST["sellAmount"] <= $shares){
            $profit = floatval(floatval($stock['price']) * floatval($_POST["sellAmount"]));
            $shares = $shares - $_POST["sellAmount"];
            $_SESSION["cash"] = $_SESSION["cash"] + $profit;
            query("INSERT INTO transactionHistory (symbol,transactionShares,sharePrice,transactionType,id) VALUES(?,?,?,'SELL',?)",$_POST['sellStock'], $_POST['sellAmount'], $stock['price'], $_SESSION['id']);
            if($shares == 0){
                query("DELETE FROM userData WHERE id = ? AND symbol = ?",$_SESSION["id"],$_POST["sellStock"]);
            }else{
                query("UPDATE userData SET shares = ? WHERE id = ? AND symbol = ?",$shares,$_SESSION["id"],$_POST["sellStock"]);
            }
        }else{    
            apologize("Amount to sell exceeds current held.");
            exit;
        }
        
        query("UPDATE users SET cash = ? WHERE id = ?", $_SESSION["cash"], $_SESSION["id"]);
       
        if ($stock != false){
        //ASSUMES GMAIL CAUSE IVE DONE ENOUGH WORK ON THIS
        //THIS WOULD NEED TO BE WORKED ON IN ORDER TO GET WORKING
        //NEED USERS TO REGISTER EMAIL WHEN REGISTERING
            mail($email[0]['username'] . "@gmail.com","Sold Stock Recipt", "Profit from sale $" . strval($profit));
            sell_response($profit);
        }else if($stock ==  false){
            apologize("Error Getting Stock Information :(");
            exit;
        }   
    }     
?>
