<?php
session_start();
include '../config/config.php';

// Allow access for both admin and superadmin
if (!isset($_SESSION['username']) || !in_array($_SESSION['role'], ['admin', 'superadmin'])) {
  // redirect to admin login page
  header("Location: index.php");
    exit();
}

// Update role (only superadmin)
if (isset($_POST['update_role']) && $_SESSION['role'] === 'superadmin') {
    $uid  = intval($_POST['user_id']);
    $role = mysqli_real_escape_string($con, $_POST['role']);

    $update = "UPDATE users SET role='$role' WHERE id=$uid";
    if (!mysqli_query($con, $update)) {
        echo "<p style='color:red'>Error updating role: " . mysqli_error($con) . "</p>";
    } else {
        echo "<script>alert('Role updated successfully!');</script>";
    }
}

// Delete user (only superadmin)
if (isset($_GET['delete']) && $_SESSION['role'] === 'superadmin') {
    $uid = intval($_GET['delete']);
    mysqli_query($con, "DELETE FROM users WHERE id=$uid");
    header("Location: manageusers.php");
    exit();
}

// Fetch users
$query  = "SELECT id, name, email, role FROM users ORDER BY id ASC";
$result = mysqli_query($con, $query);
if (!$result) {
    die("Query Failed: " . mysqli_error($con));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>LuxTime - Manage Users</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include_once('../head.php'); ?>
  <link rel="stylesheet" href="../css/productcrud.css">
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

<div class="dashboard-container">

    <?php include_once('./sidebar.php'); ?>  

    <div class="main-content">

        <section class="product-table-section">
          <div class="container">
            <div class="table-header">
              <h2 class="section-title">Manage Users</h2>
            </div>

           <div class="product-table-scroll">
             <table class="product-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <!-- <th>Actions</th> -->
                </tr>
              </thead>
              <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo htmlspecialchars($row['name']); ?></td>
                  <td><?php echo htmlspecialchars($row['email']); ?></td>
                  <td>
                    <?php if ($_SESSION['role'] === 'superadmin') : ?>
                        <!-- Superadmin: show form to change role -->
                        <form method="post" style="display:flex;gap:6px;">
                          <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                          <select name="role" class="form-select">
                            <option value="admin" <?php if($row['role']=='admin') echo 'selected'; ?>>Admin</option>
                            <option value="user"  <?php if($row['role']=='user')  echo 'selected'; ?>>User</option>
                          </select>
                          <button type="submit" name="update_role" class="btn edit-btn">Update</button>
                        </form>
                    <?php else: ?>
                        <!-- Admin: just display role -->
                        <span><?php echo ucfirst($row['role']); ?></span>
                    <?php endif; ?>
                  </td>
                  <!-- Optional delete button only for superadmin -->
                  <!--
                  <?php if ($_SESSION['role'] === 'superadmin') : ?>
                  <td class="actions">
                    <a href="manageusers.php?delete=<?php echo $row['id']; ?>"
                       class="btn delete-btn"
                       onclick="return confirm('Delete this user?');">
                       <i class="fas fa-trash"></i> Delete
                    </a>
                  </td>
                  <?php endif; ?>
                  -->
                </tr>
                <?php } ?>
              </tbody>
            </table>
           </div>
          </div>
        </section>

    </div>
</div>

<?php include_once('footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
