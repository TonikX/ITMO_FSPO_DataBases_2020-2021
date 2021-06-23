## Запросы

#### 1 Запрос - Подсчет количества документов в коллекции chicken
```
db.chicken.count ()
``` 
![image](https://user-images.githubusercontent.com/64501412/123015251-97e5a500-d3d0-11eb-961c-db0df59facf2.png)


#### 2 Запрос - Вывод документа, где возраст курицы равен 1-му
```
db.chicken.find( {"age":1} )
``` 
![image](https://user-images.githubusercontent.com/64501412/123015338-d24f4200-d3d0-11eb-8a09-f026dca62dfc.png)


#### 3 Запрос - Вывод данных с текущей датой и id
```
db.healing.insertOne({date: "2021-01-11", _id: ObjectId('60d27802dd10cc7b6032f0e6'), number_cell_in_row: 11})
``` 
![image](https://user-images.githubusercontent.com/64501412/123015424-062a6780-d3d1-11eb-8028-da39e06f7050.png)


#### 4 Запрос - Вывод данных с данным названием диеты и ее наполнением
```
db.healing.insertOne({name_diet: "first", content_diet: "1,2,3"})
``` 
![image](https://user-images.githubusercontent.com/64501412/123015551-4e498a00-d3d1-11eb-99ec-5d6adaa66705.png)
