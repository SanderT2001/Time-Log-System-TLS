/* Global Variables: */
//Variable used to share the time difference in minutes through the whole Javascript file.
var timeDiffInMin;

/*
 * addData function
 *
 * This is a function which makes an ajax call to the addData method in the LogsController and then close the addData modal.
 *
 * @param operation,'View' or 'Add':
 * 		View => Show an empty modal,
 * 		Add => Sent the filled modal
 *
 * 	When adding, the time difference is also being calculaed to be sent to the database.
 */
function addData(operation)
{
    if (operation == 'view')
    {
        $("#add-modal-date").attr("type", "date");
        $("#addDataModal").modal("show");
    }
    else if (operation == 'add')
    {
        calcTimeDiffMin(($("#add-modal-start-time").val()), ($("#add-modal-end-time").val()));

        $.ajax(
            {
                type: 'put',
                url: '/projects/Time-Log-System-TLS/public_html/logs/addData/',
                headers: { 'X-CSRF-Token': $('[name= "_csrfToken"]').val() },
                data: "time_type_id= " + $("#add-modal-time-type").val() + "&project_id= " + $("#add-modal-project").val() + "&log_summary= " + $("#add-modal-summary").val() + "&log_description= " + $("#add-modal-description").val() + "&log_retrospective= " + $("#add-modal-retrospective").val() + "&log_date= " + $("#add-modal-date").val() + "&log_start_time= " + $("#add-modal-start-time").val() + "&log_end_time= " + $("#add-modal-end-time").val() + "&log_time_diff_min= " + timeDiffInMin,
                dataType: 'html',

                success: function(response)
                {
                    //$("#addDataModal").modal("hide");
                    location.reload();
                },

                error: function(e)
                {
                    alert("An error occurred: " + e.responseText.message);
                    console.log(e);
                }
            });
    }
}

/*
 * enlargeButtonClick function
 *
 * This is a function which makes an ajax call to the getData method in the LogsController and then sets modal values before displaying the modal filled with ajax returned data. 
 *
 * @param operation, Empty or 'Edit':
 * 		Empty => Show the modal with the returned data in it,
 * 		Edit => Call the editData() method
 */
function enlargeButtonClick(logId, action)
{
    $.ajax (
        {
            type: 'get',
            url: '/projects/Time-Log-System-TLS/public_html/logs/getData/' + logId,
            dataType: 'json',
            contentType: 'json',

            success: function(response) 
            {
                if (response.result) 
                {
                    var result = response.result;	

                    $("#modal-id").attr("value", result.id);

                    $("#modal-time-type option").filter(function () 
                        { 
                            return $(this).text() == result.time_type;
                        }).prop("selected", true);

                    $("#modal-project option").filter(function () 
                        { 
                            return $(this).text() == result.project;
                        }).prop("selected", true);

                    $("#modal-summary").attr("value", result.summary);
                    $("#modal-description").html(result.description);
                    $("#modal-retrospective").html(result.retrospective);
                    $("#modal-date").attr("type", "date");
                    $("#modal-date").attr("value", result.date);
                    $("#modal-start-time").val(result.start_time);
                    $("#modal-end-time").val(result.end_time);
                    $("#modal-difference-time").val(result.difference_time);

                    $(".readonly-dropdown").each(function()
                        {
                            $(".readonly-dropdown").prop("disabled", true);
                        });

                    $(".readonly").each(function() 
                        {
                            $(".readonly").prop("readonly", true);
                        });

                    $("#edit-data-button").html("Edit data");

                    $("#viewDataModal").modal("show");

                    if (action == 'edit')
                    {
                        editData();
                    }
                }
            },

            error: function(e) 
            {
                alert("An error occurred: " + e.responseText.message);
                console.log(e);
            }
        });
}

/*
 * editData function
 * 
 * This function is meant to handle the whole edit data events on the Logbook, but also to handle the difference between 'Edit data' and 'Save data'.
 * 'Edit data' => The stage in which you specifically select that you want to edit the shown data.
 * 'Save data' => The stage in which you get after you click on 'Edit data'. If you click on the button when 'Save data' is being displayed, there will be an ajax call to update the edited data.
 *
 * Before the editData ajax call is being made, the time difference in minutes is being calculated to update that field in the database by calling the 'calcTimeDiffMin()' function.
 */
