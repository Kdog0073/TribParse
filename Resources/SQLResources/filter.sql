drop table if exists temp;
create table temp as (Select * from League_Data limit 1000);
/**
php version 
drop table if exists temp1;
create table temp1 like League_Data;
INSERT INTo temp1 SELECT * FROM League_Data Limit 1000;
**/
drop table if exists filteredVictories;
create table filteredVictories Select * from temp 
where Result= 'Victory'
and GameType = 'Classic'
#and where Champion= 
and Time(TotalGameTime) < '40:00:00' 
and Champion NOT LIKE '%[All]%'
and Time(ChatTime) > '00:20:00' and Time(ChatTime) < '00:40:00'
 