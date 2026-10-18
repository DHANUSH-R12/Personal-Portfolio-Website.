<?php
require_once "config.php";
$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $message = trim($_POST["message"] ?? "");

    if ($name === "" || $email === "" || $message === "") {
        $error = "Please fill in all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } else {
        $stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);
        if ($stmt->execute()) {
            $success = "Message sent successfully!";
        } else {
            $error = "Unable to send your message. Please try again.";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dhanush | Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="navbar">
    <div class="container nav-inner">
        <a href="#home" class="logo"> PERSONAL <span> PORTFOLIO </span></a>
        <button class="menu-btn" id="menuBtn" aria-label="Toggle menu">☰</button>
        <nav id="navMenu">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#skills">Skills</a>
            <a href="#projects">Projects</a>
            <a href="#contact">Contact</a>
        </nav>
    </div>
</header>

<main>
<section id="home" class="hero">
    <div class="container hero-grid">
        <div class="hero-text">
            <p class="tag">DIPLOMA COMPUTER ENGINEERING</p>
            <h1>Hello, I'm <span> Dhanush</span></h1>
            <h2>Web Developer & Software Engineer Aspirant</h2>
            <p>I build responsive websites and practical software projects using modern web technologies.</p>
            <div class="buttons">
                <a class="btn primary" href="#projects">View Projects</a>
                <a class="btn secondary" href="#contact">Contact Me</a>
            </div>
        </div>
        <div class="profile-card">
            <div class="avatar"><imgsrc="DHANUSH.JPEG"></div>
            <h3>DHANUSH.R</h3>
            <p>Computer Engineering Student</p>
            <div class="mini-stats">
                <div><strong>93%</strong><small>Diploma</small></div>
                <div><strong>5+</strong><small>Projects</small></div>
                <div><strong>10+</strong><small>Skills</small></div>
            </div>
        </div>
    </div>
</section>

<section id="about" class="section">
    <div class="container">
        <p class="section-label">ABOUT ME</p>
        <h2>Turning ideas into working applications.</h2>
        <div class="about-grid">
            <div>
                <p>I am a Diploma Computer Engineering student interested in web development, programming and software engineering.</p>
                <p>I enjoy learning coding, creating practical projects and improving my communication and technical skills.</p>
            </div>
            <div class="info-box">
                <div><span>Education</span><b>Diploma Computer Engineering</b></div>
                <div><span>Focus</span><b>Full Stack Web Development</b></div>
                <div><span>Goal</span><b>Software Engineer</b></div>
                <div><span>Interests</span><b>Coding • Web • Data</b></div>
            </div>
        </div>
    </div>
</section>

<section id="skills" class="section alt">
    <div class="container">
        <p class="section-label">MY SKILLS</p>
        <h2>Technologies I work with</h2>
        <div class="skills-grid">
            <div class="skill">HTML5</div>
            <div class="skill">CSS3</div>
            <div class="skill">JavaScript</div>
            <div class="skill">PHP</div>
            <div class="skill">MySQL</div>
            <div class="skill">Python</div>
            <div class="skill">Java</div>
            <div class="skill">C</div>
            <div class="skill">Git & GitHub</div>
            <div class="skill">Responsive Design</div>
        </div>
    </div>
</section>

<section id="projects" class="section">
    <div class="container">
        <p class="section-label">PROJECTS</p>
        <h2>Selected projects</h2>
        <div class="project-grid">
            <article class="project-card">
                <div class="project-icon">📈</div>
                <h3>Stock Market Data Analytics</h3>
                <p>Data analytics and visualization project for studying stock market trends using Python.</p>
                <span>Python • Pandas • Matplotlib</span>
            </article>
            <article class="project-card">
                <div class="project-icon">🚚</div>
                <h3>Online Auction Transport System</h3>
                <p>A web application where transporters can bid for customer transport requests.</p>
                <span>PHP • MySQL • HTML • CSS</span>
        </div>
    </div>
</section>

<section id="contact" class="section alt">
    <div class="container contact-grid">
        <div>
            <p class="section-label">CONTACT</p>
            <h2>Let's connect.</h2>
            <p>If you have a project idea, internship opportunity or feedback, send me a message.</p>
            <div class="contact-links">
                <p>📧 <b>Email:</b> rdhanushparuvathampoondi81@gmail.com</p>
                <p>💻 <b>GitHub:</b> github.com/DHANUSH-R12</p>
                <p>🔗 <b>LinkedIn:</b> linkedin.com/in/dhanush-r-8123b1410</p>
            </div>
        </div>
        <form class="contact-form" method="POST" action="#contact">
            <?php if ($success): ?><div class="alert success"><?= htmlspecialchars($success) ?></div><?php endif; ?>
            <?php if ($error): ?><div class="alert error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
            <input type="text" name="name" placeholder="Your name" required>
            <input type="email" name="email" placeholder="Your email" required>
            <textarea name="message" rows="6" placeholder="Your message" required></textarea>
            <button class="btn primary" type="submit">Send Message</button>
        </form>
    </div>
</section>
</main>

<footer>
    <div class="container footer-inner">
        <p>© <?= date("Y") ?> Dhanush. All rights reserved.</p>
        <a href="#home">Back to top ↑</a>
    </div>
</footer>

<script src="script.js"></script>
</body>
</html>
