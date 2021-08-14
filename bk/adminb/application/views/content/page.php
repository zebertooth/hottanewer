<?php
//$no = $_GET['no'];
$no=$this->uri->segment(4);
if($no==""){$no=1;}
$pagesize=30;
#if(!$pagesize){$pagesize=30;}
$start=($pagesize*$no)-$pagesize;
$end=$pagesize*$no;
$totalpage=$num / $pagesize;
settype($totalpage,"integer");
if($pagesize>$num){ $end=$num;}
if($num%$pagesize<>0){ $totalpage=$totalpage+1; }
if($no==$totalpage){
	if(($num%$pagesize)==0){
		$end = $pagesize*$no;
	}else{
		$end=($num%$pagesize)+($pagesize*($no-1));
	}
}
?>