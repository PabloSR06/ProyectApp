<?php


    function query_cars($db, $idClient){
        try {
            $sql = $db->prepare("SELECT * FROM cars INNER JOIN carin ON cars.idCar = carin.idCar WHERE idClient = :idClient");   

            $sql->bindValue(':idClient', $idClient);
            $sql->execute();

            $myJSON = "{";
            $myJSON .= '"carIN":[';

            $i = 0;
            $row = $sql->fetchAll();
            $count = count($row);

            while ($i < $count) {
                $myJSON .= '{';

                $myJSON .= '"licensePlate":';
                $myJSON .= '"' . $row[$i]['licensePlate'] . '"';

                $myJSON .= ',';

                $myJSON .= '"brand":';
                $myJSON .= '"' . $row[$i]['brand'] . '"';
                
                $myJSON .= ',';

                $myJSON .= '"model":';
                $myJSON .= '"' . $row[$i]['model'] . '"';
                $myJSON .= ',';


                $myJSON .= '"outWork":';
                $myJSON .= '"' . $row[$i]['outWork'] . '"';
                $myJSON .= ',';


                $myJSON .= '"noteWork":';
                $myJSON .= '"' . $row[$i]['noteWork'] . '"';
                $myJSON .= ',';


                $myJSON .= '"toDo":';
                $myJSON .= '"' . $row[$i]['toDo'] . '"';
                $myJSON .= ',';


                $myJSON .= '"dayIN":';
                $myJSON .= '"' . $row[$i]['dayIN'] . '"';

                $myJSON .= '}';

                if (!($i == $count - 1)) {
                    $myJSON .= ',';
                }

                $i++;
            }

            $myJSON .= '],';
            $myJSON .= '"success":' . $i;
            $myJSON .= '}';

            return $myJSON;
        } catch (\Throwable $th) {
        }
        
    }

    function query_cars2($db, $idClient){
        try {
            $sql = $db->prepare("SELECT * FROM cars WHERE idClient = :idClient");   

            $sql->bindValue(':idClient', $idClient);
            $sql->execute();

            $myJSON = "{";
            $myJSON .= '"cars":[';

            $i = 0;
            $row = $sql->fetchAll();
            $count = count($row);

            while ($i < $count) {
                $myJSON .= '{';

                $myJSON .= '"idCar":';
                $myJSON .= '"' . $row[$i]['idCar'] . '"';

                $myJSON .= ',';

                $myJSON .= '"licensePlate":';
                $myJSON .= '"' . $row[$i]['licensePlate'] . '"';

                $myJSON .= ',';

                $myJSON .= '"brand":';
                $myJSON .= '"' . $row[$i]['brand'] . '"';
                
                $myJSON .= ',';

                $myJSON .= '"model":';
                $myJSON .= '"' . $row[$i]['model'] . '"';
                

                $myJSON .= '}';

                if (!($i == $count - 1)) {
                    $myJSON .= ',';
                }

                $i++;
            }

            $myJSON .= '],';
            $myJSON .= '"success":' . $i;
            $myJSON .= '}';
            //echo $myJSON;
            return $myJSON;
        } catch (\Throwable $th) {
        }
        
    }
    function query_carsIN($db, $idCar){
        try {
            $sql = $db->prepare("SELECT * FROM carin WHERE idCar = :idCar ORDER by `dayIN` DESC ");   

            $sql->bindValue(':idCar', $idCar);
            $sql->execute();

            $myJSON = "{";
            $myJSON .= '"carIN":[';

            $i = 0;
            $row = $sql->fetchAll();
            $count = count($row);

            while ($i < $count) {
                $myJSON .= '{';

                $myJSON .= '"outWork":';
                $myJSON .= '"' . $row[$i]['outWork'] . '"';
                
                $myJSON .= ',';

                $myJSON .= '"toDo":';
                $myJSON .= '"' . $row[$i]['toDo'] . '"';

                $myJSON .= ',';

                $myJSON .= '"dayIN":';
                $myJSON .= '"' . $row[$i]['dayIN'] . '"';

                $myJSON .= ',';
                

                $myJSON .= '"noteWork":';
                $myJSON .= '"' . $row[$i]['noteWork'] . '"';
                

                $myJSON .= '}';

                if (!($i == $count - 1)) {
                    $myJSON .= ',';
                }

                $i++;
            }

            $myJSON .= '],';
            $myJSON .= '"success":' . $i;
            $myJSON .= '}';
            //echo $myJSON;
            return $myJSON;
        } catch (\Throwable $th) {
        }
        
    }
?>