<?php
class Member
{
    private $lname;
    private $fname;
    private $email;
    private $username;
    private $password;

    function __construct($email, $password)
    {
    }
    function createAccount($lname, $fname, $email, $username, $password)
    {
    }
}
class Collection
{
    private $title;
    private $date;
    private $description;

    function __construct($id)
    {
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=tanskygraphy', 'root', '');
        if (isset($_GET['id']) and !empty($_GET['id'])) {
            $get_id = htmlspecialchars($_GET['id']);
            $col = $bdd->prepare('SELECT * FROM album WHERE id = ?');
            $col->execute(array($get_id));
            if ($col->rowCount() == 1) {
                $col = $col->fetch();
                $this->id = $col['id'];
                $this->title = $col['album'];
                $this->description = $col['description'];
                $this->date = $col['date_time_album'];
            } else {
                die('Cet col n\'existe pas !');
            }
        } else {
            die('Erreur');
        }
    }
    function get_title()
    {
        return $this->title;
    }
    function get_id()
    {
        return $this->id;
    }
    function get_date()
    {
        return $this->date;
    }
    function get_description()
    {
        return $this->description;
    }
}