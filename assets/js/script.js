class CustomKnop extends HTMLElement {

    connectedCallback() {
        const href = this.getAttribute('href') || '#';
        this.innerHTML = `<a href="${href}">${this.textContent}</a>`;
    }
}

customElements.define('custom-knop', CustomKnop)