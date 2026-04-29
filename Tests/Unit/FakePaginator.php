<?php

declare(strict_types=1);

namespace GeorgRinger\NumberedPagination\Tests\Unit;

use TYPO3\CMS\Core\Pagination\PaginatorInterface;

final class FakePaginator implements PaginatorInterface
{
    public function __construct(
        private readonly int $numberOfPages,
        private readonly int $currentPageNumber = 1,
    ) {}

    public function withItemsPerPage(int $itemsPerPage): PaginatorInterface
    {
        return $this;
    }

    public function withCurrentPageNumber(int $currentPageNumber): PaginatorInterface
    {
        return new self($this->numberOfPages, $currentPageNumber);
    }

    public function getPaginatedItems(): iterable
    {
        return [];
    }

    public function getNumberOfPages(): int
    {
        return $this->numberOfPages;
    }

    public function getCurrentPageNumber(): int
    {
        return $this->currentPageNumber;
    }

    public function getKeyOfFirstPaginatedItem(): int
    {
        return 0;
    }

    public function getKeyOfLastPaginatedItem(): int
    {
        return 0;
    }
}
