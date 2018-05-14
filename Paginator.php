<?php
class
 Paginator{
    public $itemsPerPage;
    public $range; //Shows the current page number between 2 previous and 2 after
    public $currentPage; //current page number var
    public $total; //total number of pages
    public $textNav; //to show text navigation e.g. next/previous
    public $itemSelect; //array of numbers 
    private $_naviation;
    private $_link;
    private $_pageNumHtml;
    private $_itemHtml;

    public function _contruct(){
        $this->itemsPerPage = 5;
        $this->range = 5;
        $this->currentPage = 1;
        $this->total = 0;
        $this->textNav = false;
        $this->itemSelect = array();
    }




}
?>