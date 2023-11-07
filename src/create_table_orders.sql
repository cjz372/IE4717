CREATE TABLE orders (
  ID INT PRIMARY KEY AUTO_INCREMENT,
  order_date DATE,
  Order_ID INT,
  email VARCHAR(255),
  item INT,
  quantity INT,
  item_price DECIMAL(5,2)
);