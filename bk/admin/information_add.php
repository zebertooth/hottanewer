




<!-- Header -->
<?php
    include('./header.php');
?>

<link rel="stylesheet" type="text/css" href="css/wysiwyg-editor.css" />

<!-- End of Header -->

    <h3><i class="fas fa-fw fa-file-invoice"></i> Create <?php echo ucfirst($_GET['type']); ?></h3>
	
    <form action="controllers/news_controller.php" method="post" enctype="multipart/form-data" name="form_add" id="form_add">

	<fieldset>
		<div class="form-group">
			<label for="postTitle">Title</label>
			<input type="text" name="name" id="name" class="form-control" placeholder="Add New Title" ng-model="postTitle" required> 
			<span style="color:red; font-weight: bold;" ng-show="form_add.postTitle.$error.required">Required</span>
		</div>
		<div class="form-group d-none ">
			<label for="postType">Type</label><br>
			<input	type="radio" name="type" class="type" value="trend" <?php if($_GET['type']=="trend") echo "checked='checked'"; ?> /> Trend
			<input type="radio" name="type" class="type" value="news" <?php if($_GET['type']=="news") echo "checked='checked'"; ?>/> News
			
		</div>
        <div class="form-group">
			<label for="postType">Sub Category</label><br>
		

            <?php if ($_GET['type'] == 'trend') { ?>
                <input	type="radio" name="subtype" class="type" value="food" <?php  echo "checked='checked'"; ?> /> Food
			<input type="radio" name="subtype" class="type" value="drink" /> Drink
            <input type="radio" name="subtype" class="type" value="trend" /> Trend
            <?php } ?>

            <?php if ($_GET['type'] == 'news') { ?>
                <input	type="radio" name="subtype" class="type" value="video" <?php echo "checked='checked'"; ?> /> Video
			<input type="radio" name="subtype" class="type" value="news" /> News
            <input type="radio" name="subtype" class="type" value="activity" /> Activity
            <?php } ?>
			
		</div>
		<div class="form-group">
			<label for="postSh_detail">Short description</label>
			<textarea class="form-control" name="sh_detail" cols="40" rows="5" id="sh_detail" ng-model="postSh_detail" required></textarea>
			<span style="color:red; font-weight: bold;" ng-show="form_add.postSh_detail.$error.required">Required</span>
			
		</div>
		<div class="form-group">
			<label for="PostThumb">Thumbnail Picture</label> <span style="color:red;">(Width size : 900 pixel)</span>
			<input type="file" name="thumb" id="thumb" class="form-control-input" ng-model="PostThumb" required>
			<span style="color:red; font-weight: bold;" ng-show="form_add.PostThumb.$error.required">Required</span>
		</div>
		<div class="form-group">
			<label for="PostDetail">Full description</label> 	
			<textarea class="form-control" name="detail1"  rows="15" id="detail1"  ng-model="PostDetail" required></textarea></td>
			<span style="color:red; font-weight: bold;" ng-show="form_add.PostDetail.$error.required">Required</span>
		</div>

        <div class="form-group  ">
			<label for="postType"></label>
			
			<input type="radio" name="statusShow"  value="news" checked="checked"  /> Show
			<input	type="radio" name="tstatusShowype"  value="knowledge" /> Not show</td>
		</div>

		<div class="form-group">
			<input class="btn btn-info" type="submit" name="btn_add" id="btn_add" value="Save"ng-disabled= "form_add.$invalid" /> 
			<input class="btn btn-info" type="reset" name="btn_reset" id="btn_reset" value="Cancel" />
