<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class sensorRequest extends Controller
{
    public function getSensors(Request $request)
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

        // token is right so we can return the sensor data
        //DB::table('sensordata')->sensorID;
        return response()->json(DB::select("SELECT sensorData.sensorID, sensorData.sensortype, sensorData.sensordata, sensorData.batteryPercentage
        FROM sensorData INNER JOIN sensors ON sensors.sensorID=sensorData.sensorID WHERE sensors.userID=".$user['id']));
    }
}
