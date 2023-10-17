
<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pweb_final"; 

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        return("Falha na Conexão: " . mysqli_connect_error());}      
?>