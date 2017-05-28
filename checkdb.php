<?php
$AzureConnString = $_SERVER['MYSQLCONNSTR_localdb'];
$AzureConnStringPieces = explode(";", $AzureConnString);
foreach ($AzureConnStringPieces as $piece) {
    //Parse each piece of the string creating $Data_Source (Server:Port), $User_Id (Username), $Password, $Database (DBName)
    //IE. Data Source=127.0.0.1:45678 --> $Data_Source = "127.0.0.1:45678"
    parse_str($piece);
    echo "This: ".$piece."<br>";
    
}
// Create connection
$source = explode(":", $Data_Source);
$Host = $source[0];
$Port = $source[1];
echo "source: ".$source."<br>";
echo "Host: ".$Host."<br>";
echo "Port: ".$Port."<br>";
$conn = new mysqli($Host, $User_Id, $Password, $Database, $Port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connection Successful!<br/>";
}

$conn->close();

?>
