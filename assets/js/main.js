document.addEventListener('DOMContentLoaded', function(event) {
    bindMobileNavbarButtons();
    positionFooter();
    setFairDetails();
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

/** Fairs */
const setFairDetails = () => {
    const fairWrapper = document.querySelector('#fair-wrapper');

    if(fairWrapper) {
        const fairDates = document.querySelectorAll('.fair-date');

        for(let i = 0; i < fairDates.length; i++) {
            const fairDate = fairDates[i];

            const parentElement = fairDate.parentElement.parentElement.parentElement.parentElement;
            parentElement.querySelector('.fair-date-display').innerHTML = fairDate.textContent;
        }
    }
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

        const artworkGallery = display.querySelector(".artwork-gallery");
        const artworkInfo = document.querySelector("#artwork-info");
        const artworkInfoMobile = document.querySelector("#artwork-info-mobile");

        artistContent.innerHTML = "";
        artworkInfo.innerHTML = "";

        if(artworkGallery) {
            const artworks = artworkGallery.children;

            let currentArtIndex = 0;
            artistContent.innerHTML = `<div id='artwork-gallery-grid-display'></div><img id='current-image' src='${artworks[currentArtIndex].firstChild.src}'>`;

            if (window.innerWidth > 670) {
                artworkInfo.innerHTML = `
                <div id='artwork-gallery-navigation'>
                    <div id='artwork-gallery-buttons'>
                        <button id='artwork-gallery-decrement'></button>
                        <button id='artwork-gallery-increment'></button>
                        <div></div>
                        <button id='artwork-gallery-grid'></button>
                        <span id='artwork-gallery-counter'>
                            ${currentArtIndex + 1} / ${artworks.length}
                        </span>
                    </div>
                    <div id='artwork-description'>${artworks[currentArtIndex].firstChild.alt}</div>
                </div>`;
            }
            else {
                artworkInfoMobile.innerHTML = `
                <div id='artwork-gallery-navigation'>
                    <div id='artwork-gallery-buttons'>
                        <button id='artwork-gallery-decrement'></button>
                        <button id='artwork-gallery-increment'></button>
                        <div></div>
                        <button id='artwork-gallery-grid'></button>
                        <span id='artwork-gallery-counter'>
                            ${currentArtIndex + 1} / ${artworks.length}
                        </span>
                    </div>
                    <div id='artwork-description'>${artworks[currentArtIndex].firstChild.alt}</div>
                </div>`;
            }

            const artworkGalleryGridDisplay = document.querySelector("#artwork-gallery-grid-display");
            const artworkGalleryNavigation = document.querySelector("#artwork-gallery-navigation");
            const artworkGalleryCounter = document.querySelector("#artwork-gallery-counter");
            const artworkDescription = document.querySelector("#artwork-description");
            const artworkGalleryDecrement = document.querySelector("#artwork-gallery-decrement");
            const artworkGalleryIncrement = document.querySelector("#artwork-gallery-increment");
            const artworkGalleryGrid = document.querySelector("#artwork-gallery-grid");
            const currentImage = document.querySelector("#current-image");

            artworkGalleryGridDisplay.style.display = 'none';

            for(let i = 0; i < artworks.length; i++) {
                artworkGalleryGridDisplay.innerHTML += `<img src='${artworks[i].firstChild.src}' class='artwork-gallery-grid-image' data-image-index='${i}'>`;
            }

            const artworkGalleryGridImages = artworkGalleryGridDisplay.querySelectorAll(".artwork-gallery-grid-image");

            for(let i = 0; i < artworkGalleryGridImages.length; i++) {
                artworkGalleryGridImages[i].onclick = () => {
                    const imageIndex = parseInt(artworkGalleryGridImages[i].getAttribute("data-image-index"));

                    currentImage.style.display = 'block';
                    artworkGalleryGridDisplay.style.display = 'none';
                    artworkGalleryNavigation.style.display = 'block';
                    
                    currentArtIndex = i;
                    currentImage.setAttribute('src', artworks[i].firstChild.src);
                    artworkGalleryCounter.innerHTML = `${currentArtIndex + 1} / ${artworks.length}`;
                    artworkDescription.innerHTML = `${artworks[imageIndex].firstChild.alt}`;
                }
            }

            artworkGalleryDecrement.onclick = () => {
                if(currentArtIndex > 0) {
                    currentArtIndex--;
                }
                else {
                    currentArtIndex = artworks.length - 1;
                }

                
                currentImage.setAttribute('src', artworks[currentArtIndex].firstChild.src);
                artworkGalleryCounter.innerHTML = `${currentArtIndex + 1} / ${artworks.length}`;
                artworkDescription.innerHTML = `${artworks[currentArtIndex].firstChild.alt}`;
            }

            artworkGalleryIncrement.onclick = () => {
                if(currentArtIndex < artworks.length - 1) {
                    currentArtIndex++;
                }
                else {
                    currentArtIndex = 0;
                }

                currentImage.setAttribute('src', artworks[currentArtIndex].firstChild.src);
                artworkGalleryCounter.innerHTML = `${currentArtIndex + 1} / ${artworks.length}`;
                artworkDescription.innerHTML = `${artworks[currentArtIndex].firstChild.alt}`;
            }

            artworkGalleryGrid.onclick = () => {
                artworkGalleryNavigation.style.display = 'none';
                artworkGalleryGridDisplay.style.display = 'grid';
                currentImage.style.display = 'none';
            }
        }
        else {
            artistContent.appendChild(display);
        }
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