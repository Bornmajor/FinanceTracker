// Function to add or remove classes based on screen width
function adjustStyles() {
    var screenWidth = window.innerWidth;
    var targetElement = document.querySelector('.form-submit-btn');
    
    // if (screenWidth < 768) {
    //     document.body.classList.add('small-screen-style');
    //     document.body.classList.remove('large-screen-style');
    // } else {
    //     document.body.classList.add('large-screen-style');
    //     document.body.classList.remove('small-screen-style');
    // }
        if (screenWidth <   961) {

        targetElement.classList.add('btn-primary');
        targetElement.classList.remove('btn-secondary');
    } else {
        targetElement.classList.add('btn-secondary');
        targetElement.classList.remove('btn-primary');
    }
   console.log('Called');
}

// Call the function when the page loads and when the window is resized
window.onload = adjustStyles;
window.onresize = adjustStyles;



