# WorkShopApp
 Application proyect for PGL


### Basic idea
The basic idea is to make WorkShop management app where you (as the worker) get intro the app the clients and the car. When the client take his car/cars into the workshop using the app can see the information about it, including invoices and other information.

## Database

#### clients
The table **clients** have it's diferents fields, important to see the lenght of the password and the email, they are that long for save the encrypted password and the posibility of an email lenght could get up for more that 250. All this fields contains the information for clients.

#### cars
The table **cars** it's connected to client via 'idclient' and with carsIN with 'idCar'. One client can have many cars, and in the same way a car can have many **carIn**. As his name says this table contains information about the cars.

#### carsIN
This table have the information of the cars when it enter in the workshop, it's one for each time. You can modify the column according to your needs.

#### invoice 
This table is conected with **carsIN** and **clients**, it's the information for an invoice for every one of **carsIN** fields.

#### workers
This is meant to contains the informations of the workers of the workshop, this table is not conected with anyone else.



## Author

**WorkShopApp** © [PabloSR](https://github.com/PabloSR06).  
