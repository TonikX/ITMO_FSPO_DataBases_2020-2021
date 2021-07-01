# Tables creation and filling

#### `Таблица "Admin"`

```
db.Admin.insertMany([
...                         {Full_name:"Alex Brancher"},
...                         {Full_name:"Gary Miles"}
...                     ])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60dda758d818609196ad0fa9"),
                ObjectId("60dda758d818609196ad0faa")
        ]
}

```

#### `Таблица «Servant»`

```
db.Servant.insertMany([
...                         {Full_name:"Kyle Mcferren"},
...                         {Full_name:"Sylvia Kalen"},
...                         {Full_name:"Mary Gor"}
...                      ])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60ddb767d818609196ad0fb9"),
                ObjectId("60ddb767d818609196ad0fba"),
                ObjectId("60ddb767d818609196ad0fbb")
        ]
}
```

#### `Таблица «Сity»`

```
db.City.insertMany([
...                          {Name:"Yorkshire"},
...                          {Name:"Copenhagen"},
...                          {Name:"Jerusalim"},
...                          {Name:"Bruges"},
...                          {Name:"Dresden"},
...                          {Name:"Quito"},
...                          {Name:"Riyadh"},
...                          {Name:"Riga"},
...                          {Name:"Oslo"},
...                          {Name:"Houston"},
...                          {Name:"Seoul"}
...                    ])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60ddb796d818609196ad0fbc"),
                ObjectId("60ddb796d818609196ad0fbd"),
                ObjectId("60ddb796d818609196ad0fbe"),
                ObjectId("60ddb796d818609196ad0fbf"),
                ObjectId("60ddb796d818609196ad0fc0"),
                ObjectId("60ddb796d818609196ad0fc1"),
                ObjectId("60ddb796d818609196ad0fc2"),
                ObjectId("60ddb796d818609196ad0fc3"),
                ObjectId("60ddb796d818609196ad0fc4"),
                ObjectId("60ddb796d818609196ad0fc5"),
                ObjectId("60ddb796d818609196ad0fc6")
        ]
}
```

#### `Таблица «Suite»`

```
db.Suite.insertMany([
...                           {Number:"1", status:"f", rooms:"2", price:"1500", floor:"1"},
...                           {Number:"2", status:"t", rooms:"3", price:"2000", floor:"1"},
...                           {Number:"3", status:"t", rooms:"1", price:"1100", floor:"1"},
...                           {Number:"4", status:"f", rooms:"3", price:"2700", floor:"1"},
...                           {Number:"10", status:"f", rooms:"2", price:"2600", floor:"2"},
...                           {Number:"11", status:"t", rooms:"2", price:"2900", floor:"2"},
...                           {Number:"12", status:"t", rooms:"2", price:"1950", floor:"2"},
...                           {Number:"13", status:"f", rooms:"1", price:"1600", floor:"2"},
...                           {Number:"20", status:"t", rooms:"2", price:"2000", floor:"3"},
...                           {Number:"21", status:"t", rooms:"1", price:"1000", floor:"3"},
...                           {Number:"22", status:"f", rooms:"3", price:"2900", floor:"3"},
...                           {Number:"23", status:"t", rooms:"2", price:"2100", floor:"3"}
...                     ])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60ddb985d818609196ad0fc7"),
                ObjectId("60ddb985d818609196ad0fc8"),
                ObjectId("60ddb985d818609196ad0fc9"),
                ObjectId("60ddb985d818609196ad0fca"),
                ObjectId("60ddb985d818609196ad0fcb"),
                ObjectId("60ddb985d818609196ad0fcc"),
                ObjectId("60ddb985d818609196ad0fcd"),
                ObjectId("60ddb985d818609196ad0fce"),
                ObjectId("60ddb985d818609196ad0fcf"),
                ObjectId("60ddb985d818609196ad0fd0"),
                ObjectId("60ddb985d818609196ad0fd1"),
                ObjectId("60ddb985d818609196ad0fd2")
        ]
}
```

#### `Создание переменных для внешних ключей`

##### `Таблица "Admin"`

