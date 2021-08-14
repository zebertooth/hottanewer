<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">ติดต่อเรา</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ติดต่อเรา</li>
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
<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">ติดต่อสอบถาม</h5>
                            </div>
                            <table class="table" id="emailall">
                                  <thead class="thead-light">
                                    <tr>
                                      <th scope="col" width="15%">วันที่</th>
                                      <th scope="col" width="50%">หัวข้อ</th>
                                      <th scope="col">จาก</th>
                                      <th scope="col"></th>
                                    </tr>
                                  </thead>
                                  <tbody>
	<?php 
foreach($q->result() as $r){
                                   echo' <tr>
                                      <th scope="row">
'.$this->date->DateThai($r->addtime).'</th>
                                      <td> <a href="'.site_url('content/delete_content/'.$r->id.'').'" >'.$r->topic.'</a></td>
                                      <td>'.$r->name.'</td>
                                      <td>
 <a href="'.site_url('content/delete_content/'.$r->id.'').'" data-toggle="tooltip" data-placement="top" title="เก็บ"><i class="fas fa-box size20"></i> </a>&nbsp;&nbsp;
 <a href="'.site_url('content/delete_content/'.$r->id.'').'" data-toggle="tooltip" data-placement="top" title="อ่าน"><i class="fas fa-envelope size20"></i> </a>&nbsp;&nbsp;
 <a href="'.site_url('content/delete_content/'.$r->id.'').'" data-toggle="tooltip" data-placement="top" title="ลบข้อมูล">
<i class="fas fa-trash-alt size20"></i>
                                            </a>
</td>
                                    </tr>';
}
?>
                                   
                                  </tbody>
                            </table>
     <div class="col-md-12">

 <?php echo''.$pagination; ?>
                                              
                                        </div>
                        </div>
        </div><!---ROW-->
</div>
