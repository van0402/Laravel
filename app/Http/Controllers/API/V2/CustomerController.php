<?php

namespace App\Http\Controllers\API\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Resources\V2\CustomerResource;
use App\Http\Resources\CustomerResourcecollection;


class CustomerController extends Controller
{
    public function show(Customer $customer)
    {
        // hien thi ng dung
          return new CustomerResource( $customer);

    }
}
