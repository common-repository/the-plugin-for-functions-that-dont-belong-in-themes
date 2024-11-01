jQuery(document).ready(function() {
 
jQuery('#tpfftdbit_login_logo_button').click(function() {
 formfield = jQuery('#tpfftdbit_settings\\[login_logo\\]').attr('name');
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
 
window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#tpfftdbit_settings\\[login_logo\\]').val(imgurl);
 tb_remove();
}
 
});

jQuery(document).ready(function() {
 
jQuery('#tpfftdbit_favicon_button').click(function() {
 formfield = jQuery('#tpfftdbit_settings\\[favicon\\]').attr('name');
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
 
window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#tpfftdbit_settings\\[favicon\\]').val(imgurl);
 tb_remove();
}
 
});