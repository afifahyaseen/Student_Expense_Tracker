<?php
include 'includes/db_connect.php';
include 'includes/header.php';

$stmt = $pdo->query("SELECT * FROM expenses ORDER BY date DESC");
$expenses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="card p-4">
    <h2>Expense List</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student ID</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($expenses as $expense): ?>
                <tr>
                    <td><?php echo $expense['id']; ?></td>
                    <td><?php echo htmlspecialchars($expense['student_id']); ?></td>
                    <td><?php echo htmlspecialchars($expense['category']); ?></td>
                    <td><?php echo number_format($expense['amount'], 2); ?></td>
                    <td><?php echo htmlspecialchars($expense['description'] ?? ''); ?></td>
                    <td><?php echo $expense['date']; ?></td>
                    <td>
                        <a href="edit_expense.php?id=<?php echo $expense['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="delete_expense.php?id=<?php echo $expense['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php 