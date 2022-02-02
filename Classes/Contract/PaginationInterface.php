<?php

namespace GeorgRinger\NumberedPagination\Contract;

interface PaginationInterface
{
    public function __construct(PaginatorInterface $paginator);

    public function getPreviousPageNumber(): ?int;

    public function getNextPageNumber(): ?int;

    public function getFirstPageNumber(): int;

    public function getLastPageNumber(): int;

    public function getStartRecordNumber(): int;

    public function getEndRecordNumber(): int;
}