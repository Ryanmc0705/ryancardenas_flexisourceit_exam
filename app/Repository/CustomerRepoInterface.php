<?php
namespace App\Repository;

interface CustomerRepoInterface{

    function store();
    function index();
    function customer($id);

}

?>