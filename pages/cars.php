<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cars</title>

    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/dropdown.css">
</head>

<body>
    <div>
        <h1>COCHES</h1>
        <?php
        session_start();

        require '../php/conectDB.php';
        $db = conectDB();
        ?>
        <p class="text">Aqui encontraras una lista con todos los coches que tienes registrados con nosotros, dale click
            sobre la matricula para ver más información</p>
    </div>

    <div>

        <noscript>
            <a href="">
                Ha ocurrido un error con JavaScript
            </a>
        </noscript>



        <?php
            try { 
                require '../php/query/querys.php';
                if(isset($_SESSION['idClient']) ){
                    $json =  query_cars2($db, $_SESSION['idClient']);
                }else{
                    echo "El idCliente está vacio (Error con la sesión)";
                }
            } catch (\Throwable $th) {
                echo "A ocurrido un error";
            }

            $array = json_decode($json);
            $count = $array->success;
            $i = 0;

            if($array->success == 0){
                echo "<p class='text' style='text-align: center;'>Todavía no tienes ningún coche registrado</p>";
            }else{
                while($i < $count){

                    $exit=  $array->cars[$i];
  
                    echo"
                        <div class='dropdown'>
                            <button onclick='myFunction(this);' class='dropbtn'>".$exit->licensePlate."</button>
                            <div id='myDropdown1' class='dropdown-content'>
                    
                                <form action='info_cars.php' method='post'>
                                    <input value=".$exit->idCar." type='hidden' name='idCar'>  
                                    <input value=".$exit->licensePlate." type='hidden' name='licensePlate'>  
                                    <button class='dropbtn1'>Ver todos los registros</button>  
                                </form>
                                
                                <a>Marca: ".$exit->brand." Modelo:".$exit->model."</a>
                            </div>
                        </div>";

                    $i++;
                }
            }            
        ?>

        <br>

        <div class="botton-down"></div>
    </div>
    </div>


    <div>
    <footer class='footer_nav'>
            <nav class='nav_links'>
                <a href="../pages/calendar.html" class='nav_link'>
                    <svg class="nav_img" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="bi bi-calendar-plus" viewBox="0 0 16 16">
                        <path
                            d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z" />
                        <path
                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                    </svg>
                </a>
                <a href='../php/cars_login.php' class='nav_link'>
                    <svg class="nav_img" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-wrench"
                        viewBox="0 0 16 16">
                        <path
                            d="M.102 2.223A3.004 3.004 0 0 0 3.78 5.897l6.341 6.252A3.003 3.003 0 0 0 13 16a3 3 0 1 0-.851-5.878L5.897 3.781A3.004 3.004 0 0 0 2.223.1l2.141 2.142L4 4l-1.757.364L.102 2.223zm13.37 9.019.528.026.287.445.445.287.026.529L15 13l-.242.471-.026.529-.445.287-.287.445-.529.026L13 15l-.471-.242-.529-.026-.287-.445-.445-.287-.026-.529L11 13l.242-.471.026-.529.445-.287.287-.445.529-.026L13 11l.471.242z" />
                    </svg>
                </a>
                <a href="../index.php" class='nav_link'>
                    <svg class="nav_img" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-house"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                        <path fill-rule="evenodd"
                            d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                    </svg>
                </a>
                <a href="../php/user_login.php" class='nav_link'>
                    <svg class="nav_img" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    </svg>
                </a>
                <a href="../pages/maps.html" class='nav_link'>
                    <svg class="nav_img" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-geo-alt"
                        viewBox="0 0 16 16">
                        <path
                            d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>
                </a>

            </nav>
        </footer>
    </div>

    <script src="../js/jquery-3.6.0.min.js"></script>

    <script>
    function myJQueryFunction(element) {
        var elements = ".dropdown-content";
        $(elements).removeClass('show');
        $(element).next(elements).toggleClass("show");
    }

    function myFunction(element) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            dropdowns[i].classList.remove('show');
        }
        element.nextSibling.nextSibling.classList.toggle("show");
    }

    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
    </script>
</body>

</html>