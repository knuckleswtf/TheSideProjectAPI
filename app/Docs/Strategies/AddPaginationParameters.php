<?php

namespace App\Docs\Strategies;

use Knuckles\Scribe\Extracting\ParamHelpers;
use Knuckles\Scribe\Extracting\RouteDocBlocker;
use Knuckles\Scribe\Extracting\Strategies\Strategy;
use Knuckles\Camel\Extraction\ExtractedEndpointData;

class AddPaginationParameters extends Strategy
{
    /**
     * Trait containing some helper methods for dealing with "parameters",
     * such as generating examples and casting values to types.
     * Useful if your strategy extracts information about parameters or generates examples.
     */
    use ParamHelpers;

    /**
     * @link https://scribe.knuckles.wtf/laravel/advanced/plugins
     *
     * @param ExtractedEndpointData $endpointData The endpoint we are currently processing.
     *   Contains details about httpMethods, controller, method, route, url, etc, as well as already extracted data.
     * @param array $routeRules Array of rules for the ruleset which this route belongs to.
     *
     * See the documentation linked above for more details about writing custom strategies.
     *
     * @return array|null
     */
    public function __invoke(ExtractedEndpointData $endpointData, array $routeRules): ?array
    {
        $methodDocBlock = RouteDocBlocker::getDocBlocksFromRoute($endpointData->route)['method'];
        $tags = $methodDocBlock->getTagsByName('usesPagination');

        if (empty($tags)) {
            // Doesn't use pagination
            return [];
        }

        return [
            'page' => [
                'description' => 'Page number to return.',
                'required' => false,
                'example' => 1,
            ],
            'pageSize' => [
                'description' => 'Number of items to return in a page. Defaults to 10.',
                'required' => false,
                'example' => null, // So it doesn't get included in the examples
            ],
        ];
    }
}
