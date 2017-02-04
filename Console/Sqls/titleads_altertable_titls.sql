ALTER TABLE `titles`
	ADD `official_url_sp` VARCHAR(255) NULL DEFAULT NULL COMMENT '公式SPサイトURL' AFTER `official_url`,
	ADD `appdl_app_store` VARCHAR(255) NULL DEFAULT NULL COMMENT 'アプリDL App Store' AFTER `official_url_sp`,
	ADD `appdl_google_play` VARCHAR(255) NULL DEFAULT NULL COMMENT 'アプリDL Google Play' AFTER `appdl_app_store`;