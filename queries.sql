CREATE TABLE post (
    id int NOT NULL AUTO_INCREMENT,
    title varchar(3000) NOT NULL,
    category varchar(100),
    picture varchar(100),
    description carchar(30000),
    PRIMARY KEY (id)
);