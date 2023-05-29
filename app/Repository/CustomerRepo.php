<?php

namespace App\Repository;

use App\Http\Resources\CustomerResource;
use GuzzleHttp\Client;
use App\Entity\Customer;
use Doctrine\ORM\EntityManager;
use Exception;
use  Illuminate\Support\Collection;


class CustomerRepo implements CustomerRepoInterface
{
    private $api_endpoint = "https://randomuser.me/api";
    private $nationality = "au";
    private $limit = "100";
    /**
     * @var EntityManager
     */
    private $em;
    private $class = 'App\Entity\Customer';

    public function store()
    {
        //get api data results
        $this->em = app(EntityManager::class);
        $client = new Client();
        $response = $client->get($this->api_endpoint . "/?nat=" . $this->nationality . "&&results=" . $this->limit);
        $data = json_decode($response->getBody(), true);
        $customers = $data["results"];

        $repository = $this->em->getRepository($this->class);
        $querybuilder = $repository->createQueryBuilder('e');

        //iterate api data results for inserting and  updating
        try {
            for ($x = 0; $x < count($customers); $x++) {

                $firstname = $customers[$x]["name"]["first"];
                $lastname =  $customers[$x]["name"]["last"];
                $email =     $customers[$x]["email"];
                $username =  $customers[$x]["login"]["username"];
                $gender =    $customers[$x]["gender"];
                $country =   $customers[$x]["location"]["country"];
                $city =      $customers[$x]["location"]["city"];
                $phone =     $customers[$x]["phone"];
                $password =  md5($customers[$x]["login"]["password"]);

                //check if customer is existing by email
                $entity = $querybuilder->where("e.email = :email")
                    ->setParameter("email", $customers[$x]["email"])
                    ->getQuery()
                    ->getOneOrNullResult();

                //if existing,update
                if ($entity) {
                    $entity->setFirstname($firstname);
                    $entity->setLastName($lastname);
                    $entity->setGender($gender);
                    $entity->setEmail($email);
                    $entity->setUsername($username);
                    $entity->setPassword($password);
                    $entity->setPhone($phone);
                    $entity->setCountry($country);
                    $entity->setCity($city);
                }
                //if not, create new entity
                else {
                    $entity = new Customer();
                    $entity->setFirstname($firstname);
                    $entity->setLastName($lastname);
                    $entity->setGender($gender);
                    $entity->setEmail($email);
                    $entity->setUsername($username);
                    $entity->setPassword($password);
                    $entity->setPhone($phone);
                    $entity->setCountry($country);
                    $entity->setCity($city);
                }
                $this->em->persist($entity);
                $this->em->flush();
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function index()
    {
        $this->em = app(EntityManager::class);
        $repository = $this->em->getRepository($this->class);
        $data = $repository->findAll();
        return Collection::make(
            $data
        );
    }
    public function customer($id)
    {
        $this->em = app(EntityManager::class);
        return new CustomerResource($this->em->getRepository($this->class)->findOneBy([
            'id' => $id
        ]));
    }


    /**
     * create Post
     * @return Post
     */
}
