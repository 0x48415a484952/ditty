<?php

namespace App\Widgets\SeoHandler;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Arrilot\Widgets\AbstractWidget;

class SeoHandler extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run(Request $request)
    {
        $validRoots = ['posts'];

        if (! empty($request->route()->parameters['uri'])) {
            $uri = $request->route()->parameters['uri'];
            $parsedUri = explode('/', $uri);
            $root = $parsedUri[0];

            if (in_array($root, $validRoots)) {
                $class = __NAMESPACE__ . "\Pages\\" . Str::studly($root);
                $seoItems = (new $class)->get($parsedUri);

                return view('widgets.seo_handler.seo_handler', [
                    'items' => $seoItems
                ]);
            }

            else die('ssd');
        }

        return '';
    }
}
