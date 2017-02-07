<?php

    /**
     * functions.php
     *
     * Computer Science 50
     * Problem Set 7
     *
     * Helper functions.
     *

    /**
     * Apologizes to user with message.
     */
    function apologize($message)
    {
        render("apology.php", ["message" => $message]);
        exit;
    }
    function sell_response($profit){

        render("sell_response.php", ["profit" => $profit]);
        exit;
    }
    
    function buy_response($stockCost){
        render("buy_response.php", ["stockCost" => $stockCost]);
        exit;
    }
    
    function addFunds_response($funds){
        render("addFunds_response.php", ["funds" => $funds]);
        exit;
    }        
    /**
     * Facilitates debugging by dumping contents of variable
     * to browser.
     */

    /**
     * Returns a stock by symbol (case-insensitively) else return error if not found.
     */
    function lookup($symbol)
    {
        // open connection to Yahoo
        $context = stream_context_create([
            "http" => [
                "header" => implode(array_map(function($value, $key) { return sprintf("%s: %s\r\n", $key, $value); }, ["Accept" => "*/*","Connection" => "Keep-Alive","User-Agent" => sprintf("curl/%s", curl_version()["version"])], array_keys(["Accept" => "*/*","Connection" => "Keep-Alive","User-Agent" => sprintf("curl/%s", curl_version()["version"])]))),
                "method" => "GET"]
        ]);

        $handle = @fopen("http://download.finance.yahoo.com/d/quotes.csv?f=snl1&s={$symbol}", "r", false, $context);
        if ($handle === false)
        {
            // trigger (big, orange) error
            trigger_error("Could not connect to Yahoo!", E_USER_ERROR);
            exit;
        }
 
        // download first line of CSV file
        $data = fgetcsv($handle);
        if ($data === false || count($data) == 1)
        {
            return 'Error Reading File';
        }

        // close connection to Yahoo
        fclose($handle);
//dd($data);
        // ensure symbol was found
        if ($data[2] === "N/A" || $data[2] === "0.00")
        {
            return 'Stock not found';
        }

        // return stock as an associative array
        return [
            "symbol" => $data[0],
            "name" => $data[1],
            "price" => floatval($data[2])
        ];
    }

    /**
     * Executes SQL statement, possibly with parameters, returning
     * an array of all rows in result set or false on (non-fatal) error.
     */
    function query(/* $sql [, ... ] */)
    {
        // SQL statement
        $sql = func_get_arg(0);

        // parameters, if any
        $parameters = array_slice(func_get_args(), 1);

        // try to connect to database
        static $handle;
        if (!isset($handle))
        {
            try
            {
                // connect to database
                $handle = new PDO("mysql:dbname=" . DATABASE . ";host=" . SERVER, USERNAME, PASSWORD);

                // ensure that PDO::prepare returns false when passed invalid SQL
                $handle->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
            }
            catch (Exception $e)
            {
                // trigger (big, orange) error
                trigger_error($e->getMessage(), E_USER_ERROR);
                exit;
            }
        }

        // prepare SQL statement
        $statement = $handle->prepare($sql);
        if ($statement === false)
        {
            // trigger (big, orange) error
            trigger_error($handle->errorInfo()[2], E_USER_ERROR);
            exit;
        }

        // execute SQL statement
        $results = $statement->execute($parameters);

        // return result set's rows, if any
        if ($results !== false)
        {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            return false;
        }
    }

    /**
     * Redirects user to destination, which can be
     * a URL or a relative path on the local host.
     *
     * Because this function outputs an HTTP header, it
     * must be called before caller outputs any HTML.
     */
    
    /**
     * Renders template, passing in values.
     */
    function render($template, $values = [])
    {
        // if template exists, render it
        if (file_exists("../templates/$template"))
        {
            // extract variables into local scope
            extract($values);

            // render header
            require("../templates/header.php");
            // render template
            if($template != "login_form.php"){
            require("../templates/nav.php");
            }
            require("../templates/$template");
            
            if($template != "login_form.php"){
            // render footer
            require("../templates/footer.php");
            }
        }
        // else err
        else
        {
            trigger_error("Invalid template: $template", E_USER_ERROR);
        }
    }

?>
