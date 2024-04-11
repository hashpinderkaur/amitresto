<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings | Amitrestoburguzz</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your main stylesheet here -->
</head>
<body>
    <!-- Header -->
    <header class="header">
      <nav>
        <div class="nav__header">
          <div class="nav__logo">
            <a href="#">
              <img
                src="assets/logo.png"
                alt="logo"
                class="nav__logo-dark"
              />
              <img
                src="assets/logo2.png"
                alt="logo"
                class="nav__logo-white"
              />
            </a>
          </div>
          <div class="nav__menu__btn" id="menu-btn">
            <i class="ri-menu-line"></i>
          </div>
        </div>
        <ul class="nav__links" id="nav-links">
          <li><a href="#home">HOME</a></li>
          <li><a href="#special">SPECIAL</a></li>
          <li><a href="#menu">MENU</a></li>
          <li><a href="#event">EVENTS</a></li>
          <li><a href="#contact">CONTACT US</a></li>
          <li><a href="bookings.php">BOOKINGS</a></li> <!-- Link to the bookings page -->
        </ul>
      </nav>
    </header>

    <!-- Main content -->
    <main>
        <section class="booking__container" id="bookings">
            <h1>Bookings</h1>
            <!-- Here you can display the list of bookings made -->
            <!-- This could be a table, a list, or any other suitable format -->
            <!-- For now, let's just add some placeholder text -->
            <p>No bookings yet.</p>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
      <div class="section__container footer__container">
        <div class="footer__logo">
          <img src="assets/logo2.png" alt="logo" />
        </div>
        <div class="footer__content">
          <p>
            Welcome to Amitresto Burgurzz, where passion for exceptional food and
            genuine hospitality come together. Our story is one of dedication to
            crafting the perfect burger experience, from sourcing the finest
            ingredients to delivering unparalleled taste in every bite.
          </p>
          <div>
            <ul class="footer__links">
              <li>
                <span><i class="ri-map-pin-2-fill"></i></span>
                sheppard avanue,scaborough, M1T2C9
              </li>
              <li>
                <span><i class="ri-mail-fill"></i></span>
                info@Amitrestoburguzz.com
              </li>
            </ul>
            <div class="footer__socials">
              <a href="#"><i class="ri-facebook-circle-fill"></i></a> <!-- Facebook link added -->
              <a href="#"><i class="ri-instagram-fill"></i></a> <!-- Instagram link added -->
             
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="main.js"></script>
</body>
</html>
