<?php
class AdminFunctionnalities {

    private $dbserver;
    private $dbname;
    private $dbuser;
    private $pass;

    public function __construct() { }
    
    /* @Description : Creates connexion to DB
     * @Input : none
     * @Output : PDO object
     */
    private function connectDB()
    {
        try {
            $conn = new PDO("mysql:host=$this->dbserver;", $this->dbuser, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $err) {
            echo "La connexion a échoué " . $err->getMessage();
        }
        return $conn;
    }
    
    /* @Description : Creates database
     * @Input : DB server, DB name, DB user, DB password
     * @Output : Error/Success code
     */
    public function createDatabase($server, $name, $user, $password)
    {
        $this->dbserver = $server;
        $this->dbuser = $user;
        $this->pass = $password;

        $sql = file_get_contents ("sql/install.sql");
	print("CREATE DATABASE `$name`;\n" . $sql);
            $ret = 0;
            /*try {
               $conn = $this->connectDB();
               $conn->exec("CREATE DATABASE `$name`;\n" . $sql) or die(print($conn->errorInfo()));
               }
               catch (PDOException $err) {
               echo "La création de la base de données a échouée " . $err->getMessage();
               return $ret;
               }*/
            /* Comme la base n'était pas créée on donne le nom après */
            $this->dbname = $name;
            /* On ferme la connexion */
            $conn = null;
            return $ret;
	}
	    /* @Description : Creates database
	     * @Input : DB server, DB name, DB user, DB password
	     * @Output : Error/Success code
	     */
	    function createSuperUser($server, $name, $user, $password)
	    {
		$sql = file_get_contents ("sql/install.sql");
		$ret = 0;
		try {
		    $conn = new PDO("mysql:host=$server", $user, $password);
		    $conn->exec("CREATE DATABASE `$name`;\n" . $sql) or die(print_r($conn->errorInfo(), true));
		}
		catch (PDOException $err) {
		    echo "La création a échouée " . $err->getMessage();
		    return $ret;
		}
		/* On ferme la connexion */
		$conn = null;
		return $ret;
	    }
	}
?>
