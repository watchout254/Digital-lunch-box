CREATE DATABASE IF NOT EXISTS if0_37012884_orders_db;
USE if0_37012884_orders_db;

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
    food_item VARCHAR(255),
    drink_item VARCHAR(255),
    food_quantity INT DEFAULT 0,
    drink_quantity INT DEFAULT 0,
    FOREIGN KEY (order_id) REFERENCES orders(id)
);

-- Insert example data
INSERT INTO orders (name, phone, delivery, total_amount) VALUES ('Example Name', '1234567890', 'Example Address', 100.00);
INSERT INTO order_items (order_id, food_item, drink_item, food_quantity, drink_quantity) VALUES (1, 'Example Food', NULL, 1, 0);
INSERT INTO order_items (order_id, food_item, drink_item, food_quantity, drink_quantity) VALUES (1, NULL, 'Example Drink', 0, 1);
