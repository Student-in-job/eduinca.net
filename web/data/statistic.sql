CREATE TABLE tbl_country(
	id_country INTEGER NOT NULL PRIMARY KEY,
    code NVARCHAR(20),
    name NVARCHAR(20)
);

CREATE TABLE tbl_university_type(
	id_university_type INTEGER NOT NULL PRIMARY KEY,
    code NVARCHAR(20),
    name NVARCHAR(100)
);

CREATE TABLE tbl_university(
	id_university INTEGER NOT NULL PRIMARY KEY,
    code NVARCHAR(20),
    name NVARCHAR(20),
    university_type_id INTEGER,
    country_id INTEGER,
    CONSTRAINT fk_university_type FOREIGN KEY (university_type_id) REFERENCES tbl_university_type(id_university_type),
    CONSTRAINT fk_country FOREIGN KEY (country_id) REFERENCES tbl_country(id_country)
);

CREATE TABLE tbl_person_type(
	id_person_type INTEGER NOT NULL PRIMARY KEY,
    code NVARCHAR(20),
    name NVARCHAR(100)
);

CREATE TABLE tbl_involved_person(
	id_involved_person INTEGER NOT NULL PRIMARY KEY,
    code NVARCHAR(20),
    name NVARCHAR(100)
);

CREATE TABLE tbl_answer_teacher(
	id_answer INTEGER NOT NULL PRIMARY KEY,
    code NVARCHAR(20),
    age INTEGER,
    sex INT,
    faculty NVARCHAR(100),
    student_teach INT,
    common_q1 INTEGER default 0,
    common_q2 INTEGER default 0,
    common_q3 INTEGER default 0,
    common_q4 INTEGER default 0,
    common_q5 INTEGER default 0,
    common_q6 INTEGER default 0,
    common_q7 INTEGER default 0,
    common_q8 INTEGER default 0,
    common_q9 INTEGER default 0,
    common_comment NVARCHAR(250),
    methodic_q1 INTEGER default 0,
    methodic_q2 INTEGER default 0,
    methodic_q3 INTEGER default 0,
    methodic_q4 INTEGER default 0,
    methodic_q5 INTEGER default 0,
    methodic_q6 INTEGER default 0,
    methodic_q7 INTEGER default 0,
    methodic_q8 INTEGER default 0,
    methodic_q9 INTEGER default 0,
    methodic_q10 INTEGER default 0,
    methodic_q11 INTEGER default 0,
    methodic_q12 INTEGER default 0,
    methodic_q13 INTEGER default 0,
    methodic_comment NVARCHAR(250),
    labs INT,
    num_labs INTEGER,
    labs_comment VARCHAR(250),
    practice INT,
    practice_place INT,
    practice_duration INTEGER,
    num_of_papers INTEGER,
    num_of_papers_theoretical INTEGER,
    num_of_papers_practical INTEGER,
    private_papers INT,
    private_comments NVARCHAR(250) DEFAULT 'Нет',
    university_id INTEGER,
    person_type_id INTEGER,
    involved_person_id INTEGER,
    CONSTRAINT fk_university FOREIGN KEY (university_id) REFERENCES tbl_university(id_university),
    CONSTRAINT fk_person_type FOREIGN KEY (person_type_id) REFERENCES tbl_person_type(id_person_type),
    CONSTRAINT fk_involved_person FOREIGN KEY (involved_person_id) REFERENCES tbl_involved_person(id_involved_person)
);

INSERT INTO `tbl_involved_person` VALUES(1, '01', 'участвующие в программе');
INSERT INTO `tbl_involved_person` VALUES(2, '02', 'не участвующие в программе');

INSERT INTO `tbl_person_type` VALUES(1, '01', 'преподаватель');
INSERT INTO `tbl_person_type` VALUES(2, '02', 'студент');

INSERT INTO `tbl_university_type` VALUES(1, '01', 'универсистет');
INSERT INTO `tbl_university_type` VALUES(2, '02', 'колледж');

ALTER TABLE tbl_university MODIFY name NVARCHAR(200);
ALTER TABLE tbl_answer_teacher MODIFY id_answer INTEGER NOT NULL AUTO_INCREMENT;

