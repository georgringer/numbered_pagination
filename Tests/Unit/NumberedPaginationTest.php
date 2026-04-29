<?php

declare(strict_types=1);

namespace GeorgRinger\NumberedPagination\Tests\Unit;

use GeorgRinger\NumberedPagination\NumberedPagination;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class NumberedPaginationTest extends TestCase
{
    #[Test]
    public function noEllipsisAtEndWhenLastPageIsAdjacentToDisplayRange(): void
    {
        // 4 pages, window 3, page 1 → range [1,2,3], page 4 is directly adjacent — no gap
        $pagination = new NumberedPagination(new FakePaginator(numberOfPages: 4, currentPageNumber: 1), 3);

        self::assertFalse($pagination->getHasMorePages());
        self::assertSame([1, 2, 3], $pagination->getAllPageNumbers());
    }

    #[Test]
    public function noEllipsisAtStartWhenFirstPageIsAdjacentToDisplayRange(): void
    {
        // 4 pages, window 3, page 4 → range [2,3,4], page 1 is directly adjacent — no gap
        $pagination = new NumberedPagination(new FakePaginator(numberOfPages: 4, currentPageNumber: 4), 3);

        self::assertFalse($pagination->getHasLessPages());
        self::assertSame([2, 3, 4], $pagination->getAllPageNumbers());
    }

    #[Test]
    public function ellipsisAtEndWhenThereAreHiddenPages(): void
    {
        // 10 pages, window 3, page 1 → range [1,2,3], pages 4–9 are hidden before last page
        $pagination = new NumberedPagination(new FakePaginator(numberOfPages: 10, currentPageNumber: 1), 3);

        self::assertTrue($pagination->getHasMorePages());
        self::assertSame([1, 2, 3], $pagination->getAllPageNumbers());
    }

    #[Test]
    public function ellipsisAtStartWhenThereAreHiddenPages(): void
    {
        // 10 pages, window 3, page 10 → range [8,9,10], pages 2–7 are hidden after first page
        $pagination = new NumberedPagination(new FakePaginator(numberOfPages: 10, currentPageNumber: 10), 3);

        self::assertTrue($pagination->getHasLessPages());
        self::assertSame([8, 9, 10], $pagination->getAllPageNumbers());
    }

    #[Test]
    public function bothEllipsesActiveWhenCurrentPageIsInTheMiddle(): void
    {
        // 10 pages, window 3, page 5 → range [4,5,6], pages 2–3 hidden at start, 7–9 hidden at end
        $pagination = new NumberedPagination(new FakePaginator(numberOfPages: 10, currentPageNumber: 5), 3);

        self::assertTrue($pagination->getHasLessPages());
        self::assertTrue($pagination->getHasMorePages());
        self::assertSame([4, 5, 6], $pagination->getAllPageNumbers());
    }

    #[Test]
    public function allPagesShownWithoutEllipsisWhenWindowCoversAll(): void
    {
        // 4 pages, window 5 → all pages fit, no ellipsis anywhere
        $pagination = new NumberedPagination(new FakePaginator(numberOfPages: 4, currentPageNumber: 1), 5);

        self::assertFalse($pagination->getHasMorePages());
        self::assertFalse($pagination->getHasLessPages());
        self::assertSame([1, 2, 3, 4], $pagination->getAllPageNumbers());
    }
}
