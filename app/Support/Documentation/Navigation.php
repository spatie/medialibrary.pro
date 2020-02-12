<?php

namespace App\Support\Documentation;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Spatie\Menu\Laravel\Link;
use Spatie\Menu\Laravel\Menu;

abstract class Navigation
{
    abstract public function menuStructure(): array;

    public function menu(): Menu
    {
        return $this->generateMenu($this->menuStructure());
    }

    public function getNextPage(): string
    {
        return $this->getPreviousOrNextPage(1);
    }

    public function getPreviousPage(): string
    {
        return $this->getPreviousOrNextPage(-1);
    }

    protected function getPreviousOrNextPage(int $addition): string
    {
        $flattenedNavigation = $this->getFlattenedNavigation();
        $slug = collect(request()->segments())->except(0, 1)->implode('/');
        $currentIndex = $flattenedNavigation->search($slug);

        $page = $flattenedNavigation->get($currentIndex + $addition, '');

        return !empty($page) ? "/docs/{$this->sectionSlug()}/{$page}" : '';
    }

    protected function getFlattenedNavigation(): Collection
    {
        $navigation = $this->menuStructure();

        return collect($navigation)
            ->flatMap(function (array $block, string $title): array {
                if (empty($title)) {
                    return collect($block)->map(function (string $page) {
                        return Str::slug($page);
                    })->toArray();
                }

                return collect($block)->map(function (string $page) use ($title) {
                    $slug_title = Str::slug($title);
                    $slug_page = Str::slug($page);
                    return "{$slug_title}/{$slug_page}";
                })->toArray();
            });
    }

    protected function generateMenu(array $items): Menu
    {
        if (empty($items)) {
            return Menu::new();
        }

        $prefix = "docs/{$this->sectionSlug()}";

        $contents = collect($items)->map(function (array $items, $title) use ($prefix) : Menu {
            $title = is_int($title) ? null : $title;

            $subMenuContents = collect($items)->map(function (string $item) use ($prefix, $title) : Link {
                $url = Str::slug($item);

                if (!is_null($title)) {
                    $url = Str::slug($title) . '/' . $url;
                }

                return Link::toUrl("{$prefix}/{$url}", $item);
            });

            $firstLink = $subMenuContents[0]->url();

            return Menu::new($subMenuContents->toArray())
                ->prependIf(!is_null($title), "<h2><a href=\"{$firstLink}\">{$title}</a></h2>");
        });

        return Menu::new($contents->toArray())->setActiveFromRequest();
    }
}
