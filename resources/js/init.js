const csrfToken = $('meta[name="csrf-token"]').attr("content");

$.ajaxSetup({
  headers: {
    "X-CSRF-TOKEN": csrfToken,
  },
});

if (window.TomSelect) {
  $(".tom-select").each(function () {
    new TomSelect(this, {
      maxOptions: null,
    });
  });
}

if (window.Litepicker) {
  $(".lite-picker").each(function () {
    this.picker = new Litepicker({
      element: this,
      format: "DD/MM/YYYY",
      buttonText: {
        previousMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
        nextMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
      },
    });
  });
}
