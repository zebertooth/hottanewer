<?php
$networkname=$this->uri->segment(3);

$condition = "id =" . "'" . $networkname . "'";
$this->db->select('*');
$this->db->from('news');
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
                                    <li class="breadcrumb-item active" aria-current="page">เรื่อง</li>
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
<p>หัวข้อ</p>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput"><span class="badge badge-pill badge-success">TH</span></label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="title"   name="title" rows="4" cols="50">'.$row->title.'</textarea>
                                    </div>
                                </div>

<hr>
<p>คีย์เวิสด์</p>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput"><span class="badge badge-pill badge-success">TH</span></label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="keyword"   name="keyword" rows="4" cols="50">'.$row->keyword.'</textarea>
                                    </div>
                                </div>

<hr>
<p>รายละเอียดย่อ</p>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput"><span class="badge badge-pill badge-success">TH</span></label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="description"   name="description" rows="4" cols="50">'.$row->description.'</textarea>
                                    </div>
                                </div>

<hr>
<p>รายละเอียด</p>

                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput"><span class="badge badge-pill badge-danger">TH</span></label>
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
   <input type="hidden" name="id" id="id" value="'.$row->id.'" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<div class="col-md-3">
 <div class="card">
        <div class="card-body">';



echo'                                <div class="form-group row">
  <label>หมวดหมู่</label>
                                    <div class="col-md-12"> 
									<select class="form-control" id="category-dropdown" name="category-dropdown">';
echo'<option>เลือกหมวดหมู่</option>';
		$this->db->select('`category_id`,`cate_thname`',false);
		$this->db->order_by('category_id','ASC');
		$this->db->where('sub','0');
		$cate1=$this->db->get($this->config->item('system_catearticle'));
		$cate1->result();
		foreach($cate1->result() as $result){
echo'<option value="'.$result->category_id.'"';
 if($row->category == $result->category_id) echo 'selected';
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

      echo'                              <button type="submit"  class="btn btn-primary">เผยเเพร่ข้อมูล</button>

</div></div>
</div>
                           </div>
</form>';
?>
    <script>
    $(document).ready(function() {
        $('#category-dropdown').on('change', function() {
            var category_id = this.value;
            $.ajax({
                url : "<?php echo site_url('page/get_sub_category');?>",
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