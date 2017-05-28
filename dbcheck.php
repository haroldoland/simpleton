<?php
// Azure MySQl In App Connectivity Test

$AzureConnString = $_SERVER['MYSQLCONNSTR_localdb'];
$AzureConnStringPieces = explode(";", $AzureConnString);
foreach ($AzureConnStringPieces as $piece) {
    //Parse each piece of the string creating $Data_Source (Server:Port), $User_Id (Username), $Password, $Database (DBName)
    //IE. Data Source=127.0.0.1:45678 --> $Data_Source = "127.0.0.1:45678"
    parse_str($piece);
}

// Separate host from port in Data_Source
$source = explode(":", $Data_Source);
$Host = $source[0];
$Port = $source[1];

// Create connection
$link = new mysqli($Host, $User_Id, $Password, $Database, $Port);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . $clink->connect_error . PHP_EOL;
    echo "Debugging error: " . $clink->connect_error . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . $link->host_info . PHP_EOL;

$link->close();

?>
