<?php
namespace App\Http\Controllers\Helpers;

class Helper
{
    public function getName($value, $language_id)
    {
        $description = $value->descriptions()->where('language_id', $language_id)->first();
        if ($description === null) {
            $description = $value->descriptions()->first();
        }

        return $description->name;
    }
}
