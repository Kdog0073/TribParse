##    Licensed to the Apache Software Foundation (ASF) under one or more
##    contributor license agreements.  See the NOTICE file distributed with
##    this work for additional information regarding copyright ownership.
##    The ASF licenses this file to You under the Apache License, Version 2.0
##    (the "License"); you may not use this file except in compliance with
##    the License.  You may obtain a copy of the License at
##
##       http://www.apache.org/licenses/LICENSE-2.0
##
##    Unless required by applicable law or agreed to in writing, software
##    distributed under the License is distributed on an "AS IS" BASIS,
##    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
##    See the License for the specific language governing permissions and
##    limitations under the License.

# Each SQL statement in this file should terminate with a semicolon (;)
# Lines starting with the pound character (#) are considered as comments
SET SQL_SAFE_UPDATES = 0;

DROP FUNCTION IF EXISTS stringSplit;
CREATE FUNCTION stringSplit(
x VARCHAR(255),
delim VARCHAR(12),
pos INT)
RETURNS VARCHAR(255)
RETURN REPLACE(SUBSTRING(SUBSTRING_INDEX(x, delim, pos),
LENGTH(SUBSTRING_INDEX(x, delim, pos -1)) + 1), delim, '');



DROP FUNCTION IF EXISTS `substrCount`;
DELIMITER $$

CREATE /*DEFINER=`root`@`localhost`*/ FUNCTION `substrCount`(s VARCHAR(255), ss VARCHAR(255)) RETURNS tinyint(3) unsigned
READS SQL DATA
BEGIN
DECLARE count TINYINT(3) UNSIGNED;
DECLARE offset TINYINT(3) UNSIGNED;
DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET s = NULL;
SET count = 0;
SET offset = 1;
REPEAT
IF NOT ISNULL(s) AND offset > 0 THEN
SET offset = LOCATE(ss, s, offset);
IF offset > 0 THEN
SET count = count + 1;
SET offset = offset + 1;
END IF;
END IF;
UNTIL ISNULL(s) OR offset = 0 END REPEAT;
RETURN count;
END$$
DELIMITER ;
drop table if exists splitResults;
create table splitResults (splitter varchar(255));

DROP TABLE IF EXISTS results;
/*start with an empty table with the unique words. then search through the splitter table for freq*/
CREATE TABLE results
(
	words  varchar(255),
	freq int not null default 0
	,primary key (words)
);

DROP PROCEDURE  IF EXISTS `splitter`;
DELIMITER $$

/*CREATE DEFINER=`root`@`localhost`*/
Create PROCEDURE `splitter`(x varchar(255), delim varchar(12))
BEGIN

SET @Valcount = substrCount(x,delim)+1;
SET @v1=0;
/*drop table if exists splitResults;
create 
table splitResults (splitter varchar(255));*/
WHILE (@v1 < @Valcount) DO
set @val = stringSplit(x,delim,@v1+1);
#call p_record_word_freq((@val));
INSERT INTO splitResults (splitter) VALUES (@val);

INSERT into results (words,freq) values(@val,1) 
on DUPLICATE KEY update words=values(words),freq=freq+1
;
SET @v1 = @v1 + 1;
END WHILE;

END$$

/**
DROP PROCEDURE  IF EXISTS `split_negative`$$
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `split_negative`(x varchar(255), delim varchar(12))
BEGIN
SET @Valcount = substrCount(x,delim)+1;
SET @v1=0;
drop table if exists splitResults2;
create 
table splitResults2 (split_negative varchar(255));
WHILE (@v1 < @Valcount) DO
set @val = stringSplit(x,delim,@v1+1);
INSERT INTO splitResults2 (split_negative) VALUES (@val);
SET @v1 = @v1 + 1;
END WHILE;

END$$
**/

/* reset delimiter */
DELIMITER ;

DROP TABLE IF EXISTS data1;
CREATE TABLE data1
(
	words varchar(255)
);
INSERT INTo data1 (words)
VALUES ('nice nice work work guys!'),('hate you so much much'),('gg noob'),('fuck you mysql');


DELIMITER ;
/*processes messages from the LoL data, and makes a new table where each entry = 1 word*/

DROP PROCEDURE IF EXISTS PROCESSMESSAGES; 
DELIMITER ;;
CREATE PROCEDURE PROCESSMESSAGES()
BEGIN
DECLARE n INT DEFAULT 0;
DECLARE i INT DEFAULT 0;
SELECT COUNT(*) FROM data1 INTO n;
SET i=0;
WHILE i<n DO
	/*selects ONE word, specifically on row i. Limit i, 1 means 
	it gets word starting from row i, and limits it to 1 */
	call splitter((SELECT words FROM data1 Limit i,1), ' ');
	/*calls splitter on every message row, with delimiter ' ' */
	
	SET i = i + 1;
END WHILE;
/*after processing messages, creates the result table */
/*SELECT * From splitResults2;*/

/*SELECT DISTINCT words INTO results from data1;*/
#INSERT INTO results (words) 
#SELECT DISTINCT splitter from splitresults;

End;
;;
DELIMITER ;




/*SELECT * INTO OUTFILE 'C:/CS467/messages.txt'

	LINES TERMINATED BY ' '
FROM splitResults; */




drop procedure if exists `p_record_word_freq`;
DELIMITER $$
create procedure `p_record_word_freq`(word varchar(255))
BEGIN

Drop TABLE if exists word_freq_row;
CREATE  TABLE word_freq_row 
SELECT * FROM RESULTS 
WHERE results.words=word;

UPDATE results
SET freq=(select freq from word_freq_row)+1
WHERE words=(select words from word_freq_row);

INSERT into results (words,freq) values(word,1) 
on DUPLICATE KEY update freq= (select freq from word_freq_row)+1;




end$$
DELIMITER ;


DROP PROCEDURE IF EXISTS ROWPERROW;
DELIMITER ;;
CREATE PROCEDURE ROWPERROW()
BEGIN
DECLARE n INT DEFAULT 0;
DECLARE i INT DEFAULT 0;
SELECT COUNT(*) FROM splitresults INTO n;
SET i=0;
WHILE i<n DO
	
	call p_record_word_freq((SELECT splitter FROm splitresults Limit i,1));
	
/** 
	Update (
	SELECT freq,
	SUM(CASE WHEN words= (SELECT splitter FROM splitresults Limit i,1) THEn 1 ELSE 0 END) as words
	FROM
	results
	)
*/
/*
	UPDATE results
		SET freq = (SELECT (freq) FROM results
		WHERE EXISTS(SELECT 1 FROM splitresults WHERE results.words=splitresults.splitter))+1;
*/	 
	
	SET i = i + 1;
END WHILE;
End;
;;
DELIMITER ;


/* manual splitting
CALL splitter('nice nice work work guys', ' ');
Call splitter('hate you so much much', ' ');
*/
call PROCESSMESSAGES();
#call ROWPERROW();
Select * FROM data1;

Select * FROM splitresults;
Select * FROM results;
