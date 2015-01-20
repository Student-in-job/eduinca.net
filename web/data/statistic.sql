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