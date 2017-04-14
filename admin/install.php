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
        if (isset ($this->dbname)) $db = "dbname=$this->dbname";else $db = "";
        try {
            $conn = new PDO("mysql:host=$this->dbserver;" . $db, $this->dbuser, $this->pass);
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
        try {
            $conn = $this->connectDB();
            $conn->exec("CREATE DATABASE `$name`;\n") or die(print($conn->errorInfo()));
            $this->dbname = $name;
            $conn = $this->connectDB();
            $conn->exec($sql);
        }
        catch (PDOException $err) {
            echo "La création de la base de données a échouée " . $err->getMessage();
            return 0;
        }
        /* Comme la base n'était pas créée on donne le nom après */
        $this->dbname = $name;
        /* On ferme la connexion */
        $conn = null;
        return 1;
	}
	    /* @Description : Creates database - Can only be called once db is created
	     * @Input : DB server, DB name, DB user, DB password
	     * @Output : Error/Success code (0/1)
	     */
    function createSuperUser($name, $pass)
    {
		$ret = 0;
		try {
            $conn = $this->connectDB();
            $conn->exec("INSERT INTO `PrTec_Users` (
`login` ,
`nom` ,
`prenom` ,
`tel` ,
`birthdate` ,
`email` ,
`password` ,
`droits`
)
VALUES (
'$name', NULL , NULL , '', '', NULL , '$pass', '1'
);");
		}
		catch (PDOException $err) {
		    echo "La création du super utilisateur a échouée " . $err->getMessage();
		    return 0;
		}
		/* On ferme la connexion */
		$conn = null;
		return 1;
    }

    /* @Description: functions that rights an ini file to be used in the application
     * @Input: An array of array of entries
     * @Output: 1 if the file is created, 0 if the file couldn't be created/opened
     */
    function create_ini_file($arr, $path)
    {
        $content = ""; 
        foreach ($arr as $key=>$elem) { 
            $content .= "[".$key."]\n"; 
            foreach ($elem as $key2=>$elem2) { 
                if(is_array($elem2)) 
                    { 
                        for($i=0;$i<count($elem2);$i++) 
                            { 
                                $content .= $key2."[] = \"".$elem2[$i]."\"\n"; 
                            } 
                    } 
                else if($elem2=="") $content .= $key2." = \n"; 
                else $content .= $key2." = \"".$elem2."\"\n"; 
            } 
        } 

        if (!$handle = fopen($path, 'w')) { 
            return 0; 
        }
        if (fwrite($handle, $content)) {
            fclose($handle); 
            return 1;
        }
    }
}
?>
