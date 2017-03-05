<?php
namespace Includes;
    /**
    * Return a stock by a symbol (case-insensitively)
    *
    * @return ARRAY : STRING
    */
    class ReturnLookup
    {
        public static function lookupStock($symbol)
        {
        // open connection to Yahoo
            $context = stream_context_create([
                "http" => [
                "header" => implode(array_map(function($value, $key) { return sprintf("%s: %s\r\n", $key, $value); }, ["Accept" => "*/*","Connection" => "Keep-Alive","User-Agent" => sprintf("curl/%s", curl_version()["version"])], array_keys(["Accept" => "*/*","Connection" => "Keep-Alive","User-Agent" => sprintf("curl/%s", curl_version()["version"])]))),
                "method" => "GET"]
            ]);
            $handle = @fopen("http://download.finance.yahoo.com/d/quotes.csv?f=snl1&s={$symbol}", "r", false, $context);
                if ($handle === false){
                    // trigger (big, orange) error
                    trigger_error("Could not connect to Yahoo!", E_USER_ERROR);
                    exit;
                }

        // download first line of CSV file
            $data = fgetcsv($handle);
                if ($data === false || count($data) == 1){
                    return 'Error Reading File';
                }
        // close connection to Yahoo
            fclose($handle);

        // ensure symbol was found
            if ($data[2] === "N/A" || $data[2] === "0.00"){
                return 'Stock not found';
            }
        // return stock as an associative array
            return [
                "symbol" => $data[0],
                "name" => $data[1],
                "price" => floatval($data[2])
            ];
        }
    }

//Legacy Code, Non-used 
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
    
?>