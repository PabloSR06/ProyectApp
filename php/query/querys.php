<?php


    function query_cars($db, $idClient){
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
?>