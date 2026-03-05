<?php
$host = "sql100.infinityfree.com" ; 
$username = "if0_38953554";         
$password = "laQMnD7IIr6hK";    
$dbname = "if0_38953554_portfolio_db";       
$conn = new mysqli($host, $username, $password, $dbname);

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM messages WHERE id=$id")->fetch_assoc();

if ($_POST) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $stmt = $conn->prepare("UPDATE messages SET name = ?, email = ?, message = ? WHERE id = ?");
  $stmt->bind_param("sssi", $name, $email, $message, $id);
  $stmt->execute();

  header("Location: admin_messages.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Message</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #0d0d0d;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #eae6f9;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .edit-card {
      background-color: #1a1a1a;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
      padding: 3rem;
      max-width: 600px;
      width: 100%;
      border: 2px solid #bb86fc;
    }

    h2 {
      color: #bb86fc;
      margin-bottom: 1.5rem;
      font-weight: 600;
      text-align: center;
    }

    .form-control {
      background-color: #2c2c2c;
      color: #f1f1f1;
      border-radius: 10px;
      border: 1px solid #5a2a7c;
      font-size: 1rem;
      padding: 0.75rem 1rem;
      margin-bottom: 1.2rem;
    }

    .form-control::placeholder {
      color: #aaa;
    }

    .form-control:focus {
      background-color: #2c2c2c;
      color: #fff;
      border-color: #c77dff;
      box-shadow: 0 0 0 0.2rem rgba(199, 125, 255, 0.3);
    }

    .btn-update {
      background: linear-gradient(135deg, #b266ff, #5a2a7c);
      border: none;
      padding: 12px 22px;
      border-radius: 10px;
      color: #ffffff;
      font-weight: 500;
      width: 100%;
      transition: all 0.3s ease;
    }

    .btn-update:hover {
      background: linear-gradient(135deg, #a04de3, #3e1c58);
      transform: scale(1.02);
    }
  </style>
</head>

<body>
  <div class="edit-card">
    <h2>Edit Message</h2>
    <form method="post">
      <input type="text" name="name" class="form-control" placeholder="Full Name" value="<?= htmlspecialchars($data['name']) ?>" required />
      <input type="email" name="email" class="form-control" placeholder="Email" value="<?= htmlspecialchars($data['email']) ?>" required />
      <textarea name="message" rows="6" class="form-control" placeholder="Message" required><?= htmlspecialchars($data['message']) ?></textarea>
      <button type="submit" class="btn-update">Update Message</button>
    </form>
  </div>
</body>
</html>