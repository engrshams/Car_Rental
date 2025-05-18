<?php
namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use Inertia\Inertia;
class CustomerController extends Controller{

    public function index(){
        $customers = Customer::all()->load('user');
        return Inertia::render('Customers/CustomerList', [
            'customers' => $customers,
        ]);
    }

    public function create(){
        return Inertia::render('Customers/AddCustomer');
    }

    public function store(Request $request){        
        try {
            $request->validate([
                'cus_name' => 'required|string|max:150',
                'cus_add' => 'required|string|max:255',
                'cus_city' => 'required|string|max:25',
                'cus_state' => 'required|string|max:25',
                'cus_postcode' => 'required|string|max:20',
                'cus_country' => 'required|string|max:25',
                'cus_phone' => 'required|string|max:11',
                'user_id' => 'required|exists:users,id',
            ]);
            Customer::create([
                'cus_name' => $request->cus_name,
                'cus_add' => $request->cus_add,
                'cus_city' => $request->cus_city,
                'cus_state' => $request->cus_state,
                'cus_postcode' => $request->cus_postcode,
                'cus_country' => $request->cus_country,
                'cus_phone' => $request->cus_phone,
                'user_id' => $request->user_id,
            ]);
            return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function show(string $id){//
    }

    public function edit(string $id){
        $customer = Customer::findOrFail($id);
        return Inertia::render('Customers/EditCustomer',[
            'customer'=> $customer
        ]);
    }

    public function update(Request $request, string $id){
        try {
            $request->validate([
                'cus_name' => 'required|string|max:150',
                'cus_add' => 'required|string|max:255',
                'cus_city' => 'required|string|max:25',
                'cus_state' => 'required|string|max:25',
                'cus_postcode' => 'required|string|max:20',
                'cus_country' => 'required|string|max:25',
                'cus_phone' => 'required|string|max:11',
            ]);

            $customer = Customer::findOrFail($id);
            $data = [
                'cus_name' => $request->cus_name,
                'cus_add' => $request->cus_add,
                'cus_city' => $request->cus_city,
                'cus_state' => $request->cus_state,
                'cus_postcode' => $request->cus_postcode,
                'cus_country' => $request->cus_country,
                'cus_phone' => $request->cus_phone,
            ];

            $customer->update($data);

            return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }       
    }

    public function destroy(string $id){
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index')->with('success','Customer deleted successfully.');
    }
}