<?php require_once("config.php");?>
<?php
class database{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;
    public $link;
    public $error;

    public function __construct(){
        $this->connectDB();
    }

    //pt ket noi
    public function connectDB(){
        $this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
        mysqli_set_charset($this->link,'UTF8');
    if(!$this->link){
        $this->error = "Connect Fail: ";
        return false;
    }
    }
    // pt select du lieu
    public function select($query){
        $result = $this->link->query($query);
        if($result->num_rows > 0)
        {
            return $result;
        } else
         return false;
    }

        
    //pt insert, update,delete
    public function execute($query){
        $result = $this->link->query($query);
        if($result) return $result;
        else return false;
    }
}
?>