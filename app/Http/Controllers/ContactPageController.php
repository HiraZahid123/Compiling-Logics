<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\View\View;

class ContactPageController extends Controller
{
    /**
     * Show the contact page with Calendly when configured, otherwise the built-in booking widget.
     */
    public function show(): View
    {
        $calendlyUrl = $this->calendlyEmbedUrl();

        return view('contact', [
            'calendlyUrl' => $calendlyUrl,
            'categories' => $calendlyUrl === null
                ? ServiceCategory::query()->with('services')->orderBy('sort_order')->get()
                : collect(),
        ]);
    }

    /**
     * Build the Calendly embed URL styled with the brand colour.
     */
    private function calendlyEmbedUrl(): ?string
    {
        $url = config('services.calendly.url');

        if (blank($url)) {
            return null;
        }

        return $url.(str_contains($url, '?') ? '&' : '?').http_build_query([
            'hide_gdpr_banner' => 1,
            'primary_color' => '0049fd',
        ]);
    }
}
