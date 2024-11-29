btth1CREATE DATABASE BTTH1

CREATE TABLE Flower(
	Id INT AUTO_INCREMENT PRIMARY KEY,
	FlowerName NVARCHAR(100),
	Info TEXT,
	Image NVARCHAR(1000)
)

INSERT INTO Flower (FlowerName, Info, image) 
VALUES 
('Hoa dạ yến thảo', 'Dạ yến thảo là lựa chọn thích hợp...', 'images/dayenthao.png'),
('Hoa đồng tiền', 'Hoa đồng tiền thích hợp để trồng...', 'images/dongtien.png'),
('Hoa giấy', 'Hoa giấy có mặt ở hầu khắp mọi nơi...', 'images/hoagiay.png');

SELECT * FROM Flower

DROP DATABASE BTTH1