```
admin_id_1 = ObjectId("60dda758d818609196ad0fa9")
admin_id_2 = ObjectId("60dda758d818609196ad0faa")
```

##### `Таблица «Servant»`

```
servant_id_1 = ObjectId("60ddb767d818609196ad0fba")
servant_id_2 = ObjectId("60ddb767d818609196ad0fb9")
servant_id_3 = ObjectId("60ddb767d818609196ad0fbb")
```

##### `Таблица «Сity»`

```
city_id_1 = ObjectId("60ddb796d818609196ad0fbc")
city_id_2 = ObjectId("60ddb796d818609196ad0fbd")
city_id_3 = ObjectId("60ddb796d818609196ad0fbe")
city_id_4 = ObjectId("60ddb796d818609196ad0fbf")
city_id_5 = ObjectId("60ddb796d818609196ad0fc0")
city_id_6 = ObjectId("60ddb796d818609196ad0fc1")
city_id_7 = ObjectId("60ddb796d818609196ad0fc2")
city_id_8 = ObjectId("60ddb796d818609196ad0fc3")
city_id_9 = ObjectId("60ddb796d818609196ad0fc4")
city_id_10 = ObjectId("60ddb796d818609196ad0fc5")
city_id_11 = ObjectId("60ddb796d818609196ad0fc6")
```

##### `Таблица «Suite»`

```
suite_id_1 = ObjectId("60ddb985d818609196ad0fc7")
suite_id_2 = ObjectId("60ddb985d818609196ad0fc8")
suite_id_3 = ObjectId("60ddb985d818609196ad0fc9")
suite_id_4 = ObjectId("60ddb985d818609196ad0fca")
suite_id_5 = ObjectId("60ddb985d818609196ad0fcb")
suite_id_6 = ObjectId("60ddb985d818609196ad0fcc")
suite_id_7 = ObjectId("60ddb985d818609196ad0fcd")
suite_id_8 = ObjectId("60ddb985d818609196ad0fce")
suite_id_9 = ObjectId("60ddb985d818609196ad0fcf")
suite_id_10 = ObjectId("60ddb985d818609196ad0fd0")
suite_id_11 = ObjectId("60ddb985d818609196ad0fd1")
suite_id_12 = ObjectId("60ddb985d818609196ad0fd2")
```

#### `Таблица «Сlient»`

```
db.Client.insertMany([
...                            {name:"Ida Schultz", passport:"207048", city_id:new DBRef("City", city_id_1)},
...                            {name:"Belinda Stephenson", passport:"127296", city_id:new DBRef("City", city_id_10)},
...                            {name:"Tuesday Chambers", passport:"276974", city_id:new DBRef("City", city_id_10)},
...                            {name:"Polly Harper", passport:"709379", city_id:new DBRef("City", city_id_7)},
...                            {name:"Wan Jae-Hwa", passport:"836301", city_id:new DBRef("City", city_id_11)},
...                            {name:"Ilsa Langer", passport:"534756", city_id:new DBRef("City", city_id_5)},
...                            {name:"Alf Engel", passport:"435059", city_id:new DBRef("City", city_id_4)},
...                            {name:"Vince Robson", passport:"439619", city_id:new DBRef("City", city_id_1)},
...                            {name:"Kennard Fernandez", passport:"106890", city_id:new DBRef("City", city_id_6)},
...                            {name:"Wesley Tomlinson", passport:"684508", city_id:new DBRef("City", city_id_9)},
...                            {name:"Leo Hayes", passport:"848394", city_id:new DBRef("City", city_id_7)},
...                            {name:"Vince Vega", passport:"789829", city_id:new DBRef("City", city_id_5)}
...                      ])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60ddbec1d818609196ad0fd3"),
                ObjectId("60ddbec1d818609196ad0fd4"),
                ObjectId("60ddbec1d818609196ad0fd5"),
                ObjectId("60ddbec1d818609196ad0fd6"),
                ObjectId("60ddbec1d818609196ad0fd7"),
                ObjectId("60ddbec1d818609196ad0fd8"),
                ObjectId("60ddbec1d818609196ad0fd9"),
                ObjectId("60ddbec1d818609196ad0fda"),
                ObjectId("60ddbec1d818609196ad0fdb"),
                ObjectId("60ddbec1d818609196ad0fdc"),
                ObjectId("60ddbec1d818609196ad0fdd"),
                ObjectId("60ddbec1d818609196ad0fde")
        ]
}
```

