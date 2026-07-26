<?php
require_once '../config/db.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
  $name=$mysqli->real_escape_string($_POST['name']); $quantity=intval($_POST['quantity']); $category=$mysqli->real_escape_string($_POST['category']);
  $date=date('Y-m-d');
  $stmt=$mysqli->prepare("INSERT INTO inventory (name, quantity, category, date_added) VALUES (?, ?, ?, ?)");
  $stmt->bind_param('siss',$name,$quantity,$category,$date); $stmt->execute();
  header('Location: view_inventory.php'); exit;
}
?>
<?php include '../includes/navbar.php'; ?>
<main class="container">
  <div class="card">
    <h2>Add Inventory Item</h2>
    <form method="post">
      <div class="form-row"><label>Name</label><input name="name" required></div>
      <div class="form-row"><label>Quantity</label><input name="quantity" type="number" value="1" required></div>
      <div class="form-row"><label>Category</label><input name="category"></div>
      <button class="btn" type="submit">Add</button>
      <a class="btn outline" href="view_inventory.php">Cancel</a>
    </form>
  </div>
</main>
