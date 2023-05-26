<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerAllResource;
use App\Repository\CustomerRepoInterface;

class CustomerController extends Controller
{
    private CustomerRepoInterface $customer_repo;

    public function __construct(CustomerRepoInterface $user_repo)
    {
        $this->customer_repo = $user_repo;
    }

    public function index()
    {
        return CustomerAllResource::collection($this->customer_repo->index());
    }

    public function store()
    {
        return $this->customer_repo->store();
    }

    public function show($id)
    {
        return $this->customer_repo->customer($id);
    }
}
