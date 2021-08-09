<?php
namespace App\Http\Requests\News;

use App\Rules\News\GroupNewsRule;
use Illuminate\Http\Request;

class GroupNewsRequest
{
    public function __construct(Request $request){

    }

    /*
     * Метод валидирует поля для группировки
     */
    public function validated($object, $request){
        $object->validate($request, [
            'groupBy' => ['regex:/(source|tag|date)/u'],
        ]);
    }
}
