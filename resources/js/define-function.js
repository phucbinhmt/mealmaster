function convertToISO(dateString) {
  const [day, month, year] = dateString.split("/");
  return `${year}-${month.padStart(2, "0")}-${day.padStart(2, "0")}`;
}
window.convertToISO = convertToISO;

function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}
window.capitalizeFirstLetter = capitalizeFirstLetter;

function formatDate(dateStr) {
  var date = new Date(dateStr);
  return date.toLocaleDateString('en-GB').replace(/\//g, '-');
}

window.formatDate = formatDate;