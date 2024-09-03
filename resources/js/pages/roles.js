const rolesTable = $("#rolesTable");
const rolesDatatable = renderTable(rolesTable);
const roleForm = $("#roleForm");
const permissionForm = $("#permissionForm");
const roleModal = $("#roleModal");
const permissionModal = $("#permissionModal");
const confirmDeleteModal = $("#confirmDeleteModal");
const confirmDelete = $("#confirmDelete");
const modalTitle = roleModal.find(".modal-title");
const modalSubmit = roleModal.find("button[type=submit]");

rolesTable.on("click", ".edit", function () {
  resetForm(roleForm);
  const roleId = $(this).data("id");
  roleModal.data("id", roleId).trigger("dataIdChange");

  const url = route("roles.show", roleId);
  $.ajax({
    type: "get",
    url: url,
    success: function (response) {
      $.each(response.data, function (key, value) {
        roleForm.find(`[name="${key}"]`).val(value);
      });
    },
    complete: function () {
      roleModal.modal("show");
    },
  });
});

$(".add").on("click", function () {
  resetForm(roleForm);
  roleModal.data("id", "").trigger("dataIdChange");
});

roleModal.on("dataIdChange", function () {
  const id = $(this).data("id");
  if (!id) {
    modalTitle.text(languages.add_action);
    modalSubmit.text(languages.add_action);
    return;
  }
  modalTitle.text(languages.edit_action);
  modalSubmit.text(languages.edit_action);
});

rolesTable.on("click", ".edit-permision", function (e) {
  e.preventDefault();
  resetForm(permissionForm);
  const roleId = $(this).data("id");
  permissionModal.data("id", roleId);

  const url = route("roles.permissions", roleId);

  $.ajax({
    type: "get",
    url: url,
    success: function (response) {
      $.each(response.data, function (key, value) {
        permissionForm.find(`[value="${value}"]`).prop("checked", true);
      });
    },
    complete: function () {
      permissionModal.modal("show");
    },
  });
});

rolesTable.on("click", ".delete", function (e) {
  e.preventDefault();
  const roleId = $(this).data("id");
  confirmDeleteModal.data("id", roleId);
  confirmDeleteModal.modal("show");
});

confirmDelete.on("click", function (e) {
  e.preventDefault();
  const roleId = confirmDeleteModal.data("id");
  const url = route("roles.destroy", roleId);

  $.ajax({
    type: "DELETE",
    url: url,
    success: function (response, textStatus, jqXHR) {
      if (jqXHR.status === 204) {
        confirmDeleteModal.modal("hide");
        createFlashMessage(languages.delete_success_message, languages.success_title, "success");
        rolesDatatable.ajax.reload();
      }
    },
  });
});

permissionForm.on("submit", function (e) {
  e.preventDefault();

  const roleId = permissionModal.data("id");
  const url = route("roles.update-permissions", { role_id: roleId });
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
      permissionModal.modal("hide");
      createFlashMessage(languages.update_permission_success_message, languages.success_title, "success");
    },
    complete: function () {
      clickedButton.removeClass("btn-loading");
    },
  });
});

roleForm.on("submit", function (e) {
  e.preventDefault();

  const roleId = roleModal.data("id");
  const url = roleId ? route("roles.update", { id: roleId }) : route("roles.store");
  const formData = new FormData(this);
  roleId && formData.append("_method", "PUT");
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
      roleModal.modal("hide");
      createFlashMessage(message, languages.success_title, "success");
      rolesDatatable.ajax.reload();
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
    ajax: route("roles.data"),
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
        data: "display_name",
        name: "display_name",
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
