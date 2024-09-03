const usersTable = $("#usersTable");
const usersDatatable = renderTable(usersTable);
const userForm = $("#userForm");
const changePasswordForm = $("#changePasswordForm");
const userModal = $("#userModal");
const changePasswordModal = $("#changePasswordModal");
const confirmDeleteModal = $("#confirmDeleteModal");
const confirmDelete = $("#confirmDelete");
const modalTitle = userModal.find(".modal-title");
const modalSubmit = userModal.find("button[type=submit]");

usersTable.on("click", ".edit", function () {
  resetForm(userForm);
  const userId = $(this).data("id");
  userModal.data("id", userId).trigger("dataIdChange");

  const url = route("users.show", userId);
  $.ajax({
    type: "get",
    url: url,
    success: function (response) {
      $.each(response.data, function (key, value) {
        const ele = userForm.find(`[name="${key}"]`);
        if (key == "district_id" || key == "ward_id") {
          ele.data("default", value);
        } else if (key == "role" && value) {
          ele[0].tomselect.setValue(value.name);
        } else if (key == "gender") {
          userForm.find(`[name="${key}"][value="${value}"]`).prop("checked", true);
        } else if (ele.hasClass("tom-select")) {
          ele[0].tomselect.setValue(value);
        } else if (ele.hasClass("lite-picker")) {
          const dateOfBirth = new Date(value);
          ele[0].picker.setDate(dateOfBirth);
        } else {
          ele.val(value);
        }
      });
    },
    complete: function () {
      userModal.modal("show");
    },
  });
});

$(".add").on("click", function () {
  resetForm(userForm);
  userModal.data("id", "").trigger("dataIdChange");
});

userModal.on("dataIdChange", function () {
  const id = $(this).data("id");
  if (!id) {
    modalTitle.text(languages.add_action);
    modalSubmit.text(languages.add_action);
    return;
  }
  modalTitle.text(languages.edit_action);
  modalSubmit.text(languages.edit_action);
});

usersTable.on("click", ".change-password", function (e) {
  e.preventDefault();
  resetForm(changePasswordForm);
  const userId = $(this).data("id");
  changePasswordModal.data("id", userId);
  changePasswordModal.modal("show");
});

changePasswordForm.on("submit", function (e) {
  e.preventDefault();
  const userId = changePasswordModal.data("id");
  const url = route("users.change-password", userId);
  const formData = new FormData(this);
  formData.append("_method", "PUT");
  const clickedButton = $(document.activeElement);

  $.ajax({
    type: "POST",
    url: url,
    data: formData,
    contentType: false,
    processData: false,
    beforeSend: function () {
      clickedButton.addClass("btn-loading");
    },
    success: function (response) {
      changePasswordModal.modal("hide");
      createFlashMessage(languages.change_password_success_message, languages.success_title, "success");
    },
    complete: function () {
      clickedButton.removeClass("btn-loading");
    },
  });
});

usersTable.on("click", ".delete", function (e) {
  e.preventDefault();
  const userId = $(this).data("id");
  confirmDeleteModal.data("id", userId);
  confirmDeleteModal.modal("show");
});

confirmDelete.on("click", function (e) {
  e.preventDefault();
  const userId = confirmDeleteModal.data("id");
  const url = route("users.destroy", userId);

  $.ajax({
    type: "DELETE",
    url: url,
    success: function (response, textStatus, jqXHR) {
      if (jqXHR.status === 204) {
        confirmDeleteModal.modal("hide");
        createFlashMessage(languages.delete_success_message, languages.success_title, "success");
        usersDatatable.ajax.reload();
      }
    },
  });
});

userForm.on("submit", function (e) {
  e.preventDefault();

  const userId = userModal.data("id");
  const url = userId ? route("users.update", userId) : route("users.store");
  const formData = new FormData(this);

  userId && formData.append("_method", "PUT");
  const clickedButton = $(document.activeElement);

  $.ajax({
    type: "POST",
    url: url,
    data: formData,
    contentType: false,
    processData: false,
    beforeSend: function () {
      clickedButton.addClass("btn-loading");
    },
    success: function (response, textStatus, jqXHR) {
      const message = jqXHR.status === 201 ? languages.create_success_message : languages.update_success_message;
      userModal.modal("hide");
      createFlashMessage(message, languages.success_title, "success");
      usersDatatable.ajax.reload();
    },
    error: function (jqXHR, textStatus, errorThrown) {
      const errors = jqXHR.responseJSON.errors;
      $.each(errors, function (key, value) {
        const input = userForm.find(`[name="${key}"]`);
        input.addClass("is-invalid");
        input.siblings(".invalid-feedback").text(value[0]);
      });
    },
    complete: function () {
      clickedButton.removeClass("btn-loading");
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
    ajax: route("users.data"),
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
        data: "employee_code",
        name: "employee_code",
      },
      {
        data: "first_name",
        name: "first_name",
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
