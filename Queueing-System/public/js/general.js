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
const checkboxes = document.querySelectorAll(".checkbox-service");

checkboxes.forEach(function (checkbox) {
    checkbox.onclick = function () {
        if (checkbox.checked) {
            checkbox.value = 1;
        } else {
            checkbox.value = 0;
        }
    };
});

// Codes-new
$(document).ready(function () {
    $("#form-add-ticket").submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (response) {
                var latestTicket = response.latestTicket;
                $("#ticket-service_name").text(latestTicket.service_name);
                $("#ticket-sequence_number").text(latestTicket.sequence_number);
                $("#ticket-issued_at").text(
                    moment(latestTicket.issued_at).format("HH:mm DD/MM/YYYY")
                );
                $("#ticket-expired_at").text(
                    moment(latestTicket.expired_at).format("HH:mm DD/MM/YYYY")
                );
                $("#staticBackdrop").modal("show");
            },
        });
    });
});

// More content:
let currentContent = null;

const showMoreBtns = document.querySelectorAll(".show-more");

showMoreBtns.forEach((showMoreBtn) => {
    const contentNoneDevice = document.querySelector(
        `#content-${showMoreBtn.dataset.id}`
    );

    showMoreBtn.addEventListener("click", (event) => {
        event.stopPropagation();
        if (currentContent && currentContent !== contentNoneDevice) {
            currentContent.style.display = "none";
        }
        contentNoneDevice.style.display = "block";
        currentContent = contentNoneDevice;
    });

    document.addEventListener("click", (event) => {
        if (currentContent && !currentContent.contains(event.target)) {
            currentContent.style.display = "none";
            currentContent = null;
        }
    });
});
//
const selects = document.querySelectorAll("select");
const vectors = document.querySelectorAll(".vector");
for (let i = 0; i < selects.length; i++) {
    const select = selects[i];
    const vector = vectors[i];

    select.addEventListener("focus", function () {
        vector.classList.add("rotate");
    });

    select.addEventListener("blur", function () {
        vector.classList.remove("rotate");
    });
}
