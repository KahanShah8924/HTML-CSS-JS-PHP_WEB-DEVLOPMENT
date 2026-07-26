<?php
require_once '../config/db.php';
if(!isset($_GET['id'])){ header('Location: view_inventory.php'); exit; }
$id=intval($_GET['id']);
if($_SERVER['REQUEST_METHOD']==='POST'){
  $qty=intval($_POST['quantity']);
  $stmt=$mysqli->prepare("UPDATE inventory SET quantity=? WHERE item_id=?"); $stmt->bind_param('ii',$qty,$id); $stmt->execute();
  header('Location: view_inventory.php'); exit;
}
$stmt=$mysqli->prepare("SELECT * FROM inventory WHERE item_id=?"); $stmt->bind_param('i',$id); $stmt->execute(); $row=$stmt->get_result()->fetch_assoc();
?>
<?php include '../includes/navbar.php'; ?>
<main class="container">
  <div class="card">
    <h2>Update Item</h2>
    <form method="post">
      <div class="form-row"><label>Name</label><input value="<?php echo htmlspecialchars($row['name']); ?>" disabled></div>
      <div class="form-row"><label>Quantity</label><input name="quantity" type="number" value="<?php echo $row['quantity']; ?>"></div>
      <button class="btn" type="submit">Update</button>
      <a class="btn outline" href="view_inventory.php">Cancel</a>
    </form>
  </div>
</main>
