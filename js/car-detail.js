
document.addEventListener('DOMContentLoaded', function() {
    // Image gallery functionality
    const mainImage = document.getElementById('main-car-image');
    const thumbnails = document.querySelectorAll('.thumbnail');

    if (mainImage && thumbnails.length > 0) {
        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', function() {
                // Get image source from data attribute
                const imageSrc = this.getAttribute('data-image');
                
                // Update main image
                mainImage.src = imageSrc;
                
                // Update active thumbnail
                thumbnails.forEach(thumb => thumb.classList.remove('active'));
                this.classList.add('active');
            });
        });
    }

    // CTA buttons
    const testDriveBtn = document.querySelector('.car-cta .btn-primary');
    const infoBtn = document.querySelector('.car-cta .btn-outline');

    if (testDriveBtn) {
        testDriveBtn.addEventListener('click', function() {
            alert('Test drive scheduling will be implemented soon!');
        });
    }

    if (infoBtn) {
        infoBtn.addEventListener('click', function() {
            alert('Request for more information will be implemented soon!');
        });
    }
});
