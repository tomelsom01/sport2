const canvas = document.getElementById('starfield');
const ctx = canvas.getContext('2d');
let width = window.innerWidth, height = window.innerHeight;
canvas.width = width;
canvas.height = height;

// Starfield settings
const numStars = 400;
const stars = [];
let mouseX = width / 2, mouseY = height / 2;

function randomRange(a, b) {
    return Math.random() * (b - a) + a;
}

// Each star has 3D coordinates
class Star {
    constructor() {
        this.reset();
    }
    reset() {
        this.x = randomRange(-width, width);
        this.y = randomRange(-height, height);
        this.z = randomRange(0.1, width);
    }
    update() {
        // Make stars move toward viewer (the center of the canvas)
        this.z -= 4; // Star speed toward viewer; increase for faster
        // Slight movement based on mouse offset from center
        this.x += (mouseX - width / 2) * 0.002;
        this.y += (mouseY - height / 2) * 0.002;
        if (this.z <= 0.1 || this.x < -width*2 || this.x > width*2 || this.y < -height*2 || this.y > height*2) {
            this.reset();
            this.z = width;
        }
    }
    draw() {
        // Simple perspective projection
        const sx = width / 2 + this.x / this.z * width;
        const sy = height / 2 + this.y / this.z * height;
        const radius = Math.max(0, 2.4 - this.z * 0.0022); // Smaller for distant stars
        ctx.beginPath();
        ctx.arc(sx, sy, radius, 0, Math.PI*2);
        ctx.fillStyle = "#fff";
        ctx.globalAlpha = 1 - this.z / width; // Fade distant stars
        ctx.fill();
        ctx.globalAlpha = 1;
    }
}

function createStars() {
    while (stars.length < numStars) stars.push(new Star());
}
function resize() {
    width = window.innerWidth;
    height = window.innerHeight;
    canvas.width = width; canvas.height = height;
}
window.addEventListener('resize', resize);
canvas.addEventListener('mousemove', e => {
    mouseX = e.clientX;
    mouseY = e.clientY;
});
createStars();

function animate() {
    ctx.fillStyle = "#111";
    ctx.fillRect(0, 0, width, height);
    for (const star of stars) {
        star.update();
        star.draw();
    }
    requestAnimationFrame(animate);
}
animate();
