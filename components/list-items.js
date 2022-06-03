export default class ListItems {
  constructor(el) {
    this.el = el;
    this.init();
  }
  init () {
    const parents = this.el.querySelectorAll('[data-parent]');

    if (parents.length !== 0) {
      parents.forEach( parent => {
        const open = parent.querySelector('[data-open]');

        open.addEventListener('click', () => this.toggleItems(parent));
      } )
    }
  }
  toggleItems(parent) {
    parent.classList.toggle('list-item_open');
  }
}