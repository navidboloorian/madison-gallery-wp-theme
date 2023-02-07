document.addEventListener('DOMContentLoaded', function(event) {
    bindMobileNavbarButtons();
    positionFooter();
    setExhibitionDetails();
    setExhibitionContent();
    populateDetailsSidebar();
    preventReload();
})

/** Mobile Navbar Setup */
const bindMobileNavbarButtons = () => {
    const mobileNavbar = document.querySelector('#mobile-navbar');
    const hamburgerButton = document.querySelector('#hamburger-icon');
    const closeButton = document.querySelector('.close-button');

    if(mobileNavbar && hamburgerButton && closeButton) {
        hamburgerButton.onclick = () => {
            mobileNavbar.style.display = 'grid';
        }

        closeButton.onclick = () => {
            mobileNavbar.style.display = 'none';
        }
    }
}

/** Position Footer */
const positionFooter = () => {
    const mainWrapper = document.querySelector('#main-wrapper');
    const footer = document.querySelector('#footer-wrapper');

    mainWrapper.style.minHeight = window.innerHeight - (100 + footer.clientHeight) + "px";
}

/** Exhibitions */
const setExhibitionDetails = () => {
    const exhibitionsWrapper = document.querySelector('#exhibitions-wrapper');

    if(exhibitionsWrapper) {
        const exhibitionArtists = document.querySelectorAll('.exhibition-artist');
        const exhibitionDates = document.querySelectorAll('.exhibition-date');

        for(let i = 0; i < exhibitionArtists.length; i++) {
            const exhibitionArtist = exhibitionArtists[i];
            const exhibitionDate = exhibitionDates[i];

            const parentElement = exhibitionArtist.parentElement.parentElement.parentElement.parentElement;
            parentElement.querySelector('.exhibition-artist-name').innerHTML = exhibitionArtist.textContent;
            parentElement.querySelector('.exhibition-date-display').innerHTML = exhibitionDate.textContent;
        }
    }
}

/** Exhibition */
const setExhibitionContent = () => {
    const exhibitionContent = document.querySelector('#exhibition-content');

    if(exhibitionContent) {
        const exhibitionArtist = document.querySelector('#exhibition-artist');
        const exhibitionDate = document.querySelector('#exhibition-date');

        const exhibitionContentTemplate = document.querySelector('.exhibition-content');
        const exhibitionArtistTemplate = document.querySelector('.exhibition-artist');
        const exhibitionDateTempalte = document.querySelector('.exhibition-date');
        
        exhibitionArtist.innerHTML = exhibitionArtistTemplate.textContent;
        exhibitionDate.innerHTML = exhibitionDateTempalte.textContent;

        exhibitionContent.appendChild(exhibitionContentTemplate);
    }
}

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
    }
}

const setDetailsSidebarDisplay = (content) => {
    const artistContent = document.querySelector("#artist-content");

    if(artistContent) {
        const display = content.nextElementSibling.cloneNode(true);

        artistContent.innerHTML = "";
        artistContent.appendChild(display);
    }
}

/** Prevent Form Reload */
const preventReload = () => {
    const form = document.querySelector("#mailing-list-form");

    if(form) {
        form.onsubmit = (e) => {
            alert("Thank you for joining our mailing list!")
        }
    }
} 