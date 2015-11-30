CREATE TABLE `session_jour` (
	`id`	INTEGER NOT NULL UNIQUE,
	`session_id`	INTEGER NOT NULL
);
CREATE TABLE `session` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`created_at`	TEXT,
	`updated_at`	TEXT,
	`libelle`	TEXT,
	`nb_jours`	INTEGER,
	`nb_heures`	INTEGER
);
CREATE TABLE `module` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`created_at`	TEXT,
	`updated_at`	TEXT,
	`libelle`	TEXT,
	`nb_heures`	INTEGER,
	`nb_jours`	INTEGER
);
