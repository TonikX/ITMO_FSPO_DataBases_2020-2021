#1
select author.name, piece.piece_name from author
	inner join piece on author.id_author = piece.id_author
    where author.country = 'Mauritius';

#2
select * from org
	where org_name = 'Tual' and name = 'Kibo';

#3
select * from exh
	where exh.id_exh in (select id_exh from contract
		where start_date <= now() and fin_date >= now());

#4
select id_piece, piece_name from piece
	where LENGTH(piece_name) = (select max(LENGTH(piece_name)) from piece);

#5
select * from contract
	where id_fond in (select id_fond from fond
        where fond_name = 'Banff' );

#6
select count(p.id_piece), count(sl.id_piece) from piece as p
	left join (select id_piece from store_list 
			where id_fond in (select id_fond from fond
				where fond_name = 'Sanghar')
    	) as sl on p.id_piece = sl.id_piece;

#7
select id_set, count(id_set) from set
	group by id_set
	having count(id_set) < 5;

#8
select * from piece
	where id_author = any (select id_author from author
		where country = 'Mauritius');

#9
select c.id_contract, p.id_piece from contract as c
	inner join set as s on s.id_contract = c.id_contract
    inner join (select * from piece
		where status > '397033') as p on p.id_piece = s.id_piece;

#10
Select f.fond_name, o.org_name, e.exh_name from fond as f
	inner join contract as c on c.id_fond = f.id_fond
    INNER join org as o on o.id_org = c.id_org
    inner join exh as e on e.id_exh = c.id_exh;
