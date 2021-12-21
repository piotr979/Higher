function setTableForEdit() {
  const rows = document.querySelectorAll(".article-table__link");
  rows.forEach((row) => {
    row.addEventListener("click", function (e) {
      const dataSet = e.target.parentNode.dataset;
      location.href = dataSet.path;
    });
  });
}

setTableForEdit();