</div>


	</fieldset>

   
		
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="d-none">
		
			
			<tr>
				<td height="30" align="right" valign="top" nowrap="nowrap"><strong>รูปที่
						1 </strong></td>
				<td height="30" align="center" valign="top"><strong>:</strong></td>
				<td height="30" valign="top"><label for="pic1"></label> <input
					name="pic1" type="file" id="pic1" size="40" /><span class="remark">ขนาดความกว้างไม่เกิน
						900 pixel</span></td>
			</tr>
			
			<tr>
				<td height="30" align="right" valign="top" nowrap="nowrap"><strong>รูปที่
						2 </strong></td>
				<td height="30" align="center" valign="top"><strong>:</strong></td>
				<td height="30" valign="top"><label for="pic2"></label> <input
					name="pic2" type="file" id="pic2" size="40" /> <span class="remark">
						ขนาดความกว้างไม่เกิน 900 pixel</span></td>
			</tr>
			<tr>
				<td height="30" align="right" valign="top" nowrap="nowrap"><strong>รายละเอียดที่
						2</strong></td>
				<td height="30" align="center" valign="top"><strong>:</strong></td>
				<td height="30" valign="top"><textarea name="detail2" cols="40"
						rows="5" id="detail2" class="tinymce"></textarea></td>
			</tr>
			<tr>
				<td align="right" valign="top" nowrap="nowrap"><strong>รูปที่ 3 </strong></td>
				<td height="30" align="center" valign="top"><strong>:</strong></td>
				<td height="30" valign="top"><label for="pic3"></label> <input
					name="pic3" type="file" id="pic3" size="40" /> <span class="remark">ขนาดความกว้างไม่เกิน
						900 pixel</span></td>
			</tr>
			<tr>
				<td align="right" valign="top" nowrap="nowrap"><strong>รายละเอียดที่
						3</strong></td>
				<td height="30" align="center" valign="top"><strong>:</strong></td>
				<td height="30" valign="top"><textarea name="detail3" cols="40"
						rows="5" id="detail3" class="tinymce"></textarea></td>
			</tr>
			<tr>
				<td align="right" valign="top" nowrap="nowrap"><strong>รูปที่ 4 </strong></td>
				<td height="30" align="center" valign="top"><strong>:</strong></td>
				<td height="30" valign="top"><label for="pic4"></label> <input
					name="pic4" type="file" id="pic4" size="40" /> <span class="remark">
						ขนาดความกว้างไม่เกิน 900 pixel</span></td>
			</tr>
			<tr>
				<td align="right" valign="top" nowrap="nowrap"><strong>รายละเอียดที่
						4</strong></td>
				<td height="30" align="center" valign="top"><strong>:</strong></td>
				<td height="30" valign="top"><textarea name="detail4" cols="40"
						rows="5" id="detail4" class="tinymce"></textarea></td>
			</tr>
			<tr>
				<td align="right" valign="top" nowrap="nowrap"><strong>รูปที่ 5</strong></td>
				<td height="30" align="center" valign="top"><strong>:</strong></td>
				<td height="30" valign="top"><label for="pic5"></label> <input
					name="pic5" type="file" id="pic5" size="40" /> <span class="remark">ขนาดความกว้างไม่เกิน
						900 pixel</span></td>
			</tr>
			<tr>
				<td align="right" valign="top" nowrap="nowrap"><strong>รายละเอียดที่
						5</strong></td>
				<td height="30" align="center" valign="top"><strong>:</strong></td>
				<td height="30" valign="top"><textarea name="detail5" cols="40"
						rows="5" id="detail5" class="tinymce"></textarea></td>
			</tr>
			<tr>
				<td height="30" align="right" valign="top" nowrap="nowrap"><strong>วันที่เริ่ม</strong></td>
				<td height="30" align="center" valign="top"><strong>:</strong></td>
				<td height="30" valign="top"><input name="dateStart" type="text"
					id="dateStart" size="40" /></td>
			</tr>
			<tr>
				<td height="30" align="right" valign="top" nowrap="nowrap"><strong>วันที่สิ้นสุด</strong></td>
				<td height="30" align="center" valign="top"><strong>:</strong></td>
				<td height="30" valign="top"><input name="dateEnd" type="text"
					id="dateEnd" size="40" /></td>
			</tr>
			<tr>
				<td height="30" align="right" valign="top" nowrap="nowrap"><strong>ชื่อเอกสารแนบ
						1</strong></td>
				<td height="30" align="center" valign="top"><strong>:</strong></td>
				<td height="30" valign="top"><input name="nameAttach1" type="text"
					id="nameAttach1" size="40" /></td>
			</tr>
			<tr>
				<td height="30" align="right" valign="top" nowrap="nowrap"><strong>เอกสารแนบ
						1 </strong></td>
				<td height="30" align="center" valign="top"><strong>:</strong></td>
				<td height="30" valign="top"><label for="attach1"></label> <input
					name="attach1" type="file" id="attach1" size="40" /> <span
					class="remark">ขนาดไฟล์ไม่เกิน 2 MB</span></td>
			</tr>
			<tr>
				<td align="right" valign="top" nowrap="nowrap"><strong>ชื่อเอกสารแนบ
						2</strong></td>
				<td height="30" align="center" valign="top"><strong>:</strong></td>
				<td height="30" valign="top"><input name="nameAttach2" type="text"
					id="nameAttach2" size="40" /></td>
			</tr>
			<tr>
				<td align="right" valign="top" nowrap="nowrap"><strong>เอกสารแนบ 2 </strong></td>
				<td height="30" align="center" valign="top"><strong>:</strong></td>
				<td height="30" valign="top"><label for="attach2"></label> <input
					name="attach2" type="file" id="attach2" size="40" /> <span
					class="remark">ขนาดไฟล์ไม่เกิน 2 MB</span></td>
			</tr>
			<tr>
				<td align="right" valign="top" nowrap="nowrap"><strong>ชื่อเอกสารแนบ
						3</strong></td>
				<td height="30" align="center" valign="top"><strong>:</strong></td>
				<td height="30" valign="top"><input name="nameAttach3" type="text"
					id="nameAttach3" size="40" /></td>
			</tr>
			<tr>
				<td align="right" valign="top" nowrap="nowrap"><strong>เอกสารแนบ 3 </strong></td>
				<td height="30" align="center" valign="top"><strong>:</strong></td>
				<td height="30" valign="top"><label for="attach3"></label> <input
					name="attach3" type="file" id="attach3" size="40" /> <span
					class="remark"> ขนาดไฟล์ไม่เกิน 2 MB</span></td>
			</tr>

			<!-- Link Product -->
			<tr>
				<td align="right" valign="top" nowrap="nowrap"><strong>Link
						ข้อมูลสินค้า </strong></td>
				<td height="30" align="center" valign="top"><strong>:</strong></td>
				<td height="30" valign="top"><span id="btnLinkProduct"> <img
						src="images/icon_add.png" alt="ทำการเพิ่ม link ข้อมูลสินค้า"
						align="absmiddle" /> เพิ่มการ Link ข้อมูลสินค้า
				</span>
					<div id="boxLinkProduct">
						<table width="550" class="border" id="linkProduct">
							<thead>
								<tr>
									<th align="center" width="10%" valign="top" nowrap="nowrap">รหัสสินค้า</th>
									<th align="center" width="10%" valign="top" nowrap="nowrap">รูป</th>
									<th align="center" width="70%" valign="top" nowrap="nowrap">รายการสินค้า</th>
									<th align="center" width="10%" valign="top" nowrap="nowrap">ลบข้อมูล</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div></td>
			</tr>
			<!-- End Link Product -->
			
		</table>
	</form>

