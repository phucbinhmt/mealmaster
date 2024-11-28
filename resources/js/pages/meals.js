const mealsTable = $('#mealsTable');
const mealsDatatable = renderTable(mealsTable);
const mealForm = $('#mealForm');
const mealModal = $('#mealModal');
const confirmDeleteModal = $("#confirmDeleteModal");
const confirmDelete = $("#confirmDelete");
const modalTitle = mealModal.find(".modal-title");
const modalSubmit = mealModal.find("button[type=submit]");

mealForm.on('submit', function (e) {
    e.preventDefault();

    const mealId = mealModal.data('id');
    const url = mealId ? route('meals.update', mealId) : route('meals.store');
    const formData = new FormData(this);
    mealId && formData.append('_method', 'PUT');
    const dropzone = $('#mealImageUpload')[0].dropzone;
    const file = dropzone.getAcceptedFiles()[0];
    file && formData.append("image", file);
    const clickedButton = $(document.activeElement);

    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
            clickedButton.addClass("btn-loading");
        },
        success: function (response, textStatus, jqXHR) {
            const message = jqXHR.status === 201 ? languages.create_success_message : languages.update_success_message;
            mealModal.modal("hide");
            createFlashMessage(message, languages.success_title, "success");
            mealsDatatable.ajax.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            const errors = jqXHR.responseJSON.errors;
            $.each(errors, function (key, value) {
                const input = mealForm.find(`[name="${key}"]`);
                input.addClass("is-invalid");
                input.siblings(".invalid-feedback").text(value[0]);
            });
        },
        complete: function () {
            clickedButton.removeClass("btn-loading");
        },
    });
});

$(".add").on("click", function () {
    resetForm(mealForm);
    mealModal.data("id", "").trigger("dataIdChange");
});

mealModal.on("dataIdChange", function () {
    const id = $(this).data("id");
    if (!id) {
        modalTitle.text(languages.add_action);
        modalSubmit.text(languages.add_action);
        return;
    }
    modalTitle.text(languages.edit_action);
    modalSubmit.text(languages.edit_action);
});

mealsTable.on("click", ".edit", function () {
    resetForm(mealForm);
    const mealId = $(this).data("id");
    mealModal.data("id", mealId).trigger("dataIdChange");

    const url = route("meals.show", mealId);
    $.ajax({
        type: "get",
        url: url,
        success: function (response) {
            $.each(response.data, function (key, value) {
                const ele = mealForm.find(`[name="${key}"]`);
                if (key == 'meal_category_id' || key == 'status') {
                    ele[0].tomselect.setValue(value);
                } else if (key == 'image_path' && value) {
                    const dropzone = $('#mealImageUpload')[0].dropzone;
                    const mockFile = { name: 'meal.jpg', size: 1234 };
                    dropzone.files.push(mockFile);
                    dropzone.emit('addedfile', mockFile);
                    dropzone.emit('thumbnail', mockFile, value);
                    dropzone.emit('complete', mockFile);
                } else {
                    ele.val(value);
                }
            });
        },
        complete: function () {
            mealModal.modal("show");
        },
    });
});

mealsTable.on("click", ".delete", function (e) {
    e.preventDefault();
    const mealId = $(this).data("id");
    confirmDeleteModal.data("id", mealId);
    confirmDeleteModal.modal("show");
});

confirmDelete.on("click", function (e) {
    e.preventDefault();
    const mealId = confirmDeleteModal.data("id");
    const url = route("meals.destroy", mealId);

    $.ajax({
        type: "DELETE",
        url: url,
        success: function (response, textStatus, jqXHR) {
            if (jqXHR.status === 204) {
                confirmDeleteModal.modal("hide");
                createFlashMessage(languages.delete_success_message, languages.success_title, "success");
                mealsDatatable.ajax.reload();
            }
        },
    });
});

function renderTable(table) {
    return table.DataTable({
        lengthChange: true,
        searching: true,
        info: true,
        processing: true,
        serverSide: true,
        ajax: route("meals.data"),
        pagingType: "simple_numbers",
        language: {
            lengthMenu: "Hiển thị _MENU_ mục mỗi trang",
            zeroRecords: "Không tìm thấy kết quả",
            info: "Hiển thị từ _START_ đến _END_ của _TOTAL_ mục",
            infoEmpty: "Không có mục nào",
            infoFiltered: "(được lọc từ _MAX_ mục)",
            search: "Tìm kiếm:",
            processing: `<div class="spinner-border text-primary" role="status"></div>`,
            paginate: {
                next: "Sau",
                previous: "Trước",
            },
        },
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false,
            },
            {
                data: "name",
                name: "name",
            },
            {
                data: "category_name",
                name: "category_name",
            },
            {
                data: "price",
                name: "price",
            },
            {
                data: "status_name",
                name: "status_name",
            },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
            },
        ],
        columnDefs: [
            {
                targets: -1,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass("text-end");
                },
            },
            {
                targets: 0,
                width: "20%",
            },
            {
                targets: 1,
                width: "20%",
            },
            {
                targets: 2,
                width: "30%",
            },
        ],
    });
}