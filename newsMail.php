<?php
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','ausdb');
include('sendMail.php');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

try {
    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the user data from the signup form
        $email = $_POST["email"];
        
        $sql = "INSERT INTO newsletter (email) VALUES (:email)";
        $stmt = $dbh->prepare($sql);
        // Prepare the SQL query
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $lastInsertId = $dbh->lastInsertId();
        // Execute the query
        if ($lastInsertId) {
            $email = urlencode($email);
   
       // Redirect to another PHP file with GET parameters
       header("Location: sendmail?email=$email");
       exit();
        } else {
            echo "Error: Unable to Subscribe Email.";
        }
        
    }
} catch (PDOException $e) {
    // Handle connection errors
    echo "Connection failed: " . $e->getMessage();
}
// First email

?>
