var blurMe = document.createElement('style');
blurMe.innerHTML = `
body > *:not(#loading){
    filter: blur(5px);
}
`

function Loader() {
    let ns = "http://www.w3.org/2000/svg"
    Loader.element = document.createElementNS(ns, 'svg');
    Loader.element.setAttribute("width", "100");
    Loader.element.setAttribute("height", "100");
    Loader.element.style.cssText = 'position:fixed; top:50%; left:50%;transform:translate(-50%, -50%); z-index:1000000';
    document.body.appendChild(Loader.element);

    let c = document.createElementNS(ns, 'circle');
    c.setAttribute('viewBox', '0 0 100 100');
    c.setAttribute('cx', '50');
    c.setAttribute('cy', '50');
    c.setAttribute('r', '42');
    c.setAttribute('stroke-width', '14');
    c.setAttribute('stroke', '#2196f3');
    c.setAttribute('fill', 'transparent');
    Loader.element.appendChild(c);
}

Loader.id = null;
Loader.element = null;
Loader.show = function () {
    const c = 264, m = 15;
    Loader.element.style.display = 'block';
    Loader.element.id = 'loading'
    document.head.appendChild(blurMe);
    move1();
    function move1() {
        let i = 0, o = 0;
        move();
        function move() {
            if (i == c) move2();
            else {
                i += 4; o += 8;
                Loader.element.setAttribute('stroke-dasharray', i + ' ' + (c - i));
                Loader.element.setAttribute('stroke-dashoffset', o)
                Loader.id = setTimeout(move, m)
            }
        }
    }
    function move2() {
        let i = c, o = c * 2;
        move();
        function move() {
            if (i == 0) move1();
            else {
                i -= 4; o += 4;
                Loader.element.setAttribute('stroke-dasharray', i + ' ' + (c - i));
                Loader.element.setAttribute('stroke-dashoffset', o)
                Loader.id = setTimeout(move, m)
            }
        }
    }
};
Loader.hide = function () {
    Loader.element.style.display = 'none';
    blurMe.innerHTML = `
body{
    filter: none;
}
`
    document.head.appendChild(blurMe)
    if (Loader.id) {
        clearTimeout(Loader.id);
        Loader.id = null
    }
    Loader.element.setAttribute('stroke-dasharray', '0 264');
    Loader.element.setAttribute('stroke-dashoffset', '0')
};