<?php
abstract class DB
{
    protected $file = '';
    protected $content = [];

    function getFromFile()
    {
        $this->content = json_decode(
            file_get_contents($this->file),
            true
        );
    }

    function pushToFile()
    {
        file_put_contents($this->file, json_encode($this->content));
    }
}


class Users extends DB
{
    protected $file = 'users.json';

    function setContent($userDetails = [])
    {
        $this->content = array_merge($this->content, $userDetails);
        var_dump($this->content);
        echo "<hr>";
    }
}

// class Orders extends DB{
//     protected $file = 'orders.json';

//     function setContent($userDetails=[])
//     {
//         $this->content = array_merge($this->content, $userDetails);
//         var_dump($this->content);
//     }

// }

$users1 = new Users();
$users1->getFromFile();
$users1->setContent(["kim" => [
    "id" => 4,
    "status" => "noWait"
]]);
$users1->pushToFile();
