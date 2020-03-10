SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `account` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `account` (`username`, `password`, `email`) VALUES
('imaduddin1906', '123456', 'fadhil.7e@gmail.com'),
('test123', '123456', 'test123@gmail.com');


CREATE TABLE `photo` (
  `username` varchar(50) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `jml_like` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `photo` (`username`, `url`, `caption`, `jml_like`) VALUES
('imaduddin1906', 'https://kickstart.bikeexif.com/wp-content/uploads/2019/08/vintage-cafe-racers.jpg', 'cafe racer', 231),
('imaduddin1906', 'https://autowise.com/wp-content/uploads/2018/02/Scrambler-Motorcycle-Bonneville-Custom.jpg', 'scrambler', 350),
('test123', 'https://d2pa5gi5n2e1an.cloudfront.net/global/images/product/motorcycle/Yamaha_V75/Yamaha_V75_L_1.jpg', 'v75', 167),
('imaduddin1906', 'https://asset.kompas.com/crops/S6QulPn6bHxps5XgF4sn02B3NqI=/0x0:900x600/750x500/data/photo/2018/04/13/4184807813.jpg', 'thrive', 325);


CREATE TABLE `profile` (
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `website` varchar(100) NOT NULL,
  `bio` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `profile` (`name`, `username`, `website`, `bio`, `email`, `phone_number`, `gender`) VALUES
('Imaduddin Muhammad Fadhil', 'imaduddin1906', 'https://github.com/Imaduddin1906', 'suka motor doang', 'fadhil.7e@gmail.com', '081223201338', 'Male');

INSERT INTO `profile` (`name`, `username`, `website`, `bio`, `email`, `phone_number`, `gender`, `profile_photo`) VALUES
('akun test', 'test123', 'https://github.com/test123', 'akun test', 'test123@gmail.com', '08123456789', 'Male', 'https://scontent-sin6-1.xx.fbcdn.net/v/t1.0-1/p240x240/76675734_2796958343657118_6707593152221413376_n.jpg?_nc_cat=103&_nc_sid=dbb9e7&_nc_oc=AQm0gKExQdXaE5ve7crQ8_LKOHhwsvMf_HzJz6P8VYN-GSnJGGSa0uXXE8a_RBc6aOM&_nc_ht=scontent-sin6-1.xx&_nc_tp=6&oh=eff0a5f6ea03546c587c3c7d25560fa9&oe=5EA5CB38');

ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

ALTER TABLE `photo`
  ADD KEY `FK_uname` (`username`);

ALTER TABLE `profile`
  ADD KEY `FK_username` (`username`);

ALTER TABLE `photo`
  ADD CONSTRAINT `FK_un` FOREIGN KEY (`username`) REFERENCES `account` (`username`);

ALTER TABLE `profile`
  ADD CONSTRAINT `FK_username` FOREIGN KEY (`username`) REFERENCES `account` (`username`);
COMMIT;
