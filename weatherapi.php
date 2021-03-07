<?php
// Define recursive function to extract nested values
function printValues($arr) {
    global $count;
    global $values;
    
    // Check input is an array
    if(!is_array($arr)){
        die("ERROR: Input is not an array");
    }
    
    /*
    Loop through array, if value is itself an array recursively call the
    function else add the value found to the output items array,
    and increment counter by 1 for each value found
    */
    foreach($arr as $key=>$value){
        if(is_array($value)){
            printValues($value);
        } else{
            $values[] = $value;
            $count++;
        }
    }
    
    // Return total count and values found in array
    return array('total' => $count, 'values' => $values);
}
 
// Assign JSON encoded string to a PHP variable
$json = $jsonapi = file_get_contents('http://api.weatherapi.com/v1/current.json?key=YOURAPIKEYHERE&q=London&aqi=no');
// Decode JSON data into PHP associative array format
$arr = json_decode($json, true);
 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Weather API</title>
        <style>
        body {
            font: 600 14px/24px "Open Sans", 
               "HelveticaNeue-Light", 
               "Helvetica Neue Light", 
               "Helvetica Neue", 
               Helvetica, Arial, 
               "Lucida Grande", 
               Sans-Serif;
         }
         h1 {
            color: #312f2f;
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 4px;
            margin-left: 10px;
         }
         h2 {
            color: #312f2f;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 4px;
            margin-left: 10px;
         }
         h3 {
            color: #312f2f;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 4px;
            margin-left: 10px;
         }
         .container:before, .container:after {
            content: "";
            display: table;
         }
         .container:after {
            clear: both;
         }
         .container {
            background: #eaeaed;
            margin-bottom: 24px;
            *zoom: 1;
         }
         .container-75 {
            width: 75%;
         }
         .container-50 {
            margin-bottom: 0;
            width: 50%;
         }
         .container, section, aside {
            border-radius: 6px;
         }
         section, aside {
            background: #b3cde0;
            color: #000;
            margin: 1.858736059%;
            padding: 10px 10px;
            text-align: left;
         }
         section {
            float: left;
            width: 30%;
         }
         aside {
            float: right;
            width: 29.3680297%;
            border: 1px solid #cad7e3;
         }
        </style>
    </head>
    <body>
    <h1>Weather Today</h1>
        <div class="container">
           <section>
           <aside>
            <img src="<?php echo $arr["current"]["condition"]["icon"];?>"/>
            <?php echo "<h3>" . $arr["current"]["condition"]["text"] . "</h3>"; ?>
             </aside>
            <?php
            // Print a single value
            echo "<h1>" . $arr["location"]["name"] . "</h1>";  
            echo "<h2>" . $arr["location"]["country"] . "</h2>";  
            echo "<h3>" . $arr["current"]["temp_c"] . "°C</h3>"; 
            ?>
            </section>  
        </div>
    </body>
</html>
