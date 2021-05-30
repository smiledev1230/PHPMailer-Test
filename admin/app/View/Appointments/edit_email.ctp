<html>
    <head>
        <title>Appointment Confirmation - <?php echo $date; ?></title>
        <?php echo $this->Html->script('ckeditor/ckeditor'); ?>
        <?php echo $this->Html->script('ckfinder/ckfinder'); ?>
        <script>
            $(function(){
                $('#AppointmentPreviewContent').val($('#AppointmentContent').val());
            
                $("#AppointmentPreviewContent").change(function() {
                    $('#AppointmentPreviewContent').val($('#AppointmentContent').val());        
                });
            
                CKEDITOR.replace( 'AppointmentContent',
                {
                    filebrowserBrowseUrl : '/admin/app/webroot/js/ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl : '/admin/app/webroot/js/ckfinder/ckfinder.html?type=Images',
                    filebrowserFlashBrowseUrl : '/admin/app/webroot/js/ckfinder/ckfinder.html?type=Flash',
                    filebrowserUploadUrl : '/admin/app/webroot/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl : '/admin/app/webroot/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl : '/admin/app/webroot/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                });            

            });
        </script>
        <?php
        echo $this->Html->css('form_style', null, array('inline' => true));
        ?>

    </head>

    <body style="font-family: Verdana, Arial, sans-serif; font-size: 13px;">
        <div class="formtitle" style="width: 980px;"><h2>Email Editor</h2></div>
        <?= $this->Form->create('Appointment', array('url' => 'editEmail/')); ?>
        <?= $this->Form->textarea('content', array('class' => 'content', 'default' => $contentTemplate['Email_template']['content'])); ?>
        <br/>
        <?= $this->Form->hidden('id', array('value' => 1)); ?> 
        <table border="0">
            <tr>
                <td>
                    <input class="orangebutton" type="submit" value="Update" style="float: left;" />
                </td>
                <?= $this->Form->end(); ?>
                <td>
                    <?= $this->Form->create('Appointment', array('url' => 'editEmailPreview/', 'target' => '_blank')); ?>
                    <?= $this->Form->hidden('preview_content'); ?>
                    <input class="orangebutton" type="submit" value="Preview" style="float: left;" />
                    <?= $this->Form->end(); ?>
                </td>
            </tr>
        </table>
    </body>
    <br/><br/>
</html>