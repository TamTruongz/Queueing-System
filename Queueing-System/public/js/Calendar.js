// Lấy phần tử HTML của lịch
const calendar = document.querySelector('.calendar');

// Lấy phần tử HTML của ngày, tháng và năm
const dayElement = calendar.querySelector('.day');
const monthElement = calendar.querySelector('.month-name');
const yearElement = calendar.querySelector('.year');

// Lấy phần tử HTML của các nút điều hướng
const prevButton = calendar.querySelector('.prev');
const nextButton = calendar.querySelector('.next');

// Lấy phần tử HTML của danh sách các ngày trong lịch
const daysList = calendar.querySelector('.days');

// Định nghĩa các biến cần thiết
let currentDate = new Date();
let currentMonth = currentDate.getMonth();
let currentYear = currentDate.getFullYear();

// Tạo một hàm để cập nhật ngày, tháng và năm trong lịch
function updateCalendar() {
    // Xóa các ngày cũ trong danh sách
    daysList.innerHTML = '';

    // Thiết lập ngày, tháng và năm mới cho lịch
    dayElement.textContent = currentDate.getDate();
    monthElement.textContent = getMonthName(currentMonth);
    yearElement.textContent = currentYear;

    // Tính toán ngày đầu tiên của tháng hiện tại
    const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();

    // Tính toán số ngày của tháng hiện tại
    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

    // Tạo các phần tử HTML cho các ngày trong tháng
    for (let i = 0; i < firstDayOfMonth; i++) {
        const li = document.createElement('li');
        li.innerHTML = '<span class="oldmonths">' + ((new Date(currentYear, currentMonth, 0).getDate()) - (
            firstDayOfMonth - i - 1)) + '</span>';
        daysList.appendChild(li);
    }

    for (let i = 1; i <= daysInMonth; i++) {
        const li = document.createElement('li');
        li.textContent = i;

        if (currentDate.getFullYear() == new Date().getFullYear() && currentDate.getMonth() == new Date().getMonth() &&
            i == new Date().getDate()) {
            li.classList.add('active-days');
        }

        daysList.appendChild(li);
    }

    // Tạo các phần tử HTML cho các ngày của tháng tiếp theo (nếu có)
    const daysLeft = 35 - daysInMonth - firstDayOfMonth;

    for (let i = 1; i <= daysLeft; i++) {
        const li = document.createElement('li');
        li.innerHTML = '<span class="oldmonths">' + i + '</span>';
        daysList.appendChild(li);
    }
}

// Tạo một hàm để lấy tên của tháng từ số tháng
function getMonthName(monthIndex) {
    const monthNames = [
        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
    ];

    return monthNames[monthIndex];
}

// Cập nhật lịch khi tải trang
updateCalendar();

// Thêm sự kiện cho nút điều hướng trái
prevButton.addEventListener('click', function() {
    currentMonth--;

    if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    }

    currentDate = new Date(currentYear, currentMonth, 1);
    updateCalendar();
});

// Thêm sự kiện cho nút điều hướng phải
nextButton.addEventListener('click', function() {
    currentMonth++;

    if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }

    currentDate = new Date(currentYear, currentMonth, 1);
    updateCalendar();
});

daysList.addEventListener('click', function(event) {
    // Lấy phần tử được click
    const clickedElement = event.target;

    // Nếu phần tử được click là một ngày trong lịch
    if (clickedElement.tagName === 'LI') {
        // Loại bỏ lớp "active-days" của các ngày khác
        const activeElements = daysList.querySelectorAll('.active-days');
        activeElements.forEach(function(element) {
            element.classList.remove('active-days');
        });

        // Thêm lớp "active-days" cho ngày được click
        clickedElement.classList.add('active-days');
    }
});