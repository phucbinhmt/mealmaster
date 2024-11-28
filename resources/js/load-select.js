$(document).ready(function () {
  $("select.role-select").each(function () {
    const roleSelect = this.tomselect;
    loadRoles(roleSelect);
  });
  $("select.meal-category-select").each(function () {
    const categorySelect = this.tomselect;
    loadMealCategories(categorySelect);
  });
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

function loadMealCategories(categorySelect) {
  const url = route("meal-categories.data");

  $.ajax({
    type: "get",
    url: url,
    success: function (response) {
      categorySelect.clear();
      categorySelect.clearOptions();
      $.each(response.data, function (index, category) {
        categorySelect.addOption({ value: category.id, text: category.name });
      });
      categorySelect.refreshOptions(false);
    },
  });
}