#### `Создание переменных для внешних ключей для таблицы «Client»`

##### `Таблица «Client»`

```
client_id_1 = ObjectId("60ddbec1d818609196ad0fd3")
client_id_2 = ObjectId("60ddbec1d818609196ad0fd4")
client_id_3 = ObjectId("60ddbec1d818609196ad0fd5")
client_id_4 = ObjectId("60ddbec1d818609196ad0fd6")
client_id_5 = ObjectId("60ddbec1d818609196ad0fd7")
client_id_6 = ObjectId("60ddbec1d818609196ad0fd8")
client_id_7 = ObjectId("60ddbec1d818609196ad0fd9")
client_id_8 = ObjectId("60ddbec1d818609196ad0fda")
client_id_9 = ObjectId("60ddbec1d818609196ad0fdb")
client_id_10 = ObjectId("60ddbec1d818609196ad0fdc")
client_id_11 = ObjectId("60ddbec1d818609196ad0fdd")
client_id_12 = ObjectId("60ddbec1d818609196ad0fde")
```

#### `Таблица «Living»`

```
db.Living.insertMany([
...                            {d_in:new Date("2003-04-23"), d_out:new Date("2003-04-30"), adm_id:new DBRef("Admin", admin_id_1), suite_id:new DBRef("Suite", suite_id_2), client_id:new DBRef("Client", client_id_2)},
...                            {d_in:new Date("2003-04-23"), d_out:new Date("2003-04-30"), adm_id:new DBRef("Admin", admin_id_1), suite_id:new DBRef("Suite", suite_id_2), client_id:new DBRef("Client", client_id_3)},
...                            {d_in:new Date("2003-04-23"), d_out:new Date("2003-04-30"), adm_id:new DBRef("Admin", admin_id_1), suite_id:new DBRef("Suite", suite_id_2), client_id:new DBRef("Client", client_id_8)},
...                            {d_in:new Date("2003-04-24"), d_out:new Date("2003-04-25"), adm_id:new DBRef("Admin", admin_id_2), suite_id:new DBRef("Suite", suite_id_5), client_id:new DBRef("Client", client_id_5)},
...                            {d_in:new Date("2003-04-25"), d_out:new Date("2003-04-27"), adm_id:new DBRef("Admin", admin_id_1), suite_id:new DBRef("Suite", suite_id_9), client_id:new DBRef("Client", client_id_4)},
...                            {d_in:new Date("2003-04-24"), d_out:new Date("2003-04-29"), adm_id:new DBRef("Admin", admin_id_2), suite_id:new DBRef("Suite", suite_id_8), client_id:new DBRef("Client", client_id_6)},
...                            {d_in:new Date("2003-04-27"), d_out:new Date("2003-05-04"), adm_id:new DBRef("Admin", admin_id_2), suite_id:new DBRef("Suite", suite_id_10), client_id:new DBRef("Client", client_id_9)},
...                            {d_in:new Date("2003-05-01"), d_out:new Date("2003-05-06"), adm_id:new DBRef("Admin", admin_id_1), suite_id:new DBRef("Suite", suite_id_7), client_id:new DBRef("Client", client_id_7)},
...                            {d_in:new Date("2003-04-30"), d_out:new Date("2003-05-03"), adm_id:new DBRef("Admin", admin_id_2), suite_id:new DBRef("Suite", suite_id_12), client_id:new DBRef("Client", client_id_10)}
...                      ])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60ddc200d818609196ad0fdf"),
                ObjectId("60ddc200d818609196ad0fe0"),
                ObjectId("60ddc200d818609196ad0fe1"),
                ObjectId("60ddc200d818609196ad0fe2"),
                ObjectId("60ddc200d818609196ad0fe3"),
                ObjectId("60ddc200d818609196ad0fe4"),
                ObjectId("60ddc200d818609196ad0fe5"),
                ObjectId("60ddc200d818609196ad0fe6"),
                ObjectId("60ddc200d818609196ad0fe7")
        ]
}
```

