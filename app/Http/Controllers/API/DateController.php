<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Responses\SimpleResponse;
use App\Models\Date;

class DateController extends Controller {
    //

    public function deleteDate(Date $date) {
        $date->delete();
        return SimpleResponse::success(['message' => 'DATE.REMOVED.SUCCESS']);
    }
}
