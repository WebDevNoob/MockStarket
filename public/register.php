<?php

    require("../includes/config.php");
    
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        render("register_form.php", ["title" => "Register"]);
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){     
        if(($_POST["username"]==NULL)||($_POST["password"]==NULL)||($_POST["confirmation"]==NULL)){
            render("apology.php", ["message" => "Empty Field"]);
            exit;
        }
        if($_POST["password"] !== $_POST["confirmation"]){
            render("apology.php", ["message" => "Password Mismatch!"]);
            exit;
       }
       if(query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"])) === false){
            render("apology.php", ["message" => "Username already exists"]);
            exit;
       }else{
       $rows = query("SELECT LAST_INSERT_ID() AS id");
       $id = $rows[0]["id"];
       $_SESSION["id"] = $id;
       redirect("index.php");
       }
    }
    
?>
