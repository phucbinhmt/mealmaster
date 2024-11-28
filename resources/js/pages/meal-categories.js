const mealCategoriesTable = $('#mealCategoriesTable');
const mealCategoriesDatatable = renderTable(mealCategoriesTable);
const mealCategoryForm = $('#mealCategoryForm');
const mealCategoryModal = $('#mealCategoryModal');
const confirmDeleteModal = $("#confirmDeleteModal");
const confirmDelete = $("#confirmDelete");
const modalTitle = mealCategoryModal.find(".modal-title");
const modalSubmit = mealCategoryModal.find("button[type=submit]");

mealCategoryForm.on('submit', function (e) {
    e.preventDefault();

    const mealCategoryId = mealCategoryModal.data('id');
    const url = mealCategoryId ? route('meal-categories.update', mealCategoryId) : route('meal-categories.store');
    const formData = new FormData(this);
    mealCategoryId && formData.append('_method', 'PUT');
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
            mealCategoryModal.modal("hide");
            createFlashMessage(message, languages.success_title, "success");
            mealCategoriesDatatable.ajax.reload();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            const errors = jqXHR.responseJSON.errors;
            $.each(errors, function (key, value) {
                const input = mealCategoryForm.find(`[name="${key}"]`);
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
    resetForm(mealCategoryForm);
    mealCategoryModal.data("id", "").trigger("dataIdChange");
});

mealCategoryModal.on("dataIdChange", function () {
    const id = $(this).data("id");
    if (!id) {
        modalTitle.text(languages.add_action);
        modalSubmit.text(languages.add_action);
        return;
    }
    modalTitle.text(languages.edit_action);
    modalSubmit.text(languages.edit_action);
});

mealCategoriesTable.on("click", ".edit", function () {
    resetForm(mealCategoryForm);
    const mealCategoryId = $(this).data("id");
    mealCategoryModal.data("id", mealCategoryId).trigger("dataIdChange");

    const url = route("meal-categories.show", mealCategoryId);
    $.ajax({
        type: "get",
        url: url,
        success: function (response) {
            $.each(response.data, function (key, value) {
                mealCategoryForm.find(`[name="${key}"]`).val(value);
            });
        },
        complete: function () {
            mealCategoryModal.modal("show");
        },
    });
});

mealCategoriesTable.on("click", ".delete", function (e) {
    e.preventDefault();
    const mealCategoryId = $(this).data("id");
    confirmDeleteModal.data("id", mealCategoryId);
    confirmDeleteModal.modal("show");
});

confirmDelete.on("click", function (e) {
    e.preventDefault();
    const mealCategoryId = confirmDeleteModal.data("id");
    const url = route("meal-categories.destroy", mealCategoryId);

    $.ajax({
        type: "DELETE",
        url: url,
        success: function (response, textStatus, jqXHR) {
            if (jqXHR.status === 204) {
                confirmDeleteModal.modal("hide");
                createFlashMessage(languages.delete_success_message, languages.success_title, "success");
                mealCategoriesDatatable.ajax.reload();
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
        ajax: route("meal-categories.data"),
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
