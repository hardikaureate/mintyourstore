<!-- The Modal -->
<div id="startAproject" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="sp-close">&times;</span>

        <div class="container">



            <section class="contact-section py-35 py-md-80" id="">
                <div class="container">
                    <div class="recruitment-box">
                        <?php
                        echo do_shortcode('[contact-form-7 id="3465" title="Affordable Pricing"]');
                        ?>
                    </div>
                </div>
            </section>


        </div>
    </div>
</div>

<script>
    var sp_modal = document.getElementById("startAproject");
    //var btn = document.getElementsByClassName("CF7_openmodale")[0];
    var sp_span = document.getElementsByClassName("sp-close")[0];

    let openClosePopup = document.querySelectorAll('.cf7startproject');
    openClosePopup.forEach((openClosepopup) => {
        openClosepopup.addEventListener('click', function(ele) {
            sp_modal.style.display = "block";

        });

    });

    sp_span.onclick = function() {
        sp_modal.style.display = "none";

    }

    window.onclick = function(event) {
        if (event.target == sp_modal) {
            sp_modal.style.display = "none";

        }
    }
</script>
<style>
    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .sp-close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .sp-close:hover,
    .sp-close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>