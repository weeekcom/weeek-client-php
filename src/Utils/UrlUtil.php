<?php

namespace Weeek\Utils;

trait UrlUtil
{
    protected function concatSegments(string ...$segments): string
    {
        $segments = \array_map(static function ($segment) {
            return \trim($segment, '/');
        }, $segments);

        return \implode('/', \array_filter($segments));
    }
}
