CREATE DATABASE IF NOT EXISTS if0_37112273_lunchbox;
USE if0_37112273_lunchbox;

CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    delivery VARCHAR(255),
    total_amount DECIMAL(10, 2) NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    food_item VARCHAR(255) NULL,
    drink_item VARCHAR(255) NULL,
    food_quantity INT DEFAULT 0,
    drink_quantity INT DEFAULT 0,
    FOREIGN KEY (order_id) REFERENCES orders(id)
);

-- Insert example data
INSERT INTO orders (name, phone, delivery, total_amount) VALUES ('Example Name', '1234567890', 'Example Address', 100.00);
INSERT INTO order_items (order_id, food_item, drink_item, food_quantity, drink_quantity) VALUES (1, 'Example Food', NULL, 1, 0);
INSERT INTO order_items (order_id, food_item, drink_item, food_quantity, drink_quantity) VALUES (1, NULL, 'Example Drink', 0, 1);




--CREATE TABLE IF NOT EXISTS users (
    --id INT AUTO_INCREMENT PRIMARY KEY,
   -- username VARCHAR(50) NOT NULL UNIQUE,
   -- password VARCHAR(255) NOT NULL,
   -- created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
--);

-- Insert example data (optional)
--INSERT INTO users (username, password) VALUES
--('exampleUser', 'examplePass123'),
--('sampleUser', 'samplePass456');