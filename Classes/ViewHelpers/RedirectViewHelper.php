<?php
declare(strict_types=1);

/*
 * This file is part of the FoT3\Rdct package.
 * @author el_equipo@punkt.de
 *
 * This package is open source software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

namespace FoT3\Rdct\ViewHelpers;

use FoT3\Rdct\Redirects;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class RedirectViewHelper extends AbstractViewHelper
{
    public function initializeArguments(): void
    {
        $this->registerArgument('inUrl', 'string', 'Input URL', true);
        $this->registerArgument('length', 'integer', 'URL string length limit', false, 0);
        $this->registerArgument('indexScriptUrl', 'string', 'URL of "index script" - the prefix of the "?RDCT=..." parameter. If not supplied it will default to \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv(TYPO3_REQUEST_DIR).index.php', false, '');
    }

    public function render(): string
    {
        return GeneralUtility::makeInstance(Redirects::class)->makeRedirectUrl($this->arguments['inUrl'], $this->arguments['length'], $this->arguments['indexScriptUrl']);
    }
}
