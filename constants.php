<?php
global $serviceconfig;

define("FACIAL", 1);
define("MANPED", 2);
define("EYELASHES", 3);
define("HAIRCOLOR", 4);
define("CONSULTATION", 5);
define("BROWLAMINATION", 6);
$serviceconfig['slug'] = array(
    FACIAL => array("facial-consent","facial.php"),
    MANPED => array("manicure-pedicure-consent","manicure_pedicure.php"),
    EYELASHES => array("eyelashes-consent","eyelashes.php"),
    HAIRCOLOR => array("haircolor-consent","haircolor.php"),
    CONSULTATION => array("consultation-consent","consultation.php"),
    BROWLAMINATION => array("brow-lamination","brow_lamination.php"),
);
define("BRANCH_ONE", 1);
define("BRANCH_TWO", 2);
$serviceconfig['branch'] = array(
    BRANCH_ONE => "Brow art beauty salon 42 kirgate ,BD1 1QT",
    BRANCH_TWO => "Brow Art hair and beauty salon , idle Road BD10 8EG"
);
?>
