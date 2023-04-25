create table Categories(cid int,cname varchar(100),description varchar(100),photo varchar(100));
create table Products(pcode int,cid int,pname varchar(100),brand varchar(100),description varchar(100),packing varchar(100),price int,photo varchar(100));
create table Members(email varchar(100),name varchar(100),mobile varchar(100),address varchar(100),state varchar(100),city varchar(100),pincode varchar(100));
create table Users(email varchar(100),upassword varchar(100),utype varchar(100));
create table Orders(orderno int,odate date,email varchar(100),amount int,status varchar(100));
create table OrderDetails(orderno int,pcode int,pname varchar(100),details varchar(100),packing varchar(100),price int,qty int);




