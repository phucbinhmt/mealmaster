$(document).ready(function () {
  function observeClassChange(element) {
    const observer = new MutationObserver(function (mutations) {
      mutations.forEach(function (mutation) {
        if (mutation.attributeName === "class") {
          var $select = $(mutation.target);

          var $tsWrapper = $select.nextAll().filter(".ts-wrapper");

          if ($select.hasClass("is-valid")) {
            $tsWrapper.addClass("is-valid");
          } else {
            $tsWrapper.removeClass("is-valid");
          }

          if ($select.hasClass("is-invalid")) {
            $tsWrapper.addClass("is-invalid");
          } else {
            $tsWrapper.removeClass("is-invalid");
          }
        }
      });
    });

    observer.observe(element, {
      attributes: true,
    });
  }

  $("select").each(function () {
    observeClassChange(this);
  });
});
