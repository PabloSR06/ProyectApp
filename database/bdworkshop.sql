CREATE DATABASE bdworkshop;
USE bdworkshop;

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
    model VARCHAR(45) NOT NULL
);
CREATE TABLE clientCar(
    idClientCar INT NOT NULL AUTO_INCREMENT,
    idCar INT NOT NULL,
    CONSTRAINT FK_IDCAR FOREIGN KEY (idCar) REFERENCES cars(idCar),
    idClient INT NOT NULL,
    CONSTRAINT FK_IDCLIENT FOREIGN KEY (idClient) REFERENCES clients(idClient)

);
CREATE TABLE invoice(
    idInvoice INT NOT NULL AUTO_INCREMENT, 
    CONSTRAINT PK_IDINVOICE PRIMARY KEY(idInvoice),
    idClientCar INT NOT NULL,
    CONSTRAINT FK_IDCLIENTCAR FOREIGN KEY (idClientCar) REFERENCES clientCar(idClientCar)
    dateInvoice DATE NOT NULL,
    priceInvoice INT NOT NULL,
    pagado BOOLEAN NOT NULL
);
