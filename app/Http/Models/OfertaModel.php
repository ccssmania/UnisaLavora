<?php

namespace App\Http\Models;


use App\Device;
use App\Sale_sheet;

class DeviceModel {
    
    
    public static function getDevices($name = null, $idCategory = null){
        $device = Device::query();

        if($name){
            $device->where('name', 'like', "%{$name}%");
        }
        if($idCategory){
            $device->where('iddevice_category', $idCategory);
        }
        
     return $device->paginate(20);  
    }

    public static function getDevices2($name = null , $idproduct = null){
        $device = Device::query();
        
        
        if($name){
            $device->where('name', 'like', "%{$name}%");
        }

        if($idproduct){
            $device->whereHas('sale_sheets', function($query_salesheets) use ($idproduct){
                $query_salesheets->where('idproduct', $idproduct);
            })->get();

        }
        return $device->get();    
    }
    public static function getDevices3($name = null){
        $device = Device::query();
        
        
        if($name){
            dd($name);
            $string = strtoupper($name);
            $device->where(function($query) use ($name){
                $query->where("UPPER('name')", "like", "%{$string}%");
            })->get();
        }

    

        
        return $device->get();    
    }
    
    
    
}
