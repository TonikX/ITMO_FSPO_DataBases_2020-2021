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

Code of creation:
CREATE TABLE `books` (
  `id_book` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `authors` varchar(50) NOT NULL,
  `publishing_house` varchar(50) NOT NULL,
  `year_of_publishing` date NOT NULL,
  `section` varchar(50) NOT NULL,
  `number_of_copies` int(11) NOT NULL,
  `attachment_date` date DEFAULT NULL,
  `date_of_receiving` date DEFAULT NULL,
  `writeoff_date` date DEFAULT NULL,
  PRIMARY KEY (`id_book`),
  UNIQUE KEY `id_book` (`id_book`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

worker

|Имя|Тип|Primary key|Foreign key|Unique|Ограничения|Not null|
|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|
|id_worker| SERIAL|+| | | | NOT NULL|
|date_of_receipt|DATE| | | | | NOT NULL|
|timetable|VARCHAR| | | | 50| NOT NULL|
|fio_worker|VARCHAR| | | | 50| NOT NULL|
|id_library|INTEGER| | | | | NOT NULL|

Code of creation:
CREATE TABLE `worker` (
  `id_worker` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date_of_receipt` date NOT NULL,
  `timetable` varchar(50) NOT NULL,
  `fio_worker` varchar(50) NOT NULL,
  `id_library` int(11) NOT NULL,
  PRIMARY KEY (`id_worker`),
  UNIQUE KEY `id_worker` (`id_worker`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

copy_of_book

|Имя|Тип|Primary key|Foreign key|Unique|Ограничения|Not null|
|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|
|id_copy| SERIAL|+| | | | NOT NULL|
|copy_status|VARCHAR| | | | 50| NOT NULL|
|collection_and_issue_dates|VARCHAR| | | | 50| NOT NULL|
|copy_of_book_id|INTEGER| |+| | | |

Code of creation:
CREATE TABLE `copy_of_book` (
  `id_copy` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `copy_status` varchar(50) NOT NULL,
  `collection_and_issue_dates` varchar(50) NOT NULL,
  `copy_of_book_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_copy`),
  UNIQUE KEY `id_copy` (`id_copy`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

reading_rooms

|Имя|Тип|Primary key|Foreign key|Unique|Ограничения|Not null|
|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|
|id_room| SERIAL|+| | | | NOT NULL|
|name_room|VARCHAR| | | | 50| NOT NULL|
|capacity|INTEGER| || | | NOT NULL|

Code of creation:
CREATE TABLE `reading_rooms` (
  `id_room` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_room` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  PRIMARY KEY (`id_room`),
  UNIQUE KEY `id_room` (`id_room`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

attachment_in_room

|Имя|Тип|Primary key|Foreign key|Unique|Ограничения|Not null|
|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|
|id_attachment| SERIAL|+| | | | NOT NULL|
|date_attachment|DATE| | | | | NOT NULL|
|library_card|INTEGER| |+| | 50| |
|transfer_date|DATE| | | | | |
|room_id|INTEGER| |+| | | |

Code of creation:
CREATE TABLE `attachment_in_room` (
  `id_attachment` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date_attachment` date NOT NULL,
  `library_card` int(11) DEFAULT NULL,
  `transfer_date` date DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_attachment`),
  UNIQUE KEY `id_attachment` (`id_attachment`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

issue_of_book

|Имя|Тип|Primary key|Foreign key|Unique|Ограничения|Not null|
|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|:--------:|
|current_copy_id|INTEGER| | +| | | |
|current_library_card|INTEGER| +| | | | |
|current_worker|INTEGER| | +| | | |
|date_of_issue|DATE| |+| | | NOT NULL|

Code of creation:
CREATE TABLE `issue_of_book` (
  `current_copy_id` int(11) DEFAULT NULL,
  `current_library_card` int(11) DEFAULT NULL,
  `current_worker` int(11) DEFAULT NULL,
  `date_of_issue` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
