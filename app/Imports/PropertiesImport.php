<?php

namespace App\Imports;

use App\Models\Property;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class PropertiesImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $row)
    {
        die;
        foreach ($row as $v) {
            if ($row->filter()->isNotEmpty()) {
                if($v['property_name'] != null){
                    Property::create([
                        'property_title' =>  $v["property_name"],
                        'slug' => \Str::slug($v["property_name"]),
                        'address' => $v["address"],
                        'total_rooms' => $v["total_rooms"],
                        'description' => $v["descrrption"],
                        'star' => $v["star"],
                        'location' => strtolower($v["city"]),
                        'region' => $v["region"],
                        'status' => 1,
                    ]);
                }
                
            }
        }
    }
}
