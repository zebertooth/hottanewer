<?php
$networkname=$this->uri->segment(3);

$condition = "id =" . "'" . $networkname . "'";
$this->db->select('*');
$this->db->from('system_content');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
$row = $query->row();
$networkb=$row->id;
if ($query->num_rows() < 1){

    header("Location: ".site_url()."page");
    exit(0);
}
?>
<div id="overlay"></div>
<div id="MainUpImg"></div>
<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">เเก้ไข</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">หน้าหลัก</li>
                                    <li class="breadcrumb-item active" aria-current="page">โปรโมชั่น</li>
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
<form id="form_order" method="POST" class="form-horizontal" role="form" action="../contentedit_complete" enctype="multipart/form-data">
    <div class="row">
                                    <div class="col-md-9 col-xs-9 col-lg-9">
                        <div class="card">
                            <div class="card-body">
                              <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">ภาพประกอบ</label>
                                    <div class="col-md-9">
 <input type="file"  name ="picture" id="picture">
  <input type="hidden"  name ="picture2" id="picture2" value='.$row->pic.'>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">หัวข้อ</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="topic"   name="topic" rows="4" cols="50">'.$row->name.'</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Link name</label>
                                    <div class="col-md-9">
 <input type="text" id="linkname" name="linkname" class="required form-control" value='.$row->linkname.'>
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
 if($row->category == $result->category_id) echo 'selected';
echo'>'.$result->cate_name.'</option>';
		}
             echo'     </select>                   </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Title</label>
                                    <div class="col-md-9">
 <input type="text" id="title" name="title" class="required form-control" value='.$row->title.'>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">keyword</label>
                                    <div class="col-md-9">
 <input type="text" id="keyword" name="keyword" class="required form-control" value='.$row->keyword.'>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">description</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="description"   name="description" rows="4" cols="50">'.$row->description.'</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">รายละเอียด</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="detail"   name="detail" rows="4" cols="50" class="ckeditor">'.$row->detail.'</textarea>';
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
   <input type="hidden" name="id" id="id" value="'.$row->id.'" />
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
   