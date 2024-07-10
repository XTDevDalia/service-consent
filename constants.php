<?php
global $serviceconfig;

define("FACIAL", 1);
define("MANPED", 2);
define("EYELASHES", 3);
define("HAIRCOLOR", 4);
define("CONSULTATION", 5);
$serviceconfig['slug'] = array(
    FACIAL => array("facial-consent","facial.php"),
    MANPED => array("manicure-pedicure-consent","manicure_pedicure.php"),
    EYELASHES => array("eyelashes-consent","eyelashes.php"),
    HAIRCOLOR => array("haircolor-consent","haircolor.php"),
    CONSULTATION => array("consultation-consent","consultation.php"),
);
define("BRANCH_ONE", 1);
define("BRANCH_TWO", 2);
define("BRANCH_THREE", 3);
$serviceconfig['branch'] = array(
    BRANCH_ONE => "Branch 1",
    BRANCH_TWO => "Branch2",
    BRANCH_THREE => "Branch 3",
);
?>
