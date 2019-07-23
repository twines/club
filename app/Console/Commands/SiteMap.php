<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\TopicVideo;
use Illuminate\Console\Command;

class SiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:siteMap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '生成xml的网站地图';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $categoryList = Category::all();
        $xml = '<?xml version="1.0" encoding="UTF-8"?><sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($categoryList as $category) {
            $xml .= '<sitemap>';
            $xml .= '<loc>';
            $xml .= url('/sitemap', ['id' => $category->id]) . '.xml';
            $xml .= '</loc>';
            $xml .= '<lastmod>';
            $xml .= $category->updated_at;
            $xml .= '</lastmod>';
            $xml .= '</sitemap>';
        }
        $xml .= '</sitemapindex>';
        $siteMap = public_path('/') . '/sitemap.xml';
        @unlink($siteMap);
        file_put_contents($siteMap, $xml, FILE_APPEND);
        foreach ($categoryList as $category) {
            $siteMap = public_path('/') . "sitemap/{$category->id}.xml";
            @unlink($siteMap);
            $videoTopicList = TopicVideo::where('category_id', $category->id)->get();
            $xml = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">';
            if ($videoTopicList) {
                foreach ($videoTopicList as $video) {
                    $xml .= '<url>';
                    $xml .= '<loc>';
                    $xml .= url('/player', ['av' => $video->av, 'p' => $video->p]) . '.html';
                    $xml .= '</loc>';
                    $xml .= '<priority>0.8</priority>';
                    $xml .= '<lastmod>';
                    $xml .= $video->updated_at ? $video->updated_at : $video->created_at;
                    $xml .= '</lastmod>';
                    $xml .= '<changefreq>daily</changefreq>';
                    $xml .= '</url>';
                }
            }
            $xml .= '</urlset>';
            file_put_contents($siteMap, $xml, FILE_APPEND);
        }

    }
}