function editData(logId)
{
    var log;

    log = (logId == null) ? $("#modal-id").val() : logId;

    if (($("#edit-data-button").html() === "Edit data"))
    {
        $(".readonly-dropdown").each(function()
            {
                $(".readonly-dropdown").prop("disabled", false);
            });

        $(".readonly").each(function() 
            {
                $(".readonly").prop("readonly", false);
            });

        $("#edit-data-button").html("Save data");	
    }
    else if (($("#edit-data-button").html() === "Save data"))
    {
        $(".readonly-dropdown").each(function()
            {
                $(".readonly-dropdown").prop("disabled", true);
            });

        $(".readonly").each(function() 
            {
                $(".readonly").prop("readonly", true);
            });			

        $("#modal-date").attr("value", $("#modal-date").val());

        var startTimeModal = $("#modal-start-time").val();
        var endTimeModal = $("#modal-end-time").val();

        calcTimeDiffMin(startTimeModal, endTimeModal);
        $("#modal-difference-time").val(timeDiffInMin);

        $.ajax(
            {
                type: 'put',
                url: '/projects/Time-Log-System-TLS/public_html/logs/editData/' + log,
                headers: { 'X-CSRF-Token': $('[name= "_csrfToken"]').val() },
                data: "time_type_id= " + $("#modal-time-type").val() + "&project_id= " + $("#modal-project").val() + "&log_summary= " + $("#modal-summary").val() + "&log_description= " + $("#modal-description").val() + "&log_retrospective= " + $("#modal-retrospective").val() + "&log_date= " + $("#modal-date").attr("value") + "&log_start_time= " + $("#modal-start-time").val() + "&log_end_time= " + $("#modal-end-time").val() + "&log_time_diff_min= " + $("#modal-difference-time").val(),
                dataType: 'html',

                success: function(response)
                {
                    location.reload();
                },

                error: function(e)
                {
                    alert("An error occurred: " + e.responseText.message);
                    console.log(e);
                }
            });

        $("#edit-data-button").html("Edit data");
    }
}

/*
 * deleteData function
 *
 * This function makes a call to the deleteData function in the LogsController and takes the logId variable to makes sure the correct record is being deleted. 
 */
function deleteData(logId)
{
    if (confirm('Sure?') == false) {
        return false;
    }

    var log;
    log = (logId == null) ? $("#modal-id").val() : logId;

    $.ajax (
        {
            type: 'post',
            url: '/projects/Time-Log-System-TLS/public_html/logs/deleteData/' + log,
            headers : { 'X-CSRF-Token': $('[name= "_csrfToken"]').val() },
            dataType: 'html',

            success: function(response) 
            {
                $("#dataModal").modal("hide");
                $("#" + log).remove();
            },

            error: function(e) 
            {
                alert("An error occurred: " + e.responseText.message);
                console.log(e);
            }
        });
}

/*
 * calcTimeDiffMin function
 * 
 * This function takes a startTime and a endTime variable to calculate the difference between those two times. 
 * The 2018-08-27 date is chosen of the date when this function is being written, it's just random, it has no further meaning.
 */
function calcTimeDiffMin(startTime, endTime)
{
    timeDiffInMin = (new Date("2018-08-27 " + endTime) - new Date("2018-08-27 " + startTime)) / 1000 / 60;
}

/*
 * exportData function
 *
 * This function created the link to the controller with the requested time type. 
 * After that the link is being inserted into the <a > tag in export.ctp.
 */
function exportData(column)
{
    var exportOf = $("#export-field-export-of").val();
    var from = $("#export-field-from").val();

    var startDate = $("#export-field-time-type-start-date").val();
    var endDate = $("#export-field-time-type-end-date").val();

    if ((startDate == "") && (endDate == ""))
    {
        if (startDate == "")
        {
            startDate = "all";	
        }

        if (endDate == "")
        {
            endDate = "all";
        }
    }
    else
    {
        var date = new Date();

        var year = date.getFullYear();
        var month = date.getMonth() + 1;
        var day = date.getDay() + 2;

        var bindedDate = year + "-" + month + "-" + day; 

        if ((startDate == "") && (endDate != ""))
        {
            startDate = bindedDate;
        }

        if ((startDate != "") && (endDate == ""))
        {
            endDate = bindedDate;
        }
    }

    var link = "./export-data/" + exportOf + "/" + from + "/" + startDate + "/" + endDate;
    $("#createExportLink").attr("href", link);
}
