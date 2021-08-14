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
                                        <input type="text" id="brand_TH" name="brand_TH" class="required form-control" value="'.$row->brand_TH.'">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Brand English</label>
                                    <div class="col-md-9">
                                        <input type="text" id="brand_EN" name="brand_EN" class="required form-control" value="'.$row->brand_EN.'">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">URL</label>
                                    <div class="col-md-9">
                                        <input type="text" id="urllink" name="urllink" class="required form-control" value="'.$row->urllink.'">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Name Thai</label>
                                    <div class="col-md-9">
                                        <input type="text" id="shortth_name" name="shortth_name" class="required form-control" value="'.$row->shortth_name.'">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Name Eng</label>
                                    <div class="col-md-9">
                                        <input type="text" id="shorten_name" name="shorten_name" class="required form-control"  value="'.$row->shorten_name.'">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Short Description Engish</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="short_descriptionEN"   name="short_descriptionEN" rows="4" cols="50">'.$row->short_descriptionEN.'</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Short Description Thai</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="short_descriptionTH"   name="short_descriptionTH" rows="4" cols="50">'.$row->short_descriptionTH.'</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">รายละเอียดย่อ Product</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="short_descriptionEN"   name="short_descriptionEN" rows="4" cols="50">'.$row->short_descriptionEN.'</textarea>
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
                                    <label class="col-md-3" for="disabledTextInput">Description Section 1</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="detail_sec1"   name="detail_sec1" rows="4" cols="50">'.$row->detail_sec1.'</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Description Section 2</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="detail_sec2"   name="detail_sec2" rows="4" cols="50">'.$row->detail_sec2.'</textarea>
                                    </div>
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
                            <div class="card-body">';?>



<?php


echo'                                <div class="form-group row">
  <label>หมวดหมู่</label>
                                    <div class="col-md-12"> 
									<select class="form-control" id="category-dropdown" name="category-dropdown">';
echo'<option>เลือกหมวดหมู่</option>';
		$this->db->select('`category_id`,`cate_thname`',false);
		$this->db->order_by('category_id','ASC');
		$this->db->where('sub','0');
		$cate1=$this->db->get($this->config->item('system_cateproduct'));
		$cate1->result();
		foreach($cate1->result() as $result){
echo'<option value="'.$result->category_id.'"';
 if($row->type == $result->category_id) echo 'selected';
echo'>'.$result->cate_thname.'</option>';
		}
             echo'     </select>                   </div>
                                </div>
				<div class="form-group">
				    <label>Sub Category</label>
				    <select class="form-control sub-category-dropdown" id="sub-category-dropdown" name="sub-category-dropdown">
				    	<option value="">เลือก</option>

				    </select>
				</div>';


echo'<div class="form-group">
                                <label>New Product</label>

                                <div class="radio">

<label class="radio-inline"><input type="radio" name="product_new" id="radio" value="0"'; if($row->product_new == '0') echo 'checked'; echo'/>No</label>

<label class="radio-inline"><input type="radio" name="product_new" id="radio" value="1"'; if($row->product_new == '1') echo 'checked'; echo'/>Yes</label>
                                </div>

                            </div>

                            <div class="form-group">
                                <label>Reccommend Product</label>

                                <div class="radio">
<label class="radio-inline"><input type="radio" name="product_reccommend" id="radio" value="0"'; if($row->product_reccommend == '0') echo 'checked'; echo'/>NO</label>

<label class="radio-inline"><input type="radio" name="product_reccommend" id="radio" value="1"'; if($row->product_reccommend == '1') echo 'checked'; echo'/>Yes</label>

                                </div>

                            </div>


                            <div class="form-group">
                                <label>Best seller Product</label>

                                <div class="radio">
<label class="radio-inline"><input type="radio" name="product_bestsell" id="radio" value="0"'; if($row->product_bestsell == '0') echo 'checked'; echo'/>NO</label>
<label class="radio-inline"><input type="radio" name="product_bestsell" id="radio" value="1"'; if($row->product_bestsell == '1') echo 'checked'; echo'/>YES</label>

                                </div>

                            </div>


                                    <button type="submit"  class="btn btn-primary">เเก้ไขข้อมูล</button>

</div></div>
</div>
                           </div>
</form>';
?>

                    </div>
   <script>
    $(document).ready(function() {
        $('#category-dropdown').on('change', function() {
            var category_id = this.value;
            $.ajax({
                url : "<?php echo site_url('product/get_sub_category');?>",
                type: "POST",
                data: {
                    category_id: category_id
                },
                cache: false,
                success: function(result){
                   $("#sub-category-dropdown").html(result);
                }
            });
        });
    });
    </script>