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