<?php

namespace App\Console\Commands;

use App\Models\Apartments\Apartments;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class SitemapThree extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sitemap-three';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $apartments = Apartments::limit(50000)->offset(100000)->get();
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($apartments as $product) {
            $sitemap .= '<url>
                            <loc>https://procura.one/verdmat/'.$product->slug.'</loc>
                            <lastmod>'.Carbon::now()->format('Y-m-d').'</lastmod>
                            <changefreq>daily</changefreq>
                            <priority>0.8</priority>
                        </url>';
        }

        $sitemap .= '</urlset>';

        Storage::disk('public')->put('sitemaps/procura-one-3.xml', $sitemap);
    }
}
