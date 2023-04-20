<?php

defined('TYPO3') or die();

if (!interface_exists('TYPO3\CMS\Core\Pagination\PaginationInterface', false)) {
    class_alias(
        \GeorgRinger\NumberedPagination\Contract\PaginationInterface::class,
        'TYPO3\CMS\Core\Pagination\PaginationInterface'
    );
}

if (!interface_exists('TYPO3\CMS\Core\Pagination\PaginatorInterface', false)) {
    class_alias(
        \GeorgRinger\NumberedPagination\Contract\PaginatorInterface::class,
        'TYPO3\CMS\Core\Pagination\PaginatorInterface'
    );
}
