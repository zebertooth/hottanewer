<?php
$networkname=$this->uri->segment(3);

$condition = "category_id =" . "'" . $networkname . "'";
$this->db->select('*');
$this->db->from('system_catearticle');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
$row = $query->row();
?>
<div id="overlay"></div>
<div id="MainUpImg"></div>
<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">CATEGORY</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">หน้าหลัก</li>
                                    <li class="breadcrumb-item active" aria-current="page">หมวดหมู่สินค้า</li>
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
<script>
    $(document).ready(function () {
        $('#category').attr('disabled', 'true');

        $('input:radio[name=a_SignatureOption]').click(function () {
            var checkval = $('input:radio[name=a_SignatureOption]:checked').val();
            //alert(checkval)checkval == '1' || 
            if (checkval == '1') {
                $('#category').removeAttr('disabled');
            }
            else {
                $('#category').attr('disabled', 'disabled');
            }
        });
    });
</script>

<?php
echo'
<form id="form_order" method="POST" class="form-horizontal" role="form" action="../cateedit_complete" enctype="multipart/form-data">
    <div class="row">
                                    <div class="col-md-6 col-xs-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">


                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">หมวด</label>
                                    <div class="col-md-9">
                                      <!----->
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="a_SignatureOption" id="a_SignatureOption" value="0"';
  
 if($row->sub == 0) echo 'checked';  
  echo'>';
echo'<label class="form-check-label" for="inlineRadio1">หมวดหลัก</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="a_SignatureOption" id="a_SignatureOption" value="1"
 ';
  if($row->sub == 1) echo 'checked';   
  echo'>';
echo'<label class="form-check-label" for="inlineRadio2">หมวดย่อยของ</label>
</div>
									  <!---->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Th Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="cate_thname" name="cate_thname" class="required form-control" value="'.$row->cate_thname.'">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">En Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="cate_enname" name="cate_enname" class="required form-control" value="'.$row->cate_enname.'">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">ย่อยของ</label>
                                    <div class="col-md-9"> 
									<select class="form-control" id="category" name="category">';
		$this->db->select('`category_id`,`cate_thname`',false);
		$this->db->order_by('category_id','ASC');
		$cate1=$this->db->get($this->config->item('system_catearticle'));
		$cate1->result();
		foreach($cate1->result() as $result){
echo'<option value="'.$result->category_id.'"';
 if($row->main == $result->category_id) echo 'selected';
echo'>'.$result->cate_thname.'</option>';
		}
             echo'     </select>                   </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">title</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="title"   name="title" rows="4" cols="50">'.$row->title.'</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">รายละเอียดย่อ</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="description"   name="description" rows="4" cols="50">'.$row->description.'</textarea>
                                    </div>
                                </div>
                                      <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput">Keyword</label>
                                    <div class="col-md-9">
 <textarea class="form-control"  id="keyword"   name="keyword" rows="4" cols="50">'.$row->keyword.'</textarea>
                                    </div>
                                </div>                         

                                <div class="form-group row">
                                    <label class="col-md-3" for="disabledTextInput"></label>
                                    <div class="col-md-9">
    <input type="hidden" name="process" value="1" />
   <input type="hidden" name="id" id="id" value="'.$row->category_id.'" />
                                    </div>
                                </div>
                                    <button type="submit"  class="btn btn-primary">เผยเเพร่ข้อมูล</button>
                            </div>
                        </div>
                    </div>
                           </div>
</form>';
?>

                    </div>
   