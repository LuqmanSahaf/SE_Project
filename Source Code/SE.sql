drop table "USERS";


create table "USERS"(
id integer,
username varchar(50),
primary key (username),
password varchar(50),
name varchar(50),
gender varchar(1),
type varchar(20),
cell varchar(11),
email varchar(50)
);

insert into USERS (id,username,password,name,gender,type,cell,email) values (users_sequence.nextval,'14100180','14100180','Luqman Ghani','m','student','03214601168','14100180@lums.edu.pk');
insert into USERS (id,username,password,name,gender,type,cell,email) values (users_sequence.nextval,'14100128','14100128','Muhammad Wajahat','m','student','03214549988','14100128@lums.edu.pk');
insert into USERS (id,username,password,name,gender,type,cell,email) values (users_sequence.nextval,'14100222','14100222','Usman Zaheer','m','student','03024075750','14100222@lums.edu.pk');
insert into USERS (id,username,password,name,gender,type,cell,email) values (users_sequence.nextval,'14100059','14100059','Hasan Abbas','m','student','03455158992','14100059@lums.edu.pk');
insert into USERS (id,username,password,name,gender,type,cell,email) values (users_sequence.nextval,'14100012','14100059','Abuzar Mir','m','student','03455158992','14100012@lums.edu.pk');

create table lifts(
  lift_id integer,
  liftprovider  integer,
  primary key(lift_id),
  source varchar(200),
  destination varchar(200),
  bothway int,
  startdate varchar(11),
  enddate varchar(11),
  starttime varchar(6),
  endtime varchar(6),
  mon int,
  tue int,
  wed int,
  thu int,
  fri int,
  sat int,
  sun int,
  gender varchar(2),
  group_ varchar(2),
  school varchar(10),
  paid int,
  vehicle varchar(10),
  freeseats integer
);




commit;

select * from users;


select * from USERS where username = '14100180' and password = '14100180';

select NAME,EMAIL FROM USERS where USERNAME = '14100180' and PASSWORD = '14100180';


Create Sequence session_sequence
start with 0
increment by 1
minvalue 0;

Create Sequence users_sequence
start with 0
increment by 1
minvalue 0;

Drop Sequence session_sequence;
Drop Sequence users_sequence;
