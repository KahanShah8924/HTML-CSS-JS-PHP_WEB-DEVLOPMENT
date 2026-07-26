<?php
require_once '../config/db.php';
$res=$mysqli->query("SELECT * FROM inventory ORDER BY item_id DESC");
?>
<?php include '../includes/navbar.php'; ?>
<main class="container">
  <div class="card">
    <h2>Inventory <a class="btn" href="add_item.php" style="float:right">Add Item</a></h2>
    <div class="controls">
      <input class="input" data-search-target="#inv-table" placeholder="Live search inventory...">
      <a class="btn" href="add_item.php">Add Item</a>
    </div>
    <table id="inv-table" class="table">
      <tr><th>ID</th><th>Name</th><th>Quantity</th><th>Category</th><th>Date Added</th><th>Actions</th></tr>
      <?php while($r=$res->fetch_assoc()): ?>
        <tr>
          <td><?php echo $r['item_id']; ?></td>
          <td><?php echo htmlspecialchars($r['name']); ?></td>
          <td><?php echo $r['quantity']; ?></td>
          <td><?php echo htmlspecialchars($r['category']); ?></td>
          <td><?php echo $r['date_added']; ?></td>
          <td class="actions"><a href="update_item.php?id=<?php echo $r['item_id']; ?>">Update</a> <a href="delete_item.php?id=<?php echo $r['item_id']; ?>" data-confirm="Delete this item?">Delete</a></td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
</main>
