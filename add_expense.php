<?php
     include 'includes/db_connect.php';
     include 'includes/header.php';

     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $student_id = $_POST['student_id'];
         $category = $_POST['category'];
         $amount = $_POST['amount'];
         $description = $_POST['description'];
         $date = $_POST['date'];

         $stmt = $pdo->prepare("INSERT INTO expenses (student_id, category, amount, description, date) VALUES (?, ?, ?, ?, ?)");
         $stmt->execute([$student_id, $category, $amount, $description, $date]);
         echo '<div class="alert alert-success">Expense added successfully!</div>';
     }
     ?>

     <div class="card p-4">
         <h2>Add New Expense</h2>
         <form method="POST">
             <div class="mb-3">
                 <label for="student_id" class="form-label">Student ID</label>
                 <input type="text" class="form-control" id="student_id" name="student_id" required>
             </div>
             <div class="mb-3">
                 <label for="category" class="form-label">Category</label>
                 <select class="form-select" id="category" name="category" required>
                     <option value="Food">Food</option>
                     <option value="Transport">Transport</option>
                     <option value="Books">Books</option>
                     <option value="Entertainment">Entertainment</option>
                     <option value="Other">Other</option>
                 </select>
             </div>
             <div class="mb-3">
                 <label for="amount" class="form-label">Amount</label>
                 <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
             </div>
             <div class="mb-3">
                 <label for="description" class="form-label">Description</label>
                 <textarea class="form-control" id="description" name="description"></textarea>
             </div>
             <div class="mb-3">
                 <label for="date" class="form-label">Date</label>
                 <input type="date" class="form-control" id="date" name="date" required>
             </div>
             <button type="submit" class="btn btn-primary">Add Expense</button>
         </form>
     </div>
     <?php 