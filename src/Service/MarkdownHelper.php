<?php

namespace App\Service;
use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Symfony\Contracts\Cache\CacheInterface;

/**
 * Created by PhpStorm.
 * User: Krzysztof
 * Date: 06.10.2020
 * Time: 12:53
 */
class MarkdownHelper
{
    private $markdownParser;
    private $cache;

    public function __construct(MarkdownParserInterface $markdownParser, CacheInterface $cache)
    {
        $this->markdownParser = $markdownParser;
        $this->cache = $cache;
    }

    public function parse(string $source): string
    {
        return $this->cache->get('markdown_'.md5($source), function() use ($source) {
            return $this->markdownParser->transformMarkdown($source);
        });
    }
}