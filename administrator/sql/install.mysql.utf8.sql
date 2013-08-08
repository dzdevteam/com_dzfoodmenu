CREATE TABLE IF NOT EXISTS `#__dzfoodmenu_dishes` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL DEFAULT '1',
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created` DATETIME NOT NULL ,
`created_by` INT(11)  NOT NULL ,
`title` VARCHAR(255)  NOT NULL ,
`alias` VARCHAR(255)  NOT NULL ,
`catid` INT(11)  NOT NULL ,
`description` TEXT NOT NULL ,
`note` TEXT NOT NULL ,
`prices` TEXT(255)  NOT NULL ,
`saleoff` TEXT NOT NULL ,
`images` TEXT NOT NULL ,
`featured` VARCHAR(255)  NOT NULL ,
`alternative` TEXT NOT NULL ,
`params` TEXT NOT NULL ,
`metakey` TEXT NOT NULL ,
`metadesc` TEXT NOT NULL ,
`metadata` TEXT NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__dzfoodmenu_combos` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL DEFAULT '1',
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`title` VARCHAR(255)  NOT NULL ,
`alias` VARCHAR(255)  NOT NULL ,
`description` TEXT NOT NULL ,
`image` VARCHAR(255)  NOT NULL ,
`total_price` VARCHAR(255)  NOT NULL ,
`combo_price` VARCHAR(255)  NOT NULL ,
`dishes` TEXT NOT NULL ,
`metakey` TEXT NOT NULL ,
`metadesc` TEXT NOT NULL ,
`metadata` TEXT NOT NULL ,
`params` TEXT NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

