drop table users;

create table users (
    id int auto_increment primary key,
    user varchar(20) unique,
    email varchar(30) unique,
    passwd varchar(70)
);

drop table themes;

create table themes (
    id int auto_increment primary key,
    title varchar(30),
    body varchar(255),
    userid int,
    publishDate date,
    foreign key (userid) references users(id)
)

-- passwd 12345678
insert into users (user, email, passwd) values ('prueba', 'prueba@prueba.com', '$2y$10$8Vg3DPrIAbyMOkORiR9V8.Xd85d63JfggkQliuQQAgM9hH.9VBwrW');

insert into themes (title, body, userid, publishDate) values ('prueba', 'prueba', 1, now())