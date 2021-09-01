export const initPardotIframeHandling = () => {
    window.addEventListener('message', receiveMessage, false);

    function receiveMessage(event) {
        // Pardot sends its own form heights, however it doesn't specify for what form.
        // Messages from our custom script are objects, theres is a simple number.
        if (!('data' in event) || typeof event.data !== 'object' || !('url' in event.data)) {
            return;
        }
        const iframeElement = document.querySelectorAll(`iframe[src="${event.data.url}"]`);
        if (iframeElement.length) {
            iframeElement.forEach(function (el, key, parent) {
                el.classList.add('pardot-height-adjusted');
                el.style.height = `${event.data.height}px`;
            })
        } else {
            console.error(`Could not find iframe with url: '${event.data.url}'`)
        }
    }
}
