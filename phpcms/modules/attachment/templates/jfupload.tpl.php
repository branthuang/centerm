<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml"<?php if (isset($addbg)) { ?> class="addbg"<?php } ?>>
    <head>
        <!-- Force latest IE rendering engine or ChromeFrame if installed -->
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
        <meta charset="utf-8">
            <title>jQuery File Upload Demo</title>
            <!-- Bootstrap styles -->
            <link rel="stylesheet" href="<?php echo JQUERY_FILE_UPLOAD; ?>css/bootstrap/bootstrap.min.css">
                <!-- Generic page styles -->
                <link rel="stylesheet" href="<?php echo JQUERY_FILE_UPLOAD; ?>css/style.css">
                    <!-- blueimp Gallery styles -->
                    <link rel="stylesheet" href="<?php echo JQUERY_FILE_UPLOAD; ?>css/Gallery/blueimp-gallery.min.css">
                        <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
                        <link rel="stylesheet" href="<?php echo JQUERY_FILE_UPLOAD; ?>css/jquery.fileupload.css">
                            <link rel="stylesheet" href="<?php echo JQUERY_FILE_UPLOAD; ?>css/jquery.fileupload-ui.css">
                                <!-- CSS adjustments for browsers with JavaScript disabled -->
                                <noscript><link rel="stylesheet" href="<?php echo JQUERY_FILE_UPLOAD; ?>css/jquery.fileupload-noscript.css"></noscript>
                                <noscript><link rel="stylesheet" href="<?php echo JQUERY_FILE_UPLOAD; ?>css/jquery.fileupload-ui-noscript.css"></noscript>

                                <link href="<?php echo CSS_PATH ?>reset.css" rel="stylesheet" type="text/css" />
                                <link href="<?php echo CSS_PATH . SYS_STYLE; ?>-system.css" rel="stylesheet" type="text/css" />
                                <link href="<?php echo JS_PATH ?>swfupload/swfupload.css" rel="stylesheet" type="text/css" />
                                </head>
                                <body>
                                    <div class="pad-10">
                                        <div class="col-tab">
                                            <ul class="tabBut cu-li">
                                                <li id="tab_swf_1" <?php echo $tab_status ?> onclick="SwapTab('swf', 'on', '', 5, 1);"><?php echo L('upload_attachment') ?></li>
                                                <li id="tab_swf_2" onclick="SwapTab('swf', 'on', '', 5, 2);"><?php echo L('net_file') ?></li>
                                                <?php if ($allowupload && $this->admin_username && $_SESSION['userid']) { ?>
                                                    <li id="tab_swf_3" onclick="SwapTab('swf', 'on', '', 5, 3);
                                set_iframe('album_list', 'index.php?m=attachment&c=attachments&a=album_load&args=<?php echo $args ?>');"><?php echo L('gallery') ?></li>
                                                    <li id="tab_swf_4" onclick="SwapTab('swf', 'on', '', 5, 4);
                                set_iframe('album_dir', 'index.php?m=attachment&c=attachments&a=album_dir&args=<?php echo $args ?>');"><?php echo L('directory_browse') ?></li>
                                                    <?php } ?>
                                                    <?php if ($att_not_used != '') { ?>
                                                    <li id="tab_swf_5" class="on icon" onclick="SwapTab('swf', 'on', '', 5, 5);"><?php echo L('att_not_used') ?></li>
                                                <?php } ?>
                                            </ul>
                                            <div id="div_swf_1" class="content pad-10 <?php echo $div_status ?>">
                                                <!-- The file upload form used as target for the file upload widget -->
                                                <form id="fileupload" action="index.php?m=attachment&c=attachments&a=jfupload" method="POST" enctype="multipart/form-data">
                                                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                                    <div class="row fileupload-buttonbar">
                                                        <div class="col-lg-7">
                                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                                            <span class="btn btn-success fileinput-button">
                                                                <i class="glyphicon glyphicon-plus"></i>
                                                                <span>添加文件</span>
                                                                <input type="file" name="files[]" multiple>
                                                            </span>
                                                            <button type="submit" class="btn btn-primary start">
                                                                <i class="glyphicon glyphicon-upload"></i>
                                                                <span><?php echo L('start_upload') ?></span>
                                                            </button>
                                                            <button type="reset" class="btn btn-warning cancel">
                                                                <i class="glyphicon glyphicon-ban-circle"></i>
                                                                <span>取消上传</span>
                                                            </button>
                                                            <button type="button" class="btn btn-danger delete">
                                                                <i class="glyphicon glyphicon-trash"></i>
                                                                <span>删除</span>
                                                            </button>
                                                            <input type="checkbox" class="toggle">
                                                                <!-- The global file processing state -->
                                                                <span class="fileupload-process"></span>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div id="nameTip" class="onShow">
                                                                <?php echo L('upload_up_to') ?>
                                                                <font color="red"> <?php echo $file_upload_limit ?></font> 
                                                                <?php echo L('attachments') ?>,<?php echo L('largest') ?> 
                                                                <font color="red"><?php echo $file_size_limit ?></font>
                                                            </div>
                                                            <div>
                                                                <?php echo L('supported') ?> <font style="font-family: Arial, Helvetica, sans-serif">
                                                                    <?php echo str_replace(array('*.', ';'), array('', '、'), $file_types) ?></font> 
                                                                <?php echo L('formats') ?>
                                                            </div>
                                                            <input type="checkbox" id="watermark_enable" value="1" 
                                                                <?php if (isset($watermark_enable) && $watermark_enable == 1) echo 'checked' ?> > 
                                                                <label for="watermark_enable"><?php echo L('watermark_enable') ?></label>
                                                        </div>

                                                        <!-- The global progress state -->
                                                        <div class="col-lg-5 fileupload-progress fade">
                                                            <!-- The global progress bar -->
                                                            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                                <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                                            </div>
                                                            <!-- The extended global progress state -->
                                                            <div class="progress-extended">&nbsp;</div>
                                                        </div>
                                                    </div>
                                                    <!-- The table listing the files available for upload/download -->
                                                    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                                                </form>
                                            </div>

                                            <div id="div_swf_2" class="contentList pad-10 hidden">
                                                <div class="bk10"></div>
                                                <?php echo L('enter_address') ?><div class="bk3"></div><input type="text" name="info[filename]" class="input-text" value=""  style="width:350px;"  onblur="addonlinefile(this)">
                                                    <div class="bk10"></div>
                                            </div>    	
                                            <?php if ($allowupload && $this->admin_username && $_SESSION['userid']) { ?>
                                                <div id="div_swf_3" class="contentList pad-10 hidden">
                                                    <ul class="attachment-list">
                                                        <iframe name="album-list" src="#" frameborder="false" scrolling="no" style="overflow-x:hidden;border:none" width="100%" height="345" allowtransparency="true" id="album_list"></iframe>   
                                                    </ul>
                                                </div>
                                                <div id="div_swf_4" class="contentList pad-10 hidden">
                                                    <ul class="attachment-list">
                                                        <iframe name="album-dir" src="#" frameborder="false" scrolling="auto" style="overflow-x:hidden;border:none" width="100%" height="330" allowtransparency="true" id="album_dir"></iframe>   
                                                    </ul>
                                                </div>
                                            <?php } ?>
                                            <?php if ($att_not_used != '') { ?>
                                                <div id="div_swf_5" class="contentList pad-10">
                                                    <div class="explain-col"><?php echo L('att_not_used_desc') ?></div>
                                                    <ul class="attachment-list" id="album">
                                                        <?php if (is_array($att) && !empty($att)) {
                                                            foreach ($att as $_v) {
                                                                ?>
                                                                <li>
                                                                    <div class="img-wrap">
                                                                        <a onclick="javascript:album_cancel(this,<?php echo $_v['aid'] ?>, '<?php echo $_v['src'] ?>')" href="javascript:;" class="off"  title="<?php echo $_v['filename'] ?>"><div class="icon"></div><img width="<?php echo $_v['width'] ?>"  path="<?php echo $_v['src'] ?>" src="<?php echo $_v['fileimg'] ?>" title="<?php echo $_v['filename'] ?>"></a>
                                                                    </div>
                                                                </li>
                                                            <?php }
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>   
<?php } ?>

                                            <!--# 文件路径，|划分 #-->
                                            <div id="att-status" class="hidden"></div>
                                            <div id="att-status-del" class="hidden"></div>
                                            <!--# 文件名，|划分 #-->
                                            <div id="att-name" class="hidden"></div>
                                        </div>
                                    </div>

                                    <!-- The blueimp Gallery widget -->
                                    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
                                        <div class="slides"></div>
                                        <h3 class="title"></h3>
                                        <a class="prev">‹</a>
                                        <a class="next">›</a>
                                        <a class="close">×</a>
                                        <a class="play-pause"></a>
                                        <ol class="indicator"></ol>
                                    </div>
                                    <!-- The template to display files available for upload -->
                                    <script id="template-upload" type="text/x-tmpl">
                                        {% for (var i=0, file; file=o.files[i]; i++) { %}
                                        <tr class="template-upload fade">
                                        <td>
                                        <span class="preview"></span>
                                        </td>
                                        <td>
                                        <p class="name">{%=file.name%}</p>
                                        <strong class="error text-danger"></strong>
                                        </td>
                                        <td>
                                        <p class="size">Processing...</p>
                                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
                                        </td>
                                        <td>
                                        {% if (!i && !o.options.autoUpload) { %}
                                        <button class="btn btn-primary start" disabled>
                                        <i class="glyphicon glyphicon-upload"></i>
                                        <span>开始</span>
                                        </button>
                                        {% } %}
                                        {% if (!i) { %}
                                        <button class="btn btn-warning cancel">
                                        <i class="glyphicon glyphicon-ban-circle"></i>
                                        <span>取消</span>
                                        </button>
                                        {% } %}
                                        </td>
                                        </tr>
                                        {% } %}
                                    </script>
                                    <!-- The template to display files available for download -->
                                    <script id="template-download"  type="text/x-tmpl">
                                        {% for (var i=0, file; file=o.files[i]; i++) { %}
                                        <tr class="template-download fade">
                                        <td>
                                        <span class="preview">
                                        {% if (file.thumbnailUrl) { %}
                                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}" style="width:80px;"></a>
                                        {% } %}
                                        </span>
                                        </td>
                                        <td>
                                        <p class="name">
                                        {% if (file.url) { %}
                                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                                        {% } else { %}
                                        <span>{%=file.name%}</span>
                                        {% } %}
                                        </p>
                                        {% if (file.error) { %}
                                        <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                                        {% } %}
                                        </td>
                                        <td>
                                        <span class="size">{%=o.formatFileSize(file.size)%}</span>
                                        </td>
                                        <td>
                                        {% if (file.deleteUrl) { %}
                                        <button class="btn btn-danger delete" data-fileurl="{%=file.url%}" data-filename="{%=file.name%}" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                                        <i class="glyphicon glyphicon-trash"></i>
                                        <span>删除</span>
                                        </button>
                                        <input type="checkbox" name="delete" value="1" class="toggle">
                                        {% } else { %}
                                        <button class="btn btn-warning cancel">
                                        <i class="glyphicon glyphicon-ban-circle"></i>
                                        <span>取消</span>
                                        </button>
                                        {% } %}
                                        </td>
                                        </tr>
                                        {% } %}
                                    </script>
                                    <script src="<?php echo JQUERY_FILE_UPLOAD; ?>js/jquery/jquery.min.js"></script>
                                    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
                                    <script src="<?php echo JQUERY_FILE_UPLOAD; ?>js/vendor/jquery.ui.widget.js"></script>
                                    <!-- The Templates plugin is included to render the upload/download listings -->
                                    <script src="<?php echo JQUERY_FILE_UPLOAD; ?>js/blueimp.github.io/tmpl.min.js"></script>
                                    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
                                    <script src="<?php echo JQUERY_FILE_UPLOAD; ?>js/blueimp.github.io/load-image.all.min.js"></script>
                                    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
                                    <script src="<?php echo JQUERY_FILE_UPLOAD; ?>js/blueimp.github.io/canvas-to-blob.min.js"></script>
                                    <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
                                    <script src="<?php echo JQUERY_FILE_UPLOAD; ?>js/bootstrap.min.js"></script>
                                    <!-- blueimp Gallery script -->
                                    <script src="<?php echo JQUERY_FILE_UPLOAD; ?>js/jquery.blueimp-gallery.min.js"></script>
                                    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
                                    <script src="<?php echo JQUERY_FILE_UPLOAD; ?>js/jquery.iframe-transport.js"></script>
                                    <!-- The basic File Upload plugin -->
                                    <script src="<?php echo JQUERY_FILE_UPLOAD; ?>js/jquery.fileupload.js"></script>
                                    <!-- The File Upload processing plugin -->
                                    <script src="<?php echo JQUERY_FILE_UPLOAD; ?>js/jquery.fileupload-process.js"></script>
                                    <!-- The File Upload image preview & resize plugin -->
                                    <script src="<?php echo JQUERY_FILE_UPLOAD; ?>js/jquery.fileupload-image.js"></script>
                                    <!-- The File Upload audio preview plugin -->
                                    <script src="<?php echo JQUERY_FILE_UPLOAD; ?>js/jquery.fileupload-audio.js"></script>
                                    <!-- The File Upload video preview plugin -->
                                    <script src="<?php echo JQUERY_FILE_UPLOAD; ?>js/jquery.fileupload-video.js"></script>
                                    <!-- The File Upload validation plugin -->
                                    <script src="<?php echo JQUERY_FILE_UPLOAD; ?>js/jquery.fileupload-validate.js"></script>
                                    <!-- The File Upload user interface plugin -->
                                    <script src="<?php echo JQUERY_FILE_UPLOAD; ?>js/jquery.fileupload-ui.js"></script>
                                    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
                                    <!--[if (gte IE 8)&(lt IE 10)]>
                                    <script src="<?php echo JQUERY_FILE_UPLOAD; ?>js/cors/jquery.xdr-transport.js"></script>
                                    <![endif]-->
                                    <script type="text/javascript">
                                        $(function() {
                                            'use strict'; //严格模式
                                            
                                            // Initialize the jQuery File Upload widget:
                                            $('#fileupload').fileupload({
                                                // Uncomment the following to send cross-domain cookies:
                                                //xhrFields: {withCredentials: true},
                                                maxNumberOfFiles: <?php echo $file_upload_limit;?>,//文件上传个数
                                                dataType: 'json',
                                                url: 'index.php?m=attachment&c=attachments&a=jfupload',
                                                formData: {module: "<?php echo $_GET['module'] ? $_GET['module'] : '0'; ?>", catid: "<?php echo $_GET['catid'] ? $_GET['catid'] : '0'; ?>"},
                                                //previewMaxWidth :100,
                                                drop: function (e, data) {
                                                }
                                            }).on('fileuploaddone', function(e, data) {
                                                //文件上传结束后，缓存到隐藏域
                                                var att_status = $('#att-status').html();
                                                var att_name = $('#att-name').html();
                                                $.each(data.result.files, function(index, file) {
                                                    att_status = att_status + '|' + file.url;
                                                    att_name = att_name + '|' + file.name
                                                });
                                                $('#att-status').html(att_status);
                                                $('#att-name').html(att_name);
                                                //alert(1);
                                                //$("button.delete").unbind().click(fun)
                                            }).on('fileuploadsubmit', function(e, data){
                                                //设置是否使用水印
                                                if($('#watermark_enable').is(':checked')) {
                                                        data.formData = {module: "<?php echo $_GET['module'] ? $_GET['module'] : '0'; ?>", catid: "<?php echo $_GET['catid'] ? $_GET['catid'] : '0'; ?>" , watermark_enable: 1};
                                                } else {
                                                        data.formData = {module: "<?php echo $_GET['module'] ? $_GET['module'] : '0'; ?>", catid: "<?php echo $_GET['catid'] ? $_GET['catid'] : '0'; ?>" , watermark_enable: 0};
                                                }
                                            });
                                            
                                            //文件删除之后调用
                                            $('#fileupload').fileupload(
                                                'option','destroyed',function(e,data){
                                                del_file(data.fileurl,data.filename);
                                            });
                                            
                                            //删除hidden框中文件内容
                                            function del_file(fileurl,filename){
                                                var att_status = $('#att-status').html();//文件路径
                                                var att_name = $('#att-name').html();//文件名称
                                                
                                                var f_url = '|' + fileurl;
                                                att_status = att_status.replace(f_url, "");   //字符串空串替换
                                                $('#att-status').html(att_status);
                                                
                                                var f_name = '|' + filename
                                                att_name = att_name.replace(f_name, "");
                                                $('#att-name').html(att_name);
                                            }

                                            //对象所有属性和方法
                                            function allPrpos ( obj ) { 
                                                // 用来保存所有的属性名称和值 
                                                var props = "" ; 
                                                // 开始遍历 
                                                for ( var p in obj ){ 
                                                // 方法 
                                                if ( typeof ( obj [ p ]) == " function " ){ 
                                                obj [ p ]() ; 
                                                } else { 
                                                // p 为属性名称，obj[p]为对应属性的值 
                                                props += p + " = " + obj [ p ] + " \t " ; 
                                                } 
                                                } 
                                                // 最后显示所有的属性 
                                                alert ( props ) ; 
                                            } 
                                            
                                        });
                                        //切换选项卡
                                        function SwapTab(name, cls_show, cls_hide, cnt, cur) {
                                            for (i = 1; i <= cnt; i++) {
                                                if (i == cur) {
                                                    $('#div_' + name + '_' + i).removeClass('hidden');
                                                    $('#div_' + name + '_' + i).show();
                                                    $('#tab_' + name + '_' + i).addClass(cls_show);
                                                    $('#tab_' + name + '_' + i).removeClass(cls_hide);
                                                } else {
                                                    $('#div_' + name + '_' + i).hide();
                                                    $('#tab_' + name + '_' + i).removeClass(cls_show);
                                                    $('#tab_' + name + '_' + i).addClass(cls_hide);
                                                }
                                            }
                                        }
                                        //添加在线文件
                                        function addonlinefile(obj) {
                                            var strs = $(obj).val() ? '|' + $(obj).val() : '';
                                            $('#att-status').html(strs);
                                        }
                                        
                                       
                                        //设置iframe
                                        function set_iframe(id, src) {
                                            $("#" + id).attr("src", src);
                                        }

                                        //未处理文件选择
                                        function album_cancel(obj, id, source) {
                                            var src = $(obj).children("img").attr("path");
                                            var filename = $(obj).attr('title');
                                            if ($(obj).hasClass('on')) {
                                                $(obj).removeClass("on");
                                                var imgstr = $("#att-status").html();
                                                var length = $("a[class='on']").children("img").length;
                                                var strs = filenames = '';
                                                $.get('index.php?m=attachment&c=attachments&a=swfupload_json_del&aid=' + id + '&src=' + source + '&filename=' + filename);
                                                for (var i = 0; i < length; i++) {
                                                    strs += '|' + $("a[class='on']").children("img").eq(i).attr('path');
                                                    filenames += '|' + $("a[class='on']").children("img").eq(i).attr('title');
                                                }
                                                $('#att-status').html(strs);
                                                $('#att-status').html(filenames);
                                            } else {
                                                var num = $('#att-status').html().split('|').length;
                                                var file_upload_limit = '<?php echo $file_upload_limit ?>';
                                                if (num > file_upload_limit) {
                                                    alert('<?php echo L('attachment_tip1') ?>' + file_upload_limit + '<?php echo L('attachment_tip2') ?>');
                                                    return false;
                                                }
                                                $(obj).addClass("on");
                                                $.get('index.php?m=attachment&c=attachments&a=swfupload_json&aid=' + id + '&src=' + source + '&filename=' + filename);
                                                $('#att-status').append('|' + src);
                                                $('#att-name').append('|' + filename);
                                            }
                                        }
                                    </script>
                                </body>
                                </html>
