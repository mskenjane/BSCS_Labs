<?php

$name =  "      JANE_DOE@ComputerScience2026!!!     ";

echo str_replace("_", ".", trim(strtolower( str_replace("@computerscience", "_cs", trim(strtolower(str_replace("2026!!!", "2026", trim(strtolower($name)))))) )));


?>