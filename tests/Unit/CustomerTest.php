<?php

namespace Tests\Unit;


use App\Repository\CustomerRepo;
use App\Repository\CustomerRepoInterface;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    
    public function getRepo()
    {
        $customerRepoMock = $this->createMock(CustomerRepoInterface::class);
        $customerRepo = new CustomerRepo($customerRepoMock);
        return $customerRepo;
    }

    public function test_populate_customers()
    {
        $customer_data = $this->getRepo()->store();
        $this->assertTrue($customer_data);
    }

    public function test_check_if_user_exist()
    {
        $customer_data = $this->getRepo()->customer(1);
        $this->assertTrue($customer_data!="invalid");
    }

   
}
