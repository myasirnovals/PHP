show databases;

create database unjani;

use unjani;

create table mahasiswa
(
    nim   char(10),
    nama  varchar(50) not null,
    email varchar(50) not null,
    primary key (nim)
) engine = innoDB;

desc mahasiswa;

select * from mahasiswa;