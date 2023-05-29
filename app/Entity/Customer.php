<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Contracts\Support\Arrayable;

/**
* @ORM\Entity
* @ORM\Table(name="customers")
* @ORM\HasLifecycleCallbacks()
*/
class Customer implements Arrayable
{
    /**
* @var integer $id
* @ORM\Column(name="id", type="integer", unique=true, nullable=false)
* @ORM\Id
* @ORM\GeneratedValue(strategy="AUTO")
*
*/
    protected $id;
    /**
* @ORM\Column(type="string")
*/
    public $firstname;
    /**
     * * @ORM\Column(type="string")
*/
    public $lastname;
    /**
     * * @ORM\Column(type="string")
*/
    public $email;
    /**
     * * @ORM\Column(type="string")
*/
    public $gender;
    /**
     * * @ORM\Column(type="string")
*/
    public $username;
    /**
     * * @ORM\Column(type="string")
*/
    public $password;
    /**
     * * @ORM\Column(type="string")
*/
    public $phone;
    /**
     * * @ORM\Column(type="string")
*/
    public $cell;
    /**
     * * @ORM\Column(type="string")
*/
    public $country;
    /**
     * * @ORM\Column(type="string")
*/
    public $city;
    
    /**

*/
    //Getters
    public function getId()
    {
        return $this->id;
    }
    public function getFirstName()
    {
        return $this->firstname;
    }
    public function getLastName()
    {
        return $this->lastname;
    }
    public function getGender()
    {
        return $this->gender;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getUserName()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getCell()
    {
        return $this->cell;
    }
    public function getCountry()
    {
        return $this->country;
    }
    public function getCity()
    {
        return $this->city;
    }
   
    //Setters
    public function setFirstName($firstname)
    {
        $this->firstname = $firstname;
    }
    public function setLastName($lastname)
    {
        $this->lastname = $lastname;
    }
    public function setGender($gender)
    {
        $this->gender = $gender;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setUserName($username)
    {
        $this->username = $username;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    public function setCell($cell)
    {
        $this->cell = $cell;
    }
    public function setCountry($country)
    {
        $this->country = $country;
    }
    public function setCity($city)
    {
        $this->city = $city;
    }

    function toArray()
    {
        return[
            "id" => $this->getId(),
            "firstname" => $this->getFirstName(),
            "lastname" => $this->getLastName(),
            "gender" => $this->getGender(),
            "email" => $this->getEmail(),
            "username" => $this->getUserName(),
            "password" => $this->getPassword(),
            "phone" => $this->getPhone(),
            "cell" => $this->getCell(),
            "country" => $this->getCountry(),
            "city" => $this->getCity()
        ];
    }
   
}


?>