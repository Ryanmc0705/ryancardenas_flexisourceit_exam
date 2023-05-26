<?php
namespace App\Repository;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use GuzzleHttp\Client;


class CustomerRepo implements CustomerRepoInterface
{
    private $api_endpoint = "https://randomuser.me/api";
    private $nationality = "au";
    private $limit = "100";
  
    function index()
    {
        $customer =  Customer::all("firstname","lastname","email","country");
        return $customer;
    }

    function store() 
    {
        $client = new Client();
        $response = $client->get($this->api_endpoint."/?nat=".$this->nationality."&&results=".$this->limit);
        $data = json_decode($response->getBody(), true);
        $customers = $data["results"];
        $customer_list = [];

        for($x=0;$x<count($customers);$x++){
                array_push($customer_list,[
                    "firstname"=> $customers[$x]["name"]["first"],
                    "lastname"=>  $customers[$x]["name"]["last"]  ,
                    "email"=>     $customers[$x]["email"],
                    "username"=>  $customers[$x]["login"]["username"], 
                    "gender"=>    $customers[$x]["gender"], 
                    "country"=>   $customers[$x]["location"]["country"], 
                    "city"=>      $customers[$x]["location"]["city"], 
                    "phone"=>     $customers[$x]["phone"],
                    "password"=>  md5($customers[$x]["login"]["password"])
                ]);
            }
           
        
        if(Customer::upsert($customer_list,["email"])){
            return true;
        }else{
            return false;
        }
        

    }

    function customer($id)
    {
        $data = Customer::where("id",$id)->get(["firstname",
                                            "lastname",
                                            "email",
                                            "username",
                                            "gender",
                                            "country",
                                            "city",
                                            "phone"
        ]);
        if(count($data)>0){
            return CustomerResource::collection($data);                        
        }
        else{
            return "invalid";
        }
       
       
    }

    

}
