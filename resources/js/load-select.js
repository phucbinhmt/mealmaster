$("select.role-select").each(function () {
  const roleSelect = this.tomselect;
  loadRoles(roleSelect);
});

function loadRoles(roleSelect) {
  const url = route("roles.data");

  $.ajax({
    type: "get",
    url: url,
    success: function (response) {
      roleSelect.clear();
      roleSelect.clearOptions();
      $.each(response.data, function (index, role) {
        roleSelect.addOption({ value: role.name, text: role.display_name });
      });
      roleSelect.refreshOptions(false);
    },
  });
}
