var loadFile = function(event) {
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
};
var loadFile2 = function(event) {
    var image = document.getElementById('output2');
    image.src = URL.createObjectURL(event.target.files[0]);
};
var loadFile3 = function(event) {
    var image = document.getElementById('output3');
    image.src = URL.createObjectURL(event.target.files[0]);
};

var uloadFile = function(event) {
    var image = document.getElementById('uOutput');
    image.src = URL.createObjectURL(event.target.files[0]);
};
var uloadFile2 = function(event) {
    var image = document.getElementById('uOutput2');
    image.src = URL.createObjectURL(event.target.files[0]);
};
var uloadFile3 = function(event) {
    var image = document.getElementById('uOutput3');
    image.src = URL.createObjectURL(event.target.files[0]);
};
