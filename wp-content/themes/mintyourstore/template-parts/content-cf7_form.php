<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>

        <div class="container">
            <?php
            if (!empty($args)) {
                $select_contact_form = isset($args['select_contact_form']) ? $args['select_contact_form'] : array();
            ?>
                <?php if (!empty($select_contact_form)) : ?>
                    <section class="contact-section py-35 py-md-80" id="mys_footer_contactform">
                        <div class="container">
                            <div class="recruitment-box">
                                <?php
                                $title = get_the_title($select_contact_form);
                                echo do_shortcode('[contact-form-7 id="' . $select_contact_form . '" title="' . $title . '"]');
                                ?>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    var modal = document.getElementById("myModal");
    //var btn = document.getElementsByClassName("CF7_openmodale")[0];
    var span = document.getElementsByClassName("close")[0];

    let openClosePopups = document.querySelectorAll('.CF7_openmodale');
    openClosePopups.forEach((openClosepopup) => {
        openClosepopup.addEventListener('click', function(ele) {
            var title = openClosepopup.getAttribute('title');

            var class_pt = 'project_title';
            var class_cp = 'choose_package';
            if(hasClass(openClosepopup, class_pt))
            {
                if(document.querySelector('.package-list-wrap'))
                {
                    document.querySelector('.package-list-wrap').style.display = "none";
                    document.querySelector('.project-title-wrap').style.display = "block";
                }
            }
            else
            {
                if(document.querySelector('.package-list-wrap'))
                {
                    document.querySelector('.package-list-wrap').style.display = "block";
                    document.querySelector('.project-title-wrap').style.display = "none";
                }
            }
            if(hasClass(openClosepopup, class_cp))
            { if(document.querySelector('.package-list-wrap'))
                {
                    document.querySelector('.project-title-wrap').style.display = "none";
                    document.querySelector('.package-list-wrap').style.display = "block";
                }
            }
            else
            {   
                if(document.querySelector('.package-list-wrap'))
                {
                    document.querySelector('.project-title-wrap').style.display = "block";
                    document.querySelector('.package-list-wrap').style.display = "none";
                }
            }

            if (title != '') {
                if (document.getElementById("storerequestinput")) {
                    document.getElementById("storerequestinput").value = title;
                }
                //console.log("title" + title);
            }
            modal.style.display = "block";

        });

    });

    span.onclick = function() {
        modal.style.display = "none";
        if (document.getElementById("storerequestinput")) {
            document.getElementById("storerequestinput").value = '';
        }
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            if (document.getElementById("storerequestinput")) {
                document.getElementById("storerequestinput").value = '';
            }
        }
    }

    function hasClass(element, classNameToTestFor) {
        var classNames = element.className.split(' ');
        
        for (var i = 0; i < classNames.length; i++) {
            if (classNames[i].toLowerCase() == classNameToTestFor.toLowerCase()) {
                return true;
            }
        }
        return false;
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
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>