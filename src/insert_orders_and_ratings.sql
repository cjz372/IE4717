use penta;

INSERT INTO orders (order_date, Order_ID, email, item, quantity, item_price) VALUES
('2021-01-01', 1, 'f32ee@localhost', 5, 3, 2.99),
('2021-01-02', 2, 'f33ee@localhost', 11, 1, 3.99),
('2021-01-03', 3, 'f32ee@localhost', 3, 2, 8.99),
('2021-01-04', 4, 'f33ee@localhost', 14, 4, 11.99),
('2021-01-05', 5, 'f32ee@localhost', 8, 5, 2.49),
('2021-01-06', 6, 'f33ee@localhost', 2, 3, 12.99),
('2021-01-07', 7, 'f32ee@localhost', 7, 1, 3.49),
('2021-01-08', 8, 'f33ee@localhost', 12, 2, 2.99),
('2021-01-09', 9, 'f32ee@localhost', 4, 4, 4.99),
('2021-01-10', 10, 'f33ee@localhost', 10, 5, 4.49);

INSERT INTO rating (item_id, item_rating) VALUES
(1, 5),
(2, 5),
(3, 5),
(4, 5),
(5, 5),
(6, 5),
(7, 5),
(8, 5),
(9, 5),
(10, 5),
(11, 5),
(12, 5),
(13, 5),
(14, 5);