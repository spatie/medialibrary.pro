<?php

namespace App\Support\CommonMark;

use Illuminate\Support\Str;
use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Block\Renderer\HeadingRenderer as BaseHeadingRenderer;
use League\CommonMark\ElementRendererInterface;
use League\CommonMark\HtmlElement;

class HeadingRenderer extends BaseHeadingRenderer
{
    public function render(AbstractBlock $block, ElementRendererInterface $htmlRenderer, $inTightList = false)
    {
        $element = parent::render($block, $htmlRenderer, $inTightList);

        $id = Str::slug($element->getContents());

        $element->setAttribute('id', $id);
        $element->setAttribute('class', 'group');
        $element->setContents(
            $element->getContents() .
            new HtmlElement(
                'a',
                ['href' => "#{$id}", 'class' => 'invisible group-hover:visible ml-2 text-base text-gray-400 hover:text-purple-400'],
                new HtmlElement('i', ['class' => 'fas fa-link'])
            )
        );

        return $element;
    }

    protected function getFragmentLinkClass($elementName)
    {
        return 'ml-1 text-gray-400 hover:text-purple-400';
    }
}
