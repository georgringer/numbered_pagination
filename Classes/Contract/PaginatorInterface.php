<?php

namespace GeorgRinger\NumberedPagination\Contract;

interface PaginatorInterface
{
    public function withItemsPerPage(int $itemsPerPage): PaginatorInterface;

    public function withCurrentPageNumber(int $currentPageNumber): PaginatorInterface;

    public function getPaginatedItems(): iterable;

    public function getNumberOfPages(): int;

    public function getCurrentPageNumber(): int;

    public function getKeyOfFirstPaginatedItem(): int;

    public function getKeyOfLastPaginatedItem(): int;
}