--Second day
ALTER TABLE tbl_answer_teacher ADD year INTEGER;
ALTER TABLE tbl_answer_teacher MODIFY private_papers NVARCHAR(500) DEFAULT 'Нет';

CREATE TABLE tbl_answer_student(
	id_answer INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    code NVARCHAR(20),
    year INTEGER,
    age INTEGER,
    sex INT,
    faculty NVARCHAR(100),
    speciality NVARCHAR(100),
    diploma INT,
    study_from VARCHAR(7),
    study_till VARCHAR(7),
    course INT,
    common_q1 INTEGER default 0,
    common_q2 INTEGER default 0,
    common_q3 INTEGER default 0,
    common_q4 INTEGER default 0,
    common_q5 INTEGER default 0,
    common_q6 INTEGER default 0,
    common_q7 INTEGER default 0,
    common_q8 INTEGER default 0,
    common_q9 INTEGER default 0,
    common_q10 INTEGER default 0,
    common_q11 INTEGER default 0,
    common_comment NVARCHAR(250),
    methodic_q1 INTEGER default 0,
    methodic_q2 INTEGER default 0,
    methodic_q3 INTEGER default 0,
    methodic_q4 INTEGER default 0,
    methodic_q5 INTEGER default 0,
    methodic_q6 INTEGER default 0,
    methodic_q7 INTEGER default 0,
    methodic_q8 INTEGER default 0,
    methodic_q9 INTEGER default 0,
    methodic_q10 INTEGER default 0,
    methodic_q11 INTEGER default 0,
    methodic_q12 INTEGER default 0,
    methodic_q13 INTEGER default 0,
    methodic_q14 INTEGER default 0,
    methodic_qq1 INTEGER,
    methodic_qq2 INTEGER,
    methodic_qq3 INTEGER,
    methodic_qq4 INTEGER,
    methodic_qq5 INTEGER,
    methodic_qq6 INTEGER,
    methodic_qq7 INTEGER,
    methodic_qq8 INTEGER,
    methodic_qq9 INTEGER,
    methodic_qq10 INTEGER,
    methodic_qq11 INTEGER,
    methodic_qq12 INTEGER,
    methodic_qq13 INTEGER,
    methodic_qq14 INTEGER,
    methodic_comment NVARCHAR(250),
    labs INT,
    num_labs INTEGER,
    labs_comment INT,
    practice INT,
    practice_place NVARCHAR(250),
    practice_duration INTEGER,
    practice_comment NVARCHAR (250),
    university_id INTEGER,
    person_type_id INTEGER,
    involved_person_id INTEGER,
    CONSTRAINT fk_university1 FOREIGN KEY (university_id) REFERENCES tbl_university(id_university),
    CONSTRAINT fk_person_type1 FOREIGN KEY (person_type_id) REFERENCES tbl_person_type(id_person_type),
    CONSTRAINT fk_involved_person1 FOREIGN KEY (involved_person_id) REFERENCES tbl_involved_person(id_involved_person)
);

ALTER TABLE tbl_answer_student DROP COLUMN methodic_q14;
ALTER TABLE tbl_answer_student DROP COLUMN methodic_qq14;

DROP TABLE tbl_user;

CREATE TABLE tbl_user(
	id_user INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name NVARCHAR(100),
    age INTEGER,
    email VARCHAR(100),
    role_id INTEGER,
    password VARCHAR(15),
    last_login DATE
);

CREATE TABLE tbl_survey(
	id_survey INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name_ru NVARCHAR(200),
	name_en NVARCHAR(200),
    year INTEGER,
    date_till DATE
);

INSERT INTO tbl_survey VALUES (1, 'Стартовый ввод', 'Start input', 2014, '2015-02-28');

CREATE TABLE tbl_survey_in_university(
	id_survey_in_university INTEGER PRIMARY KEY AUTO_INCREMENT,
    survey_id INTEGER,
    university_id INTEGER,
    user_id INTEGER,
    university_type_id INTEGER,
    teachers_num INTEGER,
    students_num INTEGER,
    involved_teachers INTEGER,
    involved_students INTEGER,
    CONSTRAINT fk_survey FOREIGN KEY (survey_id) REFERENCES tbl_survey(id_survey),
    CONSTRAINT fk_university2 FOREIGN KEY (university_id) REFERENCES tbl_university(id_university),
    CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES tbl_user(id_user),
    CONSTRAINT fk_university_type1 FOREIGN KEY (university_type_id) REFERENCES tbl_university_type(id_university_type)
);

