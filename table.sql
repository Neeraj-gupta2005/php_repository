-- to create table which stores user registration details

CREATE TABLE register (
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(120),
    uploads INT(11) DEFAULT 0,
    PRIMARY KEY (id)
);

-- to create table which store the files detail

CREATE TABLE uploaded_files (
    id INT(11) NOT NULL AUTO_INCREMENT,
    filename VARCHAR(255) NOT NULL,
    filesize INT(11) NOT NULL,
    upload_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    user_id INT(11),
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES register(id)
);
