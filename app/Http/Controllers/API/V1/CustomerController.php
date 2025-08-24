<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerResourcecollection;

class CustomerController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $custome)
    {
        // lay tat ca ng dung
        // return Customer::all();
        // return CustomerResource::collection($customer->all());
        // return CustomerResource::collection($customer->paginate(10));
        // return CustomerResource::collection($customer->simplePaginate(10));
        // return CustomerResource::collection($customer->cursorPaginate(10));
    {
        // show sp
       // return  Customer::all();
       return CustomerResource::collection($custome::paginate(5)); // phan trang

    }
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // tao ng dung
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // luu ng dung
        $request ->validate([
            
                'name' => 'required',
                'phone_customer' => 'required',
                'email_customer' => 'required'
                
            
       ] ); // kiem tra du lieu dau vao
       $customer = Customer::create($request->all()); // tao ng dung
          return new CustomerResource( $customer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        // hien thi ng dung
                return new CustomerResource( $customer);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // lay ng dung mang id
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Customer  $customer)
    {
        // cap nhat ng dung
        $customer->update($request->all()); // cap nhat ng dung
        return new CustomerResource($customer); // tra ve ng dung    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)

    {
        // delete ng dung
        $customer ->delete(); // xoa ng dung

    }
}
