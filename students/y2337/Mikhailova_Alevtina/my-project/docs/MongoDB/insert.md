##Insert
#### Заполнение таблицы "Admin":
```
> db.admin.insertMany([{name:"Jim"}, {name:"Kate"}, {name:"Mike"}, {name:"John"}])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60daede890d43bd8a665bc69"),
                ObjectId("60daede890d43bd8a665bc6a"),
                ObjectId("60daede890d43bd8a665bc6b"),
                ObjectId("60daede890d43bd8a665bc6c")
        ]
}
```
#### Заполнение таблицы "Climbing Club":
```
> db.climbingClub.insertMany([{contact_person:"8976543", city:"Moscow", country:"Russia", email:"climbingMSC@gmail.com", clubs_name:"MSC climbing club", telephone:"87563529"},{contact_person:"8765432", city:"Saint-Petersburg", country:"Russia", email:"climbingSPB@mail.ru", clubs_name:"SPB climbing club", telephone:"98765432"}, {contact_person:"765432", city:"Kaliningrad", country:" Russia", email:"climbingClubKaliningrad@yandex.ru", clubs_name:"Kaliningrad climbing club", telephone:"8765432"}])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60daf37090d43bd8a665bc6f"),
                ObjectId("60daf37090d43bd8a665bc70"),
                ObjectId("60daf37090d43bd8a665bc71")
        ]
}
```
#### Заполнение таблицы "Group":
```
> db.group.insertMany([{name:"new"}])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60daf88090d43bd8a665bc77")
        ]
}
```
#### Заполнение таблицы "Top":
```
> db.top.insertMany([{name:"Elbrus", location:"border of the republics of Kabardino-Balkaria and Karachay-Cherkessia", country_name:"Russia", top_height:"5642", area_name:"North Caucasus", ascent_num:"20"}])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60daf03190d43bd8a665bc6d")
        ]
}
> db.top.insertMany([{name:"Kilimonjaro", location:"Arfrica", country_name:"Tanzania", top_height:"5891", area_name:"Northeastern Tanzania", ascent_num:"10"}])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60daf0e590d43bd8a665bc6e")
        ]
}
```
#### Заполнение таблицы "Route":
```
> db.route.insertMany([{route_description:"Marangu-from the south side", top:new DBRef("top", id_top1)}, {route_description:"South slope", top: new DBRef("top", id_top2)}])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60daf57f90d43bd8a665bc72"),
                ObjectId("60daf57f90d43bd8a665bc73")
        ]
}
```
#### Заполнение таблицы "Climber":
```
> db.climber.insertMany([{name:"mike", clubs_name:"Moscow climbing club", address:"msc", ascent_chronicle:"10",climbingClub:new DBRef("climbingClub", id_climbingClub1)}, {name:"Kate", clubs_name:"Saint-Petersburg climbing club", address:"spb", ascent_chronicle:"10", climbingClub:new DBRef("climbingClub", id_climbingClub3)}, {name:"Jim", clubs_name:"kaliningrad climbing club", address:"kaliningrad", ascent_chronicle:"10", climbingClub:new DBRef("climbingClub", id_climbingClub3)}])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60daf77d90d43bd8a665bc74"),
                ObjectId("60daf77d90d43bd8a665bc75"),
                ObjectId("60daf77d90d43bd8a665bc76")
        ]
}
```
#### Заполнение таблицы "Ascent":
```
> db.ascent.insertMany([{ascent_date:"2020-08-13", ascent_success:"successfully", ascent_duration:"13:00:00", ascent_time:"10:00:00", admin:new DBRef("admin", id_admin1), group:new DBRef("group", id_group1), route: new DBRef("route", id_route1), top: new DBRef("top", id_top1)}])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60dafe7b90d43bd8a665bc7b")
        ]
}
```
#### Заполнение таблицы "Emergency Situation":
```
> db.emergencySituation.insertMany([{reason:"disaster", admin:new DBRef("admin", id_admin1), group: new DBRef("group", id_group1), climber: new DBRef("climber", id_climber1), climbingClub:new DBRef("climbingClub", id_climbingClub1), route:new DBRef("route", id_route1), top:new DBRef("top", id_top1)}])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60daffdc90d43bd8a665bc7c")
        ]
}
> db.emergencySituation.insertMany([{reason:"disaster", admin:new DBRef("admin", id_admin1), group: new DBRef("group", id_group1), climber: new DBRef("climber", id_climber2), climbingClub:new DBRef("climbingClub", id_climbingClub3), route:new DBRef("route", id_route1), top:new DBRef("top", id_top1)}])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60daffef90d43bd8a665bc7d")
        ]
}
> db.emergencySituation.insertMany([{reason:"disaster", admin:new DBRef("admin", id_admin1), group: new DBRef("group", id_group1), climber: new DBRef("climber", id_climber3), climbingClub:new DBRef("climbingClub", id_climbingClub3), route:new DBRef("route", id_route1), top:new DBRef("top", id_top1)}])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60dafff890d43bd8a665bc7e")
        ]
}
```
#### Заполнение таблицы "Group Composition":
```
> db.groupComposition.insertMany([{num_of_climbers:"3", climbers_information:"first", admin: new DBRef("admin", id_admin1), group:new DBRef("group", id_group1), climber:new DBRef("climber", id_climber1), climbingClub:new DBRef("climbingClub", id_climbingClub1)}])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60dafbf790d43bd8a665bc78")
        ]
}
> db.groupComposition.insertMany([{num_of_climbers:"3", climbers_information:"second", admin: new DBRef("admin", id_admin1), group:new DBRef("group", id_group1), climber:new DBRef("climber", id_climber2), climbingClub:new DBRef("climbingClub", id_climbingClub3)}])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60dafc4390d43bd8a665bc79")
        ]
}
> db.groupComposition.insertMany([{num_of_climbers:"3", climbers_information:"third", admin: new DBRef("admin", id_admin1), group:new DBRef("group", id_group1), climber:new DBRef("climber", id_climber3), climbingClub:new DBRef("climbingClub", id_climbingClub3)}])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60dafc5790d43bd8a665bc7a")
        ]
}
```