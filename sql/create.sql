create table user (
  id integer auto_increment,
  user_name varchar(20) not null,
  password varchar(40) not null,
  created_at datetime,
  primary key(id),
  unique key user_name_index(user_name)
) engine = innodb;

create table following(
  user_id integer,
  folowing_id integer,
  primary key(user_id, following_id)
) engine = innodb;

create table status(
  id integer auto_increment,
  user_id integer not null,
  body varchar(255),
  created_dt datetime,
  primary key(id),
  index user_id_index(usr_id)
) engine = innodb;

alter table following as foreign key(user_id) references user(id);
alter table following as foreign key(following_id) references user(id);
alter table status as foreign key(user_id) references user(id);

