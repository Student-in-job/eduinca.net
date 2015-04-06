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
    common_q1 INTEGER,
    common_q2 INTEGER,
    common_q3 INTEGER,
    common_q4 INTEGER,
    common_q5 INTEGER,
    common_q6 INTEGER,
    common_q7 INTEGER,
    common_q8 INTEGER,
    common_q9 INTEGER,
    common_comment NVARCHAR(250),
    methodic_q1 INTEGER,
    methodic_q2 INTEGER,
    methodic_q3 INTEGER,
    methodic_q4 INTEGER,
    methodic_q5 INTEGER,
    methodic_q6 INTEGER,
    methodic_q7 INTEGER,
    methodic_q8 INTEGER,
    methodic_q9 INTEGER,
    methodic_q10 INTEGER,
    methodic_q11 INTEGER,
    methodic_q12 INTEGER,
    methodic_q13 INTEGER,
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

INSERT INTO `tbl_person_type` VALUES(1, '01', 'преподаватели');
INSERT INTO `tbl_person_type` VALUES(2, '02', 'студенты');

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
    common_q1 INTEGER,
    common_q2 INTEGER,
    common_q3 INTEGER,
    common_q4 INTEGER,
    common_q5 INTEGER,
    common_q6 INTEGER,
    common_q7 INTEGER,
    common_q8 INTEGER,
    common_q9 INTEGER,
    common_q10 INTEGER,
    common_q11 INTEGER,
    common_comment NVARCHAR(250),
    methodic_q1 INTEGER,
    methodic_q2 INTEGER,
    methodic_q3 INTEGER,
    methodic_q4 INTEGER,
    methodic_q5 INTEGER,
    methodic_q6 INTEGER,
    methodic_q7 INTEGER,
    methodic_q8 INTEGER,
    methodic_q9 INTEGER,
    methodic_q10 INTEGER,
    methodic_q11 INTEGER,
    methodic_q12 INTEGER,
    methodic_q13 INTEGER,
    methodic_q14 INTEGER,
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
ALTER TABLE tbl_answer_teacher ADD CONSTRAINT fk_survey4 FOREIGN KEY (survey_id) REFERENCES tbl_survey(id_survey);
ALTER TABLE tbl_answer_student ADD COLUMN survey_id INTEGER;
ALTER TABLE tbl_answer_student ADD CONSTRAINT fk_survey5 FOREIGN KEY (survey_id) REFERENCES tbl_survey(id_survey);
UPDATE tbl_answer_teacher SET survey_id = 1;
UPDATE tbl_answer_student SET survey_id = 1;