
--create database traiveling

CREATE DATABASE traiveling
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'English_United States.1252'
    LC_CTYPE = 'English_United States.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;

--  main table for park

create table parks(
    id serial PRIMARY KEY,
    park_id varchar(200) ,
    park_email varchar(100) ,
    park_name varchar(100) ,
    image varchar(100),
    child_price int,
    adult_price int,
    park_contact varchar(50) ,
    park_address varchar(255),
    contact_person_name varchar(255),
    contact_person_number varchar(20),
    park_status int, -- this used to get to know about which park is this water,theme and educational
    park_approval_status int,
    benifits varchar(255),
    salt varchar(255),
    password varchar(255)
)
-- water park 1
-- educational park 2
-- educational 3

-- create table park
create table park(id int,dir varchar(200),
                  child_price int,adult_price int);

alter table park add column name varchar(255);

-- add data to park
insert into park(id,dir,child_price,adult_price,name) values (11,'../images/Water_park.jpg',600,800,'Water Kingdom');
insert into park(id,dir,child_price,adult_price,name) values (12,'../images/Water_park.jpg',700,1000,'Sangrila')
insert into park(id,dir,child_price,adult_price,name) values (13,'../images/Water_park.jpg',700,1000,'Royal Garden')


-- create table customer

create table customer_book(date_of_booking date,customer_name varchar(255),
                          num_adult int,num_child int,phone_number varchar(13),
                           email varchar(50),day_of_booking date,
                           resort_id int);


-- paid booking table

create table paid_booking(booking_id varchar(255),name varchar(100),email varchar(100),
             paid boolean,payment_id varchar(255),amount int,resort_id int,
             date_of_book date,num_adult int,num_child int,
             resort_name varchar(255),phone varchar(13),day_of_booking date);



-- create table park park_theme
create table park_theme(id int,name varchar(255),dir varchar(200),
                  child_price int,adult_price int);

-- data into park_theme table
-- add data to park_theme
insert into park_theme(id,dir,child_price,adult_price,name) values (11,'../images/theme_park.jpg',600,800,'Imagica');
insert into park_theme(id,dir,child_price,adult_price,name) values (12,'../images/theme_park.jpg',700,1000,'Mounteria')
insert into park_theme(id,dir,child_price,adult_price,name) values (13,'../images/theme_park.jpg',700,1000,'Ecelworld')


-- create table park educational
create table educational(id int,name varchar(255),dir varchar(200),
                  child_price int,adult_price int);

-- data into educational table
-- add data to educational
insert into educational(id,dir,child_price,adult_price,name) values (11,'../images/Educational_trip.jpg',600,800,'Imagica');
insert into educational(id,dir,child_price,adult_price,name) values (12,'../images/Educational_trip.jpg',700,1000,'Mounteria')
insert into educational(id,dir,child_price,adult_price,name) values (13,'../images/Educational_trip.jpg',700,1000,'Ecelworld')

--    $college_name = mysqli_real_escape_string($conn, $_POST['institute']);


-- create user_data to store user uname and password

create table user_data(email varchar(50),phone varchar(13),salt varchar(50),password varchar(255));

-- alter table user_data add column id
alter table user_data add column ID SERIAL PRIMARY KEY

alter table user_data add column full_name varchar(255);


-- add column canceled in paid_booking
alter table paid_booking add column canceled boolean;

-- add column status
alter table paid_booking add column status int;
-- 1 means Active 
-- 2 means In-active


alter table paid_booking add column id SERIAL PRIMARY KEY;


-- create table for admin
create table admin(
    username varchar(255),
    password varchar(255),
    salt varchar(255),
    level_permission int
)

-- add column id
alter table admin add id serial primary key;