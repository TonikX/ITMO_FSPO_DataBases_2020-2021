reader

|Имя|Тип|Primary key|Foreign key|Unique|Ограничения|Not null|
|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|
|id_library_card| SERIAL|+| | | | NOT NULL|
|fio|VARCHAR| | | | 50| NOT NULL|
|date_of_birth|DATE| | | | | NOT NULL|
|passport_number|INTEGER| | | +| | NOT NULL|
|adress|VARCHAR| | | | 50| NOT NULL|
|education|VARCHAR| | | | 50| NOT NULL|
|academic_degree|VARCHAR| | | | 50| |
|status|VARCHAR| | | | 50| |

Code of creation:
CREATE TABLE `reader` (
  `id_library_card` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fio` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `passport_number` int(11) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `education` varchar(50) NOT NULL,
  `academic_degree` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_library_card`),
  UNIQUE KEY `id_library_card` (`id_library_card`),
  UNIQUE KEY `passport_number` (`passport_number`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

books

|Имя|Тип|Primary key|Foreign key|Unique|Ограничения|Not null|
|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|
|id_book| SERIAL|+| | | | NOT NULL|
|title|VARCHAR| | | | 50| NOT NULL|
|authors|VARCHAR| | | | 50| NOT NULL|
|publishing_house|VARCHAR| | | | 50| NOT NULL|
|year_of_publishing|DATE| | | | | NOT NULL|
|section|VARCHAR| | | | 50| NOT NULL|
|number_of_copies|INTEGER| | | | | NOT NULL|
|attachment_date|DATE| | | | | |
|date_of_receiving|DATE| | | | | |
|writeoff_date|DATE| | | | | |


worker

|Имя|Тип|Primary key|Foreign key|Unique|Ограничения|Not null|
|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|
|id_worker| SERIAL|+| | | | NOT NULL|
|date_of_receipt|DATE| | | | | NOT NULL|
|timetable|VARCHAR| | | | 50| NOT NULL|
|fio_worker|VARCHAR| | | | 50| NOT NULL|
|id_library|INTEGER| | | | | NOT NULL|

copy_of_book

|Имя|Тип|Primary key|Foreign key|Unique|Ограничения|Not null|
|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|
|id_copy| SERIAL|+| | | | NOT NULL|
|copy_status|VARCHAR| | | | 50| NOT NULL|
|collection_and_issue_dates|VARCHAR| | | | 50| NOT NULL|
|copy_of_book_id|INTEGER| |+| | | |

reading_rooms

|Имя|Тип|Primary key|Foreign key|Unique|Ограничения|Not null|
|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|
|id_room| SERIAL|+| | | | NOT NULL|
|name_room|VARCHAR| | | | 50| NOT NULL|
|capacity|INTEGER| || | | NOT NULL|

attachment_in_room

|Имя|Тип|Primary key|Foreign key|Unique|Ограничения|Not null|
|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|
|id_attachment| SERIAL|+| | | | NOT NULL|
|date_attachment|DATE| | | | | NOT NULL|
|library_card|INTEGER| |+| | 50| |
|transfer_date|DATE| | | | | |
|room_id|INTEGER| |+| | | |

issue_of_book

|Имя|Тип|Primary key|Foreign key|Unique|Ограничения|Not null|
|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|
|current_copy_id|INTEGER| | +| | | |
|current_library_card|INTEGER| +| | | | |
|current_worker|INTEGER| | +| | | |
|date_of_issue|DATE| |+| | | NOT NULL|
