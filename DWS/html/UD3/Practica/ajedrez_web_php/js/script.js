window.onload = function() {
    // Table headers
    document.querySelectorAll('th').forEach((elem) => {
      elem.addEventListener('click', headerClick);
    });
  };
  
  function headerClick(e) {
    // 'this' keyword can be used. 'e.currentTarget' makes
    // it easier to interpret what is the target element.
    const headerCellEl = e.currentTarget;
  
    // If the column is NOT sortable then exit this function
    if (!headerCellEl.querySelector('.sortable')) {
      return;
    }
  
    // Navigate up from the header cell element to get
    // the '<table>' element.
    let table = headerCellEl.closest('table');
  
    // Navigate down from the 'table' element to get
    // all of the row elements in the table's body.
    let tableRows = table.querySelectorAll('tbody tr');
  
    const cellIndex = headerCellEl.cellIndex;
  
    let order_icon = headerCellEl.querySelector('.sortable');
    let order = encodeURI(order_icon.innerHTML).includes('%E2%86%91') ? 'desc' : 'asc';
    // Update the sort arrow
    order_icon.innerHTML = order === 'desc' ? '&darr;' : '&uarr;';
  
    let cellList = [];
  
    tableRows.forEach(rowEl => {
      // Value of each field
      let textContent = rowEl.children[cellIndex].textContent.toUpperCase().trim();
  
      // stackoverflow.com/questions/31412765/regex-to-remove-white-spaces-blank-lines-and-final-line-break-in-javascript
      const condensedHtml = condenseHTML(rowEl.outerHTML);
  
      cellList.push({
        textContent: textContent,
        rowHtml: condensedHtml
      });
    });
  
    const sortedCellList = sortCellList(cellList, order);
  
    let html = '';
  
    sortedCellList.forEach(entry => {
      html += entry.rowHtml;
    });
  
    table.getElementsByTagName('tbody')[0].innerHTML = html;
  }
  
  // stackoverflow.com/questions/31412765/regex-to-remove-white-spaces-blank-lines-and-final-line-break-in-javascript
  function condenseHTML(html) {
    return html.split('\n')
      .map(s => {
        return s.replace(/^\s*|\s*$/g, "");
      })
      .filter(x => {
        return x;
      })
      .join("");
  }
  
  // https://stackoverflow.com/questions/2802341/natural-sort-of-alphanumerical-strings-in-javascript
  // "If you have an array of objects, you can do it like this: "
  // Answer: https://stackoverflow.com/a/52728388
  function sortCellList(cellList, order) {
    if (order === 'desc') {
      return cellList.sort(function(a, b) {
        return a.textContent.localeCompare(b.textContent, undefined, {
          numeric: true,
          sensitivity: 'base'
        });
      });
    }
  
    return cellList.sort(function(a, b) {
      return b.textContent.localeCompare(a.textContent, undefined, {
        numeric: true,
        sensitivity: 'base'
      });
    });
  }