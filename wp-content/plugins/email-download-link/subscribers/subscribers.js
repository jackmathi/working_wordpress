function _ed_delete(guid)
{
	if(confirm(ed_downloadhistory_script.ed_delete_record))
	{
		document.frm_ed_display.action="admin.php?page=ed-downloadhistory&ac=del&guid="+guid;
		document.frm_ed_display.submit();
	}
}

function _ed_redirect()
{
	window.location = "admin.php?page=ed-downloadhistory";
}

function _ed_help()
{
	window.open("http://www.gopiplus.com/work/2016/03/01/email-download-link-wordpress-plugin/");
}

function _ed_exportcsv(url, option)
{
	if(confirm(ed_downloadhistory_script.ed_exportcsv_record))
	{
		document.frm_ed_subscriberexport.action= url+"&option="+option;
		document.frm_ed_subscriberexport.submit();
	}
	else
	{
		return false;
	}
}