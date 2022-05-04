export default class Item {
    constructor(el) {
        this.el = el;
        this.post = this.getPost();
        this.postsEl = el.querySelector('[data-catalog-item]');
        this.commentsEl = el.querySelector('[data-comment-items]');
        console.log(1)

        this.getItem()
        this.getComments()
    }

    getPost() {
        const url = new URL(window.location.href)

        return +url.searchParams.get('id')
    }

    async getItem() {
        console.log(2)
        const url = `https://jsonplaceholder.typicode.com/posts/${this.post}`;
        
            const response = await fetch(url);

            if(!response.ok)
                throw new Error('Ошибка запроса');

            const json = await response.json();

            if(json)
                this.renderPost(json);

        
    }

    renderPost(item) {
        console.log(3)
        this.postsEl.innerHTML = `            
            <h3 class="post-content__title">${item.title}</h3>
            
            <div class="post-content__body">
                ${item.body}
            </div>
        `
    }

    async getComments() {
        console.log(4)
        const url = `https://jsonplaceholder.typicode.com/posts/${this.post}/comments`

            const response = await fetch(url)
        


            const json = await response.json()

            if(json)
                this.renderComments(json)

    }

    renderComments(items) {
        console.log(5)
        let html = ''

        items.forEach(item => {
            html += `
                <div class="comment-item">
                    <div class="user-info">
                        <div class="comment-item__name">
                            ${item.name}
                        </div>
                        <div class="comment-item__email">
                            ${item.email}
                        </div>
                    </div>
                    <div class="comment-item__body">
                        ${item.body}
                    </div>
                </div>
            `
        })
        console.log(html)

        this.commentsEl.innerHTML = html
    }
}


    
