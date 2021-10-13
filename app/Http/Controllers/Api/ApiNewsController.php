<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class ApiNewsController extends Controller
{
    public function news()
    {
        return News::latest()->paginate(10);
    }

    public function newsDetail(News $new)
    {
        return $new;
    }


}
