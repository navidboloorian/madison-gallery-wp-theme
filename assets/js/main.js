document.addEventListener('DOMContentLoaded', function(event) {
    bindMobileNavbarButtons();
    positionFooter();
    setExhibitionDetails();
    populateDetailsSidebar();
    preventReload();
})

/** Mobile Navbar Setup */
const bindMobileNavbarButtons = () => {
    const mobileNavbar = document.querySelector('#mobile-navbar');
    const hamburgerButton = document.querySelector('#hamburger-icon');
    const closeButton = document.querySelector('.close-button');

    if(mobileNavbar && hamburgerButton && closeButton) {
        console.log(mobileNavbar)

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
    const exhibitionArtists = document.querySelectorAll('.exhibition-artist');
    const exhibitionDates = document.querySelectorAll('.exhibition-date');

    if(exhibitionArtists) {
        for(let i = 0; i < exhibitionArtists.length; i++) {
            const exhibitionArtist = exhibitionArtists[i];
            const exhibitionDate = exhibitionDates[i];

            const parentElement = exhibitionArtist.parentElement.parentElement.parentElement.parentElement;
            parentElement.querySelector('.exhibition-artist-name').innerHTML = exhibitionArtist.textContent;
            parentElement.querySelector('.exhibition-date-display').innerHTML = exhibitionDate.textContent;
        }
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

/** Prevent Form Reload */
const preventReload = () => {
    const form = document.querySelector("#mailing-list-form");

    if(form) {
        form.onsubmit = (e) => {
            alert("Thank you for joining our mailing list!")
        }
    }
} 