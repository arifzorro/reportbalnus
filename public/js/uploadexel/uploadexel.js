
 $(document).ready(function(){
    //
    // load_data();
    //
    // function load_data()
    // {
    //     $.ajax({
    //         url:"<?php echo base_url(); ?>excel_import/fetch",
    //         method:"POST",
    //         success:function(data){
    //             $('#customer_data').html(data);
    //         }
    //     })
    // }



     $('#import_form').on('submit', function(event){
         //alert(1);
         event.preventDefault();
         $.ajax({
             url:"import_excel",
             method:"POST",
             data:new FormData(this),
             contentType:false,
             cache:false,
             processData:false,
             success:function(data){
                 $('#file').val('');
                 load_data();
                 alert(data);
             }
         })
     });

     // $("#import_form").submit(function(){
     //     alert("Submitted");
     // });

     $(".tes").submit(function(){
         alert("Submitted");
     });
    });
//
