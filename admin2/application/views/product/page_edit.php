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
<form id="form_order" method="POST" class="form-horizontal" role="form" action="../edit_complete" enctype="multipart/form-data">
    <div class="row">
                                    <div class="col-md-9 col-xs-9 col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">ชื่อเเบรนด์ไทย</label>
                                    <div class="col-md-9">
                                        <input type="text" id="brand_TH" name="brand_TH" class="required form-control" value='.$row->brand_TH.'>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">ชื่อภาษาไทย</label>
                                    <div class="col-md-9">
                                        <input type="text" id="shortth_name" name="shortth_name" class="required form-control" value='.$row->shortth_name.'>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">ชื่อ อังกฤษยาว</label>
                                    <div class="col-md-9">
                                        <input type="text" id="enname" name="enname" class="required form-control" value='.$row->enname.'>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Subname En</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="sub_nameUE"   name="sub_nameUE" rows="4" cols="50">'.$row->sub_nameUE.'</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Short name TH</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="sub_nameUTH"   name="sub_nameUTH" rows="4" cols="50">'.$row->sub_nameUTH.'</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">รายละเอียดย่อ Product</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="description"   name="description" rows="4" cols="50">'.$row->description.'</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">รายละเอียดสินค้า เเบบย่อ</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="short_detail"   name="short_detail" rows="4" cols="50">'.$row->short_detail.'</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">รายละเอียดโครงสร้าง HTML</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="detail"   name="detail" rows="4" cols="50" class="ckeditor">'.$row->detail.'</textarea>';
?>
<script>
         CKEDITOR.replace('detail' ,{
		filebrowserImageBrowseUrl : '<?php echo $this->config->item('pathuploader');?>'
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
   