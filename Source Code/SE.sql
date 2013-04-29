drop table "USERS";


create table "USERS"(
id chareger,
username varchar(50),
primary key (username),
password varchar(50),
name varchar(50),
gender varchar(1),
type varchar(20),
cell varchar(11),
email varchar(50)
);

insert charo USERS (id,username,password,name,gender,type,cell,email) values (users_sequence.nextval,'14100180','14100180','Luqman Ghani','m','student','03214601168','14100180@lums.edu.pk');
insert charo USERS (id,username,password,name,gender,type,cell,email) values (users_sequence.nextval,'14100128','14100128','Muhammad Wajahat','m','student','03214549988','14100128@lums.edu.pk');
insert charo USERS (id,username,password,name,gender,type,cell,email) values (users_sequence.nextval,'14100222','14100222','Usman Zaheer','m','student','03024075750','14100222@lums.edu.pk');
insert charo USERS (id,username,password,name,gender,type,cell,email) values (users_sequence.nextval,'14100059','14100059','Hasan Abbas','m','student','03455158992','14100059@lums.edu.pk');
insert charo USERS (id,username,password,name,gender,type,cell,email) values (users_sequence.nextval,'14100012','14100059','Abuzar Mir','m','student','03455158992','14100012@lums.edu.pk');


drop table lifts;

create table lifts(
  lift_id integer,
  liftprovider  integer,
  primary key(lift_id),
  source varchar(200),
  destination varchar(200),
  frequency char,
  way char,
  startdate varchar(11),
  enddate varchar(11),
  starttime varchar(6),
  endtime varchar(6),
  mon char,
  tue char,
  wed char,
  thu char,
  fri char,
  sat char,
  sun char,
  mon_start varchar(6),
  tue_start varchar(6),
  wed_start varchar(6),
  thu_start varchar(6),
  fri_start varchar(6),
  sat_start varchar(6),
  sun_start varchar(6),
  mon_end varchar(6),
  tue_end varchar(6),
  wed_end varchar(6),
  thu_end varchar(6),
  fri_end varchar(6),
  sat_end varchar(6),
  sun_end varchar(6),
  gender varchar(2),
  liftgroup varchar(2),
  school varchar(10),
  paid char,
  vehicle varchar(10),
  freeseats integer
);



delete from lifts;
commit;

select * from users;
select * from lifts;

select * from USERS where username = '14100180' and password = '14100180';

select NAME,EMAIL FROM USERS where USERNAME = '14100180' and PASSWORD = '14100180';


drop sequence lifts_sequence;

Create Sequence lifts_sequence
start with 0
increment by 1
minvalue 0;

Create Sequence users_sequence
start with 0
increment by 1
minvalue 0;

Drop Sequence session_sequence;
Drop Sequence users_sequence;
