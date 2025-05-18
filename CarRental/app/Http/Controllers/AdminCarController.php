<?php
namespace App\Http\Controllers;
use App\Models\Car;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Storage;

class AdminCarController extends Controller{

    public function index(){
        $cars = Car::all();
        return Inertia::render('Cars/CarList', [
            'cars' => $cars,
        ]);
    }
    public function create(){
        return Inertia::render("Cars/AddCar");
    }

    private function handleImage($image, $oldUrl = null){
        $imageLocation = $oldUrl;
        if ($image) {
            $imageName = time() . rand(1000,9999) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('images', $imageName, 'shared');
            $imageLocation = Storage::disk('shared')->url($imagePath);
        }

            if ($oldUrl) {
                $parsed = parse_url($oldUrl);
                //http://localhost:8000/shared/images/1745438247.jpg
                $urlPath = ltrim($parsed['path'], '/'); // e.g. shared/images/1745438234.jpg                
                // Remove the 'shared/' part to get relative path inside the disk
                if (str_starts_with($urlPath, 'shared/')) {
                    $relativePath = substr($urlPath, strlen('shared/')); // e.g. images/1745438234.jpg
            
                    if (Storage::disk('shared')->exists($relativePath)) {
                        Storage::disk('shared')->delete($relativePath);
                    }
                }
            }

        return $imageLocation;
    }

    public function store(Request $request){        
        try{
            $request->validate([
                'name'=> 'required|string|max:255',
                'brand'=> 'required|string|max:255',
                'model'=> 'required|string|max:255',
                'year' => 'required|integer|min:1900|max:' . date('Y'),
                'car_type' => 'required|string|in:Sedan,SUV,Hatchback,MPV,Coupe,Convertible,Wagon,Pickup,Van,Crossover',
                'daily_rent_price'=> 'required|numeric',
                'availability' => 'required|boolean|in:0,1',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            Car::create([
                'name'=>$request->name,
                'brand'=> $request->brand,
                'model'=> $request->model,
                'year'=> $request->year,
                'car_type'=> $request->car_type,
                'daily_rent_price'=> $request->daily_rent_price,
                'availability' => $request->availability,
                'image' => $this->handleImage($request->file('image')),
                // 'image'=>$imageLocation,// saved as absolute path
            ]);
            return redirect()->route('cars.index')->with('success','Car Added Successfully');
        }catch(\Throwable $th){
            return redirect()->back()->with('error',$th->getMessage());
        }
    }
    public function show(string $id){//
    }
    public function edit(string $id){
        $car = Car::findOrFail($id);
        return Inertia::render('Cars/EditCar',[ 'car'=>$car]);
    }

    public function update(Request $request, string $id){
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'brand' => 'required|string|max:255',
                'model' => 'required|string|max:255',
                'year' => 'required|integer|min:1900|max:' . date('Y'),
                'car_type' => 'required|string|max:255',
                'daily_rent_price' => 'required|numeric',
                'availability' => 'required|boolean|in:0,1',
                //'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Make image optional
            ]);

            $car = Car::findOrFail($id); 
            
            // Preserve the old image by default
            $imagePath = $car->image;
            
            // If a new image is uploaded, handle it, otherwise preserve the old image
            if ($request->hasFile('image')) {
                $imagePath = $this->handleImage($request->file('image'), $car->image); // Update with new image
            }

            // Update car record
            $car->update([
                'name' => $request->name,
                'brand' => $request->brand,
                'model' => $request->model,
                'year' => (int) $request->year,  // Ensure year is stored as integer
                'car_type' => $request->car_type,
                'image' => $imagePath, // Set to new image or keep old one
                'daily_rent_price' => $request->daily_rent_price,
                'availability' => $request->availability,
            ]);

            return redirect()->route('cars.index', $car->id)->with('success', 'Car updated successfully');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }


    private function handleImageDelete($image){
        if ($image) {
            $imagePath = str_replace(Storage::disk('shared')->url(''), '', $image);
            if (Storage::disk('shared')->exists($imagePath)) {
                Storage::disk('shared')->delete($imagePath);
            }
        }
    }

    public function destroy(string $id){
        $car = Car::find($id);
        $this->handleImageDelete($car->image);
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully');
    }
}