CREATE TABLE tbl_code(
	id_code INTEGER PRIMARY KEY AUTO_INCREMENT,
    code VARCHAR(20),
    completed INT,
    completed_date DATE,
    survey_in_university_id INTEGER,
    CONSTRAINT fk_survey_in_university FOREIGN KEY (survey_in_university_id) REFERENCES tbl_survey_in_university(id_survey_in_university)
);

ALTER TABLE tbl_user ADD COLUMN login VARCHAR(15);

INSERT INTO tbl_user VALUES (1,'Katerina Golubina', null, '', 1, 'katerina', null, 'administrator');

ALTER TABLE tbl_code MODIFY completed INTEGER DEFAULT 0;
ALTER TABLE tbl_code ADD COLUMN person_type_id INTEGER;
ALTER TABLE tbl_code ADD COLUMN person_involved INTEGER;

ALTER TABLE tbl_answer_teacher ADD COLUMN survey_id INTEGER;
ALTER TABLE tbl_answer_student ADD COLUMN survey_id INTEGER;
ALTER TABLE tbl_answer_teacher ADD CONSTRAINT fk_survey4 FOREIGN KEY (survey_id) REFERENCES tbl_survey(id_survey);
ALTER TABLE tbl_answer_student ADD CONSTRAINT fk_survey5 FOREIGN KEY (survey_id) REFERENCES tbl_survey(id_survey);
UPDATE tbl_answer_teacher SET survey_id = 1;
UPDATE tbl_answer_student SET survey_id = 1;

ALTER TABLE tbl_country ADD COLUMN name_en NVARCHAR(20);
ALTER TABLE tbl_country CHANGE COLUMN name name_ru NVARCHAR(20);

ALTER TABLE tbl_university ADD COLUMN name_en NVARCHAR(100);
ALTER TABLE tbl_university CHANGE COLUMN name name_ru NVARCHAR(100);

ALTER TABLE tbl_answer_student ADD COLUMN diploma_aspects INT;
ALTER TABLE tbl_answer_student ADD COLUMN diploma_research INT;
ALTER TABLE tbl_answer_student ADD COLUMN private_comments NVARCHAR(250) DEFAULT 'Нет'

UPDATE tbl_answer_teacher SET common_q1 = 0 where common_q1 is NULL;
UPDATE tbl_answer_teacher SET common_q2 = 0 where common_q2 is NULL;
UPDATE tbl_answer_teacher SET common_q3 = 0 where common_q3 is NULL;
UPDATE tbl_answer_teacher SET common_q4 = 0 where common_q4 is NULL;
UPDATE tbl_answer_teacher SET common_q5 = 0 where common_q5 is NULL;
UPDATE tbl_answer_teacher SET common_q6 = 0 where common_q6 is NULL;
UPDATE tbl_answer_teacher SET common_q7 = 0 where common_q7 is NULL;
UPDATE tbl_answer_teacher SET common_q8 = 0 where common_q8 is NULL;
UPDATE tbl_answer_teacher SET common_q9 = 0 where common_q9 is NULL;

UPDATE tbl_answer_student SET common_q1 = 0 where common_q1 is NULL;
UPDATE tbl_answer_student SET common_q2 = 0 where common_q2 is NULL;
UPDATE tbl_answer_student SET common_q3 = 0 where common_q3 is NULL;
UPDATE tbl_answer_student SET common_q4 = 0 where common_q4 is NULL;
UPDATE tbl_answer_student SET common_q5 = 0 where common_q5 is NULL;
UPDATE tbl_answer_student SET common_q6 = 0 where common_q6 is NULL;
UPDATE tbl_answer_student SET common_q7 = 0 where common_q7 is NULL;
UPDATE tbl_answer_student SET common_q8 = 0 where common_q8 is NULL;
UPDATE tbl_answer_student SET common_q9 = 0 where common_q9 is NULL;
UPDATE tbl_answer_student SET common_q10 = 0 where common_q10 is NULL;
UPDATE tbl_answer_student SET common_q11 = 0 where common_q11 is NULL;

