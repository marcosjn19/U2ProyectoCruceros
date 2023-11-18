//var scene = document.getElementById('scene', 'scene2');
var scene = document.querySelectorAll('.scene, .scene2');
scene.forEach(function(escena){
    var parallax = new Parallax(escena,{
        selector: ".layer"
    });
});
/*var parallax = new Parallax(scene,{
    selector: '.layer'
});*/

/*
var scene2 = document.getElementById('scene2');
var parallax2 = new Parallax(scene2, {
    selector: '.layer'
}); */
