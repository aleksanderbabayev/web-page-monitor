<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

use Jfcherng\Diff\Differ;
use Jfcherng\Diff\DiffHelper;


class DiffService
{
    private $oldContents = null;
    private $newContents = null;

    public function __construct($oldContents, $newContents)
    {
        $this->oldContents = $oldContents;
        $this->newContents = $newContents;
    }

    public function diff()
    {
        // See the doc here: https://packagist.org/packages/jfcherng/php-diff
        $rendererName = 'SideBySide';
        $differOptions = [
            'context' => Differ::CONTEXT_ALL,
            'ignoreCase' => false,
            'ignoreWhitespace' => false,
        ];
        $rendererOptions = [
            'detailLevel' => 'word',
            'language' => 'eng',
            'lineNumbers' => true,
            'separateBlock' => true,
            'showHeader' => false,
            'spacesToNbsp' => false,
        ];
        
        return DiffHelper::calculate(
            $this->oldContents, $this->newContents,
            $rendererName, $differOptions, $rendererOptions);
    }

    public function stats()
    {
        return Differ::getInstance()->getStatistics();
    }
}