--NEXT updates from 5-05-2015

UPDATE tbl_answer_teacher SET methodic_q1 = 1 where methodic_q1 = 0;
UPDATE tbl_answer_teacher SET methodic_q2 = 1 where methodic_q2 = 0;
UPDATE tbl_answer_teacher SET methodic_q3 = 1 where methodic_q3 = 0;
UPDATE tbl_answer_teacher SET methodic_q4 = 1 where methodic_q4 = 0;
UPDATE tbl_answer_teacher SET methodic_q5 = 1 where methodic_q5 = 0;
UPDATE tbl_answer_teacher SET methodic_q6 = 1 where methodic_q6 = 0;
UPDATE tbl_answer_teacher SET methodic_q7 = 1 where methodic_q7 = 0;
UPDATE tbl_answer_teacher SET methodic_q8 = 1 where methodic_q8 = 0;
UPDATE tbl_answer_teacher SET methodic_q9 = 1 where methodic_q9 = 0;
UPDATE tbl_answer_teacher SET methodic_q10 = 1 where methodic_q10 = 0;
UPDATE tbl_answer_teacher SET methodic_q11 = 1 where methodic_q11 = 0;
UPDATE tbl_answer_teacher SET methodic_q12 = 1 where methodic_q12 = 0;
UPDATE tbl_answer_teacher SET methodic_q13 = 1 where methodic_q13 = 0;

UPDATE tbl_answer_student SET methodic_q1 = 1 where methodic_q1 = 0;
UPDATE tbl_answer_student SET methodic_q2 = 1 where methodic_q2 = 0;
UPDATE tbl_answer_student SET methodic_q3 = 1 where methodic_q3 = 0;
UPDATE tbl_answer_student SET methodic_q4 = 1 where methodic_q4 = 0;
UPDATE tbl_answer_student SET methodic_q5 = 1 where methodic_q5 = 0;
UPDATE tbl_answer_student SET methodic_q6 = 1 where methodic_q6 = 0;
UPDATE tbl_answer_student SET methodic_q7 = 1 where methodic_q7 = 0;
UPDATE tbl_answer_student SET methodic_q8 = 1 where methodic_q8 = 0;
UPDATE tbl_answer_student SET methodic_q9 = 1 where methodic_q9 = 0;
UPDATE tbl_answer_student SET methodic_q10 = 1 where methodic_q10 = 0;
UPDATE tbl_answer_student SET methodic_q11 = 1 where methodic_q11 = 0;
UPDATE tbl_answer_student SET methodic_q12 = 1 where methodic_q12 = 0;
UPDATE tbl_answer_student SET methodic_q13 = 1 where methodic_q13 = 0;

UPDATE tbl_answer_student SET labs_comment=4 WHERE labs_comment is NULL;
UPDATE tbl_answer_teacher SET labs_comment=4 WHERE labs_comment is NULL;

ALTER TABLE tbl_answer_teacher ALTER COLUMN methodic_q1 SET DEFAULT 1;
ALTER TABLE tbl_answer_teacher ALTER COLUMN methodic_q2 SET DEFAULT 1;
ALTER TABLE tbl_answer_teacher ALTER COLUMN methodic_q3 SET DEFAULT 1;
ALTER TABLE tbl_answer_teacher ALTER COLUMN methodic_q4 SET DEFAULT 1;
ALTER TABLE tbl_answer_teacher ALTER COLUMN methodic_q5 SET DEFAULT 1;
ALTER TABLE tbl_answer_teacher ALTER COLUMN methodic_q6 SET DEFAULT 1;
ALTER TABLE tbl_answer_teacher ALTER COLUMN methodic_q7 SET DEFAULT 1;
ALTER TABLE tbl_answer_teacher ALTER COLUMN methodic_q8 SET DEFAULT 1;
ALTER TABLE tbl_answer_teacher ALTER COLUMN methodic_q9 SET DEFAULT 1;
ALTER TABLE tbl_answer_teacher ALTER COLUMN methodic_q10 SET DEFAULT 1;
ALTER TABLE tbl_answer_teacher ALTER COLUMN methodic_q11 SET DEFAULT 1;
ALTER TABLE tbl_answer_teacher ALTER COLUMN methodic_q12 SET DEFAULT 1;
ALTER TABLE tbl_answer_teacher ALTER COLUMN methodic_q13 SET DEFAULT 1;

