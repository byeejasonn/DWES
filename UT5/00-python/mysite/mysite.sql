CREATE DATABASE mysite;

CREATE USER 'user_mysite'@localhost IDENTIFIED BY '1234';

GRANT ALL PRIVILEGES ON mysite.* TO 'user_mysite'@localhost WITH GRANT OPTION;