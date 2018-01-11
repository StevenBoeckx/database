<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class admindatamanagement extends Controller
{
    public function getSensorData(Request $request)
    {

        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }


        // !!!!!TODO check if the logged in person has admin permision!!!!!


        // token is right so we can return the sensor data
        //DB::table('sensordata')->sensorID;
        return response()->json(DB::select("SELECT sensorData.id, sensorData.sensorID, sensorData.sensortype, sensorData.sensordata, sensorData.batteryPercentage FROM sensorData"));
    }
    public function deleteSensorData(Request $request,$id)
    {


        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }
        // !!!!!TODO check if the logged in person has admin permision!!!!!


        // token is right so we can return the sensor data
        //DB::table('sensordata')->sensorID;
        //dd($id);
        return response()->json(DB::select("DELETE FROM sensordata WHERE sensordata.id =".$id));
    }


public function addSensorData(Request $request)
{


    try {

        if (! $user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['user_not_found'], 404);
        }

    } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

        return response()->json(['token_expired'], $e->getStatusCode());

    } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

        return response()->json(['token_invalid'], $e->getStatusCode());

    } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

        return response()->json(['token_absent'], $e->getStatusCode());

    }
    // !!!!!TODO check if the logged in person has admin permision!!!!!


    // token is right so we can return the sensor data
    //DB::table('sensordata')->sensorID;

    return response()->json(DB::select("INSERT INTO sensordata (id, sensorID, sensortype, sensordata, batteryPercentage, 
    created_at, updated_at) VALUES (NULL,'".$request['sensorID']."', '".$request['sensortype']."', ".$request['sensordata'].",".$request['batteryPercentage']." , NULL, NULL)"));
}

}