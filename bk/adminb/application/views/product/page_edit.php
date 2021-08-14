<?php
$networkname=$this->uri->segment(3);

$condition = "oid =" . "'" . $networkname . "'";
$this->db->select('*');
$this->db->from('tbl_product');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
$row = $query->row();
$networkb=$row->id;

?>
<div id="overlay"></div>
<div id="MainUpImg"></div>
<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">เเก้ไขสินค้า</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">หน้าหลัก</li>
                                    <li class="breadcrumb-item active" aria-current="page">เเก้ไข</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="container-fluid">
<?php
echo'
<form id="form_order" method="POST" class="form-horizontal" role="form" action="../pageedit_complete" enctype="multipart/form-data">
    <div class="row">
                                    <div class="col-md-9 col-xs-9 col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">ชื่อสินค้า</label>
                                    <div class="col-md-9">
                                        <input type="text" id="productname" name="productname" class="required form-control" value='.$row->productname.'>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">เเบรนด์</label>
                                    <div class="col-md-9">
                                        <input type="text" id="brandname" name="brandname" class="required form-control" value='.$row->brandname.'>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">shortdesc</label>
                                    <div class="col-md-9">
                                        <input type="text" id="shortdesc" name="shortdesc" class="required form-control" value='.$row->shortdesc.'>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">description</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="description"   name="description" rows="4" cols="50">'.$row->description.'</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">description1</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="detail"   name="description1" rows="4" cols="50" class="ckeditor">'.$row->description1.'</textarea>';
?>
<script src="//cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'detail', {
    language: 'th',
    uiColor: '#f6f4f4',
removeButtons: 'About,Anchor,Copy,Scayt,Superscript,Image',
format_tags: 'p;h1;h2;h3;h4;h5;h6;pre;address;div',
allowedContent:true,
toolbar: [
		{ name: 'document', items: [  'Maximize','Source', 'Preview', 'Templates'] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
		[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', 'Undo', 'Redo' ],			// Defines toolbar group without name.
		'',																					// Line break - next group will be placed in new line.
		{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript','TextColor', 'BGColor','JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', 'Link', 'Unlink' , 'Table'] },
{ name: 'styles', items: [ 'HorizontalRule', 'PageBreak', 'Styles', 'Format', 'Font', 'FontSize' ] },
	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv'] }
	]
//filebrowserBrowseUrl : 'http://localhost/filemanager/dialog.php?type=2&editor=ckeditor&fldr=', 
//filebrowserUploadUrl : 'http://localhost/filemanager/dialog.php?type=2&editor=ckeditor&fldr=', 
//filebrowserImageBrowseUrl : 'http://localhost/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
});
</script>
<?php 
echo' </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput"></label>
                                    <div class="col-md-9">
    <input type="hidden" name="process" value="1" />
   <input type="hidden" name="id" id="id" value="'.$row->oid.'" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<div class="col-md-3">
                    
                       <div class="card">
                            <div class="card-body">


                                    <button type="submit"  class="btn btn-primary">เเก้ไขข้อมูล</button>

</div></div>
</div>
                           </div>
</form>';
?>

                    </div>
   