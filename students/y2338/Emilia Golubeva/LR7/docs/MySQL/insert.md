## Insert

#### Заполнение таблицы "Dog"

```sql
INSERT INTO 'dog' ('id_dog','name','passport','date_vaccination','members_club','id_owner') VALUES ('1','Jean','14567','2031-12-20 21:00:00','Karasuno','11');
INSERT INTO 'dog' ('id_dog','name','passport','date_vaccination','members_club','id_owner') VALUES ('2','Levi','38712','2027-11-20 19:00:00','Sharitoridzava','12');
INSERT INTO 'dog' ('id_dog','name','passport','date_vaccination','members_club','id_owner') VALUES ('3','Mikasa','98512','2018-06-20 19:00:00','Karasuno','13');
INSERT INTO 'dog' ('id_dog','name','passport','date_vaccination','members_club','id_owner') VALUES ('4','Eren','12334','2003-09-20 21:00:00','Nekoma','14');
INSERT INTO 'dog' ('id_dog','name','passport','date_vaccination','members_club','id_owner') VALUES ('5','Armin','80294','2012-03-20 20:00:00','Sharitoridzava','15');
```



#### Заполнение таблицы "Owner"

```sql
INSERT INTO 'owner' ('id_owner','FN') VALUES ('11','Sakura Haruno');
INSERT INTO 'owner' ('id_owner','FN') VALUES ('12','Shikamaru Nara');
INSERT INTO 'owner' ('id_owner','FN') VALUES ('13','Uzumaki Naruto');
INSERT INTO 'owner' ('id_owner','FN') VALUES ('14','Uchiha Sasuke');
INSERT INTO 'owner' ('id_owner','FN') VALUES ('15','Kakashi Hatake');
```



#### Заполнение таблицы "Registration"

```sql
INSERT INTO 'registration' ('id_registration','chequel','status','id_exhibition','id_dog','id_owner') VALUES ('301','10201','1','201','1','11');
INSERT INTO 'registration' ('id_registration','chequel','status','id_exhibition','id_dog','id_owner') VALUES ('302','8960','0','202','2','12');
INSERT INTO 'registration' ('id_registration','chequel','status','id_exhibition','id_dog','id_owner') VALUES ('303','2990','1','203','3','13');
INSERT INTO 'registration' ('id_registration','chequel','status','id_exhibition','id_dog','id_owner') VALUES ('304','4500','0','201','4','14');
INSERT INTO 'registration' ('id_registration','chequel','status','id_exhibition','id_dog','id_owner') VALUES ('305','12000','1','202','5','15');
```



#### Заполнение таблицы "Expert"

```sql
INSERT INTO 'expert' ('id_expert','contract','Fn','expert_club') VALUES ('111','0','Min Yoongi','Seirin');
INSERT INTO 'expert' ('id_expert','contract','Fn','expert_club') VALUES ('112','1','Jeon Jungkook','Teiko');
INSERT INTO 'expert' ('id_expert','contract','Fn','expert_club') VALUES ('113','0','Kim Namjoon','Rakuzan');
INSERT INTO 'expert' ('id_expert','contract','Fn','expert_club') VALUES ('114','1','Kim Taehyung','Teiko');
INSERT INTO 'expert' ('id_expert','contract','Fn','expert_club') VALUES ('115','1','Park Jimin','Rakuzan');
```



#### Заполнение таблицы "Ring"

```sql
INSERT INTO 'ring' ('id_Ring','ring_number') VALUES ('211','1');
INSERT INTO 'ring' ('id_Ring','ring_number') VALUES ('212','2');
INSERT INTO 'ring' ('id_Ring','ring_number') VALUES ('213','3');
```



#### Заполнение таблицы "Performance in the ring"

```sql
INSERT INTO 'perfomance_in_the_ring' ('id_perfomance','grade','interm_results','final_rating','id_ring','id_dog','id_exhibition') VALUES ('401','6','good','prize-winner','211','1','201');
INSERT INTO 'perfomance_in_the_ring' ('id_perfomance','grade','interm_results','final_rating','id_ring','id_dog','id_exhibition') VALUES ('402','10','excellent','winner','212','2','203');
INSERT INTO 'perfomance_in_the_ring' ('id_perfomance','grade','interm_results','final_rating','id_ring','id_dog','id_exhibition') VALUES ('403','8','very good','prize-winner','213','3','203');
INSERT INTO 'perfomance_in_the_ring' ('id_perfomance','grade','interm_results','final_rating','id_ring','id_dog','id_exhibition') VALUES ('404','5','not bad','certificate of participation','211','4','201');
INSERT INTO 'perfomance_in_the_ring' ('id_perfomance','grade','interm_results','final_rating','id_ring','id_dog','id_exhibition') VALUES ('405','2','bad','certificate of participation','212','5','202');
```



#### Заполнение таблицы "Exhibition"

```sql
INSERT INTO 'exhibition' ('id_exhibition','type') VALUES ('201','monobreed');
INSERT INTO 'exhibition' ('id_exhibition','type') VALUES ('202','monobreed');
INSERT INTO 'exhibition' ('id_exhibition','type') VALUES ('203','polybreed');
```



#### Заполнение таблицы "Judging"

```sql
INSERT INTO 'judging' ('id_judging','results','id_ring','id_expert') VALUES ('311','7','211','111');
INSERT INTO 'judging' ('id_judging','results','id_ring','id_expert') VALUES ('312','10','212','112');
INSERT INTO 'judging' ('id_judging','results','id_ring','id_expert') VALUES ('313','8','213','113');
INSERT INTO 'judging' ('id_judging','results','id_ring','id_expert') VALUES ('314','5','211','114');
INSERT INTO 'judging' ('id_judging','results','id_ring','id_expert') VALUES ('315','3','212','115');
```

