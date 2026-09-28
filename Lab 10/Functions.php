<?php

$name =  "      JANE_DOE@ComputerScience2026!!!     ";

echo str_replace("JANE_DOE", "jane.doe", trim(strtolower( str_replace("@computerscience2026!!!", "_cs2026", trim(strtolower( str_replace("_", ".", trim(ucwords( $name )))          ))) )));


?>