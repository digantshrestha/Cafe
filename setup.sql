CREATE OR REPLACE FUNCTION trigger_set_timestamp()
RETURNS TRIGGER AS $$
BEGIN
  NEW.modified_date = NOW();
  RETURN NEW;
END;
$$ LANGUAGE plpgsql;

create table menus(
    id serial primary key not null,
    name varchar(50) not null,
    price int not null,
    quantity int not null,
    image_path varchar(255),
    image_name varchar(255),
    added_date timestamp default current_timestamp,
    modified_date timestamp NOT NULL default NOW(),
    available boolean NOT NULL
);

CREATE TRIGGER set_timestamp
BEFORE UPDATE ON menus
FOR EACH ROW
EXECUTE FUNCTION trigger_set_timestamp();


















create table menus(
    id int primary key auto_increment not null,
    name varchar(50) not null,
    price int not null,
    quantity int not null,
    image_path varchar(255),
    image_name varchar(255),
    added_date timestamp default current_timestamp,
    modified_date timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
    available boolean default 0
);


create table admin(
    id int primary key auto_increment not null,
    email varchar(50),
    username varchar(50),
    password varchar(255)
);

create table links(
    id int primary key auto_increment not null,
    name varchar(20) not null,
    link varchar(250) not null,
    icon varchar(50) not null
);


create table brand(
    id int primary key auto_increment not null,
    brandname varchar(50) not null,
    quote varchar(250) not null,
    about varchar(1000) not null
);

create table brand(
    id serial primary key not null,
    brandname varchar(50) not null,
    quote varchar(250) not null,
    about text not null
);


create table map(
    id int primary key auto_increment not null,
    lat double not null,
    lng double not null,
    zoom int not null
);

create table map(
    id serial primary key not null,
    lat decimal not null,
    lng decimal not null,
    zoom int not null,
    api_key text
);


create table contact(
    id serial primary key not null,
    first_name varchar(15),
    last_name varchar(15),
    contact_no varchar(20) not null,
    message text not null,
    status boolean default 'false'
);

