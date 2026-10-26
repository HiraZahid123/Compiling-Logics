<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\View\View;

class ContactPageController extends Controller
{
    /**
     * Show the contact page with the bookable service catalogue.
     */
    public function show(): View
    {
        return view('contact', [
            'categories' => ServiceCategory::query()->with('services')->orderBy('sort_order')->get(),
        ]);
    }
}
