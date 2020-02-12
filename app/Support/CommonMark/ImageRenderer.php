<?php

namespace App\Support\CommonMark;

use League\CommonMark\ElementRendererInterface;
use League\CommonMark\Inline\Element\AbstractInline;
use League\CommonMark\Inline\Renderer\ImageRenderer as BaseImageRenderer;

class ImageRenderer extends BaseImageRenderer
{
    public function render(AbstractInline $inline, ElementRendererInterface $htmlRenderer)
    {
        $element = parent::render($inline, $htmlRenderer);

        $src = $element->getAttribute('src');

        $element->setAttribute('src', asset($src));

        return $element;
    }
}
