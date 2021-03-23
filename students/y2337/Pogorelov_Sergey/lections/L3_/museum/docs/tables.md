# Tables

`Описание всех таблиц системы`

## Автор

| Attribute  |  Type   | PKey  | FKey  | Uniq  | Constraints |
| :--------: | :-----: | :---: | :---: | :---: | :---------: |
|     id     |   int   |   +   |   -   |   +   |     >0      |
|    name    | varchar |   -   |   -   |   +   |     255     |
| birth_date |  date   |   -   |   -   |   -   | Todays date |
|  country   | varchar |   -   |   -   |   -   |     255     |

---

## Экспонаты

|   Attribute   |  Type   | PKey  | FKey  | Uniq  |  Constraints   |
| :-----------: | :-----: | :---: | :---: | :---: | :------------: |
|      id       |   int   |   +   |   -   |   +   |       >0       |
|     name      | varchar |   -   |   -   |   +   |      255       |
| creation_date |  date   |   -   |   -   |   -   |  Todays date   |
|    status     | varchar |   -   |   -   |   -   |  State place   |
|    author     |   int   |   -   |   +   |   -   | Authors amount |

---

## Фонд

|   Attribute   |  Type   | PKey  | FKey  | Uniq  | Constraints |
| :-----------: | :-----: | :---: | :---: | :---: | :---------: |
|      id       |   int   |   +   |   -   |   +   |     >0      |
|   fond_name   | varchar |   -   |   -   |   +   |     255     |
| director_name | varchar |   -   |   -   |   -   |     255     |

---

## Организация

|   Attribute   |  Type   | PKey  | FKey  | Uniq  | Constraints |
| :-----------: | :-----: | :---: | :---: | :---: | :---------: |
|      id       |   int   |   +   |   -   |   +   |     >0      |
|   org_name    | varchar |   -   |   -   |   +   |     255     |
|    adress     | varchar |   -   |   -   |   -   |     255     |
|     phone     |   int   |   -   |   -   |   -   |     11      |
| director_name | varchar |   -   |   -   |   -   |     255     |

---

## Выставка

| Attribute |  Type   | PKey  | FKey  | Uniq  | Constraints |
| :-------: | :-----: | :---: | :---: | :---: | :---------: |
|    id     |   int   |   +   |   -   |   +   |     >0      |
| org_name  | varchar |   -   |   -   |   -   |     255     |

---

## Договор передачи

| Attribute | Type  | PKey  | FKey  | Uniq  | Constraints |
| :-------: | :---: | :---: | :---: | :---: | :---------: |
|    id     |  int  |   +   |   -   |   +   |     >0      |
|   fond    |  int  |   -   |   +   |   -   |     >0      |
|    org    |  int  |   -   |   +   |   -   |     >0      |
|    exh    |  int  |   -   |   +   |   -   |     >0      |
| start_date |  date   |   -   |   -   |   -   | Todays date |
| fin_date |  date   |   -   |   -   |   -   | Todays date |

---

