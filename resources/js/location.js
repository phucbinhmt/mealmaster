$("select.province-select").each(function () {
  const provinceSelect = this.tomselect;
  loadProvinces(provinceSelect);
});

$(".province-select").on("change", function () {
  const provinceId = $(this).val();
  const districtSelect = $(this).closest("form").find(".district-select");
  loadDistricts(districtSelect, provinceId);
});

$(".district-select").on("change", function () {
  const districtId = $(this).val();
  const wardSelect = $(this).closest("form").find(".ward-select");
  loadWards(wardSelect, districtId);
});

function loadProvinces(provinceSelect) {
  const url = route("provinces");
  $.ajax({
    type: "get",
    url: url,
    success: function (response) {
      provinceSelect.clear();
      provinceSelect.clearOptions();
      $.each(response, function (index, province) {
        provinceSelect.addOption({ value: province.id, text: province.name });
      });
      provinceSelect.refreshOptions(false);
    },
  });
}

function loadDistricts(districtSelect, provinceId) {
  const districtTomSelect = districtSelect[0].tomselect;
  const defaultValue = districtSelect.data("default");
  if (!provinceId) {
    districtTomSelect.clear();
    districtTomSelect.clearOptions();
    return;
  }
  const url = route("provinces.districts", { province_id: provinceId });
  $.ajax({
    type: "get",
    url: url,
    success: function (response) {
      districtTomSelect.clear();
      districtTomSelect.clearOptions();
      $.each(response, function (index, district) {
        districtTomSelect.addOption({ value: district.id, text: district.name });
      });
      districtTomSelect.refreshOptions(false);
    },
    complete: function () {
      if (defaultValue) {
        districtTomSelect.setValue(defaultValue);
        districtSelect.data("default", "");
      }
    },
  });
}

function loadWards(wardSelect, districtId) {
  const wardTomSelect = wardSelect[0].tomselect;
  const defaultValue = wardSelect.data("default");
  if (!districtId) {
    wardTomSelect.clear();
    wardTomSelect.clearOptions();
    return;
  }
  const url = route("districts.wards", { district_id: districtId });
  $.ajax({
    type: "get",
    url: url,
    success: function (response) {
      wardTomSelect.clear();
      wardTomSelect.clearOptions();
      $.each(response, function (index, ward) {
        wardTomSelect.addOption({ value: ward.id, text: ward.name });
      });
      wardTomSelect.refreshOptions(false);
    },
    complete: function () {
      if (defaultValue) {
        wardTomSelect.setValue(defaultValue);
        wardSelect.data("default", "");
      }
    },
  });
}
