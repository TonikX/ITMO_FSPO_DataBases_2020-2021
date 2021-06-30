## Create & Insert

#### Создание и заполнение таблицы "Owner"

```
db.Owner.insertMany([
                        {Full_name:"Sakura Haruno"},
                        {Full_name:"Shikamaru Nara"},										
                        {Full_name:"Uzumaki Naruto"},
                        {Full_name:"Uchiha Sasuke"},
                        {Full_name:"Kakashi Hatake"}
            		])
            		
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60c887f4bb5cf54303651ec2"),
                ObjectId("60c887f4bb5cf54303651ec3"),
                ObjectId("60c887f4bb5cf54303651ec4"),
                ObjectId("60c887f4bb5cf54303651ec5"),
                ObjectId("60c887f4bb5cf54303651ec6")
        ]
}
```

#### Создание и заполнение таблицы "Ring"

```
db.Ring.insertMany([
                        {ring_number:"1"},
                        {ring_number:"2"}, 
                        {ring_number:"3"}
                    ])
                    
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60c888c7bb5cf54303651ec7"),
                ObjectId("60c888c7bb5cf54303651ec8"),
                ObjectId("60c888c7bb5cf54303651ec9")
        ]
}
```

#### Создание и заполнение таблицы "Exhibition"

```
db.Exhibition.insertMany([
							{type:"monobreed"},
                            {type:"monobreed"}, 
                            {type:"polybreed"}
                         ])
                         
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60c889a2bb5cf54303651eca"),
                ObjectId("60c889a2bb5cf54303651ecb"),
                ObjectId("60c889a2bb5cf54303651ecc")
        ]
}
```

#### Создание и заполнение таблицы "Expert"

```
 db.Expert.insertMany([
                 {FN:"Min Yoongi", contract:"0", expert_club:"Seirin"},
                 {FN:"Jeon Jungkook", contract:"1", expert_club:"Teiko"}, 
                 {FN:"Kim Namjoon", contract:"0", expert_club:"Rakuzan"}, 
                 {FN:"Kim Taehyung", contract:"1", expert_club:"Teiko"},
                 {FN:"Park Jimin", contract:"1", expert_club:"Rakuzan"}
                 	])
 
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60c88c46bb5cf54303651ecd"),
                ObjectId("60c88c46bb5cf54303651ece"),
                ObjectId("60c88c46bb5cf54303651ecf"),
                ObjectId("60c88c46bb5cf54303651ed0"),
                ObjectId("60c88c46bb5cf54303651ed1")
        ]
}

```

#### Создание переменных для внешних ключей

##### Из таблицы "Owner"

```
owner1_id = ObjectId("60c887f4bb5cf54303651ec2")
owner2_id = ObjectId("60c887f4bb5cf54303651ec3")
owner3_id = ObjectId("60c887f4bb5cf54303651ec4")
owner4_id = ObjectId("60c887f4bb5cf54303651ec5")
owner5_id = ObjectId("60c887f4bb5cf54303651ec6")
```

##### Из таблицы "Ring"

```
ring_id = ObjectId("60c888c7bb5cf54303651ec7")
ring2_id = ObjectId("60c888c7bb5cf54303651ec8")
ring3_id = ObjectId("60c888c7bb5cf54303651ec9")
```

##### Из таблицы "Expert"

```
expert1_id = ObjectId("60c88c46bb5cf54303651ecd")
expert2_id = ObjectId("60c88c46bb5cf54303651ece")
expert3_id = ObjectId("60c88c46bb5cf54303651ecf")
expert4_id = ObjectId("60c88c46bb5cf54303651ed0")
expert5_id = ObjectId("60c88c46bb5cf54303651ed1")
```

##### Из таблицы "Dog"

```
dog1_id = ObjectId("60c890e9bb5cf54303651ed2")
dog2_id = ObjectId("60c890e9bb5cf54303651ed3")
dog3_id = ObjectId("60c890e9bb5cf54303651ed4")
dog4_id = ObjectId("60c890e9bb5cf54303651ed5")
dog5_id = ObjectId("60c890e9bb5cf54303651ed6")
```

##### Из таблицы "Exhibition"

```
exhibition1_id = ObjectId("60c889a2bb5cf54303651eca")
exhibition2_id = ObjectId("60c889a2bb5cf54303651ecb")
exhibition3_id = ObjectId("60c889a2bb5cf54303651ecc")
```

#### Создание и заполнение таблицы "Dog"

```
db.Dog.insertMany([
					{name:"Jean", passport:"14567", date_vaccination:new Date("2021-12-20"), members_club:"Karasuno", id_owner:new DBRef("Owner", owner1_id)}, 
					{name:"Levi", passport:"38712", date_vaccination:new Date("2021-11-20"), members_club:"Sharitoridzava", id_owner:new DBRef("Owner", owner2_id)},
                    {name:"Mikasa", passport:"98512", date_vaccination:new Date("2020-09-20"), members_club:"Karasuno", id_owner:new DBRef("Owner", owner3_id)}, 
                    {name:"Eren", passport:"12334", date_vaccination:new Date("2021-07-20"), members_club:"Nekoma", id_owner:new DBRef("Owner", owner4_id)},
                    {name:"Armin", passport:"80294", date_vaccination:new Date("2021-02-18"), members_club:"Sharitoridzava", id_owner:new DBRef("Owner", owner5_id)}
					])
					
{
     "acknowledged" : true,
     "insertedIds" : [
             ObjectId("60c890e9bb5cf54303651ed2"),
             ObjectId("60c890e9bb5cf54303651ed3"),
             ObjectId("60c890e9bb5cf54303651ed4"),
             ObjectId("60c890e9bb5cf54303651ed5"),
             ObjectId("60c890e9bb5cf54303651ed6")
     ]
}
```

