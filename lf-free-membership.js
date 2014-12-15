/** DCS Free Membership */
//Process User
function lf_free_membership_process_form(ajaxDir)
{
	try
	{
        var mysack = new sack(ajaxDir+"lf-free-membership-ajax.php");
        mysack.execute = 1;
        mysack.method = 'POST';

        //Set the variables
        mysack.setVar("action", "ProcessUser");
        mysack.setVar("first_name", document.getElementById("lf_first_name").value);
        mysack.setVar("last_name", document.getElementById("lf_last_name").value);
        mysack.setVar("email", document.getElementById("lf_email").value);
        mysack.setVar("phone", document.getElementById("lf_phone").value);
        mysack.setVar("zip_code", document.getElementById("lf_zip_code").value);

        mysack.onError = function() { alert('An Error occurred. Please reload the page and try again.'); };
        mysack.runAJAX();
    }
    catch(err)
    {
        var txt = "There was an error on this page.\n\n";
        txt += "Error description: " + err.message + "\n\n";
        txt += "Click OK to continue.\n\n";
        alert(txt);
    }

    return false;
}

