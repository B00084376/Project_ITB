/*
B00084376
If database needs to be imported delete this comment then use this file.
 */

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`product_code`)
) AUTO_INCREMENT=1 ;

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `price`) VALUES
(1, 'CD1001', 'Adele - 25', 'Click below if you want to purchase this CD.', 'Adele 25.jpg', 5.00),
(2, 'CD1002', 'Fifth Harmony - 7/27', 'Click below if you want to purchase this CD.', '7 27 Fifth Harmony.jpg', 4.00),
(3, 'CD1003', 'Little Mix - Get Weird', 'Click below if you want to purchase this CD.', 'Little Mix Get Weird.jpg', 4.50),
(4, 'CD1004', 'Sia - This is Acting', 'Click below if you want to purchase this CD.', 'Sia This is Acting.jpg', 6.00),
(5, 'CD1005', 'Babymetal - Babymetal', 'Click below if you want to purchase this CD.', 'BabyMetal.jpg', 5.50),
(6, 'CD1006', 'Janet Jackson - Unbreakable', 'Click below if you want to purchase this CD.', 'Unbreakable Janet Jackson.jpg', 6.50),
(7, 'CD1007', 'Pet Shop Boys - Super', 'Click below if you want to purchase this CD.', 'Pet Shop Boys Super.jpg', 4.50),
(8, 'CD1008', 'Zayne - Mind of Mine', 'Click below if you want to purchase this CD.', 'Zayne Mind of Mine', 6.00),
(9, 'IN1001', 'SubZero Portland 22 Electric Guitar', 'Click below if you want to purchase this Electric Guitar.', 'SubZero Portland 22 Electric Guitar.jpg', 140.00),
(10, 'IN1002', 'Dreadnought 12 String Acoustic Guitar', 'Click below if you want to purchase this Acoustic Guitar.', 'Dreadnought 12 String Acoustic Guitar.jpg', 80.00),
(11, 'IN1003', 'Yamaha DTX522K Electronic Drum Kit', 'Click below if you want to purchase this Electronic Drum Kit.', 'Yamaha DTX522K Electronic Drum Kit.jpg', 980.00),
(12, 'IN1004', 'GD-2 Drum Kit', 'Click below if you want to purchase this Drum Kit.', 'GD-2 Drum Kit.jpg', 300.00),
(13, 'IN1005', 'SubZero SZC-400 Condenser Microphone Studio Pack', 'Click below if you want to purchase this Microphone.', 'SubZero SZC-400 Condenser Microphone Studio Pack.jpg', 90.00),
(14, 'IN1006', 'MK-6000 Keyboard', 'Click below if you want to purchase this Keyboard.', 'MK-6000 Keyboard.jpg', 150.00),
(15, 'IN1007', 'Casio Celviano AP-250 Digital Piano', 'Click below if you want to purchase this Piano.', 'Casio Celviano AP-250 Digital Piano.jpg', 600.00);
