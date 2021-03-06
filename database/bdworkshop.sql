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
ALTER TABLE `clients` ADD UNIQUE(`emailClient`);
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
    dayIN DATE NOT NULL

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

INSERT INTO clients (nameClient, surnameClient, emailClient, passwordClient) VALUES ("Nombre", "Apellido", "correo@gmail.com", "2ee17599597d02dbf88b829798db0518");
INSERT INTO clients (nameClient, surnameClient, emailClient, passwordClient) VALUES ("Nombre2", "Apellido2", "correo2@gmail.com", "2ee17599597d02dbf88b829798db0518");
INSERT INTO clients (nameClient, surnameClient, emailClient, passwordClient) VALUES ("Nombre3", "Apellido3", "correo3@gmail.com", "2ee17599597d02dbf88b829798db0518");


INSERT INTO cars (licensePlate, brand,model,  idClient) VALUES ("GHTG434", "marca", "fs", 1);
INSERT INTO cars (licensePlate, brand,model,  idClient) VALUES ("GHTE324", "dssdfa", "fasdfs", 1);

INSERT INTO cars (licensePlate, brand,model,  idClient) VALUES ("GHTE435", "dssdfa", "fasdfs", 3);
INSERT INTO cars (licensePlate, brand,model,  idClient) VALUES ("GHTE334", "dssdfa", "fasdfs", 3);
INSERT INTO cars (licensePlate, brand,model,  idClient) VALUES ("GHTE111", "dssdfa", "fasdfs", 3);
INSERT INTO cars (licensePlate, brand,model,  idClient) VALUES ("GHTE322", "dssdfa", "fasdfs", 3);


INSERT INTO carIN (outWork, noteWork, toDo, idCar, dayIN) VALUES (0, 'bajo aceite', 'revicion', 1, 2021-10-12);
INSERT INTO carIN (outWork, noteWork, toDo, idCar, dayIN) VALUES (0, 'bajo1 aceite', 'revicion1', 1, 2021-10-11);
INSERT INTO carIN (outWork, noteWork, toDo, idCar, dayIN) VALUES (0, 'bajo2 aceite', 'revicion2', 1, CURDATE());

/*
SELECT * FROM carIN INNER JOIN cars ON carin.idCar = cars.idCar INNER JOIN clients ON cars.idClient = clients.idClient WHERE clients.idClient = 2;
SELECT * FROM carIN INNER JOIN cars ON carin.idCar = cars.idCar WHERE cars.idClient = 2;
*/