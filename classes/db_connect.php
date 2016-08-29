<?php



/**
 * class for databse connection
 *
 * @author Neloy
 */
class Db_Connect {
    public function __construct() {
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $db_name = 'seip_term_project_sch_mng_102543';

        $conn = mysql_connect($hostname, $username, $password);

        if ($conn) {
            //echo 'Databse server connected';
            mysql_select_db($db_name);
        } else {
            die('Databse surver not connected !' . mysql_error());
        }
    }

}
