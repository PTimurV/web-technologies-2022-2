import {Auth} from '/services/auth.js'

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init)
} else {
    try {
        init()
    } catch (e) {
        console.log(e)
    }
}

function init() {
    new Auth().me()
}
