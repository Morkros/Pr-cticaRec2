<?php

namespace app\Traits;

use App\Models\rickMorty;
use App\Models\randomUser;
use Illuminate\Http\Request;

trait ApiProcessor
{

    public function saveOnDB(Request $request, $className)
    {
        if ($className === "RickMortyController") { //Rick y Morty
            foreach ($request->all() as $characterData) {
                $record = rickMorty::updateOrCreate(
                    [
                        'name' => $characterData['name'],
                        'status' => $characterData['status'],
                        'species' => $characterData['species'],
                        'gender' => $characterData['gender'],
                    ]
                );
                $processedRecords[] = $record;
            }
        } else if ($className === "RandomUserController") { //RandomUser
            foreach ($request->all() as $characterData) {
                $record = randomUser::updateOrCreate(
                    [
                        'gender' => $characterData['gender'],
                        'name' => $characterData['name']['first'],
                        'location' => $characterData['location']['street']['name'],
                    ]
                );
                $processedRecords[] = $record;
            }
        }
        return $processedRecords;
    }
}
