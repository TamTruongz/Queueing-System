// ==== biểu đồ đường cấp số ====
var ctx = document.getElementById("myChart").getContext("2d");
var gradient = ctx.createLinearGradient(0, 0, 0, 400);
gradient.addColorStop(0, "#5185F7");
gradient.addColorStop(1, "rgba(255, 255, 255, 0)");
var myChart = new Chart(ctx, {
    type: "line",
    data: {
        labels: labels,
        datasets: [
            {
                label: "",
                data: counts,
                backgroundColor: gradient,
                borderColor: "#5185F7",
                pointBorderColor: "#fff",
                pointBorderWidth: 1,
                pointRadius: 4,
                fill: true,
                borderCapStyle: "round",
                borderJoinStyle: "round",
            },
        ],
    },
    options: {
        scales: {
            xAxes: [
                {
                    gridLines: {
                        display: false,
                    },
                },
            ],
            yAxes: [
                {
                    ticks: {
                        beginAtZero: true,
                    },
                },
            ],
        },
        legend: {
            display: true,
        },
    },
});



// ==== biểu đồ tròn thiết bị ====
var ctx = document.getElementById("myChartDevice").getContext("2d");
var myChart = new Chart(ctx, {
    type: "doughnut",
    data: {
        labels: "",
        datasets: [
            {
                data: [active_devices_count, inactive_devices_count],
                backgroundColor: ["#FF7506", "#EAEAEC"],

                borderWidth: 5,
            },
            {
                data: [inactive_devices_count, active_devices_count],
                backgroundColor: ["#7E7D88", "rgba(0, 0, 0, 0.1)"],

                borderWidth: 5,
            },
        ],
    },
    options: {
        responsive: true,
        cutoutPercentage: 80,
        legend: {
            display: false,
        },
    },
});
// =================================================================


// ==== biểu đồ tròn dịch vụ ====
var ctx = document.getElementById("myChartService").getContext("2d");
var myChart = new Chart(ctx, {
    type: "doughnut",
    data: {
        labels: "",
        datasets: [
            {
                data: [active_service_count, inactive_service_count],
                backgroundColor: ["#4277FF", "#EAEAEC"],

                borderWidth: 5,
            },
            {
                data: [inactive_service_count, active_service_count],
                backgroundColor: ["#7E7D88", "rgba(0, 0, 0, 0.1)"],

                borderWidth: 5,
            },
        ],
    },
    options: {
        responsive: true,
        cutoutPercentage: 80,
        legend: {
            display: false,
        },
    },
});
// =================================================================

// ==== biểu đồ tròn cấp số ====
var ctx = document.getElementById("myChartTicket").getContext("2d");
var myChart = new Chart(ctx, {
    type: "doughnut",
    data: {
        labels: "",
        datasets: [
            {
                data: [used_ticket_count, (pending_ticket_count + skipped_ticket_count)],
                backgroundColor: ["#35c75a", "#EAEAEC"],
                borderWidth: 2.5,
            },
            {
                data: [pending_ticket_count, (used_ticket_count + skipped_ticket_count)],
                backgroundColor: ["#7E7D88", "#EAEAEC"],
                borderWidth: 2.5,
            },
            {
                data: [skipped_ticket_count, (used_ticket_count + pending_ticket_count)],
                backgroundColor: ["#f178b6", "#EAEAEC"],
                borderWidth: 2.5,
            },
        ],
    },
    options: {
        responsive: true,
        legend: {
            display: false,
        },
    },
});
// =================================================================