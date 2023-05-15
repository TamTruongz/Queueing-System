
// CheckBox All
function checkAll(checkbox) {
    var checkboxes = document.getElementsByName("permissions[]");
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].value != "all") {
            checkboxes[i].checked = checkbox.checked;
            checkboxes[i].disabled = checkbox.checked;
        }
    }
}

function uncheckAll(checkbox) {
    var checkboxes = document.getElementsByName("permissions[]");
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].value == "all") {
            checkboxes[i].checked = false;
        }
    }
}

//Add-Service
const checkboxes = document.querySelectorAll('.checkbox-service');

checkboxes.forEach(function(checkbox) {
    checkbox.onclick = function() {
        if (checkbox.checked) {
            checkbox.value = 1;
        } else {
            checkbox.value = 0;
        }
    }
});

// Codes-new
$(document).ready(function() {
    $('#form-add-ticket').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                var latestTicket = response.latestTicket;
                $('#ticket-service_name').text(latestTicket.service_name);
                $('#ticket-sequence_number').text(latestTicket.sequence_number);
                $('#ticket-issued_at').text(moment(latestTicket.issued_at).format('HH:mm DD/MM/YYYY'));
                $('#ticket-expired_at').text(moment(latestTicket.expired_at).format('HH:mm DD/MM/YYYY'));
                $('#staticBackdrop').modal('show');
            }
        });
    });
});
