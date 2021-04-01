delete from Reviewer where rID = 205;
delete from Movie where year="1965";
insert into "Reviewer" values (205,'');
insert into "Movie" values (106,'The Sound of Music',1965,'Robert Wise');
update Movie set mId=101 where director="Victor Fleming";