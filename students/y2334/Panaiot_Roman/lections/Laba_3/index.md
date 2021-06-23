# Welcome to MyDocLaba!
Enjoy the laba.

## AirCarrier

| name           | type           | primary key    | references          |
|:-------------- |:-----------    |:-------------- |:------------------- |
| idAirCarrier   | `integer`      | `true`         | `null`              |
| name           | `varchar(20)`  | `false`        | `null`              |
| workers        | `integer`      | `false`        | `null`              |

## Plane

| name           | type           | primary key    | references               |
|:-------------- |:-----------    |:-------------- |:-------------------------|
| idPlane        | `integer`      | `true`         | `null`                   |
| Stamp          | `varchar(20)`  | `false`        | `null`                   |
| Places         | `integer`      | `false`        | `null`                   |
| Type           | `varchar(20)`  | `false`        | `null`                   |
| Speed          | `float`        | `false`        | `null`                   |
| AirCarrier     | `integer`      | `false`        | `AirCarrier_idAirCarrier`|

## Trip

| name           | type           | primary key    | references          |
|:-------------- |:-----------    |:-------------- |:------------------- |
| idTrip         | `integer`      | `true`         | `null`              |
| pointdeparture | `varchar(40)`  | `false`        | `null`              |
| Destination    | `varchar(40)`  | `false`        | `null`              |
| Date_departure | `date`         | `false`        | `null`              |
| Date_destin    | `date`         | `false`        | `null`              |
| Distance       | `float`        | `false`        | `null`              |
| TicketSold     | `integer`      | `false`        | `null`              |

## Member

| name           | type           | primary key    | references          |
|:-------------- |:-----------    |:-------------- |:------------------- |
| idMember       | `integer`      | `true`         | `null`              |
| name           | `varchar(20)`  | `false`        | `null`              |
| age            | `integer`      | `false`        | `null`              |
| role           | `varchar(20)`  | `false`        | `null`              |
| age_exp        | `integer`      | `false`        | `null`              |

## Crew

| name           | type           | primary key    | references          |
|:-------------- |:-----------    |:-------------- |:------------------- |
| idCrew         | `integer`      | `true`         | `null`              |
| Staff          | `integer`      | `false`        | `null`              |
| Member         | `integer`      | `false`        | `Member_idMember`   |

## Transit landings

| name               | type           | primary key    | references          |
|:-----------------  |:-------------- |:-------------- |:------------------- |
| idTransit_landings | `integer`      | `true`         | `null`              |
| Point_landings     | `varchar(40)`  | `false`        | `null`              |
| Date_landings      | `date`         | `false`        | `null`              |

## Fly

| name           | type           | primary key    | references                |
|:---------------|:-----------    |:-------------- |:------------------------- |
| Plane          | `integer`      | `true`         | `Plane_idPlane`           |
| Trip           | `integer`      | `true`         | `Trip_idTrip`             |
| Route          | `varchar(40)`  | `false`        | `null`                    |
| Trans_land     | `integer`      | `false`        | `Trans_land_idTrans_land` |
| Crew           | `integer`      | `false`        | `Crew_idCrew`             |


# Thanks for Watching!!!