/* Tablica opisująca zdjęcia (utworzenie) */
CREATE TABLE IF NOT EXISTS `login`.`pictures` (
  `picture_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing picture_id of each picture, unique index',
  `picture_file` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT 'picture''s file name, unique',
  `picture_title` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT 'picture''s title',
  `picture_description` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'picture''s description',
  PRIMARY KEY (`picture_id`),
  UNIQUE KEY `picture_file` (`picture_file`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='picture data';