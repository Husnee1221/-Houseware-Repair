// Start Auto Run jQuery
$(document).ready(function(){

    getFaculty();
    
    $("#typestech").on('change', function(){
        getMajorByFaculty();
    });
});
// End Auto Run jQuery



function getFaculty() {

    var data = {
        db : 'typestech',
        name : ''
    }
    $.ajax({
        url: 'sql_check_sub_types.php',
        method: 'post',
        data: data,
        dataType: 'json',
        success: function(result){
            console.log("Result Faculty : ");
            console.log(result);

            if(result.length > 0 ){
                for (var i = 0; i < result.length; i++) {
                    var option = "<option value='" + result[i].name_types + "'>" + result[i].name_types + "</option>";
                    $("#typestech").append(option);
                }
            }
        }
    });
}

function getMajorByFaculty() {

    var faculty = $("#typestech").val();
    var data = {
        db : "sub_types",
        name : faculty
    }
    $.ajax({
        url: 'sql_check_sub_types.php',
        method: 'post',
        data: data,
        dataType: 'json',
        success: function(result){
            console.log("Result Major : ");
            console.log(result);
            $("#sub_types").find('option').remove();
            $("#sub_types").html('<option value="no">เลือกอุปกรณ์</option>'); 
            if(result.length > 0 ){
                for (var i = 0; i <= result.length; i++) {
                    var option = "<option value='" + result[i].name_sub + "'>" + result[i].name_sub + "</option>";
                    $("#sub_types").append(option);
                }
            }
        }
    });
}