<!-- Footer -->
<?php
    include('./footer.php');
?>
<!-- End of Footer -->

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<script type="text/javascript" src="js/wysiwyg.js"></script>
<script type="text/javascript" src="js/wysiwyg-editor.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    // Full featured editor
    $('#editor1,#editor2,#editor3,#detail1').each( function(index, element)
    {
        $(element).wysiwyg({
            classes: 'some-more-classes',
            position: index == 0 ? 'top-selection' : (index == 1 ? 'bottom' : 'selection'),
            buttons: {
                // Dummy-HTML-Plugin
                dummybutton1: index != 1 ? false : {
                    html: $('<input id="submit" type="button" value="bold" />').click(function(){
                                // We simply make 'bold'
                                if( $(element).wysiwyg('selected-html') )
                                    $(element).wysiwyg('bold');
                                else
                                    alert( 'Please selection some text' );
                            }),
                    //showstatic: true,    // wanted on the toolbar
                    showselection: false    // wanted on selection
                },
                // Dummy-Button-Plugin
                dummybutton2: index != 1 ? false : {
                    title: 'Dummy',
                    image: '\uf1e7',
                    click: function( $button ) {
                            alert('Do something');
                           },
                    //showstatic: true,    // wanted on the toolbar
                    showselection: false    // wanted on selection
                },
                // Smiley-Plugin
                smilies: {
                    title: 'Smilies',
                    image: '\uf118', // <img src="path/to/image.png" width="16" height="16" alt="" />
                    popup: function( $popup, $button, $editor ) {
                            var list_smilies = [
                                    '<img src="smiley/afraid.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/amorous.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/angel.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/angry.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/bored.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/cold.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/confused.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/cross.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/crying.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/devil.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/disappointed.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/dont-know.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/drool.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/embarrassed.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/excited.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/excruciating.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/eyeroll.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/happy.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/hot.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/hug-left.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/hug-right.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/hungry.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/invincible.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/kiss.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/lying.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/meeting.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/nerdy.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/neutral.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/party.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/pirate.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/pissed-off.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/question.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/sad.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/shame.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/shocked.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/shut-mouth.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/sick.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/silent.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/sleeping.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/sleepy.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/stressed.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/thinking.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/tongue.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/uhm-yeah.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/wink.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/working.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/bathing.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/beer.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/boy.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/camera.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/chilli.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/cigarette.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/cinema.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/coffee.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/girl.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/console.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/grumpy.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/in_love.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/internet.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/lamp.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/mobile.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/mrgreen.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/musical-note.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/music.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/phone.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/plate.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/restroom.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/rose.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/search.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/shopping.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/star.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/studying.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/suit.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/surfing.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/thunder.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/tv.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/typing.png" width="16" height="16" alt="" />',
                                    '<img src="smiley/writing.png" width="16" height="16" alt="" />'
                            ];
                            var $smilies = $('<div/>').addClass('wysiwyg-toolbar-smilies')
                                                      .attr('unselectable','on');
                            $.each( list_smilies, function(index,smiley){
                                if( index != 0 )
                                    $smilies.append(' ');
                                var $image = $(smiley).attr('unselectable','on');
                                // Append smiley
                                var imagehtml = ' '+$('<div/>').append($image.clone()).html()+' ';
                                $image
                                    .css({ cursor: 'pointer' })
                                    .click(function(event){
                                        $(element).wysiwyg('inserthtml',imagehtml);
                                        // do not close popup
                                        //$(element).wysiwyg('close-popup');
                                    })
                                    .appendTo( $smilies );
                            });
                            $smilies.css({ maxWidth: parseInt($editor.width()*0.95)+'px' });
                            $popup.append( $smilies );
                            // Smilies do not close on click, so force the popup-position to cover the toolbar
                            var $toolbar = $button.parents( '.wysiwyg-toolbar' );
                            if( ! $toolbar.length ) // selection toolbar?
                                return ;
                            var left = 0,
                                top = 0,
                                node = $toolbar.get(0);
                            while( node )
                            {
                                left += node.offsetLeft;
                                top += node.offsetTop;
                                node = node.offsetParent;
                            }
                            left += parseInt( ($toolbar.outerWidth() - $popup.outerWidth()) / 2 );
                            if( $toolbar.hasClass('wysiwyg-toolbar-top') )
                                top -= $popup.height() - parseInt($button.outerHeight() * 1/4);
                            else
                                top += parseInt($button.outerHeight() * 3/4);
                            $popup.css({ left: left + 'px',
                                         top: top + 'px'
                                       });
                            // prevent applying position
                            return false;
                           },
                    //showstatic: true,    // wanted on the toolbar
                    showselection: index == 2 ? true : false    // wanted on selection
                },
                insertimage: {
                    title: 'Insert image',
                    image: '\uf030', // <img src="path/to/image.png" width="16" height="16" alt="" />
                    //showstatic: true,    // wanted on the toolbar
                    showselection: false    // wanted on selection
                },
                insertlink: {
                    title: 'Insert link',
                    image: '\uf08e' // <img src="path/to/image.png" width="16" height="16" alt="" />
                },
                // Fontanme + Fontsize Plugin
                fontname: index == 1 ? false : {
                    title: 'Font',
                    image: '\uf031', // <img src="path/to/image.png" width="16" height="16" alt="" />
                    popup: function( $popup, $button, $editor ) {
                            var list_fontnames = {
                                    // Name : Font
                                    'Arial, Helvetica' : 'Arial,Helvetica',
                                    'Verdana'          : 'Verdana,Geneva',
                                    'Georgia'          : 'Georgia',
                                    'Courier New'      : 'Courier New,Courier',
                                    'Times New Roman'  : 'Times New Roman,Times'
                                };
                            var $list = $('<div/>').addClass('wysiwyg-toolbar-list')
                                                   .attr('unselectable','on');
                            $.each( list_fontnames, function( name, font ){
                                var $link = $('<a/>').attr('href','#')
                                                    .css( 'font-family', font )
                                                    .html( name )
                                                    .click(function(event){
                                                        $(element).wysiwyg('fontname',font);
                                                        $(element).wysiwyg('close-popup');
                                                        // prevent link-href-#
                                                        event.stopPropagation();
                                                        event.preventDefault();
                                                        return false;
                                                    });
                                $list.append( $link );
                            });
                            $popup.append( $list );
                           },
                    //showstatic: true,    // wanted on the toolbar
                    showselection: index == 0 ? true : false    // wanted on selection
                },
                fontsize: index == 1 ? false : {
                    title: 'Size',
                    image: '\uf034', // <img src="path/to/image.png" width="16" height="16" alt="" />
                    popup: function( $popup, $button, $editor ) {
                            var list_fontsizes = {
                                // Name : Size
                                'Huge'    : 7,
                                'Larger'  : 6,
                                'Large'   : 5,
                                'Normal'  : 4,
                                'Small'   : 3,
                                'Smaller' : 2,
                                'Tiny'    : 1
                            };
                            var $list = $('<div/>').addClass('wysiwyg-toolbar-list')
                                                   .attr('unselectable','on');
                            $.each( list_fontsizes, function( name, size ){
                                var $link = $('<a/>').attr('href','#')
                                                    .css( 'font-size', (8 + (size * 3)) + 'px' )
                                                    .html( name )
                                                    .click(function(event){
                                                        $(element).wysiwyg('fontsize',size);
                                                        $(element).wysiwyg('close-popup');
                                                        // prevent link-href-#
                                                        event.stopPropagation();
                                                        event.preventDefault();
                                                        return false;
                                                    });
                                $list.append( $link );
                            });
                            $popup.append( $list );
                           }
                    //showstatic: true,    // wanted on the toolbar
                    //showselection: true    // wanted on selection
                },
                bold: {
                    title: 'Bold (Ctrl+B)',
                    image: '\uf032', // <img src="path/to/image.png" width="16" height="16" alt="" />
                    hotkey: 'b'
                },
                italic: {
                    title: 'Italic (Ctrl+I)',
                    image: '\uf033', // <img src="path/to/image.png" width="16" height="16" alt="" />
                    hotkey: 'i'
                },
                underline: {
                    title: 'Underline (Ctrl+U)',
                    image: '\uf0cd', // <img src="path/to/image.png" width="16" height="16" alt="" />
                    hotkey: 'u'
                },
                strikethrough: {
                    title: 'Strikethrough (Ctrl+S)',
                    image: '\uf0cc', // <img src="path/to/image.png" width="16" height="16" alt="" />
                    hotkey: 's'
                },
                forecolor: {
                    title: 'Text color',
                    image: '\uf1fc' // <img src="path/to/image.png" width="16" height="16" alt="" />
                },
                highlight: {
                    title: 'Background color',
                    image: '\uf043' // <img src="path/to/image.png" width="16" height="16" alt="" />
                },
                alignleft: index != 0 ? false : {
                    title: 'Left',
                    image: '\uf036', // <img src="path/to/image.png" width="16" height="16" alt="" />
                    //showstatic: true,    // wanted on the toolbar
                    showselection: false    // wanted on selection
                },
                aligncenter: index != 0 ? false : {
                    title: 'Center',
                    image: '\uf037', // <img src="path/to/image.png" width="16" height="16" alt="" />
                    //showstatic: true,    // wanted on the toolbar
                    showselection: false    // wanted on selection
                },
                alignright: index != 0 ? false : {
                    title: 'Right',
                    image: '\uf038', // <img src="path/to/image.png" width="16" height="16" alt="" />
                    //showstatic: true,    // wanted on the toolbar
                    showselection: false    // wanted on selection
                },
                alignjustify: index != 0 ? false : {
                    title: 'Justify',
                    image: '\uf039', // <img src="path/to/image.png" width="16" height="16" alt="" />
                    //showstatic: true,    // wanted on the toolbar
                    showselection: false    // wanted on selection
                },
                subscript: index == 1 ? false : {
                    title: 'Subscript',
                    image: '\uf12c', // <img src="path/to/image.png" width="16" height="16" alt="" />
                    //showstatic: true,    // wanted on the toolbar
                    showselection: true    // wanted on selection
                },
                superscript: index == 1 ? false : {
                    title: 'Superscript',
                    image: '\uf12b', // <img src="path/to/image.png" width="16" height="16" alt="" />
                    //showstatic: true,    // wanted on the toolbar
                    showselection: true    // wanted on selection
                },
                indent: index != 0 ? false : {
                    title: 'Indent',
                    image: '\uf03c', // <img src="path/to/image.png" width="16" height="16" alt="" />
                    //showstatic: true,    // wanted on the toolbar
                    showselection: false    // wanted on selection
                },
                outdent: index != 0 ? false : {
                    title: 'Outdent',
                    image: '\uf03b', // <img src="path/to/image.png" width="16" height="16" alt="" />
                    //showstatic: true,    // wanted on the toolbar
                    showselection: false    // wanted on selection
                },
                orderedList: index != 0 ? false : {
                    title: 'Ordered list',
                    image: '\uf0cb', // <img src="path/to/image.png" width="16" height="16" alt="" />
                    //showstatic: true,    // wanted on the toolbar
                    showselection: false    // wanted on selection
                },
                unorderedList: index != 0 ? false : {
                    title: 'Unordered list',
                    image: '\uf0ca', // <img src="path/to/image.png" width="16" height="16" alt="" />
                    //showstatic: true,    // wanted on the toolbar
                    showselection: false    // wanted on selection
                },
                removeformat: {
                    title: 'Remove format',
                    image: '\uf12d' // <img src="path/to/image.png" width="16" height="16" alt="" />
                }
            },
            // Submit-Button
            submit: {
                title: 'Submit',
                image: '\uf00c' // <img src="path/to/image.png" width="16" height="16" alt="" />
            },
            // Other properties
            dropfileclick: 'Drop image or click',
            placeholderUrl: 'www.example.com',
            maxImageSize: [600,200]
            /*
            onImageUpload: function( insert_image ) {
                            // Used to insert an image without XMLHttpRequest 2
                            // A bit tricky, because we can't easily upload a file
                            // via '$.ajax()' on a legacy browser.
                            // You have to submit the form into to a '<iframe/>' element.
                            // Call 'insert_image(url)' as soon as the file is online
                            // and the URL is available.
                            // Best way to do: http://malsup.com/jquery/form/
                            // For example:
                            //$(this).parents('form')
                            //       .attr('action','/path/to/file')
                            //       .attr('method','POST')
                            //       .attr('enctype','multipart/form-data')
                            //       .ajaxSubmit({
                            //          success: function(xhrdata,textStatus,jqXHR){
                            //            var image_url = xhrdata;
                            //            console.log( 'URL: ' + image_url );
                            //            insert_image( image_url );
                            //          }
                            //        });
                        },
            onKeyEnter: function() {
                            return false; // swallow enter
                        }
            */
        })
        .change(function(){
            if( typeof console != 'undefined' )
                console.log( 'change' );
        })
        .focus(function(){
            if( typeof console != 'undefined' )
                console.log( 'focus' );
        })
        .blur(function(){
            if( typeof console != 'undefined' )
                console.log( 'blur' );
        });
    });

    // Demo-Buttons
    $('#editor3-bold').click(function(){
        $('#editor3').wysiwyg('bold');
        return false;
    });
    $('#editor3-red').click(function(){
        $('#editor3').wysiwyg('highlight','#ff0000');
        return false;
    });
    $('#editor3-sethtml').click(function(){
        $('#editor3').wysiwyg('html', 'This is a the html text');
        return false;
    });
    $('#editor3-inserthtml').click(function(){
        $('#editor3').wysiwyg('inserthtml', 'This is some text');
        return false;
    });

    // Raw editor
    var option = {
        element: $('#editor0').get(0),
        onkeypress: function( code, character, shiftKey, altKey, ctrlKey, metaKey ) {
                        if( typeof console != 'undefined' )
                            console.log( 'RAW: '+character+' key pressed' );
                    },
        onselection: function( collapsed, rect, nodes, rightclick ) {
                        if( typeof console != 'undefined' && rect )
                            console.log( 'RAW: selection rect('+rect.left+','+rect.top+','+rect.width+','+rect.height+'), '+nodes.length+' nodes' );
                    },
        onplaceholder: function( visible ) {
                        if( typeof console != 'undefined' )
                            console.log( 'RAW: placeholder ' + (visible ? 'visible' : 'hidden') );
                    }
    };
    var wysiwygeditor = wysiwyg( option );
    //wysiwygeditor.setHTML( '<html>' );
});
</script>


