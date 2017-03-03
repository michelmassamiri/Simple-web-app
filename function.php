<?php
class WebsiteFunctions {
    private $dbPath;
    private $conn;
    public function __construct() {
        $this -> dbPath = "../model/conn.php";
        $conn = connectDB();
    }

    public function getdbPath(){
        return $this -> dbPath;
    }
    /*@Description : Add doublequote to a string
    * @Input: string
    * @Output: string
    */
    private function addDoubleQuote($string){
        return "\"" . $string . "\"";
    }

    /*@Description : List all the users from the database
     * @Inputs :
     * @Outputs :
     *
     * */
    public function addUser($nom, $prenom, $birthdate, $tel, $email, $password) {
        require ($this -> dbPath);
        $nom = $this->addDoubleQuote($nom);
        $prenom = $this->addDoubleQuote($prenom);
        $email = $this->addDoubleQuote($email);
        $password = $this->addDoubleQuote($password);
        $birthdate = date_format($birthdate,"Y-m-d");
        $birthdate = $this->addDoubleQuote($birthdate);
        
        //$birthdate = date('m-d-Y', strtotime($birthdate));
        
        $query = "INSERT INTO Users() values(" . $nom . "," . $prenom . "," . $tel . "," . $birthdate . "," . $email . "," . $password . ")";
        try {
            $conn -> query($query);
        } catch (PDOException $err) {
            echo $err -> getMessage();
        }
        $conn = NULL;
    }
    
    public function getUsers(){
        require($this -> dbPath);
        $query = "SELECT nom,prenom,email,tel,birthdate FROM Users";
        try {
            $result = $conn -> query($query);
        } catch (PDOException $err) {
            echo $err -> getMessage();
        }
        $conn = NULL;
        return $result;
    }

    public function getUser($email){
        require($this -> dbPath);
        $query = "SELECT nom,prenom,email,tel,birthdate FROM Users WHERE email=" . $this->addDoubleQuote($email);
        try {
            $result = $conn -> query($query);
        } catch (PDOException $err) {
            echo $err -> getMessage();
        }
        $conn = NULL;
        return $result;
    }

    public function userLogin($email,$password){
        require($this -> dbPath);
        $query = "SELECT COUNT(*) FROM Users WHERE email=" . $this->addDoubleQuote($email) . " AND password=" . $this->addDoubleQuote($password);
        try{
            $result = $conn -> query($query, PDO::FETCH_NUM);
            if ($result -> rowCount() == 1)
                return True;
            return False;
        }catch(PDOException $err){
            echo $err->getMessage();
        }
        $conn = NULL;
        return False;
    }
    
    public function usersXMLList($listUsers){
        $users = new SimpleXMLElement("<users></users>");
        $br = "<br/>";
        foreach ($listUsers as $key => $value) {
            $user = $users -> addChild("user");
            $user -> addChild("nom",$value["nom"]);
            $user -> addChild("prenom",$value["prenom"]);
            $user -> addChild("email",$value["email"]);
            $user -> addChild("tel",$value["tel"]);
            $user -> addChild("birthdate",$value["birthdate"]);
        }
        $fd = fopen("users.xml", "w");
        fwrite($fd, $users->asXML());
        fclose($fd);
    }
    /*@Description : List all the users from the database
     * @Inputs :
     * @Outputs :
     *
     * */
    public function usersView() {
        require($this -> dbPath);
        $query = "SELECT nom,prenom,email,tel,birthdate FROM Users";
        $result = $conn -> query($query);
        echo "<table class='table'> <thead><tr>";
        echo "</tr></thead><tbody>";
        foreach ($result as $key => $value) {
            echo "<tr>";
            echo "<td>" . $value["nom"] . "</td>";
            echo "<td>" . $value["prenom"] . "</td>";
            echo "<td>" . $value["email"] . "</td>";
            echo "<td>" . $value["tel"] . "</td>";
            echo "<td>" . $value["birthdate"] . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    }

    /*@Description : Test if the email is already in the database, return True if it exists already, False if not.
     * @Inputs : $email (format: test@fake.com)
     * @Outputs : boolean
     * */
    public function emailAlreadyExist($email) {
        require ($this -> dbPath);
        $email = "\"" . $email . "\"";
        $query = "SELECT COUNT(*) FROM Users WHERE email=" . $email;
        try {
            $result = $conn -> query($query, PDO::FETCH_NUM);
            if ($result -> rowCount() == 1)
                return True;
            return False;
        }catch(PDOException $err){
            echo $err -> getMessage();
        }
    }

    /*@Description: Test if any element in the $array is set or empty return "False" otherwise return True
     * @Inputs: $array ($_POST or $_GET)
     * @Outputs: boolean
     * */
    public function testIssetEmpty($array) {
        foreach ($array as $key) {
            if (!isset($key) || empty($key))
                return False;
        }
        return True;
    }
    
    /*@Description: Generate a random UUID(Universally Unique Identifier)
    * @Input: void
    * @Output: int(9)
    */ 
    public function randomUUID(){
      srand($this -> make_seed());
      $randomUUID = rand();
      $randomUUID = substr((string) $randomUUID,0,9);
      return $randomUUID;
  }

  private function make_seed(){
      list($usec, $sec) = explode(' ', microtime());
      return (float) $sec + ((float) $usec * 100000);
  }

  public function addUUID($uuid,$email){
    require($this -> dbPath);
    $query = "INSERT INTO UUID() values(" . $uuid .",". $this->addDoubleQuote($email).")";
    try{
        $conn -> query($query);
    }catch(PDOException $err){
        echo $err -> getMessage();
    }
}

public function checkUUIDExist($uuid){
    require($this -> dbPath);
    $query = "SELECT COUNT(*) FROM UUID WHERE uuid=" . $uuid;
    try {
        $result = $conn -> query($query, PDO::FETCH_NUM);
        if ($result -> rowCount() == 1)
            return True;
        return False;
    }catch(PDOException $err){
        echo $err -> getMessage();
    }
}

public function getUUIDByEmail($email){
    require($this -> dbPath);
    $query = "SELECT uuid FROM UUID WHERE email=" . $this->addDoubleQuote($email);
    try {
        $result = $conn -> query($query, PDO::FETCH_ASSOC);
        return $result->fetch()['uuid'];
    }catch(PDOException $err){
        echo $err -> getMessage();
    }
}

public function getEmailByUUID($uuid){
    require($this -> dbPath);
    $query = "SELECT email FROM UUID WHERE uuid=" .$uuid;
    try {
        $result = $conn -> query($query, PDO::FETCH_ASSOC);
        return $result->fetch()['email'];
    }catch(PDOException $err){  
        echo $err -> getMessage();
    }    
}
    //TODO : Faire une fonction de logging dans un fichier
    //TODO formatage des données

}
?>
