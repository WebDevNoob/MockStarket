<?php
    // configuration
    require("../includes/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        render("adding.php", ["title"=>"Add Funds to Account"]);
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST["funds"])){
            apologize("Please enter an amount to buy");
            exit;
            }
    $_SESSION["cash"] = ($_SESSION["cash"] + $_POST["funds"]);
    query("UPDATE users SET cash = ? WHERE id = ?", $_SESSION["cash"], $_SESSION["id"]);
    $funds = $_POST["funds"];
    addFunds_response($funds);            
    }
    

