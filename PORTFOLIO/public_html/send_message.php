<?php
$host = "sql100.infinityfree.com" ; 
$username = "if0_38953554";         
$password = "laQMnD7IIr6hK";    
$dbname = "if0_38953554_portfolio_db";       
$conn = new mysqli($host, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Message Sent</title>
  <style>
    body {
      background-color: #121212;
      font-family: 'Work Sans', sans-serif;
      color: #e0e0e0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      padding: 0;
    }

    .message-card {
      background-color: #1e1e1e;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
      padding: 2rem 3rem;
      text-align: center;
      max-width: 500px;
      border: 2px solid #bb86fc;
    }

    .message-title {
      color: #bb86fc;
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 1rem;
    }

    .message-text {
      font-size: 1rem;
      color: #ccc;
      margin-bottom: 2rem;
    }

    .btn-back {
      background: linear-gradient(135deg, #e06deb, #65187a);
      border: none;
      padding: 10px 20px;
      border-radius: 6px;
      color: #ffffff;
      font-weight: bold;
      text-decoration: none;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-back:hover {
      background: linear-gradient(135deg, #b759bf, #4f1160);
      transform: scale(1.05);
    }
  </style>
</head>
<body>
  <div class="message-card">
    <div class="message-title">✅ Message Sent!</div>
    <div class="message-text">
      Thank you, <?php echo htmlspecialchars($name); ?>. Your message has been successfully sent.
    </div>
    <a href="contact.html" class="btn-back">Back to Contact</a>
  </div>
</body>
</html>