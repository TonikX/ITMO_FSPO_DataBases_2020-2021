<?php
include ("db.php");
$conn = new Db();
$db = $conn->dbconnect();
?>
<a href="edit.php">Открыть редактор людей</a>
<br>
1. <a href="1.php">select fio from reader where id_library_card = any(select max(id_library_card) from reader);</a>
<br>
2. <a href="2.php">select fio, name_room FROM reader INNER JOIN (select id_attachment, date_attachment, name_room, reader_id_library_card FROM attachment_in_room LEFT JOIN reading_rooms ON id_attachment = id_room) as tab ON id_library_card = reader_id_library_card;</a>
<br>
3. <a href="3.php">select fio, titles, date_of_issue from reader INNER JOIN (select reader_id_library_card as card_number, date_of_issue, titles from issue_of_book INNER JOIN (select copy_of_book.id_copy as copies, books.title as titles FROM copy_of_book LEFT JOIN books ON books.id_book = copy_of_book.books_id_book) as tab ON issue_of_book.copy_of_book_id_copy = copies ORDER BY card_number) as tab1 ON card_number = id_library_card;</a>
<br>
4. <a href="4.php">select copy_of_book.id_copy as copy_num, books.title as titles FROM copy_of_book LEFT JOIN books ON books.id_book = copy_of_book.books_id_book;</a>
<br>
5. <a href="5.php">select publishing_house, sum(number_of_copies) as total_books from books group by publishing_house order by total_books desc;</a>