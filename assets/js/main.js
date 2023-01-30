document.addEventListener('DOMContentLoaded', function(event) {
    populateDetailsSidebar();
})

/** Details Sidebar */
const populateDetailsSidebar = () => {
    const detailsSidebar = document.querySelector('.details-sidebar');
    const detailsSidebarContent = document.querySelector('.details-sidebar-content');

    if(detailsSidebar && detailsSidebarContent) {
        const sidebarHeaders = detailsSidebarContent.querySelectorAll('h2');
        const sidebarList = detailsSidebar.querySelector('ul');

        for(let i = 0; i < sidebarHeaders.length; i++) {
            const header = sidebarHeaders[i];
            const display = header.nextSibling;

            if(i == 0) {
                setDetailsSidebarDisplay(display);
            }

            const sidebarHeader = document.createElement('li');
            sidebarHeader.innerHTML = header.textContent;

            sidebarHeader.onclick = () => {
                setDetailsSidebarDisplay(display);
            }

            sidebarList.appendChild(sidebarHeader);
        }

        console.log(sidebarHeaders);
    }
}

const setDetailsSidebarDisplay = (content) => {
    const artistContent = document.querySelector("#artist-content");

    if(artistContent) {
        const display = content.nextElementSibling.cloneNode(true);

        console.log(display);

        artistContent.innerHTML = "";
        artistContent.appendChild(display);
    }
}