ALTER TABLE tbl_answer_student ALTER COLUMN methodic_q1 SET DEFAULT 1;
ALTER TABLE tbl_answer_student ALTER COLUMN methodic_q2 SET DEFAULT 1;
ALTER TABLE tbl_answer_student ALTER COLUMN methodic_q3 SET DEFAULT 1;
ALTER TABLE tbl_answer_student ALTER COLUMN methodic_q4 SET DEFAULT 1;
ALTER TABLE tbl_answer_student ALTER COLUMN methodic_q5 SET DEFAULT 1;
ALTER TABLE tbl_answer_student ALTER COLUMN methodic_q6 SET DEFAULT 1;
ALTER TABLE tbl_answer_student ALTER COLUMN methodic_q7 SET DEFAULT 1;
ALTER TABLE tbl_answer_student ALTER COLUMN methodic_q8 SET DEFAULT 1;
ALTER TABLE tbl_answer_student ALTER COLUMN methodic_q9 SET DEFAULT 1;
ALTER TABLE tbl_answer_student ALTER COLUMN methodic_q10 SET DEFAULT 1;
ALTER TABLE tbl_answer_student ALTER COLUMN methodic_q11 SET DEFAULT 1;
ALTER TABLE tbl_answer_student ALTER COLUMN methodic_q12 SET DEFAULT 1;
ALTER TABLE tbl_answer_student ALTER COLUMN methodic_q13 SET DEFAULT 1;

ALTER TABLE tbl_answer_teacher ALTER COLUMN common_q1 SET DEFAULT 0;
ALTER TABLE tbl_answer_teacher ALTER COLUMN common_q2 SET DEFAULT 0;
ALTER TABLE tbl_answer_teacher ALTER COLUMN common_q3 SET DEFAULT 0;
ALTER TABLE tbl_answer_teacher ALTER COLUMN common_q4 SET DEFAULT 0;
ALTER TABLE tbl_answer_teacher ALTER COLUMN common_q5 SET DEFAULT 0;
ALTER TABLE tbl_answer_teacher ALTER COLUMN common_q6 SET DEFAULT 0;
ALTER TABLE tbl_answer_teacher ALTER COLUMN common_q7 SET DEFAULT 0;
ALTER TABLE tbl_answer_teacher ALTER COLUMN common_q8 SET DEFAULT 0;
ALTER TABLE tbl_answer_teacher ALTER COLUMN common_q9 SET DEFAULT 0;

ALTER TABLE tbl_answer_student ALTER COLUMN common_q1 SET DEFAULT 0;
ALTER TABLE tbl_answer_student ALTER COLUMN common_q2 SET DEFAULT 0;
ALTER TABLE tbl_answer_student ALTER COLUMN common_q3 SET DEFAULT 0;
ALTER TABLE tbl_answer_student ALTER COLUMN common_q4 SET DEFAULT 0;
ALTER TABLE tbl_answer_student ALTER COLUMN common_q5 SET DEFAULT 0;
ALTER TABLE tbl_answer_student ALTER COLUMN common_q6 SET DEFAULT 0;
ALTER TABLE tbl_answer_student ALTER COLUMN common_q7 SET DEFAULT 0;
ALTER TABLE tbl_answer_student ALTER COLUMN common_q8 SET DEFAULT 0;
ALTER TABLE tbl_answer_student ALTER COLUMN common_q9 SET DEFAULT 0;

CREATE TABLE tbl_reports(
	id_report INTEGER PRIMARY KEY AUTO_INCREMENT,
    name NVARCHAR(200),
    created_date DATE,
    year INTEGER,
    countries VARCHAR(200),
	chapter2 VARCHAR(500),
    chapter3 VARCHAR(200)
);