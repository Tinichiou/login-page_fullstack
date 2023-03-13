<!-- // 建立函式連到資料庫 -->
<?php
session_start();
class Controller
{
    private $db; //private這個變數只有在class裡面能使用

    public function __construct()
    {
        $this->db = new PDO("mysql:host=127.0.0.1:3307;dbname=gdsctest;charset=utf8","root","");
    }

    public function login($data)
    {
        $account = $data["account"];
        $password = $data["password"];
        $sql_data = $this->db->query("SELECT * FROM `users` WHERE `account` = '$account'")->fetchAll();
        
        if (count($sql_data) !== 1)
        {
            die("帳號打錯了");
        }
        if (!password_verify($password,$sql_data[0]["password"]))
        {
            die("密碼錯誤!");
        }

        $_SESSION['id'] = $sql_data[0]['id'];
        $_SESSION["permission"] = $sql_data[0]['permission'];
        
        if ((int)$sql_data[0]['permission']===1){
                header("Location: management.php");
            }else{
                header("Location: normal.php");
            }

            

    }

    public function logout()
    {
        unset($_SESSION["permission"]);
        unset($_SESSION["id"]);
        header("Location: index.html");
    }

    public function add_user($data)
    {
        $account = $data["account"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $permission = $data["permission"];
        $sql_data = $this->db->query("SELECT * FROM `users` WHERE `account` = '$account'")->fetchAll();
        if (count($sql_data) !== 0)
        {
            die("duplicated username 此帳號名已有人使用");
        }
        $this->db->query("INSERT INTO `users` (`account`, `password`, `permission`) VALUES ('$account', '$password', '$permission');");
        header("Location: management.php");
    }

}

?>