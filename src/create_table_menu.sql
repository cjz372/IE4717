CREATE TABLE menu (
  item_id INT PRIMARY KEY AUTO_INCREMENT,
  item_image VARCHAR(255),
  item_name VARCHAR(255),
  item_price DECIMAL(5,2),
  item_rating DECIMAL(5,2),
  item_category VARCHAR(255),
  active BOOLEAN
);