<?php
if (! isset ( $_SESSION )) session_start ();
$pageConfig = array(
	"member" => array(
		"text" => "ข้อมูลสมาชิกผู้ขาย",
		"icon" => "icon_Community.png",
		"page" => array(
					"member.php",
					"user_account_controller.php")
	),
	"buyer" => array(
		"text" => "ข้อมูลสมาชิกผู้ซื้อ",
		"icon" => "icon_buyer.png",
		"page" => array(
					"buyer.php",
					"buyer_edit.php",
					"buyer_controller.php")
	),
	"product" => array(
		"text" => "ข้อมูลสินค้า",
		"icon" => "icon_product.png",
		"page" => array(
					"product.php",
					"search_product.php",
					"product_seo.php",
					"related.php",
					"ajax_product.php",
					"product_controller.php",
					"related_product_controller.php"
					)
	),
	"inventory" => array(
		"text" => "ข้อมูลคลังสินค้า",
		"icon" => "icon_inventory.png",
		"page" => array(
					"inventory.php",
					"inventory_note_add.php",
					"inventory_note_edit.php",
					"ajax_inventory.php",
					"inventory_controller.php",
					"inventory_edit.php",
					"inventory_note_controller.php"
					)
	),
	"order" => array(
		"text" => "ข้อมูลการสั่งซื้อ",
		"icon" => "icon_product.png",
		"page" => array(
					"order.php",
					"order_show.php",
					"order-detail.php",
					"address_letters.php",
					"delivery_order.php",
					"receipt.php",
		            "purchase_order.php",
					"check_payment_controller.php")
	),
    "ordersp" => array(
        "text" => "ข้อมูลการสั่งซื้อประเภทพิเศษ",
        "icon" => "icon_product.png",
        "page" => array(
            "order-special.php",
            "order_show.php",
            "order-detail.php",
            "address_letters.php",
            "delivery_order.php",
            "receipt.php",
            "purchase_order.php",
            "check_payment_controller.php")
    ),
    /*
	"screen_order" => array(
		"text" => "Screen ข้อมูลการสั่งซื้อ",
		"icon" => "icon_screen.png",
		"page" => array(
					"screen_order.php",
					"ajax_order.php")
	),
	"order_with_paid" => array(
		"text" => "Order with paid",
		"icon" => "icon_screen.png",
		"page" => array(
					"order_with_paid.php",
					"ajax_order.php")
	),
	*/
	"screen_top_product" => array(
		"text" => "รายการสินค้าที่มียอดขายสูงสุด",
		"icon" => "icon_screen.png",
		"page" => array(
					"screen_top_product.php",
					"ajax_order.php")
	),
	"banner" => array(
		"text" => "Banner",
		"icon" => "icon_album.png",
		"page" => array(
					"banner.php",
					"banner_add.php",
					"banner_edit.php",
					"banner_controller.php")
	),
	"news" => array(
		"text" => "ข่าวสาร และบทความ",
		"icon" => "icon_news2.png",
		"page" => array(
					"news.php",
					"news_add.php",
					"news_edit.php",
					"news_controller.php")
	),
	"group" => array(
		"text" => "หมวดหมู่สินค้าหลัก",
		"icon" => "icon_group.png",
		"page" => array(
					"group.php",
					"group_add.php",
					"group_edit.php",
					"group_controller.php")
	),
    /*
	"group-type" => array(
		"text" => "ประเภทหมวดหมู่สินค้า",
		"icon" => "icon_group.png",
		"page" => array(
					"group-type.php",
					"group-type-add.php",
					"group-type-edit.php",
					"group_type_controller.php")
	),
	*/
	"subgroup" => array(
		"text" => "หมวดหมู่สินค้าย่อย",
		"icon" => "icon_group.png",
		"page" => array(
					"subgroup.php",
					"subgroup_add.php",
					"subgroup_edit.php",
					"subgroup_controller.php",
					"group_type_controller.php")
	),
	"spacial-day" => array(
		"text" => "หมวดหมู่สินค้าในวาระพิเศษ",
		"icon" => "icon_group.png",
		"page" => array(
					"spacial-day.php",
					"spacial-day-add.php",
					"spacial-day-edit.php",
					"spacial_day_controller.php")
	),
	"promotion" => array(
		"text" => "ข้อมูลโปรโมชั่น",
		"icon" => "icon_gift.png",
		"page" => array(
					"promotion.php",
					"promotion_add.php",
					"promotion_edit.php",
					"search_item.php",
					"promotion_controller.php")
	),
	"coupon" => array(
		"text" => "ข้อมูลคูปอง หรือบัตรของขวัญ",
		"icon" => "icon_coupon.png",
		"page" => array(
					"coupon.php",
					"coupon_add.php",
					"coupon_edit.php",
					"search_member.php",
					"coupon_controller.php")
	),
	"contactus" => array(
		"text" => "ติดต่อสอบถาม",
		"icon" => "icon_mail.png",
		"page" => array(
					"contactus.php",
					"contactus_detail.php")
	),
	"tax" => array(
		"text" => "ภาษีการขาย",
		"icon" => "icon_calculator.png",
		"page" => array(
					"tax.php",
					"tax_add.php",
					"tax_edit.php",
					"search_product.php",
					"tax_controller.php")
	),
	"transfer" => array(
		"text" => "แจ้งการชำระเงิน",
		"icon" => "icon_transfer.png",
		"page" => array(
					"transfer.php",
					"download.php",
					"transfer_controller.php")
	),
    /*
	"return_product" => array(
		"text" => "แจ้งคืนสินค้า",
		"icon" => "icon_return.png",
		"page" => array(
					"return_product.php",
					"return_product_detail.php")
	),
	*/
	"report" => array(
		"text" => "รายงาน",
		"icon" => "icon_report.png",
		"page" => array(
					"report.php",
					"report_order_month.php",
		            "report_highcharts.php",
		            "report-registered-products.php",
		            "report-orders.php",
		            "report-registered.php", 
		            "report-registered-pageview.php",
		            "report-sales-by-date.php",
		            "report-sales-by-supplier.php")
	),
    "delivery-lsp" => array(
        "text" => "LSP",
        "icon" => "icon-transport.png",
        "page" => array(
            "delivery-lsp.php",
            "delivery-lsp-add.php",
            "delivery-lsp-edit.php",
        "delivery_lsp_controller.php")
    ),
	"delivery-method" => array(
		"text" => "วิธีการจัดส่ง",
		"icon" => "icon-transport.png",
		"page" => array(
					"delivery_method.php",
					"delivery_method_add.php",
					"delivery_method_edit.php",
					"delivery_method_controller.php")
	),
	"delivery" => array(
		"text" => "รายการจัดส่ง",
		"icon" => "icon-transport.png",
		"page" => array(
					"delivery.php",
					"delivery_edit.php",
					"delivery_detail.php",
					"delivery_controller.php",
					"order_controller.php")
	),
	"delivery-fee" => array(
		"text" => "อัตราค่าจัดส่ง",
		"icon" => "icon_truck.png",
		"page" => array(
					"delivery-fee.php",
					"delivery-fee-group-match.php",
					"delivery-fee-group-add.php",
					"delivery-fee-group-edit.php",
		            "delivery-fee-subgroup.php",
					"delivery-fee-supplier.php",
					"delivery_controller.php",
		            "delivery_supplier_controller.php")
	),
	"setting" => array(
		"text" => "ตั้งค่าทั่วไป",
		"icon" => "icon_setting.png",
		"page" => array(
					"setting.php"
					)
	),
	"admin" => array(
		"text" => "ข้อมูลผู้ดูแลระบบ",
		"icon" => "icon_admin.png",
		"page" => array(
					"admin.php",
					"admin_add.php",
					"admin_edit.php",
					"admin_controller.php")
	),
	"admin-type" => array(
		"text" => "ข้อมูลกลุ่มผู้ดูแลระบบ",
		"icon" => "icon_admin_type.png",
		"page" => array(
					"admin_type.php",
					"admin_type_add.php",
					"admin_type_edit.php",
					"admin_type_controller.php")
	),
    
);


