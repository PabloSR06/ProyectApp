CREATE DATABASE dbworkshop;
USE dbworkshop;

CREATE TABLE clients(
    idClient INT NOT NULL AUTO_INCREMENT, 
    CONSTRAINT PK_IDCLIENT PRIMARY KEY(idClient),
    nameClient VARCHAR(45) NOT NULL,
    surnameClient VARCHAR(45) NOT NULL,
    emailClient VARCHAR(100) NOT NULL,
    passwordClient VARCHAR(200) NOT NULL 
);
CREATE TABLE workers(
    idWorker INT NOT NULL AUTO_INCREMENT, 
    CONSTRAINT PK_IDWORKER PRIMARY KEY(idWorker),
    dateInvoice Date NOT NULL,
    surnameWorker VARCHAR(45) NOT NULL,
    emailWorker VARCHAR(100) NOT NULL,
    passwordWorker VARCHAR(200) NOT NULL 
);
CREATE TABLE cars(
    idCar INT NOT NULL AUTO_INCREMENT,    
    CONSTRAINT PK_IDCAR PRIMARY KEY(idCar),
    licensePlate CHAR(7) NOT NULL,
    brand VARCHAR(45) NOT NULL,
    model VARCHAR(45) NOT NULL,
    idClient INT NOT NULL , 
    CONSTRAINT FK_IDCLIENTCAR FOREIGN KEY (idClient) REFERENCES clients(idClient)
);
CREATE TABLE carIN(
    idCarIN INT NOT NULL AUTO_INCREMENT,
    CONSTRAINT PK_IDCARIN PRIMARY KEY (idCarIN),
    outWork INT(3) NOT NULL,
    noteWork NVARCHAR(500) NOT NULL,
    idCar INT NOT NULL,
    CONSTRAINT FK_CARIN FOREIGN KEY (idCar) REFERENCES cars(idCar),
    toDo VARCHAR(250) NOT NULL,
    diaEntrada DATE NOT NULL

);

CREATE TABLE invoice(
    idInvoice INT NOT NULL AUTO_INCREMENT, 
    CONSTRAINT PK_IDINVOICE PRIMARY KEY(idInvoice),
    idClient INT NOT NULL,
    CONSTRAINT FK_IDCLIENT FOREIGN KEY (idClient) REFERENCES clients(idClient),
    dateInvoice DATE NOT NULL,
    priceInvoice INT NOT NULL,
    pagado BOOLEAN NOT NULL,
    idCarIN INT NOT NULL,
    CONSTRAINT FK_INVOICEINCAR FOREIGN KEY (idCarIN) REFERENCES carIN(idCarIN)
);

INSERT INTO clients (nameClient, surnameClient) VALUES ("Nombre", "Apellido");
INSERT INTO clients (nameClient, surnameClient) VALUES ("Nombre2", "Apellido2");

INSERT INTO cars (licensePlate, brand,model,  idClient) VALUES ("GHTG434", "marca", "fs", 1);
INSERT INTO cars (licensePlate, brand,model,  idClient) VALUES ("GHTE324", "dssdfa", "fasdfs", 1);

INSERT INTO carIN (outWork, noteWork, toDo, idCar, diaEntrada) VALUES (0, 'bajo aceite', 'revicion', 1, CURDATE());

SELECT * FROM carIN INNER JOIN cars ON carin.idCar = cars.idCar INNER JOIN clients ON cars.idClient = clients.idClient WHERE clients.idClient = 2;
SELECT * FROM carIN INNER JOIN cars ON carin.idCar = cars.idCar WHERE cars.idClient = 2;