<?php


use JetBrains\PhpStorm\Pure;

class Pagination
{

    private int $currentPage;
    private int $perPage;
    private int $qualItems;


    public function __construct(int $page = 1, int $items_per_page = 4, int $items_total_count = 0)
    {
        $this->currentPage = $page;
        $this->perPage = $items_per_page;
        $this->qualItems = $items_total_count;
    }

    /**
     * @return int
     */
    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }


    public function next(): int
    {
        return $this->currentPage + 1;
    }


    public function previous(): int
    {

        return $this->currentPage - 1;


    }

    #[Pure] public function totalPages(): int
    {
        return ceil($this->qualItems / $this->perPage);
    }

    public function hasPrev(): bool
    {
        return $this->previous() >= 1;
    }


    public function hasNxt(): bool
    {
        return $this->next() <= $this->totalPages();
    }

    public function offset(): int
    {
        return ($this->currentPage - 1) * $this->perPage;
    }

}







