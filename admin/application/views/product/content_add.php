<div id="overlay"></div>
<div id="MainUpImg"></div>
<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">เพิ่ม</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">หน้าหลัก</li>
                                    <li class="breadcrumb-item active" aria-current="page">เพิ่มข้อมูล</li>
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
<form id="form_order" method="POST" class="form-horizontal" role="form" action="../page/contentadd_complete" enctype="multipart/form-data">
    <div class="row">
                                    <div class="col-md-9 col-xs-9 col-lg-9">
                        <div class="card">
                            <div class="card-body">

                               <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">ภาพประกอบ</label>
                                    <div class="col-md-9">
 <input type="file"  name ="picture" id="picture">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">หัวข้อ</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="name"   name="name" rows="4" cols="50"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Linkname</label>
                                    <div class="col-md-9">
 <input type="text" id="linkname" name="linkname" class="required form-control">
 <p>** ตัวอย่าง www.domain.com/ชื่อที่ต้องการไม่ต้องเว้นวรรค/ **</p>
                                    </div>
                                </div>
<div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">category</label>
                                    <div class="col-md-9"> <select class="form-control" name="category">';
		$this->db->select('`category_id`,`cate_name`',false);
		$this->db->order_by('category_id','ASC');
		$cate1=$this->db->get($this->config->item('system_category'));
		$cate1->result();
		foreach($cate1->result() as $result){
echo'<option value="'.$result->category_id.'"';
 //if($row->category == $result->category_id) echo 'selected';
echo'>'.$result->cate_name.'</option>';
		}
             echo'     </select>                   </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Title</label>
                                    <div class="col-md-9">
 <input type="text" id="title" name="title" class="required form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">keyword</label>
                                    <div class="col-md-9">
 <input type="text" id="keyword" name="keyword" class="required form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">description</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="description"   name="description" rows="4" cols="50"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">รายละเอียด</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="detail"   name="detail" rows="4" cols="50" class="ckeditor"></textarea>';
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<div class="col-md-3">
                    
                       <div class="card">
                            <div class="card-body">


                                    <button type="submit"  class="btn btn-primary">เผยเเพร่ข้อมูล</button>

</div></div>
</div>
                           </div>
</form>';
?>
   