function setAuthorizePage($page) {

	global $pageConfig;
	$arrPage = array();

	foreach($page AS $name) {

		$list = $pageConfig[$name]['page'];

		foreach($list as $file) {
			if(!in_array($file, $arrPage)) {
				array_push($arrPage, $file);
			}
		}

	}

	$_SESSION['authorizePage'] = $arrPage;
}


function checkAdminPage() {

	$pageAllow = array(
					"admin_controller.php",
					"change_pass.php");

	if($_SESSION['admin_type'] != 1) {

		if(!empty($_SESSION['authorizePage'])) { // มีการกำหนดสิทธิในการเข้าถึงหน้าต่างๆ
			$arrPageData = explode("/", $_SERVER['PHP_SELF']);
			$currentPage = end($arrPageData);

			if(!in_array($currentPage, $_SESSION['authorizePage']) && !in_array($currentPage,$pageAllow)) {
				echo "<script type='text/javascript'>
					  alert('You cannot access this page');
					  window.top.location = '/admin/".$_SESSION['authorizePage'][0]."';
					  </script>";
				exit;
			}

		} else { // ไมมีการระบุสิทธิการเข้าถึงแต่ละหน้า
			echo "<script type='text/javascript'>window.top.location = '/admin/signin.php'; </script>";
			exit();
		}
	}

}
?>