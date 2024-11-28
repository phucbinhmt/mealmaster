const menuModal = $("#menuModal");
const menuForm = $("#menuForm");
const modalTitle = menuForm.find(".modal-title");
const calendarEl = document.getElementById('calendar');
const mealCategoriesTablist = $("#mealCategoriesTablist");
const mealsByCategoryTab = $("#mealsByCategoryTab");
renderCalendar(calendarEl);

function loadMealCtegoriesTablist() {

    mealCategoriesTablist.empty();

    const url = route("meal-categories.data");

    $.ajax({
        type: "get",
        url: url,
        success: function (response) {
            $.each(response.data, function (index, category) {

                var newTab = `
                <li class="nav-item" role="presentation">
                <a href="#" data-id="${category.id}" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab">${category.name}</a>
                </li>
                `;
                mealCategoriesTablist.append(newTab);
                console.log(mealCategoriesTablist);
            });
        },
        complete: function () {
            mealCategoriesTablist.find('li:first-child a').addClass('active');
        }
    });
}

function renderCalendar(calendarEl) {
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        dateClick: function (info) {
            console.log(formatDate(info.date));
            modalTitle.text("Menu " + formatDate(info.date));

            loadMealCtegoriesTablist();

            menuModal.modal("show");

            // var mealId = $('.meal-item.selected').data('id');
            // var mealTime = prompt("Enter meal time (breakfast/lunch/dinner):");

            // if (mealId && mealTime) {
            //     // Gửi yêu cầu Ajax để lưu thực đơn vào ngày được chọn
            //     $.ajax({
            //         url: '/meal-plans',
            //         method: 'POST',
            //         data: {
            //             meal_id: mealId,
            //             meal_date: info.dateStr,
            //             meal_time: mealTime,
            //             _token: '{{ csrf_token() }}'
            //         },
            //         success: function (response) {
            //             alert('Meal plan added!');
            //             calendar.refetchEvents();  // Refresh lại lịch để hiện sự kiện mới
            //         },
            //         error: function (xhr) {
            //             alert('Failed to add meal plan');
            //         }
            //     });
            // } else {
            //     alert("Please select a meal.");
            // }
        }
    });

    calendar.render();
}
