BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "appendix" (
	"id"	INTEGER NOT NULL,
	"user_id"	INTEGER UNIQUE,
	"modul"	TEXT,
	"start"	TEXT,
	"stmo"	TEXT,
	"year"	INTEGER,
	"final"	TEXT,
	"fnmo"	TEXT,
	"kod"	TEXT,
	"name_spec"	TEXT,
	"akd"	INTEGER,
	"fio"	TEXT,
	"date_birth"	TEXT,
	"fio2"	TEXT,
	"date_birth2"	TEXT,
	"fioRuk"	TEXT,
	"num"	TEXT,
	"fioProfRuk"	TEXT,
	"doljnost"	TEXT,
	"numProfRuk"	TEXT,
	"org"	TEXT,
	"ruk"	TEXT,
	"fioOtv"	TEXT,
	"doljOtv"	TEXT,
	"numberOtv"	TEXT,
	"addres"	TEXT,
	"namePomech"	TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "attest_list" (
	"id"	INTEGER NOT NULL,
	"user_id"	INTEGER UNIQUE,
	"fio"	TEXT,
	"spec"	TEXT,
	"grupa"	TEXT,
	"kurs"	TEXT,
	"obuch"	TEXT,
	"data_start"	TEXT,
	"data2_start"	TEXT,
	"god_start"	INTEGER,
	"data_end"	TEXT,
	"data4_end"	TEXT,
	"god_end"	INTEGER,
	"vid"	TEXT,
	"kod"	TEXT,
	"mesto"	TEXT,
	"adress"	TEXT,
	"ruka"	TEXT,
	"work1"	TEXT,
	"work2"	TEXT,
	"work3"	TEXT,
	"work4"	TEXT,
	"work5"	TEXT,
	"work6"	TEXT,
	"work7"	TEXT,
	"work8"	TEXT,
	"work9"	TEXT,
	"work10"	TEXT,
	"work11"	TEXT,
	"pk1"	TEXT,
	"pk2"	TEXT,
	"pk3"	TEXT,
	"pk4"	TEXT,
	"pk5"	TEXT,
	"pk6"	TEXT,
	"result_pract"	TEXT,
	"data_result"	TEXT,
	"data2_result"	TEXT,
	"god_result"	INTEGER,
	"ok1"	TEXT,
	"ok2"	TEXT,
	"ok3"	TEXT,
	"ok4"	TEXT,
	"ok5"	TEXT,
	"ok6"	TEXT,
	"ok7"	TEXT,
	"ok8"	TEXT,
	"ok9"	TEXT,
	"ok10"	TEXT,
	"ok11"	TEXT,
	"otnoshenie"	TEXT,
	"poryadok"	TEXT,
	"teh_bezop"	TEXT,
	"iniciativa"	TEXT,
	"vzaimootnoshenie"	TEXT,
	"sformirovannost"	TEXT,
	"dopolnitelno"	TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "auth_group" (
	"id"	integer NOT NULL,
	"name"	varchar(150) NOT NULL UNIQUE,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "auth_group_permissions" (
	"id"	integer NOT NULL,
	"group_id"	integer NOT NULL,
	"permission_id"	integer NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT),
	FOREIGN KEY("group_id") REFERENCES "auth_group"("id") DEFERRABLE INITIALLY DEFERRED,
	FOREIGN KEY("permission_id") REFERENCES "auth_permission"("id") DEFERRABLE INITIALLY DEFERRED
);
CREATE TABLE IF NOT EXISTS "auth_permission" (
	"id"	integer NOT NULL,
	"content_type_id"	integer NOT NULL,
	"codename"	varchar(100) NOT NULL,
	"name"	varchar(255) NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT),
	FOREIGN KEY("content_type_id") REFERENCES "django_content_type"("id") DEFERRABLE INITIALLY DEFERRED
);
CREATE TABLE IF NOT EXISTS "auth_user" (
	"id"	integer NOT NULL,
	"password"	varchar(128) NOT NULL,
	"last_login"	datetime,
	"is_superuser"	bool NOT NULL,
	"username"	varchar(150) NOT NULL UNIQUE,
	"last_name"	varchar(150) NOT NULL,
	"email"	varchar(254) NOT NULL,
	"is_staff"	bool NOT NULL,
	"is_active"	bool NOT NULL,
	"date_joined"	datetime NOT NULL,
	"first_name"	varchar(150) NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "auth_user_groups" (
	"id"	integer NOT NULL,
	"user_id"	integer NOT NULL,
	"group_id"	integer NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT),
	FOREIGN KEY("user_id") REFERENCES "auth_user"("id") DEFERRABLE INITIALLY DEFERRED,
	FOREIGN KEY("group_id") REFERENCES "auth_group"("id") DEFERRABLE INITIALLY DEFERRED
);
CREATE TABLE IF NOT EXISTS "auth_user_user_permissions" (
	"id"	integer NOT NULL,
	"user_id"	integer NOT NULL,
	"permission_id"	integer NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT),
	FOREIGN KEY("user_id") REFERENCES "auth_user"("id") DEFERRABLE INITIALLY DEFERRED,
	FOREIGN KEY("permission_id") REFERENCES "auth_permission"("id") DEFERRABLE INITIALLY DEFERRED
);
CREATE TABLE IF NOT EXISTS "contracts" (
	"id"	INTEGER NOT NULL,
	"user_id"	INTEGER UNIQUE,
	"num_dogovor"	TEXT,
	"profORG"	TEXT,
	"ryco"	TEXT,
	"adress"	TEXT,
	"smart"	TEXT,
	"rec"	TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "control_list" (
	"id"	INTEGER NOT NULL,
	"user_id"	INTEGER UNIQUE,
	"gru"	TEXT,
	"code"	TEXT,
	"napra"	TEXT,
	"data"	TEXT,
	"rycSPO"	TEXT,
	"date_check"	TEXT,
	"pred"	TEXT,
	"rycP"	TEXT,
	"fio"	TEXT,
	"fioO"	TEXT,
	"pri"	TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "django_admin_log" (
	"id"	integer NOT NULL,
	"object_id"	text,
	"object_repr"	varchar(200) NOT NULL,
	"action_flag"	smallint unsigned NOT NULL CHECK("action_flag" >= 0),
	"change_message"	text NOT NULL,
	"content_type_id"	integer,
	"user_id"	integer NOT NULL,
	"action_time"	datetime NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT),
	FOREIGN KEY("content_type_id") REFERENCES "django_content_type"("id") DEFERRABLE INITIALLY DEFERRED,
	FOREIGN KEY("user_id") REFERENCES "auth_user"("id") DEFERRABLE INITIALLY DEFERRED
);
CREATE TABLE IF NOT EXISTS "django_content_type" (
	"id"	integer NOT NULL,
	"app_label"	varchar(100) NOT NULL,
	"model"	varchar(100) NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "django_migrations" (
	"id"	integer NOT NULL,
	"app"	varchar(255) NOT NULL,
	"name"	varchar(255) NOT NULL,
	"applied"	datetime NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "django_session" (
	"session_key"	varchar(40) NOT NULL,
	"session_data"	text NOT NULL,
	"expire_date"	datetime NOT NULL,
	PRIMARY KEY("session_key")
);
CREATE TABLE IF NOT EXISTS "doc_work" (
	"id"	INTEGER NOT NULL,
	"user_id"	INTEGER UNIQUE,
	"modul"	TEXT,
	"start"	TEXT,
	"stmo"	TEXT,
	"year"	INTEGER,
	"final"	TEXT,
	"fnmo"	TEXT,
	"kod"	TEXT,
	"name_spec"	TEXT,
	"akd"	INTEGER,
	"fio"	TEXT,
	"date_birth"	TEXT,
	"fio2"	TEXT,
	"date_birth2"	TEXT,
	"fioRuk"	TEXT,
	"num"	TEXT,
	"fioProfRuk"	TEXT,
	"doljnost"	TEXT,
	"numProfRuk"	TEXT,
	"org"	TEXT,
	"ruk"	TEXT,
	"fioOtv"	TEXT,
	"doljOtv"	TEXT,
	"numberOtv"	TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "document" (
	"id"	INTEGER NOT NULL,
	"name"	TEXT NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "students" (
	"id"	INTEGER NOT NULL,
	"user_id"	INTEGER UNIQUE,
	"familia"	TEXT,
	"name"	TEXT,
	"otchestvo"	TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "type_practic" (
	"id"	INTEGER NOT NULL,
	"user_id"	INTEGER UNIQUE,
	"field1"	TEXT,
	PRIMARY KEY("id" AUTOINCREMENT)
);
INSERT INTO "appendix" VALUES (1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'г. Москва, ул. Техническая, д.1','Кабинет №101, Компьютерный класс');
INSERT INTO "appendix" VALUES (2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','');
INSERT INTO "attest_list" VALUES (1,1,'Кунцман Даниил Романович','Информационные системы','ИС-24','2','очная','1','декабря',2025,'23','декабря',2025,'производственная','ПМ.12','ООО "ТехноСервис"','г. Москва, ул. Техническая, д.1','Жирнова Юлия Витальевна',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO "attest_list" VALUES (2,2,'','','','','','','',NULL,'','',NULL,'','','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO "auth_permission" VALUES (1,1,'add_logentry','Can add log entry');
INSERT INTO "auth_permission" VALUES (2,1,'change_logentry','Can change log entry');
INSERT INTO "auth_permission" VALUES (3,1,'delete_logentry','Can delete log entry');
INSERT INTO "auth_permission" VALUES (4,1,'view_logentry','Can view log entry');
INSERT INTO "auth_permission" VALUES (5,2,'add_permission','Can add permission');
INSERT INTO "auth_permission" VALUES (6,2,'change_permission','Can change permission');
INSERT INTO "auth_permission" VALUES (7,2,'delete_permission','Can delete permission');
INSERT INTO "auth_permission" VALUES (8,2,'view_permission','Can view permission');
INSERT INTO "auth_permission" VALUES (9,3,'add_group','Can add group');
INSERT INTO "auth_permission" VALUES (10,3,'change_group','Can change group');
INSERT INTO "auth_permission" VALUES (11,3,'delete_group','Can delete group');
INSERT INTO "auth_permission" VALUES (12,3,'view_group','Can view group');
INSERT INTO "auth_permission" VALUES (13,4,'add_user','Can add user');
INSERT INTO "auth_permission" VALUES (14,4,'change_user','Can change user');
INSERT INTO "auth_permission" VALUES (15,4,'delete_user','Can delete user');
INSERT INTO "auth_permission" VALUES (16,4,'view_user','Can view user');
INSERT INTO "auth_permission" VALUES (17,5,'add_contenttype','Can add content type');
INSERT INTO "auth_permission" VALUES (18,5,'change_contenttype','Can change content type');
INSERT INTO "auth_permission" VALUES (19,5,'delete_contenttype','Can delete content type');
INSERT INTO "auth_permission" VALUES (20,5,'view_contenttype','Can view content type');
INSERT INTO "auth_permission" VALUES (21,6,'add_session','Can add session');
INSERT INTO "auth_permission" VALUES (22,6,'change_session','Can change session');
INSERT INTO "auth_permission" VALUES (23,6,'delete_session','Can delete session');
INSERT INTO "auth_permission" VALUES (24,6,'view_session','Can view session');
INSERT INTO "auth_user" VALUES (1,'pbkdf2_sha256$1000000$wid9JH0W7Umik5b97URIen$i+L55N9XUUcqqQH621rNVT/APuG6KMyT1YHKimC8JGA=',NULL,1,'vdp','','vdp@test.com',1,1,'2026-04-17 06:05:21.695610','');
INSERT INTO "auth_user" VALUES (2,'pbkdf2_sha256$1000000$tDqidgceylcc9U5j7pUaBa$x+i/MlA2qno5VMpbvGOBKNhxJMCAPnESrtK4D+9H5pQ=','2026-04-22 05:33:12.186853',0,'mmo','','',0,1,'2026-04-17 06:07:41.870305','');
INSERT INTO "contracts" VALUES (1,1,'01/2025','ООО "ТехноСервис"','Петров П.П.','г. Москва, ул. Техническая, д.1','8-495-123-45-67','ИНН 1234567890');
INSERT INTO "contracts" VALUES (2,2,'','','','None','','');
INSERT INTO "control_list" VALUES (1,1,'ИС-24','09.02.07','Информационные системы','01.12.2025-23.12.2025','Жирнова Ю.В.','15.12.2025','ООО "ТехноСервис"','Петров П.П.','Кунцман Д.Р., Иванов И.И.','Сидоров С.С.','болезнь');
INSERT INTO "control_list" VALUES (2,2,'','','','','','','','','','','');
INSERT INTO "django_content_type" VALUES (1,'admin','logentry');
INSERT INTO "django_content_type" VALUES (2,'auth','permission');
INSERT INTO "django_content_type" VALUES (3,'auth','group');
INSERT INTO "django_content_type" VALUES (4,'auth','user');
INSERT INTO "django_content_type" VALUES (5,'contenttypes','contenttype');
INSERT INTO "django_content_type" VALUES (6,'sessions','session');
INSERT INTO "django_migrations" VALUES (1,'contenttypes','0001_initial','2026-04-17 06:04:32.662713');
INSERT INTO "django_migrations" VALUES (2,'auth','0001_initial','2026-04-17 06:04:32.680730');
INSERT INTO "django_migrations" VALUES (3,'admin','0001_initial','2026-04-17 06:04:32.687282');
INSERT INTO "django_migrations" VALUES (4,'admin','0002_logentry_remove_auto_add','2026-04-17 06:04:32.694768');
INSERT INTO "django_migrations" VALUES (5,'admin','0003_logentry_add_action_flag_choices','2026-04-17 06:04:32.699716');
INSERT INTO "django_migrations" VALUES (6,'contenttypes','0002_remove_content_type_name','2026-04-17 06:04:32.710567');
INSERT INTO "django_migrations" VALUES (7,'auth','0002_alter_permission_name_max_length','2026-04-17 06:04:32.717057');
INSERT INTO "django_migrations" VALUES (8,'auth','0003_alter_user_email_max_length','2026-04-17 06:04:32.723390');
INSERT INTO "django_migrations" VALUES (9,'auth','0004_alter_user_username_opts','2026-04-17 06:04:32.728683');
INSERT INTO "django_migrations" VALUES (10,'auth','0005_alter_user_last_login_null','2026-04-17 06:04:32.735167');
INSERT INTO "django_migrations" VALUES (11,'auth','0006_require_contenttypes_0002','2026-04-17 06:04:32.736456');
INSERT INTO "django_migrations" VALUES (12,'auth','0007_alter_validators_add_error_messages','2026-04-17 06:04:32.741573');
INSERT INTO "django_migrations" VALUES (13,'auth','0008_alter_user_username_max_length','2026-04-17 06:04:32.749406');
INSERT INTO "django_migrations" VALUES (14,'auth','0009_alter_user_last_name_max_length','2026-04-17 06:04:32.755856');
INSERT INTO "django_migrations" VALUES (15,'auth','0010_alter_group_name_max_length','2026-04-17 06:04:32.762430');
INSERT INTO "django_migrations" VALUES (16,'auth','0011_update_proxy_permissions','2026-04-17 06:04:32.767466');
INSERT INTO "django_migrations" VALUES (17,'auth','0012_alter_user_first_name_max_length','2026-04-17 06:04:32.774125');
INSERT INTO "django_migrations" VALUES (18,'sessions','0001_initial','2026-04-17 06:04:32.777735');
INSERT INTO "django_session" VALUES ('c6prmfllbdisk3eo94rmvf6jhhalpicy','.eJxVjEEOwiAQRe_C2pBhAIsu3fcMZAamUjU0Ke3KeHdD0oVu33v_v1WkfStxb7LGOaurQnX6ZUzpKbWL_KB6X3Ra6rbOrHuiD9v0uGR53Y7276BQK33NGYgHCT4gumzPhAN05py1ACAmTSQTmovz3hN6cQTCgZzlkA2ozxfnoTfS:1wDfLV:QnKSDuJMM6BKOy4zkUqWJukZFig_BydWT7WKw5yE62w','2026-05-01 09:18:41.251593');
INSERT INTO "django_session" VALUES ('nms5xwcg60jmtso5rhrkup7eg8go0ukb','.eJxVjEEOwiAQRe_C2pBhAIsu3fcMZAamUjU0Ke3KeHdD0oVu33v_v1WkfStxb7LGOaurQnX6ZUzpKbWL_KB6X3Ra6rbOrHuiD9v0uGR53Y7276BQK33NGYgHCT4gumzPhAN05py1ACAmTSQTmovz3hN6cQTCgZzlkA2ozxfnoTfS:1wFQD2:RQhOdeTBaFqz6RTIcsjetdavmZcHNK7xV71ygjcJ5rU','2026-05-06 05:33:12.190257');
INSERT INTO "doc_work" VALUES (1,1,'ПМ.12 Выполнение работ по освоению профессии рабочего','1','декабря',2025,'23','декабря','09.02.07','Информационные системы и программирование',108,'Кунцман Даниил Романович','30.01.2008',NULL,NULL,'Жирнова Юлия Витальевна','89150594253','Иванов И.И.','руководитель','8-916-123-45-67','ООО "ТехноСервис"','Петров П.П.','Сидорова А.А.','менеджер','8-495-123-45-67');
INSERT INTO "doc_work" VALUES (2,2,'','','',NULL,'','','','',NULL,'','',NULL,NULL,'','','','','','','','','','');
INSERT INTO "document" VALUES (1,'Аттестационный лист');
INSERT INTO "document" VALUES (2,'Договор');
INSERT INTO "document" VALUES (3,'Лист контроля');
INSERT INTO "document" VALUES (4,'Приложение №1');
INSERT INTO "document" VALUES (5,'Приложение №2');
INSERT INTO "students" VALUES (1,1,'Кунцман','Даниил','Романович');
INSERT INTO "students" VALUES (2,2,'jop','jopov','jopnov');
INSERT INTO "type_practic" VALUES (1,1,'производственная');
INSERT INTO "type_practic" VALUES (2,2,'');
CREATE INDEX IF NOT EXISTS "auth_group_permissions_group_id_b120cbf9" ON "auth_group_permissions" (
	"group_id"
);
CREATE UNIQUE INDEX IF NOT EXISTS "auth_group_permissions_group_id_permission_id_0cd325b0_uniq" ON "auth_group_permissions" (
	"group_id",
	"permission_id"
);
CREATE INDEX IF NOT EXISTS "auth_group_permissions_permission_id_84c5c92e" ON "auth_group_permissions" (
	"permission_id"
);
CREATE INDEX IF NOT EXISTS "auth_permission_content_type_id_2f476e4b" ON "auth_permission" (
	"content_type_id"
);
CREATE UNIQUE INDEX IF NOT EXISTS "auth_permission_content_type_id_codename_01ab375a_uniq" ON "auth_permission" (
	"content_type_id",
	"codename"
);
CREATE INDEX IF NOT EXISTS "auth_user_groups_group_id_97559544" ON "auth_user_groups" (
	"group_id"
);
CREATE INDEX IF NOT EXISTS "auth_user_groups_user_id_6a12ed8b" ON "auth_user_groups" (
	"user_id"
);
CREATE UNIQUE INDEX IF NOT EXISTS "auth_user_groups_user_id_group_id_94350c0c_uniq" ON "auth_user_groups" (
	"user_id",
	"group_id"
);
CREATE INDEX IF NOT EXISTS "auth_user_user_permissions_permission_id_1fbb5f2c" ON "auth_user_user_permissions" (
	"permission_id"
);
CREATE INDEX IF NOT EXISTS "auth_user_user_permissions_user_id_a95ead1b" ON "auth_user_user_permissions" (
	"user_id"
);
CREATE UNIQUE INDEX IF NOT EXISTS "auth_user_user_permissions_user_id_permission_id_14a6b632_uniq" ON "auth_user_user_permissions" (
	"user_id",
	"permission_id"
);
CREATE INDEX IF NOT EXISTS "django_admin_log_content_type_id_c4bce8eb" ON "django_admin_log" (
	"content_type_id"
);
CREATE INDEX IF NOT EXISTS "django_admin_log_user_id_c564eba6" ON "django_admin_log" (
	"user_id"
);
CREATE UNIQUE INDEX IF NOT EXISTS "django_content_type_app_label_model_76bd3d3b_uniq" ON "django_content_type" (
	"app_label",
	"model"
);
CREATE INDEX IF NOT EXISTS "django_session_expire_date_a5c62663" ON "django_session" (
	"expire_date"
);
COMMIT;
