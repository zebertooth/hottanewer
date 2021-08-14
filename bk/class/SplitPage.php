<?php
// Class : SplitPage
// Version : 1.3.7
// Create By : GoGermany
// Date Time : 27/12/2011 2:52 PM

// Method
// startRow = Find and return Result
// showSelectPage = Show Select Page Link

// Change Log
// Can change current page by user
// Add var $numrow_page for show numrow in this page


class SplitPage {
    var $field = "*";
    var $fieldCount = 'COUNT(*)';
    var $table;
    var $condition;
    var $conditionCount = NULL;
    var $order;
    // TOTAL FOR SPLIT
    var $pagesize;
    var $pagearea;
    var $images = false;
    var $icon1; // First
    var $icon2; // Previous
    var $icon3; // Next
    var $icon4; // Last
    var $num;
    var $numrow;
    var $numrow_page;
    var $current_page;
    var $parameters;
    var $paginator = '';
    public function __construct() {
        $this->pagesize = 6;
        $this->pagearea = 5;
    }
    public function startRow() {
        if (empty ( $this->current_page )) {
            // IF NOT VARIABLE PAGE PAGE = 1
            if (! empty ( $_GET ['page'] )) {
                $this->current_page = $_GET ['page'];
            } else {
                $this->current_page = 1;
            }
        }
        
        // FIND START ROW FROM RECENT PAGE-1 * PAGESIZE
        $startRow = ($this->current_page - 1) * $this->pagesize;
        $this->num = $startRow + 1;
        
        // SQL
        $sql = "SELECT  $this->field FROM $this->table $this->condition $this->order LIMIT $startRow,$this->pagesize";
		$result = mysqli_query($GLOBALS["conn"],  $sql ) or trigger_error ( mysqli_error($GLOBALS["conn"]), E_USER_ERROR );
        $this->numrow_page = mysqli_num_rows( $result );
        
        // Find Total Row
        
        // Check Condition count
        if (is_null ( $this->conditionCount )) {
            $this->conditionCount = $this->condition;
        }
        
        $sql = "SELECT $this->fieldCount  AS total FROM $this->table $this->conditionCount";
        $resultRow = mysqli_query($GLOBALS["conn"],  $sql ) or trigger_error ( mysqli_error($GLOBALS["conn"]), E_USER_ERROR );
        $this->numrow = mysqli_fetch_object( $resultRow )->total;
        
        return $result;
    }
    private function showButton($page, $label, $path, $icon, $class) {
        // SET KEYWORD FOR SEARCH NEXT PAGE
        if ($this->parameters != "") {
            $allParameter = '?page=' . $page . $this->parameters;
        } else {
            $allParameter = '?page=' . $page;
        }
        
        if (($this->images == false) || ($icon == "")) {
            if ($class == "") {
                $this->paginator .= "<li ><a href='" . $path . $allParameter . "' >" . $label . "</a></li>";
            } else {
                if ($icon == "prev"){
                    $this->paginator .= "<li class='prev' ><a href='" . $path . $allParameter . "' class='" . $class . "'>" . $label . "</a></li>";
                }elseif ($icon == "next"){
                    $this->paginator .= "<li class='next' ><a href='" . $path . $allParameter . "' class='" . $class . "'>" . $label . "</a></li>";
                }else{
                    if($this->current_page == $page){
                        $this->paginator .= "<li class='page-item active' ><a href='" . $path . $allParameter . "' class='" . $class . "'>" . $label . "</a></li>";
                    }else{
                        $this->paginator .= "<li class='page-item' ><a href='" . $path . $allParameter . "' class='" . $class . "'>" . $label . "</a></li>";
                    }
                   
                }
            }
        } else {
            $this->paginator .= " <li><a href='" . $path . $allParameter . "'><img  src='" . $icon . "'  alt='" . $label . "' border='0' align='absbottom' /></a></li> ";
        }
    }
    public function showSelectPage($type = "php", $path = '', $class = "pagination") {
        $path = (empty ( $path )) ? $_SERVER ['PHP_SELF'] : $path;
        
        // FIND TOTAL PAGE
        $total_pages = ceil ( $this->numrow / $this->pagesize );
        
        // FIND PAGE AREA
        $totalarea = ceil ( $total_pages / $this->pagearea );
        // FIND RECENT PAGE
        $thisarea = ceil ( $this->current_page / $this->pagearea );
        
        // FIND START ROW AND STOP ROW IN 1 PAGE
        $startnumpage = (($thisarea * $this->pagearea) - ($this->pagearea - 1));
        $stopnumpage = $thisarea * $this->pagearea;
        
        $this->paginator .= "<ul class='pagination '>";
        
        // IF NOT PAGE 1 CREATE First Previous BUTTON
        if ($this->current_page != 1) {
            //$this->showButton ( "1", "First", $path, $this->icon1, "page-link" );
            $prev_page = $this->current_page - 1;
            $this->showButton ( $prev_page, "<i class='bi bi-chevron-left'></i>", $path, "prev", "page-link" );
        }
        
        // Loop FOR NUM PAGE
        while ( ($startnumpage <= $stopnumpage) && ($startnumpage <= $total_pages) ) {
            if ($startnumpage == $this->current_page) {
                $this->showButton ( $startnumpage, $startnumpage, $path, "", "page-link" );
            } else {
                $this->showButton ( $startnumpage, $startnumpage, $path, "", "page-link" );
            }
            $startnumpage ++;
        }
        
        // IF NOT LAST PAGE CREATE NEXT, LAST BUTTON
        if ($this->current_page < $total_pages) {
            $next_page = $this->current_page + 1;
            $this->showButton ( $next_page, "<i class='bi bi-chevron-right'></i>", $path, "next", "page-link" );
            //$this->showButton ( $total_pages, "", $path, $this->icon4, "page spiltLastPage" );
        }
        
        $this->paginator .= "</ul>";
        
        if ($type == 'ajax') {
            return $this->paginator;
        } else {
            echo $this->paginator;
        }
    }
}
?>