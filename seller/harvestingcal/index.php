<!-- Include Bootstrap CSS and JS -->

<link rel="stylesheet" href="calendar.css">
<!-- FullCalendar CSS -->

<style type="text/css">
    .Iclass {
        font-size: 1.3rem;
        cursor: pointer;
        font-weight: 500;
    }

    ul.pagination {
        display: inline-block;
        padding: 0;
        margin: 0;
    }

    ul.pagination li {
        cursor: pointer;
        display: inline;
        color: #3a4651 !important;
        font-weight: 600;
        padding: 4px 8px;
        border: 1px solid #CCC;
    }

    .pagination li:first-child {
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }

    .pagination li:last-child {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }

    ul.pagination li:hover {
        background-color: #3a4651;
        color: white !important;
    }

    .pagination .active {
        background-color: #3a4651;
        color: white !important;
    }

    .table thead th,
    .table th {
        background-color: #9e9e9e !important;
    }

    .swal2-icon {
        margin-bottom: 10px !important;
    }

    .modalpaddingnew {
        padding-left: 5px;
        margin-bottom: 10px;
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="card" style="margin-bottom: 0px;">
            <div class="card-body" style="padding-top: .5rem; padding-bottom: .5rem;">
                <div class="row page-titles rowpageheaderpadd" style="padding-bottom: 0px;">
                    <div class="col-md-6 col-6 align-self-center" style="padding-left:10px;">
                        <h3 class="mb-0 mt-0 headerfontfont text-themecolor" style="font-weight: 600;">Harvesting Calendar</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="padding: 15px 15px; background-color: white; min-height: 540px; margin-top: 15px;">
    <h4 class="mb-0 headerfontfont2" style="color: #2c2b2e;font-weight: 500;">Harvesting Schedule</h4>
    <h6 class="mb-4 headerfontfont" style="font-weight: 300;font-size: 13px;">You have total of <span id="#">0</span> Schedule
    </h6>

    <div class="row" style="margin-bottom: .5rem; justify-content:right;">
        <div class="col-md-8 coldashboardbox4">
            <button type="button" class="btn waves-effect waves-light btn-secondary float-right buttonproduct" id="EventModal" style="background-color: #4C644B!important; border: 1px solid #4C644B!important;"><i class="fas fa-plus" onclick="showEventModal();" style="margin-right: 5px;"></i>Add Harvest Schedule</button>
        </div>
    </div>

    <div class="row" style="justify-content: center; align-items:center;">
        <div class="col-xl-9 col-md-6">
            <div class="mb-3">
                <div id='calendar'></div>
                <!-- Bootstrap Modal -->
                <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eventModalLabel">Add Harvest Schedule</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="eventForm">
                                <div class="form-group">
                                    <label for="eventTitle">Event Title</label>
                                    <input type="text" class="form-control" id="eventTitle" placeholder="Enter event title" style="margin-bottom: 8px;">
                                    <label for="prodHarvest">Product to Harvest</label>
                                    <input type="text" class="form-control" id="prodHarvest" placeholder="Enter a product to harvest" style="margin-bottom: 8px;">
                                    <label for="prodQuanti">Quantity</label>
                                    <input type="text" class="form-control" id="prodQuanti" placeholder="Enter product quantity" style="margin-bottom: 8px;">
                                    <label for="prodPrice">Price</label>
                                    <input type="text" class="form-control" id="prodPrice" placeholder="Enter product price" style="margin-bottom: 8px;">
                                    <label for="startDate">Start Date</label>
                                    <input type="date" class="form-control" id="startDate" style="margin-bottom: 8px;">
                                    <label for="endDate">End Date</label>
                                    <input type="date" class="form-control" id="endDate" style="margin-bottom: 8px;">
                                </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="" onclick="saveEvent()">
                                    Add Event
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <input id="txtproductlistPageCount" type="hidden">
            <ul id="upproductlistPageList" class="pagination float-right"></ul>
        </div>
    </div>
</div>




<!-- FullCalendar JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<!-- ... (previous HTML code) ... -->
<script>
    // JavaScript code to handle the button click event and show the modal
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('EventModal').addEventListener('click', function() {
            $('#eventModal').modal('show'); // Show the eventModal when the button is clicked
        });
    });

    function saveEvent() {
        var title = $('#eventTitle').val();
        var prodHarvest = $('#prodHarvest').val();
        var prodQuantity = $('#prodQuanti').val();
        var prodPrice = $("#prodPrice").val().replace(/,/g, "");
        var eventStartDate = $('#startDate').val();
        var eventEndDate = $('#endDate').val();

        // Perform input validation
        if (title && prodHarvest && prodQuantity && prodPrice && eventStartDate &&
            eventEndDate) {
            var eventData = {
                title: title,
                prodHarvest: prodHarvest,
                prodQuantity: prodQuantity,
                prodPrice: prodPrice,
                start: eventStartDate,
                end: eventEndDate
            };

            $.ajax({
                type: 'POST',
                url: 'save_event.php',
                data: eventData,
                success: function(response) {
                    $('#calendar').fullCalendar('renderEvent', eventData,
                        true);
                    $('#eventModal').modal('hide');
                },
                error: function(xhr, status, error) {
                    // Handle errors
                }
            });
        } else {
            // Handle case where required fields are empty
            Swal.fire(
                'ALERT',
                'Please review your entries. Ensure all required fields are filled out',
                'warning'
            )
        }
    }
    $(document).ready(function() {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            selectable: true,

            select: function(start, end, jsEvent, view) {
                var selectedStartDate = start.format('YYYY-MM-DD HH:mm');
                var selectedEndDate = end.format('YYYY-MM-DD HH:mm');

                $('#eventModal').modal('show');

                // Unbind any previously bound click event
                $('#saveEvent').off('click');

                // Bind saveEvent function to the "Save changes" button's click event
                $('#saveEvent').on('click', saveEvent);
            },
            // Other FullCalendar options
            // ...
        });
    });

    $('#eventModal').on('hidden.bs.modal', function() {
        // Clear the modal form fields when the modal is closed
        $('#eventForm')[0].reset(); // Reset the form

        // Unbind the click event from the "Save changes" button
        $('#saveEvent').off('click');
    });
</script>

<?php
include("harvestingcal/modal.php");
include("harvestingcal/script.php");
?>