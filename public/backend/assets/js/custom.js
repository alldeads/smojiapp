$(document).ready(function () {
    
    $("#msg").hide();

    $(document).on('change','.changeStatus',function(){

        var mode = $(this).prop('checked');
        //var status = $(this).attr("data-status");             
        var status = mode == true ? 'Y' : 'N';
        var id = $(this).attr("data-id");             
        var field = $(this).attr("data-i");             
        var table = $(this).attr("data-td");             
        $.ajax({
            url: '../CommonController/changeStatus',
            dataType: "JSON",
            method:"POST",
            data: {
                "id": id,
                "status": status,
                "td": table,
                "i": field,
            },
            success: function (response)
            { 
                swal("You have successfully status changed!");
                /*$("#msg").show();
                $("#msg").html('You have successfully status changed.');
                $("#msg").addClass('alert alert-success');*/

                $("#preloader-ajax , #status").hide();
                //$('#posts').DataTable().ajax.reload();
            }
        });

    });

    $(document).on("click",".rowDelete",function(){
    
            var id = $(this).attr("data-id");             
            var field = $(this).attr("data-i");             
            var table = $(this).attr("data-td");  
            
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: true
            }, function (isConfirm) {
                
                if (isConfirm) {
                    

                    $.ajax({
                          url: '../CommonController/deleteData',
                          dataType: "JSON",
                          method:"POST",
                          data: {
                              "id": id,
                              "td": table,
                              "i": field,
                          },
                          success: function ()
                          {
                              $('#datatable-scroller').DataTable().ajax.reload();
                              swal("Deleted!", "Your data has been deleted.", "success");
                          }
                    });

                }
            });
                   
    }); 

    $('#state').on("change",function () {
        var id = $(this).find('option:selected').val();
        $.ajax({
            url: baseURL+'CommonController/getCityByState',
            type: "POST",
            data: "id="+id,
            success: function (data) {
                data = JSON.parse(data);
                var list = '<option value="">No city found</option>';
                if( data != 'blank' ){
                    list = '';
                    $.each( data, function(index, item) {
                        list += '<option id="'+item.id+'">'+item.name+'</option>';
                    });
                }
                $("#city").html(list);
            },
        });
    }); 

    $( document ).ajaxStart(function() {
        $("#preloader , #status").show();
    });
    $( document ).ajaxComplete(function() {
        $("#preloader , #status").hide();
    });
     
    $(".close_model").click(function() {
        $("form").validate().resetForm();
    });
  
});





