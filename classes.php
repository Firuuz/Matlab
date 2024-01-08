
<?php
class User {

    private $username; // variable 
    private $email;
    private $password;
    public static $message_erreur;//variable static (on peut l'utiliser sans crée une instance de l'objet User)

    public function __construct($username, $email, $password) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function addUser($conn){//
        $hash_password = password_hash($this->password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO Users (username, email, password)
        VALUES ('$this->username', '$this->email','$hash_password')";
        if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header("location: index.html");
    }
    }
    public static function authentifierUser($conn, $username, $email, $password){
        $sql = "SELECT username, email, password FROM Users WHERE email = '$email';";
        $result = mysqli_query($conn, $sql);
        if($result){
            $row = mysqli_fetch_assoc($result);//recupere le premiere ligne de requete executer $sql et katraj3o 3la chkal tableau
            if($row){

                $dbUsername = $row["username"];
                $dbEmail = $row["email"];
                $dbPassword = $row["password"];
                if($username === $dbUsername && $email === $dbEmail && password_verify($password, $dbPassword)){
                    header("location: shop.html");
                }else {
                    User::$message_erreur = "les information sont incorrect.";
                }
            } else {
                User::$message_erreur = "0 User found!";
            }
        }
    }
    // Getters and setters for username, email, password
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
}

?>