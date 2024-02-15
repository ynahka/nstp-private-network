<?php require_once('connect.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduling</title>
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <link rel="stylesheet" href="../viewers/fonts/icofont/icofont.min.css">
    <!-- Include Moment.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    <script src="./fullcalendar/lib/locales-all.min.js"></script>
    <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }

        table,
        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }

        .left-aligned-title {
            text-align: left !important;
            /* Use !important to override default styles */
        }
    </style>
</head>

<body class="bg-light">
    <div class="row page-titles rowpageheaderpadd" style="padding-bottom: 0px;">
        <div class="col-md-6 col-6 align-self-center" style="padding-left:10px;">
            <h3 class="mb-0 mt-0 headerfontfont text-themecolor" style="font-weight: 600;">Harvesting
                Calendar</h3>
        </div>
    </div>
    <div class="fullcalendar">
        <div id="calendar"></div>
    </div>
    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="padding: 29px 6px 20px; background-color: #cfe2ce; border-radius: 20px; border: 1px solid #82a131;">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Schedule Details</h5>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Product Name</dt>
                            <dd id="productname" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Description</dt>
                            <dd id="productdesc" class=""></dd>
                            <dt class="text-muted">Quantity</dt>
                            <dd id="quantityAndUnit" class=""></dd>
                            <dt class="text-muted">Price/Unit</dt>
                            <dd id="priceAndUnit" class=""></dd>
                            <dt class="text-muted">Start</dt>
                            <dd id="availat" class=""></dd>
                            <dt class="text-muted">End</dt>
                            <dd id="availuntil" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

    <?php
    // Get the user_id from the session
    $user_id = $_SESSION['user_id'];

    // Query to select records based on user_id
    $schedules = $connection->query("SELECT * FROM `products` WHERE seller_id = '$user_id'");
    $sched_res = [];
    foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
        $row['sdate'] = date("y-m-d", strtotime($row['availat']));
        $row['edate'] = date("y-m-d", strtotime($row['availuntil']));
        $sched_res[$row['id']] = $row;
    }
    ?>

    <?php
    if (isset($connection)) $connection->close();
    ?>
</body>
<script>
    // var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
    var scheds = <?= json_encode($sched_res) ?>;
</script>
<script>
    $(document).ready(function() {
        var calendar;
        var Calendar = FullCalendar.Calendar;
        var events = [];
        // Define an array of colors
        var eventColors = ['#AFE1AF', '#50C878', '#90EE90', '#98FB98', '#C1E1C1', '#8A9A5B'];
        $(function() {
            if (!!scheds) {
                Object.keys(scheds).map(k => {
                    var row = scheds[k]
                    events.push({
                        id: row.id,
                        title: 'Available Now:  ' + row
                            .productname,
                        start: row.availat,
                        end: row.availuntil,
                        className: 'left-aligned-title'
                    });
                })
            }
            events.forEach(function(event, index) {
                event.backgroundColor = eventColors[index % eventColors.length];
                event.textColor = '#000000'; // Set text color to black
            });
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()

            calendar = new Calendar(document.getElementById('calendar'), {
                headerToolbar: {
                    left: 'prev,next today',
                    right: 'dayGridMonth,dayGridWeek,list',
                    center: 'title',
                },
                selectable: true,
                themeSystem: 'bootstrap',
                //Random default events
                events: events,
                eventClick: function(info) {
                    var _details = $('#event-details-modal')
                    var id = info.event.id
                    if (!!scheds[id]) {
                        // Format the price to two decimal places
                        var formattedPrice = parseFloat(scheds[id].price).toFixed(2);

                        // Concatenate Price and Unit
                        var priceAndUnit = formattedPrice + ' / ' + scheds[id].unit;

                        // Concatenate Quantity and Unit
                        var quantityAndUnit = scheds[id].quantity + ' ' + scheds[id].unit;

                        // Update the HTML elements
                        _details.find('#productname').text(scheds[id].productname);
                        _details.find('#productdesc').text(scheds[id].productdesc);
                        _details.find('#quantityAndUnit').text(
                            quantityAndUnit); // Added this line
                        _details.find('#priceAndUnit').text(priceAndUnit);
                        _details.find('#availat').text(scheds[id].sdate);
                        _details.find('#availuntil').text(scheds[id].edate);
                        _details.find('#edit,#delete').attr('data-id', id);

                        // Show the modal
                        _details.modal('show');
                    } else {
                        Swal.fire(
                            'Error!',
                            'Event is undefined',
                            'error'
                        )
                    }
                    console.log('Events:', events);

                },
                eventDidMount: function(info) {
                    // Do Something after events mounted
                },
                editable: true
            });

            calendar.render();
        });

        // Form reset listener
        $('#schedule-form').on('reset', function() {
            $(this).find('input:hidden').val('')
            $(this).find('input:visible').first().focus()
        })

        // Edit Button
        $('#edit').click(function() {
            var id = $(this).attr('data-id')
            if (!!scheds[id]) {
                var _form = $('#schedule-form')
                console.log(String(scheds[id].availat), String(scheds[id].availat).replace(
                    " ", "\\t"))
                _form.find('[name="id"]').val(id)
                _form.find('[name="productname"]').val(scheds[id].productname)
                _form.find('[name="productdesc"]').val(scheds[id].description)
                _form.find('[name="quantity"]').val(scheds[id].quantity)
                _form.find('[name="price"]').val(scheds[id].price)
                _form.find('[name="unit"]').val(scheds[id].unit)
                _form.find('[name="availat"]').val(String(scheds[id].availat).replace(" ",
                    "T"))
                _form.find('[name="availuntil"]').val(String(scheds[id].availuntil).replace(" ", "T"))
                $('#event-details-modal').modal('hide')
                _form.find('[name="productname"]').focus()
            } else {
                Swal.fire(
                    'Error!',
                    'Event is undefined',
                    'error'
                )
            }
        })

        $('#delete').click(function() {
            var id = $(this).attr('data-id')
            if (!!scheds[id]) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = "./delete_schedule.php?id=" + id;
                    }
                })
            } else {
                Swal.fire(
                    'Error!',
                    'Event is undefined',
                    'error'
                )
            }
        })

    })
</script>

</html>