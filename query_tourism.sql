
--create database traiveling

CREATE DATABASE traiveling
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'English_United States.1252'
    LC_CTYPE = 'English_United States.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;


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


