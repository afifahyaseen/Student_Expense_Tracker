<?php
include 'includes/db_connect.php';
include 'includes/header.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM expenses WHERE id = ?");
$stmt->execute([$id]);
$expense = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $category = $_POST['category'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    $stmt = $pdo->prepare("UPDATE expenses SET student_id = ?, category = ?, amount = ?, description = ?, date = ? WHERE id = ?");
    $stmt->execute([$student_id, $category, $amount, $description, $date, $id]);
    echo '<div class="alert alert-success">Expense updated successfully!</div>';
}
?>

<div class="card p-4">
    <h2>Edit Expense</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="student_id" class="form-label">Student ID</label>
            <input type="text" class="form-control" id="student_id" name="student_id" value="<?php echo htmlspecialchars($expense['student_id']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="category" required>
                <option value="Food" <?php if ($expense['category'] == 'Food') echo 'selected'; ?>>Food</option>
                <option value="Transport" <?php if ($expense['category'] == 'Transport') echo 'selected'; ?>>Transport</option>
                <option value="Books" <?php if ($expense['category'] == 'Books') echo 'selected'; ?>>Books</option>
                <option value="Entertainment" <?php if ($expense['category'] == 'Entertainment') echo 'selected'; ?>>Entertainment</option>
                <option value="Other" <?php if ($expense['category'] == 'Other') echo 'selected'; ?>>Other</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="<?php echo $expense['amount']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"><?php echo htmlspecialchars($expense['description'] ?? ''); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="<?php echo $expense['date']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Expense</button>
    </form>
</div>
<?php include 'includes/footer.php'; ?>