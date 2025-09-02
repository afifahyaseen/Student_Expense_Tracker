CREATE DATABASE expense_tracker;
USE expense_tracker;

CREATE TABLE expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(50) NOT NULL,
    category VARCHAR(50) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    description TEXT,
    date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO expenses (student_id, category, amount, description, date) VALUES
('STU001', 'Food', 15.50, 'Lunch at cafeteria', '2025-09-01'),
('STU001', 'Transport', 10.00, 'Bus fare', '2025-09-01');