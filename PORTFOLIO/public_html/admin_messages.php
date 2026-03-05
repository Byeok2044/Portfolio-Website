<?php
$host = "sql100.infinityfree.com" ; 
$username = "if0_38953554";         
$password = "laQMnD7IIr6hK";    
$dbname = "if0_38953554_portfolio_db";       
$conn = new mysqli($host, $username, $password, $dbname);
$result = $conn->query("SELECT * FROM messages ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>View Messages</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #0d0d0d; /* Deep black background */
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #f1f1f1;
      margin: 0;
      padding: 40px 20px;
    }

    .container {
      max-width: 1000px;
      margin: auto;
      background-color: #1a1a1a; /* Dark gray card */
      padding: 2rem;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
    }

    h2 {
      color: #a020f0; /* Bright purple header */
      margin-bottom: 1.5rem;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      color: #f1f1f1;
    }

    th, td {
      padding: 0.9rem 1rem;
      border-bottom: 1px solid #333;
      vertical-align: middle;
    }

    th {
      background-color: #2d0030; /* Dark purple header background */
      color: #e0b3ff; /* Light purple text */
      font-weight: 600;
    }

    tr:hover {
      background-color: #2c0033; /* Slightly lighter on hover */
    }

    a {
      color: #c77dff; /* Light purple links */
      text-decoration: none;
      font-weight: 500;
    }

    a:hover {
      color: #e0b3ff; /* Even lighter on hover */
    }

    .actions a {
      margin-right: 10px;
    }

    @media (max-width: 768px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }

      tr {
        margin-bottom: 1rem;
      }

      td {
        padding-left: 50%;
        position: relative;
      }

      td::before {
        content: attr(data-label);
        position: absolute;
        left: 1rem;
        font-weight: bold;
        color: #aaa;
      }

      th {
        display: none;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>📨 Messages</h2>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Message</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
          <tr>
            <td data-label="Name"><?= htmlspecialchars($row['name']) ?></td>
            <td data-label="Email"><?= htmlspecialchars($row['email']) ?></td>
            <td data-label="Message"><?= htmlspecialchars($row['message']) ?></td>
            <td class="actions" data-label="Actions">
              <a href="edit_message.php?id=<?= $row['id'] ?>">Edit</a> |
              <a href="delete_message.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this message?')">Delete</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>