#### `Таблица «Cleaning»`

```
db.Cleaning.insertMany([
... ...                            {floor:"1", d:new Date("2003-04-25"), adm_id:new DBRef("Admin", admin_id_1), suite_id:new DBRef("Suite", suite_id_1), serv_id:new DBRef("Servant", servant_id_2)},
... ...                            {floor:"2", d:new Date("2003-04-25"), adm_id:new DBRef("Admin", admin_id_1), suite_id:new DBRef("Suite", suite_id_5), serv_id:new DBRef("Servant", servant_id_2)},
... ...                            {floor:"3", d:new Date("2003-04-25"), adm_id:new DBRef("Admin", admin_id_2), suite_id:new DBRef("Suite", suite_id_10), serv_id:new DBRef("Servant", servant_id_2)},
... ...                            {floor:"1", d:new Date("2003-04-26"), adm_id:new DBRef("Admin", admin_id_2), suite_id:new DBRef("Suite", suite_id_1), serv_id:new DBRef("Servant", servant_id_1)},
... ...                            {floor:"2", d:new Date("2003-04-26"), adm_id:new DBRef("Admin", admin_id_1), suite_id:new DBRef("Suite", suite_id_7), serv_id:new DBRef("Servant", servant_id_1)},
... ...                            {floor:"2", d:new Date("2003-04-26"), adm_id:new DBRef("Admin", admin_id_2), suite_id:new DBRef("Suite", suite_id_8), serv_id:new DBRef("Servant", servant_id_1)},
... ...                            {floor:"1", d:new Date("2003-04-27"), adm_id:new DBRef("Admin", admin_id_1), suite_id:new DBRef("Suite", suite_id_2), serv_id:new DBRef("Servant", servant_id_3)},
... ...                            {floor:"3", d:new Date("2003-04-27"), adm_id:new DBRef("Admin", admin_id_1), suite_id:new DBRef("Suite", suite_id_9), serv_id:new DBRef("Servant", servant_id_3)},
... ...                            {floor:"3", d:new Date("2003-04-27"), adm_id:new DBRef("Admin", admin_id_1), suite_id:new DBRef("Suite", suite_id_12), serv_id:new DBRef("Servant", servant_id_3)},
... ...                            {floor:"1", d:new Date("2003-04-28"), adm_id:new DBRef("Admin", admin_id_2), suite_id:new DBRef("Suite", suite_id_2), serv_id:new DBRef("Servant", servant_id_2)}
... ...                      ])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60ddc452d818609196ad0ffb"),
                ObjectId("60ddc452d818609196ad0ffc"),
                ObjectId("60ddc452d818609196ad0ffd"),
                ObjectId("60ddc452d818609196ad0ffe"),
                ObjectId("60ddc452d818609196ad0fff"),
                ObjectId("60ddc452d818609196ad1000"),
                ObjectId("60ddc452d818609196ad1001"),
                ObjectId("60ddc452d818609196ad1002"),
                ObjectId("60ddc452d818609196ad1003"),
                ObjectId("60ddc452d818609196ad1004")
        ]
}
```

#### `Таблица «Contract»`

```
db.Contract.insertMany([
...                            {status:"t", text:"You are hired!", d_o_a:new Date("2003-04-15"), adm_id:new DBRef("Admin", admin_id_1), serv_id:new DBRef("Servant", servant_id_1)},
...                            {status:"t", text:"You are hired too!", d_o_a:new Date("2003-04-17"), adm_id:new DBRef("Admin", admin_id_2), serv_id:new DBRef("Servant", servant_id_2)},
...                            {status:"t", text:"You are hired three!", d_o_a:new Date("2003-04-19"), adm_id:new DBRef("Admin", admin_id_1), serv_id:new DBRef("Servant", servant_id_3)}
...                      ])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60ddc429d818609196ad0ff8"),
                ObjectId("60ddc429d818609196ad0ff9"),
                ObjectId("60ddc429d818609196ad0ffa")
        ]
}
```