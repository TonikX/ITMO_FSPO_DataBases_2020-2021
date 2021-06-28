##Insert

#### Заполнение коллекции "Животные":
```
db.Animals.insertMany([
    {name:"Jim",birthday: new Date("2005-04-25")},
    {name:"Tom",birthday: new Date("2005-05-02")},
    {name:"Sue",birthday: new Date("2005-05-30")},
    {name:"Josh",birthday:new Date("2005-06-03")},
    {name:"Joe",birthday:new Date("2005-05-12")}
    ])
```
#### Вывод при заполнении коллекции "Животные":
```
{
	"acknowledged" : true,
	"insertedIds" : [
		ObjectId("60c0c3eed8e7c49af3eb60ec"),
		ObjectId("60c0c3eed8e7c49af3eb60ed"),
		ObjectId("60c0c3eed8e7c49af3eb60ee"),
		ObjectId("60c0c3eed8e7c49af3eb60ef"),
		ObjectId("60c0c3eed8e7c49af3eb60f0")
	]
}
```
#### Заполнение коллекции "Рацион кормления":
```
db.feeding_ration.insertMany([
    {type_ration:"concentrate",description_ration:"feed accounts for 90%, and concentrates - up to 10% in the structure of the diet"},
    {type_ration:"voluminous",description_ration:"concentrates are less than 60% in terms of nutritional value"},
    {type_ration:"moderately-concentrated",description_ration:"concentrates contain 60-70% nutritional value"},
    {type_ration:"concentrate",description_ration:"concentrates contain more than 75% nutritional value"},
    {type_ration:"voluminous",description_ration:"90-70% voluminous and 10-30% concentrates"},
    {type_ration:"concentrate",description_ration:"concentrates more than 40% the rest - bulky"}
    ])
```
#### Вывод при заполнении коллекции "Рацион кормления":
```
{
	"acknowledged" : true,
	"insertedIds" : [
		ObjectId("60c0c812d8e7c49af3eb60f1"),
		ObjectId("60c0c812d8e7c49af3eb60f2"),
		ObjectId("60c0c812d8e7c49af3eb60f3"),
		ObjectId("60c0c812d8e7c49af3eb60f4"),
		ObjectId("60c0c812d8e7c49af3eb60f5"),
		ObjectId("60c0c812d8e7c49af3eb60f6")
	]
}
```
#### Заполнение коллекции "Зона обитания":
```
db.habitat_area.insertMany([
    {name:"Water environment",habitat:"seas, lakes, oceans, lagoons, swamps",characteristics:"Aquatic habitats are home to a wide variety of wildlife species. Almost any group of animals can be found here, from amphibians, reptiles, invertebrates to mammals and birds."},
    {name:"Desert habitats",habitat:"deserts, shrubs",characteristics:"Deserts are quite diverse habitats.Some are sun-baked lands that experience high daytime temperatures. Others are cool and experience cold winters."},
    {name:"Forest habitats",habitat:"temperate forests, rainforests, fog forests, coniferous forests",characteristics:"There are different types of forests: temperate, tropical, foggy, coniferous and boreal. Each of them has different climatic conditions as well as a variety of fauna and flora."},
    {name:"Meadow habitats",habitat:"tropical meadows, steppe meadows, temperate meadow",characteristics:"Meadows are habitats dominated by grasses and very few trees and shrubs. Many animals that live there are herbivores and take their place in the food chain, act as food for predators."},
    {name:"Tundra habitats",habitat:"alpine tundra, arctic tundra",characteristics:"The tundra is a cold habitat. It is characterized by low temperatures, short vegetation, long winters and short growing seasons."
    }])

```
#### Вывод при заполнении коллекции "Зона обитания":
```
{
	"acknowledged" : true,
	"insertedIds" : [
		ObjectId("60c0ca79d8e7c49af3eb60f7"),
		ObjectId("60c0ca79d8e7c49af3eb60f8"),
		ObjectId("60c0ca79d8e7c49af3eb60f9"),
		ObjectId("60c0ca79d8e7c49af3eb60fa"),
		ObjectId("60c0ca79d8e7c49af3eb60fb")
	]
}
```
#### Заполнение коллекции "Здание":
```
db.building.insertMany([
    {address:"Alexandrovsky Park 1AJ"},
    {address:"Alexandrovsky park 1AZ"},
    {address:"Alexandrovsky park 1YA"}
    ])
```
#### Вывод при заполнении коллекции "Здание":
```
{
	"acknowledged" : true,
	"insertedIds" : [
		ObjectId("60c0cc3dd8e7c49af3eb60fc"),
		ObjectId("60c0cc3dd8e7c49af3eb60fd"),
		ObjectId("60c0cc3dd8e7c49af3eb60fe")
	]
}
```
#### Заполнение коллекции "Сотрудник":
```
db.worker.insertMany([
    {FIO:"Yana Bogdanov Danilovna",birthday:new Date("1978-07-01"),post:"zootechik",email:"YanaBogdanov@yandex.com",phone:"+79679834988"},
    {FIO:"Darya Nikulina Semynovna",birthday: new Date("1980-07-11"),post:"animal feeding workers",email:"DaryaNikulina@yandex.com",phone:"+78934984323"},
    {FIO:"Evgeny Rogov Kirllovich",birthday:new Date("1977-08-01"),post:"veterinarian",email:"EvgenyRogov@yandex.com",phone:"+78934984552"},
    {FIO:"Elena Timofeeva Danilovna",birthday: new Date("1987-05-23"),post:"administrator",email:"Timofeeva@yandex.com",phone:"+78955984323"},
    {FIO:"Mir Sergeyeva Vladislavovna",birthday:new Date("1997-04-21"),post:"ornithologists",email:"MirSergeyeva@yandex.com",phone:"+78934984355"}
    ])
```
#### Вывод при заполнении коллекции "Сотрудник":
```
{
	"acknowledged" : true,
	"insertedIds" : [
		ObjectId("60c0d161d8e7c49af3eb60ff"),
		ObjectId("60c0d161d8e7c49af3eb6100"),
		ObjectId("60c0d161d8e7c49af3eb6101"),
		ObjectId("60c0d161d8e7c49af3eb6102"),
		ObjectId("60c0d161d8e7c49af3eb6103")
	]
}
```
#### Заполнение коллекции "Вид":
```
var animal1_id = db.Animals.findOne({name:"Jim"})._id
var animal2_id = db.Animals.findOne({name:"Tom"})._id
var animal3_id = db.Animals.findOne({name:"Sue"})._id
var animal4_id = db.Animals.findOne({name:"Josh"})._id
var animal5_id = db.Animals.findOne({name:"Joe"})._id

db.type.insertMany([
    {animal: new DBRef("Animals",animal1_id),type:"bird",information_about_wintering:"wintering birds fly to warm countries", normal_temperature:"42.5 ° C - 45.5 ° C"},
    {animal: new DBRef("Animals",animal2_id),type:"bird",information_about_wintering:"wintering birds fly to warm countries", normal_temperature:"42.5 ° C - 45.5 ° C"},
    {animal: new DBRef("Animals",animal5_id),type:"iguana"},{animal: new DBRef("Animals",animal4_id),type:"iguana"},
    {animal: new DBRef("Animals",animal3_id),type:"snake"}
    ])
```
#### Вывод при заполнении коллекции "Вид":
```
{
	"acknowledged" : true,
	"insertedIds" : [
		ObjectId("60c26462d8e7c49af3eb6148"),
		ObjectId("60c26462d8e7c49af3eb6149"),
		ObjectId("60c26462d8e7c49af3eb614a"),
		ObjectId("60c26462d8e7c49af3eb614b"),
		ObjectId("60c26462d8e7c49af3eb614c")
	]
}
```
#### Заполнение коллекции "Питание":
```
ration_id = ObjectId("60c0c812d8e7c49af3eb60f1")
ration2_id = ObjectId("60c0c812d8e7c49af3eb60f2") 
ration3_id = ObjectId("60c0c812d8e7c49af3eb60f3")
ration4_id = ObjectId("60c0c812d8e7c49af3eb60f4")
ration5_id = ObjectId("60c0c812d8e7c49af3eb60f5")
ration6_id = ObjectId("60c0c812d8e7c49af3eb60f6")

db.nutrition.insertMany([
    {animal:new DBRef("Animals",animal1_id),feeding_ration:new DBRef("feeding_ration",ration2_id),feeding_time:"14:30:00"},
    {animal:new DBRef("Animals",animal2_id),feeding_ration:new DBRef("feeding_ration",ration_id),feeding_time:"10:34:00"},
    {animal:new DBRef("Animals",animal3_id),feeding_ration:new DBRef("feeding_ration",ration5_id),feeding_time:"11:00:00"},
    {animal:new DBRef("Animals",animal4_id),feeding_ration:new DBRef("feeding_ration",ration6_id),feeding_time:"12:35:00"},
    {animal:new DBRef("Animals",animal5_id),feeding_ration:new DBRef("feeding_ration",ration4_id),feeding_time:"15:00:00"}
    ])
```
#### Вывод при заполнении коллекции "Питание":
```
{
	"acknowledged" : true,
	"insertedIds" : [
		ObjectId("60c25e5bd8e7c49af3eb6130"),
		ObjectId("60c25e5bd8e7c49af3eb6131"),
		ObjectId("60c25e5bd8e7c49af3eb6132"),
		ObjectId("60c25e5bd8e7c49af3eb6133"),
		ObjectId("60c25e5bd8e7c49af3eb6134")
	]
}
```
#### Заполнение коллекции "Территория зоопарка":
```
building1 = ObjectId("60c0cc3dd8e7c49af3eb60fc")
building2 = ObjectId("60c0cc3dd8e7c49af3eb60fd")
building3_id = ObjectId("60c0cc3dd8e7c49af3eb60fe")


> db.zoo_territory.insertMany([
    {animal:new DBRef("Animals",animal3_id),building:new DBRef("building",building1),habitat_period:"15.08.2015-16.02.2025"},
    {animal:new DBRef("Animals",animal4_id),building:new DBRef("building",building1),habitat_period:"12.01.2012-23.09.2023"}, 
    {animal:new DBRef("Animals",animal2_id),building:new DBRef("building",building2),habitat_period:"12.01.2012-23.09.2023"}, 
    {animal:new DBRef("Animals",animal5_id),building:new DBRef("building",building1),habitat_period:"15.08.2015-16.02.2025"}
    ])
```
#### Вывод при заполнении коллекции "Территория зоопарка":
```
{
	"acknowledged" : true,
	"insertedIds" : [
		ObjectId("60c25fd6d8e7c49af3eb6135"),
		ObjectId("60c25fd6d8e7c49af3eb6136"),
		ObjectId("60c25fd6d8e7c49af3eb6137"),
		ObjectId("60c25fd6d8e7c49af3eb6138")
	]
}
```
#### Заполнение коллекции "Обитание":
```
db.habitation.insertMany([
    {animal: new DBRef("Animals",animal4_id),habitat_area: new DBRef("habitat_area",habitat_area3)},
    {animal: new DBRef("Animals",animal3_id), habitat_area: new DBRef("habitat_area",habitat_area1)},
    {animal:new DBRef("Animals",animal1_id), habitat_area: new DBRef("habitat_area",habitat_area4)},
    {animal:new DBRef("Animals",animal5_id), habitat_area: new DBRef("habitat_area",habitat_area1)}
    ])
```
#### Вывод при заполнении коллекции "Обитание":
```
{
	"acknowledged" : true,
	"insertedIds" : [
		ObjectId("60c26160d8e7c49af3eb6139"),
		ObjectId("60c26160d8e7c49af3eb613a"),
		ObjectId("60c26160d8e7c49af3eb613b"),
		ObjectId("60c26160d8e7c49af3eb613c")
	]
}
```
#### Заполнение коллекции "Обслуживание":
```
worker1 =  ObjectId("60c0d161d8e7c49af3eb60ff")
worker2 =  ObjectId("60c0d161d8e7c49af3eb6100")
worker3 =  ObjectId("60c0d161d8e7c49af3eb6101")
worker4 = ObjectId("60c0d161d8e7c49af3eb6102")
worker5 = ObjectId("60c0d161d8e7c49af3eb6103")

db.service.insertMany([
    {worker: new DBRef("worker",worker2), animal: new DBRef("Animals",animal1_id),service:"feeding every day at 10:00 and 19:00"},
    {worker: new DBRef("worker",worker2), animal: new DBRef("Animals",animal2_id),service:"feeding every day at 10:00 and 19:00"},
    {worker: new DBRef("worker",worker2), animal: new DBRef("Animals",animal3_id),service:"feeding every day at 11:00 and 20:00"},
    {worker: new DBRef("worker",worker2), animal: new DBRef("Animals",animal4_id),service:"feeding every day at 11:00 and 20:00"},
    {worker: new DBRef("worker",worker2), animal: new DBRef("Animals",animal5_id),service:"feeding every day at 9:00 and 17:00"},
    {worker: new DBRef("worker",worker3), animal: new DBRef("Animals",animal1_id),service:"Monday at 9:00"},
    {worker: new DBRef("worker",worker3), animal: new DBRef("Animals",animal2_id),service:"Wednesday at 11:00"},
    {worker: new DBRef("worker",worker3), animal: new DBRef("Animals",animal3_id),service:"Tuesday at 12:00"},
    {worker: new DBRef("worker",worker3), animal: new DBRef("Animals",animal4_id),service:"Wednesday at 11:00"},
    {worker: new DBRef("worker",worker3), animal: new DBRef("Animals",animal5_id),service:"Monday at 10:00"}
    ])
```
#### Вывод при заполнении коллекции "Обслуживание":
```
{
	"acknowledged" : true,
	"insertedIds" : [
		ObjectId("60c26323d8e7c49af3eb613d"),
		ObjectId("60c26323d8e7c49af3eb613e"),
		ObjectId("60c26323d8e7c49af3eb613f"),
		ObjectId("60c26323d8e7c49af3eb6140"),
		ObjectId("60c26323d8e7c49af3eb6141"),
		ObjectId("60c26323d8e7c49af3eb6142"),
		ObjectId("60c26323d8e7c49af3eb6143"),
		ObjectId("60c26323d8e7c49af3eb6144"),
		ObjectId("60c26323d8e7c49af3eb6145"),
		ObjectId("60c26323d8e7c49af3eb6146")
	]
}
```