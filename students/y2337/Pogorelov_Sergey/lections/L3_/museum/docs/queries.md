# Queries

`Запросы к базе данных`


## 1
_Поиск авторов и созданных ими произведений в заданной стране_

```sql
select author.name, piece.piece_name from author
	inner join piece on author.id_author = piece.id_author
    where author.country = 'Mauritius';
```

| name  | piese_name |
| :---: | :--------: |
| Leroy |    Leon    |
| Leroy |  Melendez  |

---

## 2
_Поиск организаций по названию и имени руководителя_

```sql
select * from org
	where org_name = 'Tual' and name = 'Kibo';
```

| id_org | org_name | name  |
| :----: | :------: | :---: |
|   6    |   Tual   | Kibo  |

---

## 3
_Поиск выстовок проводимых в заданный период_

```sql
select * from exh
	where exh.id_exh in (select id_exh from contract
		where start_date <= now() and fin_date >= now());
```

| id_exh | exh_name |
| :----: | :------: |
|   4    |   MAG    |

---

## 4
_Поиск экспоната с самым длинным названием_

```sql
select id_piece, piece_name from piece
	where LENGTH(piece_name) = (select max(LENGTH(piece_name)) from piece);
```

| id_piece | piece_name |
| :------: | :--------: |
|    10    |  Melendez  |

---

## 5
_Поиск договоров с участием конкретного фонда_

```sql
select * from contract
	where id_fond in (select id_fond from fond
        where fond_name = 'Banff' );
```

| id_contract | id_fond | id_org | id_exh | start_date |  fin_date  |
| :---------: | :-----: | :----: | :----: | :--------: | :--------: |
|      4      |    2    |   3    |   10   | 2015-07-27 | 2020-09-16 |
|      7      |    2    |   4    |   10   | 2019-11-17 | 2020-11-24 |

---

## 6
_Поиск отношения числа экспонатов хранимых в указанном фонде к общему числу экспанатов зарегистрированных в системе_

```sql
select count(p.id_piece) as full_pieses, count(sl.id_piece) as fond_pieces from piece as p
	left join (select id_piece from store_list 
			where id_fond in (select id_fond from fond
				where fond_name = 'Sanghar')
    	) as sl on p.id_piece = sl.id_piece;
```

| full_pieses | fond_pieces |
| :---------: | :---------: |
|     10      |      1      |

---

## 7
_Поиск комплектов и числа хранимых в нем экспанатов по размеру_

```sql
select id_set, count(id_set) from set
	group by id_set
	having count(id_set) < 5;
```

| id_set | count |
| :----: | :---: |
|   10   |   1   |
|   2    |   1   |
|   5    |   1   |
|   4    |   1   |
|   6    |   1   |
|   9    |   1   |
|   3    |   1   |
|   8    |   1   |
|   7    |   1   |
|   1    |   1   |

---

## 8
_Поиск информации об экспонатах заданной страны_

```sql
select * from piece
	where id_author = any (select id_author from author
		where country = 'Mauritius');
```

| id_piece | piece_name | creation_date | status | id_author |
| :------: | :--------: | :-----------: | :----: | :-------: |
|    2     |    Leon    |  1885-08-26   | 253832 |     3     |
|    10    |  Melendez  |  1972-10-27   | 873316 |     3     |

---

## 9
_Поиск контрактов с участием экспонатов, чей статус выше заданного_

```sql
select c.id_contract, p.id_piece from contract as c
	inner join set as s on s.id_contract = c.id_contract
    inner join (select * from piece
		where status > '397033') as p on p.id_piece = s.id_piece;
```

| id_contract | id_piece |
| :---------: | :------: |
|      1      |    8     |
|      8      |    5     |
|      6      |    10    |

---

## 10
_Поиск информации об участниках сделок_

```sql
select f.fond_name, o.org_name, e.exh_name from fond as f
	inner join contract as c on c.id_fond = f.id_fond
    inner join org as o on o.id_org = c.id_org
    inner join exh as e on e.id_exh = c.id_exh;
```

|   fond_name    |   org_name   |    exh_name     |
| :------------: | :----------: | :-------------: |
|     Eluru      | Fayetteville | Vladimir Oblast |
| Likino-Dulyovo |  Green Bay   | Smolensk Oblast |
|     Eluru      |  Trowbridge  |  Oryol Oblast   |

---
