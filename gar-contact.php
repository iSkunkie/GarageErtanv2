<?php
include "gar-header.php";
?>
<main class="container">
    <section class="contact-veld">
        <h2>Contacteer ons</h2>
        <div class="border"></div>
        <form class="contact-form" action="gar-contactform.php" method="post">
            <input type="text" class="contact-formtext" placeholder="Volledige naam...">
            <input type="email" class="contact-formtext" placeholder="E-mai...">
            <input type="text" class="contact-formtext" placeholder="Onderwerp...">
            <textarea class="contact-formtext" placeholder="Bericht..."></textarea>
            <input type="submit" class="contact-formbtn" value="Verstuur">
        </form>
    </section>
</main>

<?php
include "gar-footer.php";
?>