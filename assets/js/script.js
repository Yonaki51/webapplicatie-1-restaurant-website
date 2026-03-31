class CustomKnop extends HTMLElement {

    connectedcallback() {
        this.innerHTML = `<a>knop</a>`;
    }
}

customElements.define('custom-knop', CustomKnop)