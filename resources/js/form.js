function resetForm(formSelect) {
  formSelect.find(".is-invalid").removeClass("is-invalid");
  formSelect.find(".is-valid").removeClass("is-valid");
  formSelect.find(".invalid-feedback").remove();
  formSelect.trigger("reset");
  const tomselects = formSelect.find("select.tom-select");
  tomselects.each(function () {
    this.tomselect.clear();
  });
}

window.resetForm = resetForm;
