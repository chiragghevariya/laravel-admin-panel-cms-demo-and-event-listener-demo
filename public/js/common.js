$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$('form.FromSubmit').submit(function (event) {

    for (instance in CKEDITOR.instances) {
      CKEDITOR.instances[instance].updateElement();
    }
    // showLoading();
    event.preventDefault();
    var formId = $(this).attr('id');
    var formAction = $(this).attr('action');
    var $btn = $('#'+formId+' button[type="submit"]').button('loading');
    var redirectURL = $(this).data("redirect_url");
    // alert(redirectURL);
    $.ajax({
        type: "POST",
        url: formAction,
        data: new FormData(this),
        contentType: false,
        processData: false,
        enctype: 'multipart/form-data',
        success: function (response) {
            console.log(response.status);
            if (response.status == 1 && response.msg !="") {
                window.location=redirectURL;
            }

        },
        error: function (data) {
          $('.error_message').show();
          console.log(data.responseJSON.errors);

          $.each(data.responseJSON.errors,function(index,val){
            console.log(index + ', ' + val);
            // $('input[name='+index+']').after('<span style="color:red">'+ val +'</span>');
            $('.error_message').append('<span>'+ val +'</span>'+'<br>');
          })
            //console.log(jqXhr.responseJSON.errors);
            // showErrorMessages(formId, jqXhr.responseJSON.errors);
            // hideLoading();
            $btn.button('reset');
        }
    });
    return false;
});

 $(document).on("click", ".delete_record", function(){
    var answer = confirm("Are you sure want to delete?");
    if(answer == false){
        return false;
    }
    var formAction = $(this).data("route");
    $.ajax({
        type: "DELETE",
        url: formAction,
        success: function (response) {
            console.log("in");
            if(response.success == 1){
                console.log("success");

                $('.table').DataTable().draw(false);
            }else{
                console.log("failed");
                flashMessage('danger', response.msg);
            }

        },
        error: function (jqXhr) {

        }
    });
});

function deleteAll(formName,url){

    var checked = $("#" + formName + " input:checked").length;
        if (checked > 0)
        {
            if (checked == 1)
            {
                if ($("#" + formName + " input:checked").attr("id") == 'select_all')
                {
                    alert("select at list one");
                }
                else
                {
                    $confirm=confirm("do you realy want to delete the record");
                        if ($confirm) {

                            var formAction = url;
                            $.ajax({
                                type: "DELETE",
                                url: formAction,
                                success: function (response) {
                                    alert("123");
                                    console.log("in");
                                    if(response.success == 1){
                                        console.log("success");

                                        $('.table').DataTable().draw(false);
                                    }else{
                                        console.log("failed");
                                        flashMessage('danger', response.msg);
                                    }

                                },
                                error: function (jqXhr) {

                                }
                            });
                        }
                }
            }
            else
            {
                    $confirm=confirm("do you realy want to delete the record");
                        if ($confirm) {
                            $('#' + formName).attr('action', url);
                            $('#' + formName).submit();
                        }
            }
        }
        else
        {
            alert("select at list one");
        }
}
