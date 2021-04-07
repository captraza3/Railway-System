drop database railwaysystem;
create database railwaysystem;
use railwaysystem;

create table `employee`(
	`emp_id` varchar(15) unique not null primary key,
	`emp_name` varchar(100) not null,
	`password` varchar(100) not null,
	`gender` varchar(10) not null,
	`email` varchar(150) not null,
	`address` varchar(250) not null,
	`type` varchar(30) not null,
	`phone_no` varchar(11) not null,
	`date_joined` date not null,
	`duty_shift` varchar(20) not null,
	`pic_name` varchar(100) not null,
	`salary` int(15),
	constraint employee_gen_ck check(gender = 'Male' or gender = 'Female')
);

create table `customer`(
	`cust_id` varchar(15) not null,
	`cust_name` varchar(100) not null,
	`gender` varchar(10) not null,		
	constraint customer_gen_ck check(gender = 'Male' or gender = 'Female'),
	`phone_no` varchar(11) not null,
	`emp_id` varchar(15),
	`time` datetime not null,
	constraint customer_emp_fk foreign key (emp_id)
		references employee(emp_id) on delete set null,
	constraint customer_pk primary key (cust_id, time)
);

create table `station`(
	`station_id` varchar(4) primary key,
	`station_name` varchar(100) not null,
	`no_of_lines` int(5) not null,
	`no_of_platforms` int(5) not null
	`city` varchar(50) not null,
);


create table `train`(
	`train_id` varchar(10) primary key,
	`train_name` varchar(100) not null
);


create table `train_in_station`(
	`train_id` varchar(10) not null,
	`station_id` varchar(4) not null,
	constraint train_in_station_train_fk foreign key(train_id)
		references train(train_id) on delete cascade,
	constraint train_in_station_station_fk foreign key(station_id)
		references station(station_id) on delete cascade,
	constraint train_in_station_pk primary key(train_id,station_id)	
);

create table `time`(
	`ref_no` int(11) auto_increment primary key,
	`dep_time` time not null,
	`arrival_time` time not null,
	`station_id` varchar(4) not null,
	constraint time_in_station_fk foreign key(station_id)
		references station(station_id) on delete cascade
);
	
create table `train_time`(
	`train_id` varchar(10) not null,
	`ref_no` int(11) not null,
	constraint train_time_train_fk foreign key(train_id)
		references train(train_id) on delete cascade,
	constraint train_time_time_fk foreign key(ref_no)
		references time(ref_no) on delete cascade,
	constraint pk_ts primary key(train_id,ref_no)	
);

create table `class`(
	`class_id` int(11) auto_increment primary key,
	`class_name` varchar(20) not null,
	`no_of_seats` int(5) not null,
	`train_id` varchar(10) not null,
	constraint class_in_train_fk foreign key(train_id)
		references train(train_id) on delete set null    
);

	 

create table `ticket`(
	`ticket_num` int(11) auto_increment primary key,
	`source` varchar(30) not null,
	`destination` varchar(30) not null,
	`class_id` int(11) not null,
	`cust_id` varchar(15) not null,
	`train_id` varchar(10) not null,
	`ticket_confirm` varchar(3) not null,
	constraint ticket_train_fk foreign key(train_id)
		references train(train_id) on delete cascade,
	constraint ticket_class_fk foreign key(class_id) 
		references class(class_id) on delete cascade,
	constraint ticket_cust_fk foreign key(cust_id)
		references customer(cust_id)
);

create table `train_fare`(
	`ticket_num` int(15) not null,
	`train_id` varchar(10) not null,
	`fare` int(10) not null, 
	constraint fare_in_train_fk foreign key(train_id)
		references train(train_id) on delete set null,
	constraint fare_in_ticket_fk foreign key(ticket_num) 
		references ticket(ticket_num) on delete cascade,
	constraint pk_far primary key(train_id,ticket_num,fare)

);

create table `train_seats`(
	`box_no` int(5) not null,
	`seat_no` int(5) not null,
	`tdate` date not null,
	`train_id` varchar(10) not null,
	`class_id` int(11) not null,
	`ticket_num` int(15) not null,
	constraint seats_ticket_fk foreign key(ticket_num) 
		references ticket(ticket_num) on delete cascade,
	constraint seats_class_fk foreign key(class_id) 
		references class(class_id) on delete cascade,
	constraint train_in_seats_fk foreign key(train_id)
		references train(train_id),
	constraint pk_train_in_box primary key(box_no,train_id,seat_no,tdate)
);

create table customer_train_time(
	`ticket_num` int(15) not null,
	`cust_id` varchar(15) not null,
	`train_id` varchar(10) not null,
	`dep_tme` time not null,
	`arrival_tme` time not null,
	constraint ttcust_fk foreign key(cust_id)
		references customer(cust_id) on delete cascade,
	constraint c_train_fk foreign key(train_id)
		references train(train_id) on delete set null,
	constraint c_ticket_fk foreign key(ticket_num) 
		references ticket(ticket_num) on delete cascade,
	constraint pk_far primary key(train_id,ticket_num,cust_id)
);	


INSERT INTO employee VALUES("35101-3080062-3","Muneeb Raza", "stubborn", "Male","MuneebRaza986@gmail.com","Peshawar","Manager",03014001808,"2015-01-01","Day","image/abc.png","NULL");

INSERT INTO employee VALUES("35101-2345678-3","Ahmed Arshad", "ahmed", "Male","AhmedArshad225@gmail.com","Lahore","Assistant Manager",03014002308,"2015-03-01","Day","image/abc.png",30000);

INSERT INTO employee VALUES("35101-3455667-7","Tashfeen Latif", "tashi", "Male", "TashfeenLatif345@gmail.com","Chakwal","Worker",03012334458,"2016-04-03","Day","image/abc.png",10000);

