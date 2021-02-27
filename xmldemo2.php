<?php
include_once 'db_connection.php';
include_once 'class_records.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$records = new Records($db);
 
// read products will be here
// query products
$stmt = $records->read();
$num = $stmt->rowCount();

 //Creates XML string and XML document using the DOM 
 $dom = new DomDocument('1.0'); 
 
 //add root - <records> 
 $records = $dom->appendChild($dom->createElement('records')); 
 
 // check if more than 0 record found
if($num>0){
 
    // products array
    $products_arr=array();
    $products_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
        //add <record> element to <records> 
        $record = $records->appendChild($dom->createElement('record')); 
        //add <id> element to <record> 
        $sid = $record->appendChild($dom->createElement('id')); 
        //add <firstname> text node element to <record> 
        $sid->appendChild($dom->createTextNode($id)); 

        //add <firstname> element to <record> 
        $sfirstname = $record->appendChild($dom->createElement('firstname')); 
        //add <firstname> text node element to <record> 
        $sfirstname->appendChild($dom->createTextNode($firstname)); 

        //add <firstname> element to <record> 
        $slastname = $record->appendChild($dom->createElement('lastname')); 
        //add <firstname> text node element to <record> 
        $slastname->appendChild($dom->createTextNode($lastname));
       
    }
 
    // set response code - 200 OK
    http_response_code(200);
}else{
 
    // set response code - 404 Not found
    http_response_code(404);
}
 
 //generate xml 
 $dom->formatOutput = true; // set the formatOutput attribute of 
                            // domDocument to true 
 // save XML as string or file 
 $test2 = $dom->saveXML(); // put string in test1 
 
 $dom->save('test2.xml'); // save as file 
 ?>