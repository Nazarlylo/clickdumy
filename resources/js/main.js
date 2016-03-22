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
$('.del_image').click(function(){
    div=$(this).parents('.block_img');
    item_id=$(".item_id").val();
    numb_id= $(this).attr('data-value');
    src= $(this).attr('datasrc');
    $.ajax({
        url: '/click-dummy/del_image',
        method: 'POST',
        data: {src:src,item_id:item_id,numb_id:numb_id},
        headers: {
            'X-CSRF-Token': $('input[name=_token]').val()
        },
        success: function(res)
        {
            div.remove();
        },
        error: function(msg)
        {
            console.log(msg);
        }
    });

});
$('.add_images').click(function()
{
    field = $(".block_img:first").clone();
    $(this).after(field);
});
//    all=$('input[name="images[]"]');
//    if(all.length==11) return;
//
//
//    field=$('input[name="images[]"]:first').clone();
//    title=$('input[name="title[]"]:first').clone();
//    approve=$('input[name="approve[]"]:first').clone();
//    $(this).after(field);
//    $(this).after(title);
//    $(this).after(approve);
//



