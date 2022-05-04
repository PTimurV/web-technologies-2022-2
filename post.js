import Item from "./components/item.js";
console.log("aaa4")
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init)

} else {
    init()
}

function init() {
   new Item(document.getElementById('post'))
}