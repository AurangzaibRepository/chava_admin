var isValid;

$(function() {
    initializeSlick();
});

function initializeSlick() {
    $('.logo-topics').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 2
            }
        }]
    });
}

function addCategory() {
    
    isValid = true;
    $('.spn-error').css('display', 'none');

    validateField('category', 'spn-category');
    validateField('status', 'spn-status');
}

function validateField(elementID, errorID) {

    if ($(`#${elementID}`).val().trim() === '') {
        
        isValid = false;
        $(`#${errorID}`).css('display', 'block');
    }
}
