<?php

namespace App\Http\Controllers;

use App\Models\User; // Import the User class
use App\Models\Information; // Import the User class
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import the Hash class

class HomeController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        

        return response()->json([
            'user' => $user,
        ]);
    }

    public function getInformations()
    {
        $data = Information::all();
        return response()->json([
            'informations' => $data,
        ]);
    }

    public function createInformation(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'isFinancialMaterial' => 'required|string',
            'financialMaterial' => 'required|string',
            'fuelEconomy' => 'required|string',
            'fleetFuelEconomyAverage' => 'required|integer',
            'vehiclesSoldHybrid' => 'required|string',
            'vehiclesSoldPlugIn' => 'required|string',
            'vehiclesSoldZeroEmission' => 'required|string',
            'fleetFuelEconomyStrategies' => 'required|string',
            'vehiclesManufactured' => 'required|integer',
            'vehiclesSold' => 'required|integer',
        ]);

        $information = Information::create([
            'user_id' => $request->user_id,
            'isFinancialMaterial' => $request->isFinancialMaterial,
            'financialMaterial' => $request->financialMaterial,
            'fuelEconomy' => $request->fuelEconomy,
            'fleetFuelEconomyAverage' => $request->fleetFuelEconomyAverage,
            'vehiclesSoldHybrid' => $request->vehiclesSoldHybrid,
            'vehiclesSoldPlugIn' => $request->vehiclesSoldPlugIn,
            'vehiclesSoldZeroEmission' => $request->vehiclesSoldZeroEmission,
            'fleetFuelEconomyStrategies' => $request->fleetFuelEconomyStrategies,
            'vehiclesManufactured' => $request->vehiclesManufactured,
            'vehiclesSold' => $request->vehiclesSold,
        ]);

        return response()->json([
            'information' => $information,
        ]);
    }
}
