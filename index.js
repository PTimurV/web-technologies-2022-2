import ListItems from "./components/list-items.js";

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', init)
} else {
  init()
}

function init() {
  const items = new ListItems(document.getElementById('list-items'))
}