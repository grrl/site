

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "game";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//else
//  echo "connected";

//SELECT * FROM Customers
//WHERE Country='Mexico';


$sql = "SELECT " . $card1 . ", " . $card2 . ", " . $card3 . ", " . $card4 . ", " . $card5 ." FROM session WHERE id=" . $my_id;
//echo $sql;
$result = mysqli_query($conn, $sql);