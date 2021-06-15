--Подсчет кол-ва документов в коллекции animals

db.animals.count()

![image](https://user-images.githubusercontent.com/58090572/121997321-dc5eb880-cdb2-11eb-9d6c-9628cc2fa76f.png)

--Вывод документа, где тип = рептилия

db.animals.find( {"type":"reptile"} )

![image](https://user-images.githubusercontent.com/58090572/121997314-d7016e00-cdb2-11eb-92d8-80d1fed57f69.png)

--Вывод документа, где поля пол и тип выведены в верхнем регистре

db.animals.aggregate([{$project:{sex: { $toUpper: "$sex" },type: { $toUpper: "$type" }}}])

![image](https://user-images.githubusercontent.com/58090572/121997293-cf41c980-cdb2-11eb-982d-60b7336b087f.png)


--Ввод данных с текущей датой

db.healing.insertOne({date: "2021-06-15", doctor_id: ObjectId('60c826bdc0118415c8ca2ff0'), animals_id: ObjectId('60c81a8bc0118415c8ca2fed')})

![image](https://user-images.githubusercontent.com/58090572/121997270-c7822500-cdb2-11eb-9706-164575866696.png)


