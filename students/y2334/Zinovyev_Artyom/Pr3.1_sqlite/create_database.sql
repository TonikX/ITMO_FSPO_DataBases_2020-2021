create table Movie (
    mID integer primary key,
    title text,
    year integer,
    director text
);

create table Reviewer (
    rID integer primary key,
    name text
);

create table Rating (
   rID integer,
   mID integer,
   start integer,
   ratingDate text,
   constraint fk_col foreign key (rID) references Reviewer (rID),
   constraint fk_col2 foreign key (mID) references Movie (mID),
   primary key (rID, mID)
);

