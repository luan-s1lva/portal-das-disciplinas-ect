/*! Select2 4.0.13 | https://github.com/select2/select2/blob/master/LICENSE.md */

!(function () {
  if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
    var n = jQuery.fn.select2.amd;
  n.define("select2/i18n/ka", [], function () {
    return {
      errorLoading: function () {
        return "მონაცემების ჩატვირთვა შეუძლებელია.";
      },
      inputTooLong: function (n) {
        return (
          "გთხოვთ აკრიფეთ " +
          (n.input.length - n.maximum) +
          " სიმბოლოთი ნაკლები"
        );
      },
      inputTooShort: function (n) {
        return (
          "გთხოვთ აკრიფეთ " + (n.minimum - n.input.length) + " სიმბოლო ან მეტი"
        );
      },
      loadingMore: function () {
        return "მონაცემების ჩატვირთვა…";
      },
      maximumSelected: function (n) {
        return "თქვენ შეგიძლიათ აირჩიოთ არაუმეტეს " + n.maximum + " ელემენტი";
      },
      noResults: function () {
        return "რეზულტატი არ მოიძებნა";
      },
      searching: function () {
        return "ძიება…";
      },
      removeAllItems: function () {
        return "ამოიღე ყველა ელემენტი";
      },
    };
  }),
    n.define,
    n.require;
})();
