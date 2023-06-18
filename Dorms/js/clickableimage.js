document.querySelectorAll('.main-image-container img').forEach(image =>{
    image.onclick = () =>{
        document.querySelector('.popup-image-section').style.display = 'block';
        document.querySelector('.popup-image-section img').src = image.getAttribute('src');
    }
});

document.querySelectorAll('.other-image-container img').forEach(image =>{
    image.onclick = () =>{
        document.querySelector('.popup-image-section2').style.display = 'block';
        document.querySelector('.popup-image-section2 img').src = image.getAttribute('src');
    }
});

document.querySelector('.popup-image-section span').onclick = () =>{
    document.querySelector('.popup-image-section').style.display = 'none';
}

document.querySelector('.popup-image-section2 span').onclick = () =>{
    document.querySelector('.popup-image-section2').style.display = 'none';
}