<?php

namespace App\Console\Commands;

use App\Repository\CustomerRepoInterface;
use Illuminate\Console\Command;

class PopulateCustomer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customer:populate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run this command to populate the customers table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    protected CustomerRepoInterface $customer_repo;
    public function __construct(CustomerRepoInterface $customer_repo)
    {
        $this->customer_repo = $customer_repo;
        parent::__construct();
    }
    public function handle()
    {
        return $this->customer_repo->store();
    }
}
