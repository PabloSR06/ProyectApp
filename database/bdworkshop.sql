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
    finishWork BOOLEAN NOT NULL,
    outWork BOOLEAN NOT NULL,
    noteWork NVARCHAR(500) NOT NULL,
    idCar INT NOT NULL,
    CONSTRAINT FK_CARIN FOREIGN KEY (idCar) REFERENCES cars(idCar)
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
INSERT INTO cars (licensePlate, brand, idClient) VALUES ("GHTG434", "marca", 1);