


CREATE TABLE libri(
    PK_Id_libro int AUTO_INCREMENT,
    Titolo varchar(100) not null,
    Autore varchar(50) not null,
    Casa_editrice varchar(50) not null,
    Anno_pubblicazione year,
    Collana varchar(50),
    Genere varchar(50),
    PRIMARY KEY(PK_Id_libro)
);



CREATE TABLE utenti(
    PK_Id_utente int AUTO_INCREMENT,
    Nome varchar(50) not null,
    Cognome varchar(50) not null,
    Mail varchar(100),
    Telefono varchar(10),
    PRIMARY KEY(PK_Id_utente)
);


-- CREA
CREATE TABLE prestiti(
    PK_Id_prestito int AUTO_INCREMENT,
    FK_Id_utente int not null,
    FK_Id_libro int not null,
    Scadenza_prestito date not null,
    PRIMARY KEY(PK_Id_prestito)
);



CREATE TABLE feedback_libri(
    PK_Id_feedback int not null,
    Voto int, Feedback varchar(500) not null,
    FK_Id_utente int not null,
    FK_Id_libro int not null,
    PRIMARY KEY(PK_Id_feedback)
);


