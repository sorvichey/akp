/**
 * Created by Vichey on 13/10/20118.
 */
$(document).ready(function () {
   // getSubCategory();
    // filter sub-category on province change
    $("#category").change(function () {
        getSubCategory();
    });
});
// function to get sub category
function getSubCategory()
{
    // get sub category
    $.ajax({
        type: "GET",
        url: burl + "/admin/post/getsubcategory/" + $("#category").val(),
        success: function (data) {
            var opts = "";
            for(var i=0; i<data.length; i++)
            {
                opts +="<option value='" + data[i].id + "'>" + data[i].name + "</option>";
            }
            $("#sub_category").html(opts);
        }
    });
}