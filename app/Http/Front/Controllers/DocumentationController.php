<?php

namespace App\Http\Front\Controllers;

use App\Models\DocumentationPage;
use App\Support\CommonMark\CommonMark;
use App\Support\Documentation\Navigation;
use App\Support\Documentation\PackageDocsNavigation;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class DocumentationController
{
    public function __invoke()
    {
        $navigation = new PackageDocsNavigation();

        if (!$navigation) {
            abort(404);
        }

        $pageProperties = $this->getPageProperties($navigation);

        return view('front.docs.index')->with($pageProperties);
    }

    private function getPageProperties(Navigation $navigation): array
    {
        $documentationPage = DocumentationPage::where('key', request()->path())->firstOrFail();

        $document = YamlFrontMatter::parse($documentationPage->content);
        $pageProperties = $document->matter();
        $pageProperties['pagePath'] = request()->path();

        $pageProperties['content'] = CommonMark::convertToHtml($document->body());
        $pageProperties['tableOfContents'] = $this->extractTableOfContents($pageProperties['content']);

        $pageProperties['previousUrl'] = $navigation->getPreviousPage();
        $pageProperties['nextUrl'] = $navigation->getNextPage();

        $pageProperties['og'] = [];

        $pageProperties['claim'] = 'the best error tracker for Laravel';

        $pageProperties['navigation'] = $navigation;

        $pageProperties['gitHubUrl'] = $this->getGitHubUrl();

        return $pageProperties;
    }

    private function extractTableOfContents(string $document): array
    {
        $matches = [];

        preg_match_all('/<h2 id="([^"]+)" class="group">([^<]+)/', $document, $matches);

        return array_combine($matches[1], $matches[2]);
    }

    protected function getGitHubUrl(): string
    {
        return 'https://github.com/spatie/laravel-mailcoach-docs/edit/master/' . request()->path() . '.md';
    }
}
