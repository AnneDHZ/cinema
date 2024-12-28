

function previous(){
    const widthSlider = document.querySelector('.slider').offsetWidth;
    document.querySelector('.sliderContainer').scrollLeft -= widthSlider;

}

function next(){
    const widthSlider = document.querySelector('.slider').offsetWidth;
    document.querySelector('.sliderContainer').scrollLeft += widthSlider;
}