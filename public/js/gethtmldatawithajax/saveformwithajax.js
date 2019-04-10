var x=document.getElementsByClassName('icheckbox_flat-green');
console.log(x);













// try {
//     $('#submit').click(function(){
//
//         var judul = $('#juduleditor').val();
//         var author = $('#author').val();
//         var category = $('#category').val();
//         var ed = tinyMCE.get('post');
//         //get content tiny mce
//         var post = ed.getContent();
//         var data="juduleditor="+judul+"&author="+author+"&category="+category+"&post="+post;
//         $.ajax({
//             type: "POST",
//             url: "<?php echo URL?>dashboard/insert",
//             data: data
//         }).done(function( data ) {
//             $('#info').html(data);
//             $('.list-group-item.active').append('<span class="list-group-item">tes</span>');
// //          $('#recentpost-data').append('<span class="list-group-item"><a href="news/'+o[i].judul+'">'+o[i].judul+'</a></span>');
//             $('#submit').attr('disabled', false);
//             $(document).ready(function(){  //fungsi untuk mengembabalikan dari bawah ke top
//                 $('body,html').animate({
//                     scrollTop: 0
//                 }, 500);
//                 return false;
//             });
//             //location.reload();//fungsi java script uuntuk merelod page
// //	  viewdata();
//         });
//     });
// }
// catch(err){
//     document.getElementById("submit").innerHTML = err.message;
// }
//
