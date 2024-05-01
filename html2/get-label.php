<?php
// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Connect to database
  $conn = mysqli_connect('localhost','root','','sppd');
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Get label values from request
  $labels = json_decode(file_get_contents('php://input'), true);

  // Insert labels into database
  foreach ($labels as $label) {
    $sql = "INSERT INTO kwitansi (keterangantiket) VALUES ('$label')";
    if (!mysqli_query($conn, $sql)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }

  // Close database connection
  mysqli_close($conn);

  // Send success response
  echo 'Berhasil menyimpan data.';
}
else {
  // Handle GET request
  // Connect to database
  $conn = mysqli_connect("localhost", 'localhost','root','','sppd');
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Query database to get labels
  $result = mysqli_query($conn, "SELECT * FROM kwitansi");

  // Initialize array to store label values
  $labels = [];

  // Loop through all labels
  while ($row = mysqli_fetch_array($result)) {
    $labels[] = $row['keterangantiket'];
  }

  // Close database connection
  mysqli_close($conn);

  // Send label values as response
  echo implode(',', $labels);
}
?>