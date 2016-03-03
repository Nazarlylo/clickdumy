$( document ).ready(function() {

    $('.delete_img').on('click',function(){
      $('.block_image').hide();
      $('.img').show();
    })
});
function ConfirmDelete()
{
    var x = confirm("Are you sure you want to delete?");
    if (x)
        return true;
    else
        return false;
}

