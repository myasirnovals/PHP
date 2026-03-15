show databases;

use unjani;

create table tamu
(
    idtamu int auto_increment,
    nmtamu varchar(35) not null,
    email  varchar(40) not null,
    primary key (idtamu),
    unique key (email)
) engine = innodb;

desc tamu;

select * from tamu;