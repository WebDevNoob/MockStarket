<?php
    require("../includes/config.php");
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        render("quote_form.php", ["title" => "Get Quote"]);
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["symbol"])){
            apologize("Empty Stock");
            exit;
        }     
        $stock = lookup($_POST["symbol"]);
        if ($stock != false){
            quote_response($stock);
        }else 
        if($stock ==  false){
            apologize("Error Getting Stock :(");
            exit;
        }   
    }     
?>
