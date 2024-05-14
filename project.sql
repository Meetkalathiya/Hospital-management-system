use hospital;
create table doctor
(d_id int primary key,
d_name varchar(25),
d_age int , d_gender char(1),qualification varchar(15), d_contact bigint , salary int, d_address varchar(20));

insert into doctor values
(101,"priyank",19,"M","MBBS",9313202075,100000,"rajkot"),
(102,"meet",19,"M","BDS",9658742655,80000,"surat"),
(103,"jatin",18,"M","BAMS",7889544232,80000,"amadavad"),
(104,"bhakti",18,"F","BHMS",9632587412,70000,"junagadh"),
(105,"mihir",18,"M","BYNS",7412589632,95000,"jamnagar");

select * from doctor;

create table patient
(case_no int primary key auto_increment,
p_name varchar(25),
p_age int , p_gender char(15), p_contact bigint , p_bloodgroup varchar(10),a_date date, p_city varchar(20),email varchar(100),meeting_with varchar(25),
prescription varchar(1000));

insert into patient value
(1,"meet",25,"M",9632587412,"A+","2020-02-02","surat","meet123@gmail.com","Dr. priyank",""),
(2,"raj",15,"M",9521478563,"B","2021-02-03","gandhinagar","raj123@gmail.com","Dr. jatin",""),
(3,"dev",20,"M",9731387112,"A+","2021-02-05","ahemdavad","dev123@gmail.com","Dr. mihir",""),
(4,"yagnik",20,"M",9612527412,"A+","2021-02-10","surat","yagnik123@gmail.com","Dr. priyank",""),
(5,"priya",28,"F",9634557112,"AB-","2022-05-15","rajkot","priya123@gmail.com","Dr. meet",""),
(6,"amii",17,"F",9832587412,"A-","2022-06-06","delhi","amii123@gmail.com","Dr. bhakti",""),
(7,"arjun",19,"M",9985214256,"O","2023-02-02","gondal","arjun123@gmail.com","Dr. priyank","");


select * from patient;

create table staff
(staff_id int primary key,
s_name varchar(25),
s_contact bigint,
s_address varchar(1000),
s_age int,
s_gender varchar(2),
s_position varchar(25),
s_salary int);

insert into staff value
(201,"Akash Sharma",9632587412,"23A, Gali No. 6, Vijay Nagar, Delhi 110009",19,"M","peon",5000),
(202,"Priya Patel",9102547428,"54, Gandhi Nagar, Street No. 7, Ahmedabad, Gujarat 380009",17,"F","receptionist",7000),
(203,"Rahul Singh",7412589632,"12/2, Krishnapuri, Near Kali Mandir, Lucknow, Uttar Pradesh 226022",28,"M","security",5000),
(204,"Deepika Gupta",2214523698,"7/12, Shanti Niketan Colony, Mau, Uttar Pradesh 275101",20,"F","receptionist",7000),
(205,"Rajesh Kumar",1524639875,"23, Kailash Nagar, Near Shiv Mandir, Jaipur, Rajasthan 302018",21,"M","nurse",9000),
(206,"Anjali Sharma",41236587492,"19/1, New Colony, Near Gurudwara, Ludhiana, Punjab 141002",22,"F","nurse",10000),
(207,"Ravi Verma",7412589632,"6/2, Naya Bazar, Near Police Station, Bhopal, Madhya Pradesh 462001",23,"M","nurse	",9000),
(208,"Meera Reddy",7412589632,"12, Laxmi Nagar, Near Rajiv Chowk, Hyderabad, Telangana 500029",18,"F","compounder",7000),
(209,"Vikram Choudharya",7423156985,"14, Civil Lines, Near Railway Station, Kanpur, Uttar Pradesh 208001",30,"M","compounder",15000),
(210,"Sujata Das",741236589,"87/2, Srinagar Colony, Near Mallikarjuna Temple, Kolkata, West Bengal 700015",29,"M","casier",20000);


create table Bill(
Bill_id int primary key,
Patient_name varchar(25),
b_Date date,
Doctor_charge int,
Room_charge int,
Medician_charge int,
total_amount int);


insert into bill values
("1","meet","2019-01-01","500","1500","500",2500),
("2","raj","2019-01-02","300","1500","1200",3000),
("3","dev","2019-01-02","600","1000","600",2200),
("4","yagnik","2019-01-02","700","1000","700",2400),
("5","priya","2019-01-04","200","2000","800",3000),
("6","amii","2019-01-05","800","2000","900",3700),
("7","janvi","2019-01-07","500","2000","580",3080);


create table room
(r_no varchar(10) primary key,
r_cost int);

insert into room value
("HA101",1500),
("HA102",1500),
("HA103",1500),
("HA104",1500),
("HA105",2000),
("HA106",1500),
("HA107",2000),
("HA108",1500),
("HA109",1500),
("HA1110",2000),
("HA201",1500),
("HA202",1500),
("HA203",1500),
("HA204",1500),
("HA205",2000),
("HA206",2000),
("HA207",1500),
("HA208",2000),
("HA209",1500),
("HA210",2000),
("HA211",1500);

create table medical(
O_id int primary key,
M_name varchar(25),
owner_name varchar(25),
O_qualification varchar(25),
M_contact bigint,
M_address varchar(100));

insert into medical value
(401,"subh","darshan","farmacy","9632587412","vishva Nagar, Street No.5, rajkot, Gujarat 380004");


create table Payment(
P_id int primary key,
P_name varchar(25),
P_type varchar(25),
card_no bigint);
 
insert into payment value
(0001,"meet","cash",null),
(0002,"raj","online",963123963753),
(0003,"dev","cash",null),
(0004,"yagnik","cash",null);

-- query 
SELECT distinct * FROM doctor, patient, room, bill, staff; 
SELECT d_name FROM doctor WHERE d_id = '101'; 
SELECT *FROM doctor INNER JOIN patient ON patient.p_age = doctor.d_id; 
SELECT d_name FROM doctor WHERE salary = (SELECT MAX(salary) FROM doctor); 

select patient_name,Bill_id from bill
where total_amount>2500;

SELECT d_name,d_contact FROM doctor WHERE d_address = 'surat'; 

SELECT p_name,p_contact FROM patient WHERE p_age >18; 

create table appoinment(
name varchar(25),
number bigint,
email varchar(50),
a_date date);

create table patients(
id int,
name varchar(25),
address varchar(100),
phone bigint);


create table login(
user varchar(25),
email varchar(100),
password varchar(25));

insert into login value
("priyank","priyankviradiya227@gmail.com","Pri@2004"),
("mihir","mihir.rupapara@gmail.com","123456");
