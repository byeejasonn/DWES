drop table users;

create table users (
    id int auto_increment primary key,
    user varchar(20) unique,
    email varchar(30) unique,
    passwd varchar(70)
);

drop table thread;

create table thread (
    id int auto_increment primary key,
    title varchar(30),
    body varchar(255),
    userid int,
    publishDate datetime,
    foreign key (userid) references users(id)
)

drop table replies;

create table replies (
    id int auto_increment primary key,
    threadid int,
    userid int,
    body varchar(255),
    publishDate datetime,
    foreign key (threadid) references thread(id),
    foreign key (userid) references users(id)
)

-- passwd 12345678
insert into users (user, email, passwd) values ('prueba', 'prueba@prueba.com', '$2y$10$8Vg3DPrIAbyMOkORiR9V8.Xd85d63JfggkQliuQQAgM9hH.9VBwrW');

insert into thread (title, body, userid, publishDate) values ('prueba', 'prueba', 1, now())