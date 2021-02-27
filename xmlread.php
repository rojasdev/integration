<?php
 $domOBJ = new DOMDocument();
 $domOBJ->load("http://localhost/integration/test2.xml");//XML page URL
 $content = $domOBJ->getElementsByTagName("record");
?>
<!DOCTYPE html>
<html>
<head>
<style>

ul {
  background: #3399ff;
  list-style-type: none;
}

ul li {
  background: #cce5ff;
  margin: 2px;
}
 </style>
 </head>
 <body>
 <ul>
    <?php
 foreach( $content as $data )
 {
   $id = $data->getElementsByTagName("id")->item(0)->nodeValue;
   $firstname = $data->getElementsByTagName("firstname")->item(0)->nodeValue;
   $lastname = $data->getElementsByTagName("lastname")->item(0)->nodeValue;
  
   echo "<li>$id $lastname, $firstname</li>";
 }
?>
</ul>
</body>
</html>