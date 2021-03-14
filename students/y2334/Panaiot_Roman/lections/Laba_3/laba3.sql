CREATE  TABLE AirCarrier (

  idAirCarrier integer NOT NULL PRIMARY KEY ,

  name text NOT NULL ,

  workers integer NOT NULL

  );

INSERT INTO AirCarrier VALUES (1, 'Aeroflot', 250), (2, 'EmiratesAer', 500), (3, 'JangoAer',200);
CREATE  TABLE Plane (

  idPlane integer NOT NULL PRIMARY KEY,

  Stamp VARCHAR(10) NOT NULL ,

  Places integer NOT NULL ,

  Type VARCHAR(45) NOT NULL ,

  Speed FLOAT NOT NULL ,

  AirCarrier_idAirCarrier INT NOT NULL ,

  CONSTRAINT fk_Plane_AirCarrier1

    FOREIGN KEY (AirCarrier_idAirCarrier )

    REFERENCES AirCarrier (idAirCarrier) );

INSERT INTO Plane VALUES (1,'Mark1',250,'Big',235,1), (2,'Mark3',350,'Big',335,2), (3,'Mark3',150,'Medium',235,3);

CREATE  TABLE Trip (

  idTrip integer NOT NULL ,

  pointdeparture VARCHAR(45) NOT NULL ,

  Destination VARCHAR(45) NOT NULL ,

  Date_departure date NOT NULL ,

  Date_destination date NOT NULL ,

  Distance float NOT NULL ,

  Tickets_sold integer NOT NULL ,

  PRIMARY KEY (idTrip) );

INSERT INTO Trip VALUES (1, 'Moscow', 'Saint-Petersburg','2021-02-10','2021-02-11',700,300),(2, 'Moscow', 'Saint-Petersburg','2021-02-10','2021-02-11',700,300), (3, 'Moscow', 'Saint-Petersburg','2021-02-10','2021-02-11',700,300);

CREATE  TABLE Member (

  idMember integer NOT NULL ,

  Name VARCHAR(45) NOT NULL ,

  Age integer NOT NULL ,

  Role VARCHAR(45) NOT NULL ,

  Age_experience integer NOT NULL ,

  PRIMARY KEY (idMember) );

INSERT INTO Member VALUES (1, 'Roman', 20, 'Pilot',1), (2, 'Eithne', 20, 'Pilot',2), (3, 'Aglais', 30, 'Stuard',3);

CREATE  TABLE Crew (

  idCrew integer NOT NULL ,

  Staff integer NOT NULL ,

  Member_idMember integer NOT NULL ,

  PRIMARY KEY (idCrew) ,

  CONSTRAINT fk_Crew_Member1

    FOREIGN KEY (Member_idMember )

    REFERENCES Member (idMember)

    ON DELETE NO ACTION

    ON UPDATE NO ACTION);

INSERT INTO Crew VALUES (1, 3, 1),  (2, 3, 2), (3, 3, 3);

CREATE  TABLE Transit_landings (

  idTransit_landings integer NOT NULL ,

  Point_landings VARCHAR(45) NOT NULL ,

  Date_landings DATE NOT NULL ,

  PRIMARY KEY (idTransit_landings) );

INSERT INTO  Transit_landings VALUES (1, 'Gibraltar', '2021-02-10'),(2, 'Stambul', '2021-03-10'), (3, 'Horizon', '2021-05-10');

CREATE  TABLE Fly (

  Plane_idPlane INT NOT NULL ,

  Trip_idTrip INT NOT NULL ,

  Route VARCHAR(45) NOT NULL ,

  Transit_landings_idTransit_landings INT NOT NULL ,

  Crew_idCrew INT NOT NULL ,

  PRIMARY KEY (Plane_idPlane, Trip_idTrip) ,

  CONSTRAINT fk_Plane_has_Trip_Plane1

    FOREIGN KEY (Plane_idPlane)

    REFERENCES Plane (idPlane)

    ON DELETE NO ACTION

    ON UPDATE NO ACTION,

  CONSTRAINT fk_Plane_has_Trip_Trip1

    FOREIGN KEY (Trip_idTrip )

    REFERENCES Trip (idTrip )

    ON DELETE NO ACTION

    ON UPDATE NO ACTION,

  CONSTRAINT fk_Fly_Transit_landings1

    FOREIGN KEY (Transit_landings_idTransit_landings)

    REFERENCES Transit_landings(idTransit_landings)

    ON DELETE NO ACTION

    ON UPDATE NO ACTION,

  CONSTRAINT fk_Fly_Crew1

    FOREIGN KEY (Crew_idCrew)

    REFERENCES Crew(idCrew)

    ON DELETE NO ACTION

    ON UPDATE NO ACTION);
INSERT INTO  Fly VALUES (1,1,'Good',1,1), (2,2,'Bad',2,2), (3,3,'Normal',3,3);