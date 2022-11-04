<?php $contact_form = get_field('footer_form', 'option'); ?>
<?php if (!empty($contact_form)) : ?>
    <section class="contact-section py-35 py-md-80" id="mys_footer_contactform">
        <div class="container">
            <div class="recruitment-box">
                <?php
                $title = get_the_title($contact_form);
                echo do_shortcode('[contact-form-7 id="' . $contact_form . '" title="' . $title . '"]');
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>