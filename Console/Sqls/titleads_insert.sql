INSERT INTO `titleads`(`title_id`) SELECT `id` FROM `titles`;

UPDATE
	`titleads`, `titles`
SET
	`titleads`.`pc_text_src` = `titles`.`ad_text`,
	`titleads`.`pc_image_src` = `titles`.`ad_banner_l`,
	`titleads`.`pc_noredirect` = 1
WHERE
	`titleads`.`title_id` = `titles`.`id`
	AND
	`titles`.`ad_use` = 1;