<?php

defined('TYPO3_MODE') or die();

if (!class_exists('TYPO3\CMS\Core\Pagination\PaginationInterface', false)) {
    class_alias(
        \GeorgRinger\NumberedPagination\Contract\PaginationInterface::class,
        'TYPO3\CMS\Core\Pagination\PaginationInterface'
    );
}

if (!class_exists('TYPO3\CMS\Core\Pagination\PaginatorInterface', false)) {
    class_alias(
        \GeorgRinger\NumberedPagination\Contract\PaginatorInterface::class,
        'TYPO3\CMS\Core\Pagination\PaginatorInterface'
    );
}