#### Создание и заполнение таблицы "Judging"

```
db.Judging.insertMany([
			{results:"7", id_ring:new DBRef("Ring", ring_id), id_expert:new DBRef("Expert", expert1_id)}, 
			{results:"10", id_ring:new DBRef("Ring", ring2_id), id_expert:new DBRef("Expert", expert2_id)},
			{results:"8", id_ring:new DBRef("Ring", ring3_id), id_expert:new DBRef("Expert", expert3_id)},  
			{results:"5", id_ring:new DBRef("Ring", ring_id), id_expert:new DBRef("Expert", expert4_id)},  
		{results:"3", id_ring:new DBRef("Ring", ring2_id), id_expert:new DBRef("Expert", expert5_id)}
					])
					
{
"acknowledged" : true,
"insertedIds" : [
        ObjectId("60c8a45abb5cf54303651ed7"),
        ObjectId("60c8a45abb5cf54303651ed8"),
        ObjectId("60c8a45abb5cf54303651ed9"),
        ObjectId("60c8a45abb5cf54303651eda"),
        ObjectId("60c8a45abb5cf54303651edb")
]
}
```

#### Создание и заполнение таблицы "Performance"

```
db.Perform.insertMany([
                    {grade:"6", interm_results:"good", final_rating:"prize-winner", id_ring:new DBRef("Ring", ring_id), id_dog:new DBRef("Dog", dog1_id), id_exhibition:new DBRef("Exhibition", exhibition1_id)}, 
                    {grade:"10", interm_results:"excellent", final_rating:"winner", id_ring:new DBRef("Ring", ring2_id), id_dog:new DBRef("Dog", dog2_id), id_exhibition:new DBRef("Exhibition", exhibition3_id)},
                    {grade:"8", interm_results:"very good", final_rating:"prize-winner", id_ring:new DBRef("Ring", ring3_id), id_dog:new DBRef("Dog", dog3_id), id_exhibition:new DBRef("Exhibition", exhibition3_id)}, 
                    {grade:"5", interm_results:"not bad", final_rating:"certificate of participation", id_ring:new DBRef("Ring", ring_id), id_dog:new DBRef("Dog", dog4_id), id_exhibition:new DBRef("Exhibition", exhibition1_id)}, 
                    {grade:"3", interm_results:"bad", final_rating:"certificate of participation", id_ring:new DBRef("Ring", ring2_id), id_dog:new DBRef("Dog", dog5_id), id_exhibition:new DBRef("Exhibition", exhibition2_id)}
					 ])

{
     "acknowledged" : true,
     "insertedIds" : [
             ObjectId("60c8a811bb5cf54303651edc"),
             ObjectId("60c8a811bb5cf54303651edd"),
             ObjectId("60c8a811bb5cf54303651ede"),
             ObjectId("60c8a811bb5cf54303651edf"),
             ObjectId("60c8a811bb5cf54303651ee0")
     ]
}

```

#### Создание и заполнение таблицы "Registration"

```
db.Registration.insertMany([
                            {chequel:"10.201 rub", status:"1", id_exhibition:new DBRef("Exhibition", exhibition1_id), id_dog:new DBRef("Dog", dog1_id), id_owner:new DBRef("Owner", owner1_id)},
                            {chequel:"8.960 rub", status:"0", id_exhibition:new DBRef("Exhibition", exhibition2_id), id_dog:new DBRef("Dog", dog2_id), id_owner:new DBRef("Owner", owner2_id)},
                            {chequel:"8.990 rub", status:"1", id_exhibition:new DBRef("Exhibition", exhibition3_id), id_dog:new DBRef("Dog", dog3_id), id_owner:new DBRef("Owner", owner3_id)}, 
                            {chequel:"4.980 rub", status:"0", id_exhibition:new DBRef("Exhibition", exhibition1_id), id_dog:new DBRef("Dog", dog4_id), id_owner:new DBRef("Owner", owner4_id)}, 
                            {chequel:"12.000 rub", status:"1", id_exhibition:new DBRef("Exhibition", exhibition2_id), id_dog:new DBRef("Dog", dog5_id), id_owner:new DBRef("Owner", owner5_id)}
                            ])
{
        "acknowledged" : true,
        "insertedIds" : [
                ObjectId("60c8aab9bb5cf54303651ee1"),
                ObjectId("60c8aab9bb5cf54303651ee2"),
                ObjectId("60c8aab9bb5cf54303651ee3"),
                ObjectId("60c8aab9bb5cf54303651ee4"),
                ObjectId("60c8aab9bb5cf54303651ee5")
        ]
}
```

