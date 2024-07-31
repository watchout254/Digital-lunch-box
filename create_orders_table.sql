-- Create a database if it doesn't exist
CREATE DATABASE IF NOT EXISTS if0_37012884_orders_db;

-- Switch to the database
USE if0_37012884_orders_db;

-- Create the orders table
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    food VARCHAR(255) NOT NULL,
    drink VARCHAR(255),
    quantity INT NOT NULL,
    delivery TEXT,
    total_amount DECIMAL(10, 2) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample data insertion (optional)
-- INSERT INTO orders (name, phone, food, drink, quantity, delivery, total_amount)
-- VALUES ('John Doe', '1234567890', 'Kienyeji + Fish wet fry with cornmeal/rice', 'Lemonade', 2, 'Deliver to office', 1000.00);
